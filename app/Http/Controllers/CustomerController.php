<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Order As Orders;
use App\Models\Products;
use App\Models\Category;
use App\Models\Cart;

use App\Models\Size;

class CustomerController extends Controller
{

    public function menu()
    {
        return view(
            'frontend.menu.index',
            [
                'categorys' => Category::all(),
            ]
        );
    }

    public function cart()
    {

        $auth = Auth::user();
        $size = Size::all();
        $carts = Cart::query()
            ->where('user_id', $auth->id)
            ->whereNull('order_id')
        ->get();

        return view(
            'frontend.cart.index',
            [
                'carts' => $carts,
                'size_cart' => $size,
            ]
        );

    }

    public function addtocart(Request $req)
    {

        if(
            !empty($req->product_id) &&
            !empty($req->quantity)
        )
        {

            $auth = Auth::user();

            $cart_checker = Cart::query()
                ->where('user_id', $auth->id)
                ->where('product_id', $req->product_id)
                ->whereNull('order_id')
            ->first();

            $product_checker = Products::find($req->product_id);

            if(!empty($cart_checker->id))
            {

                $update_qty = Cart::find($cart_checker->id);

                $update_qty->update(
                    [
                        'quantity' => $cart_checker->quantity + $req->quantity,
                    ]
                );

            }else{

                $cart = Cart::create(
                    [
                        'user_id' => $auth->id,
                        'product_id' => $req->product_id,
                        'price' => ($product_checker->price * $req->quantity),
                        'quantity' => $req->quantity,
                    ]
                );

            }

            return redirect()->route('cart.index');

        }else{
            return redirect()->route('menu.index');
        }

    }

    public function cartEditQTY(Request $req)
    {

        if(
            !empty($req->cart_id) &&
            !empty($req->quantity)
        )
        {

            $auth = Auth::user();

            $cart_checker = Cart::find($req->cart_id);

            if(!empty($cart_checker->id))
            {   

                if(
                    $req->quantity > 0 &&
                    $req->quantity <= 50
                )
                {   

                    $cart_checker = Cart::find($req->cart_id);
                    $size_checker = Size::where('size', '=', $cart_checker->size)->first();
                    $product_checker = Products::find($cart_checker->product_id);

                    $price_total = 0;

                    // เลือกถาด
                    if(
                        !empty($size_checker->id)
                    )
                    {
                        
                        if($size_checker->price <= 0)
                        {
        
                            $price_total = ($product_checker->price * $req->quantity);
        
                        }elseif($size_checker->price > 0){
        
                            $price_total = ($product_checker->price + $size_checker->price) * $req->quantity;
        
                        }
        
                    }else{
                        $price_total = ($product_checker->price * $req->quantity);
                    }

                    // แก้ไขข้อมูลในตาราง
                    $cart_checker->update(
                        [
                            'price' => $price_total,
                            'quantity' => $req->quantity,
                        ]
                    );

                    toast('แก้ไขจำนวนสำเร็จ','success');

                }else{
                    toast('สั่งสูงสุดได้ไม่เกิน 50 ชิ้น','info');
                }

                return redirect()->route('cart.index');

            }else{
                return redirect()->route('cart.index');
            }

        }else{
            return redirect()->route('menu.index');
        }

    }

    public function cartEditSize(Request $req)
    {

        if(
            !empty($req->cart_id)
        )
        {

            $auth = Auth::user();

            $cart_checker = Cart::find($req->cart_id);
            $size_checker = Size::where('size', $req->size)->first();
            $product_checker = Products::find($cart_checker->product_id);

            $total = 0;

            // คำนวนเงินเปลี่ยนขนาดไซต์ 
            if(
                !empty($size_checker->id)
            )
            {
                
                if($size_checker->price <= 0)
                {

                    $total = ($product_checker->price * $cart_checker->quantity);

                }elseif($size_checker->price > 0){

                    $total = ($product_checker->price + $size_checker->price) * $cart_checker->quantity;

                }

            }else{
                $total = ($product_checker->price * $cart_checker->quantity);
            }

            if(!empty($cart_checker->id))
            {   

                $cart_checker->update(
                    [
                        'price' => $total,
                        'size' => !empty($req->size) ? $req->size : null,
                    ]
                );

                toast('แก้ไขขนาดถาดสำเร็จ','success');
                return redirect()->route('cart.index');

            }else{
                return redirect()->route('cart.index');
            }

        }else{
            return redirect()->route('menu.index');
        }

    }

    public function cartDelete($id=null)
    {

        $cart = Cart::find($id);

        if (!$cart) 
        {
            alert()->error('แจ้งเตือน', 'ไม่พบสินค้าที่ต้องการลบ');
            return redirect()->route('cart.index');
        }
    
        try {
            $cart->delete();
            toast('ลบสำเร็จ','success');
        } catch (\Exception $e) {
            toast('เกิดข้อผิดพลาดในการลบ','error');
        }
    
        return redirect()->route('cart.index');
    
    }

    public function checkout()
    {

        $auth = Auth::user();
        $cart = Cart::where('user_id', $auth->id)->whereNull('order_id');

        $cart_count = $cart->count();

        if($cart_count > 0)
        {

            // CREATE ORDER
            $order = Orders::create(
                [
                    'user_id' => $auth->id,
                    'total_price' => $cart->sum('price'),
                ]
            );

            // GENERATE and UPDATE ORDER CODE
            $order_code = 'GN' . DATE('Ymd') . $order->id;
            Orders::find($order->id)->update(['order_code' => $order_code]);

            // ORDER ID TO CART
            $get_cart_product = Cart::where('user_id', $auth->id)->whereNull('order_id')->get();
            $cart_id = [];

            foreach($get_cart_product as $key => $cart_order)
            {
                $cart_id[] = $cart_order->id;
            }

            Cart::whereIn('id', $cart_id)->update(
                [
                    'order_id' => $order->id,
                ]
            );

            return redirect()->route('cart.index');

        }else{
            return redirect()->route('cart.index');
        }

    }

    public function showCart()
    {
        return view('cart');
    }

    public function home()
    {
        return view('frontend.home.index');
    }

    public function order()
    {

        $auth = Auth::user();

        $order = Orders::query()
            ->where('user_id', $auth->id)
        ->paginate(5);

        return view(
            'frontend.order.index',
            [
                'orders' => $order,
                'sizes' => Size::all(),
                'total_qty' => 0,
                'size_calculate' => 0,
            ]
        );

    }

    public function ConfirmPayment(Request $req)
    {

        if(
            empty($req->order_id) &&
            empty($req->confirmSlip)
        )
        {
            return redirect()->route('order.index');
        }

        $order = Orders::find($req->order_id);

        if(!empty($order->id))
        {

            $slip = $req->confirmSlip->store('slip');
            $update = $order->update(["approve_payment" => $slip]);

            if($update)
            {
                alert()->success('แจ้งชำระเงินสำเร็จ, โปรดรอการตรวจสอบเอกสาร และ ยืนยันข้อมูลการชำระเงิน');
                return redirect()->route('order.index');
            }else{
                toast('แจ้งชำระเงินไม่สำเร็จ','error'); 
                return redirect()->route('order.index');
            }

        }else{

            return redirect()->route('order.index');
        }

    }

    public function CancelPayment(Request $req)
    {

        if(
            empty($req->order_id)
        )
        {
            return redirect()->route('menu.index');
        }

        $order = Orders::find($req->order_id);

        if(!empty($order->id))
        {

            $update = $order->update(["status" => 2]);

            if($update)
            {
                alert()->success('ยกเลิกรายการสำเร็จ');
                return redirect()->route('order.index');
            }else{
                alert('ยกเลิกรายการไม่สำเร็จ');
                return redirect()->route('order.index');
            }

        }else{
            return redirect()->route('order.index');
        }

    }

}
