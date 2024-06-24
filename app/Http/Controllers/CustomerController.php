<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

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

        $carts = Cart::query()
            ->where('user_id', $auth->id)
            ->whereNull('order_id')
        ->get();

        return view(
            'frontend.cart.index',
            [
                'carts' => $carts,
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

                    $product_checker = Products::find($req->product_id);

                    $cart_checker->update(
                        [
                            'price' => ($product_checker->price * $req->quantity),
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
            !empty($req->cart_id) &&
            !empty($req->size)
        )
        {

            $auth = Auth::user();

            $size_checker = Size::where('size', $req->size)->first();
            $cart_checker = Cart::find($req->cart_id);

            $size = null;

            if(
                !empty($size_checker)
            )
            {

            }

            if(!empty($cart_checker->id))
            {   

                $cart_checker->update(
                    [
                        'price' => '',
                        'size' => $req->size,
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


    public function showCart()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    public function home()
    {
        return view('frontend.home.index');
    }

    
}
