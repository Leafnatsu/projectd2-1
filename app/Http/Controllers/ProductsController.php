<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;
use Illuminate\Support\Str;
use Image;
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
        if ($request->hasFile('image')) {

            $filename = Str::random(10) . '.' . $request->file('image')->getClientOriginalExtension();   //025G025365.jpg

            $request->file('image')->move(public_path() . '/admin/upload/product/', $filename);

            Image::make(public_path() . '/admin/upload/product/' . $filename);

            $product->image = $filename;

        } else {

            $product->image = 'nopic.jpg';

        }

        $products->save();
        // toast('บันทีกข้อมูลสำเร็จ','success');
        return redirect()->route('dashboard.products.teble');
    }
    public function edit($id){
        $category = Category::all();
        $products = Products::find($id);
        return view('dashboard.products.edit',compact('products','category'));
    }
    public function delete($id){
        $products = Products::find($id);
        $products->delete();
        // toast('ลบข้อมูลสำเร็จ','success');
        return redirect()->route('dashboard.products');
    }
    public function update(Request $request, $id){
        $products = Products::find($id);
        $products->name = $request->name;
        $products->update();

    // toast('แก้ไขข้อมูลสำเร็จ','success');
        $products->update();
        return redirect()->route('dashboard.products');
    }
}
