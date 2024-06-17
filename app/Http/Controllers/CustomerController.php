<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Products;
use App\Models\Category;

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

    public function addtocart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        // ดึงข้อมูลสินค้าจากฐานข้อมูล
        $product = Product::find($productId);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        // เพิ่มสินค้าลงในตะกร้า
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                "name" => $product->name,
                "quantity" => $quantity,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart.');
    }
    // {
    //     return view('frontend.cart.index');
    // }

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
