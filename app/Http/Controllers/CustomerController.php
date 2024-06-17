<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Products;
use App\Models\Category;
use App\Models\Cart;

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
        return view('frontend.cart.index');
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
                        'quantity' => $req->quantity,
                    ]
                );

            }

            return redirect()->route('cart.index');

        }else{
            return redirect()->route('menu.index');
        }

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
