<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Alert As alert;

use App\Models\Products;
use App\Models\Category;

class DashboardController extends Controller
{

    public function Index()
    {
        return view('dashboard.admin');
    }

    public function Product(Request $req)
    {

        $product = Products::query();

        if(!empty($req->search))
        {

            $keyword = $req->search;

            $product->where(function ($query) use ($keyword) {

                $query->where('name', 'LIKE', '%' .$keyword. '%')
                    ->orWhere('detail', 'LIKE', '%' .$keyword. '%')
                ->orWhere('price', 'LIKE', '%' .$keyword. '%');

            });

        }

        $result = $product->paginate(10);

        return view(
            'dashboard.products.index',
            [
                'products' => $result,
            ]
        );

    }

    public function ProductAdd()
    {
        return view(
            'dashboard.products.add',
            [
                'category' => Category::all(),
            ]
        );
    }

    public function ProductInsert(Request $req)
    {

        $req->validate(
            [
                'product_name' => 'required',
                'product_price' => 'required',
                'product_category' => 'required',
                'product_image' => 'required|image',
                'product_detail' => 'required',
            ],
            [
                'product_name.required' => '*โปรดกรอกชื่อสินค้า',
                'product_price.required' => '*โปรดกรอกราคาสินค้า',
                'product_category.required' => '*โปรดเลือกประเภทสินค้า',
                'product_image.required' => '*โปรดเลือกรูปภาพสินค้า',
                'product_image.image' => '*ไม่รองรับไฟล์, เลือกไฟล์นามสกุล jpg, png เท่านั้น',
                'product_detail.required' => '*โปรดกรอกรายละเอียดสินค้า',
            ]
        );

        if($req->hasFile('product_image'))
        {
            $image = $req->product_image->store('products');
        }else{
            $image = null;
        }

        $create = Products::create(
            [
                'name' => $req->product_name,
                'price' => $req->product_price,
                'category_id' => $req->product_category,
                'detail' => $req->product_detail,
                'image' => $image,
            ]
        );

        if(!empty($create))
        {
            alert()->success('แจ้งเตือน','เพิ่มรายการสินค้าสำเร็จ');
            return redirect()->route('dashboard.product.index');
        }else{
            alert()->error('แจ้งเตือน','เพิ่มรายการสินค้าไม่สำเร็จ');
            return redirect()->route('dashboard.product.add');
        }

    }

    public function ProductEdit($id=null)
    {

        $product = Products::find($id);

        if(!empty($product->id))

            return view(
                'dashboard.products.edit',
                [
                    'category' => Category::all(),
                    'products' => $product,
                ]
            );

        else
            return redirect()->route('dashboard.product.index');

    }

    public function ProductUpdate(Request $req, $id)
    {

        $product = Products::find($id);

        if(empty($product->id))
        {
            alert()->error('แจ้งเตือน', 'ผิดพลาดไม่สามารถแก้ไขได้, โปรดลองใหม่อีกครั้ง');
            return redirect()->route('dashboard.product.index');
        }

        $req->validate(
            [
                'product_name' => 'required',
                'product_price' => 'required',
                'product_category' => 'required',
                'product_image' => 'nullable|image',
                'product_detail' => 'required',
            ],
            [
                'product_name.required' => '*โปรดกรอกชื่อสินค้า',
                'product_price.required' => '*โปรดกรอกราคาสินค้า',
                'product_category.required' => '*โปรดเลือกประเภทสินค้า',
                'product_image.required' => '*โปรดเลือกรูปภาพสินค้า',
                'product_image.image' => '*ไม่รองรับไฟล์, เลือกไฟล์นามสกุล jpg, png เท่านั้น',
                'product_detail.required' => '*โปรดกรอกรายละเอียดสินค้า',
            ]
        );

        if($req->hasFile('product_image'))
        {
            $image = $req->product_image->store('products');
        }else{
            $image = $product->image;
        }

        $update = $product->update(
            [
                'name' => $req->product_name,
                'price' => $req->product_price,
                'category_id' => $req->product_category,
                'detail' => $req->product_detail,
                'image' => $image,
            ]
        );

        if(!empty($update))
        {
            alert()->success('แจ้งเตือน','แก้ไขรายการสินค้าสำเร็จ');
            return redirect()->route('dashboard.product.index');
        }else{
            alert()->error('แจ้งเตือน','แก้ไขการสินค้าไม่สำเร็จ');
            return redirect()->route('dashboard.product.add');
        }

    }

    public function ProductDelete($id=null)
    {

        $product = Products::find($id);

        if(!empty($product->id))
        {
            $product->delete();
            alert()->success('แจ้งเตือน', 'ลบสำเร็จ');
            return redirect()->route('dashboard.product.index');
        }else{
            alert()->error('แจ้งเตือน', 'ผิดพลาดไม่สามารถลบได้, โปรดลองใหม่อีกครั้ง');
            return redirect()->route('dashboard.product.index');
        }

    }
    public function Category(Request $req)
    {

        $category = Category::query();

        // if(!empty($req->search))
        // {

        //     $keyword = $req->search;

        //     $product->where(function ($query) use ($keyword) {

        //         $query->where('name', 'LIKE', '%' .$keyword. '%')
        //             ->orWhere('detail', 'LIKE', '%' .$keyword. '%')
        //         ->orWhere('price', 'LIKE', '%' .$keyword. '%');

        //     });

        // }

        $result = $category->paginate(10);

        return view(
            'dashboard.category.index',
            [
                'category' => $result,
            ]
        );

    }

    public function CategoryAdd()
    {
        return view(
            'dashboard.category.add',
        );
    }

    public function CategoryInsert(Request $req)
    {

        $req->validate(
            [
                'category_name' => 'required',
            ],
            [
                'category_name.required' => '*โปรดกรอกชื่อประเภทสินค้า',
            ]
        );

        $create = Category::create(
            [
                'name' => $req->category_name,
            ]
        );

        if(!empty($create))
        {
            alert()->success('แจ้งเตือน','เพิ่มประเภทสินค้าสำเร็จ');
            return redirect()->route('dashboard.category.index');
        }else{
            alert()->error('แจ้งเตือน','เพิ่มประเภทสินค้าไม่สำเร็จ');
            return redirect()->route('dashboard.category.add');
        }

    }

    public function CategoryEdit($id=null)
    {

        $category = Category::find($id);

        if(!empty($category->id))

            return view(
                'dashboard.category.edit',
                [
                    'category' => $category,
                ]
            );

        else
            return redirect()->route('dashboard.category.index');

    }

    public function CategoryUpdate(Request $req, $id)
    {

        $category = Category::find($id);

        if(empty($category->id))
        {
            alert()->error('แจ้งเตือน', 'ผิดพลาดไม่สามารถแก้ไขได้, โปรดลองใหม่อีกครั้ง');
            return redirect()->route('dashboard.category.index');
        }

        $req->validate(
            [
                'category_name' => 'required',
            ],
            [
                'category_name.required' => '*โปรดกรอกชื่อประเภทสินค้า',
            ]
        );

        if(!empty($update))
        {
            alert()->success('แจ้งเตือน','แก้ไขประเภทสินค้าสำเร็จ');
            return redirect()->route('dashboard.category.index');
        }else{
            alert()->error('แจ้งเตือน','แก้ไขประเภทสินค้าไม่สำเร็จ');
            return redirect()->route('dashboard.category.add');
        }

    }

    public function CategoryDelete($id=null)
    {

        $category = Category::find($id);

        if(!empty($category->id))
        {
            $category->delete();
            alert()->success('แจ้งเตือน', 'ลบสำเร็จ');
            return redirect()->route('dashboard.category.index');
        }else{
            alert()->error('แจ้งเตือน', 'ผิดพลาดไม่สามารถลบได้, โปรดลองใหม่อีกครั้ง');
            return redirect()->route('dashboard.category.index');
        }

    }


    // public function product()
    // {
    //     return view(
    //         'dashboard.products.index',
    //         [
    //             'products' => Products::paginate(10),
    //             'categorys' => Category::all(),
    //         ]
    //     );
    // }

    // public function product_add(Request $req)
    // {

    //     return view(
    //         'dashboard.products.add',
    //         [
    //             'categorys' => Category::all(),
    //         ]
    //     );

    // }

    // public function product_insert(Request $req)
    // {

    //     $req->validate(
    //         [
    //             'name' => '',
    //             'category_id' => '',
    //             'detail' => '',
    //             'price' => '',
    //         ]
    //     );

    // }

    // public function product_update(Request $req)
    // {

    // }

    // public function category()
    // {
    //     return view(
    //         'dashboard.category.index',
    //         [
    //             'categorys' => Category::paginate(10),
    //         ]
    //     );
    // }

}
