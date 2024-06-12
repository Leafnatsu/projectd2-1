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

    public function Product()
    {
        return view(
            'dashboard.products.index',
            [
                'products' => Products::paginate(10),
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

    public function ProductEdit(Request $id)
    {
        return view(
            'dashboard.products.edit',
            [
                'category' => Category::all(),
                'products' => Products::all(),
            ]
        );
    }

    public function ProductUpdate(Request $req, $id)
    {
        $products = Products::find($id);
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

        $update = Products::update(
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
