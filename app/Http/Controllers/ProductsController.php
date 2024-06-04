<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;
// use Image;
use File;

class ProductsController extends Controller
{
    public function products()
    {
        $products = Products::all();
        return view('dashboard.products.teble',compact('products'));
    }

    public function from_add()
    {
        $category = Category::all();
        return view('dashboard.products.add',compact('category')
    );
    }
    public function add(Request $request){
        $products = new Products();
        $products->name = $request->name;
        $products->detail = $request->detail;
        $products->price = $request->price;
        $products->id_category = $request->id_category;

        $products->save();
        // toast('บันทีกข้อมูลสำเร็จ','success');
        return redirect()->route('dashboard.products.teble');
    }
    public function edit($id){
        $category = Category::all();
        $products = Products::find($id);
        return view('dashboard.products.edit',compact('products','category'));
    }
}
