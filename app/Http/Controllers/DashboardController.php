<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Alert As alert;

use App\Models\Products;
use App\Models\Category;
use App\Models\User;
use App\Models\Order;
use App\Models\Size;
use App\Models\Recommend;

class DashboardController extends Controller
{

    public function Index(Request $req)
    {

        $user = User::query();

        if(!empty($req->search))
        {

            $keyword = $req->search;

            $user->where(function ($query) use ($keyword) {

                $query->where('name', 'LIKE', '%' .$keyword. '%');

            });

        }

        $user->where('isAdmin', 0);
        $result = $user->paginate(5);

        return view(
            'dashboard.index',
            [
                'user' => $result,
            ]
        );

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
        
        $product->latest();
        $result = $product->paginate(5);

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

    public function ProductEditSize($id=null, $size=null)
    {

        print $id;
        $product = Products::find($id);

        if(!empty($product->id))
        {

            $update = $product->update(
                [
                    'size' => $size,
                ]
            );

            toast('แก้ไขสำเร็จ', 'success');
            return redirect()->route('dashboard.product.index');

        }else{
            // return redirect()->route('dashboard.product.index');
        }

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
            return redirect()->route('dashboard.product.edit');
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

        if(!empty($req->search))
        {

            $keyword = $req->search;

            $category->where(function ($query) use ($keyword) {

                $query->where('name', 'LIKE', '%' .$keyword. '%');

            });

        }

        $result = $category->paginate(5);

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

        $recommend = Recommend::find($id);

        if(!empty($recommend->id))

            return view(
                'dashboard.recommend.edit',
                [
                    'recommend' => $recommend,
                ]
            );

        else
            return redirect()->route('dashboard.recommend.index');

    }
    public function RecommendAdd()
    {
        return view(
            'dashboard.recommend.add',
        );
    }

    public function RecommendInsert(Request $req)
    {

        $req->validate(
            [
                'recommend_name' => 'required',
            ],
            [
                'recommend_name.required' => '*โปรดกรอกชื่อประเภทสินค้า',
            ]
        );

        $create = Recommend::create(
            [
                'name' => $req->recommend_name,
            ]
        );

        if(!empty($create))
        {
            alert()->success('แจ้งเตือน','เพิ่มประเภทสินค้าสำเร็จ');
            return redirect()->route('dashboard.recommend.index');
        }else{
            alert()->error('แจ้งเตือน','เพิ่มประเภทสินค้าไม่สำเร็จ');
            return redirect()->route('dashboard.recommend.add');
        }

    }

    public function RecommendEdit($id=null)
    {

        $recommend = Recommend::find($id);

        if(!empty($recommend->id))

            return view(
                'dashboard.recommend.edit',
                [
                    'recommend' => $recommend,
                ]
            );

        else
            return redirect()->route('dashboard.recommend.index');

    }

    public function RecommendUpdate(Request $req, $id)
    {

        $recommend = Recommend::find($id);

        if(empty($recommend->id))
        {
            alert()->error('แจ้งเตือน', 'ผิดพลาดไม่สามารถแก้ไขได้, โปรดลองใหม่อีกครั้ง');
            print 'error record';
            return redirect()->route('dashboard.recommend.index');
        }

        $req->validate(
            [
                'category_name' => 'required',
            ],
            [
                'category_name.required' => '*โปรดกรอกชื่อประเภทสินค้า',
            ]
        );

        $update = $recommend->update(
            [
                'name' => $req->category_name,
            ]
        );

        if(!empty($update))
        {
            alert()->success('แจ้งเตือน','แก้ไขประเภทสินค้าสำเร็จ');
            return redirect()->route('dashboard.recommend.index');
        }else{
            alert()->error('แจ้งเตือน','แก้ไขประเภทสินค้าไม่สำเร็จ');
            return redirect()->route('dashboard.recommend.edit');
        }

    }

    public function RecommendDelete($id=null)
    {

        $recommend = Recommend::find($id);

        if(!empty($recommend->id))
        {
            $recommend->delete();
            alert()->success('แจ้งเตือน', 'ลบสำเร็จ');
            return redirect()->route('dashboard.recommend.index');
        }else{
            alert()->error('แจ้งเตือน', 'ผิดพลาดไม่สามารถลบได้, โปรดลองใหม่อีกครั้ง');
            return redirect()->route('dashboard.recommend.index');
        }

    }
    public function User(Request $req)
    {

        $user = User::query();

        if(!empty($req->search))
        {

            $keyword = $req->search;

            $user->where(function ($query) use ($keyword) {

                $query->where('name', 'LIKE', '%' .$keyword. '%');

            });

        }

        $user->where('isAdmin', 0);
        $result = $user->paginate(5);

        return view(
            'dashboard.user.index',
            [
                'user' => $result,
            ]
        );

    }

    public function Order(Request $req)
    {

        $order = Order::query();

        if(!empty($req->search))
        {

            $keyword = $req->search;

            $order->where(function ($query) use ($keyword) {

                $query->where('name', 'LIKE', '%' .$keyword. '%');

            });

        }

        $order->latest();
        $result = $order->paginate(5);

        return view(
            'dashboard.order.index',
            [
                'order' => $result,
            ]
        );

    }

    public function enable($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->status = true;
            $user->save();
        }
        return redirect()->route('dashboard.user.index');
    }

    public function disable($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->status = false;
            $user->save();
        }
        return redirect()->route('dashboard.user.index');
    }

    public function UpdateStatus($order_id=null, $order_code=null)
    {
        if(
            empty($order_id) &&
            empty($order_code)
        )
        {
            return redirect()->route('dashboard.user.index');
        }

        $order = Order::find($order_id);

        if(
            !empty($order->id) &&
            $order_code == $order->order_code
        )
        {

            $update = $order->update(["status" => 1]);

            if($update)
            {
                alert()->success('ยกเลิกรายการสำเร็จ');
                return redirect()->route('dashboard.order.index');
            }else{
                alert('ยกเลิกรายการไม่สำเร็จ');
                return redirect()->route('dashboard.order.index');
            }

        }else{
            return redirect()->route('dashboard.order.index');
        }

    }

    public function Size(Request $req)
    {

        $size = Size::query();

        if(!empty($req->search))
        {

            $keyword = $req->search;

            $size->where(function ($query) use ($keyword) {

                $query->where('name', 'LIKE', '%' .$keyword. '%')
                ->orWhere('size', 'LIKE', '%' .$keyword. '%');
            });

        }

        $result = $size->paginate(5);

        return view(
            'dashboard.size.index',
            [
                'size' => $result,
            ]
        );

    }

    public function SizeAdd()
    {
        return view(
            'dashboard.size.add',
        );
    }

    public function SizeInsert(Request $req)
    {

        $req->validate(
            [
                'size_name' => 'required',
                'size_size' => 'required',
                'size_price' => 'required',
            ],
            [
                'size_name.required' => '*โปรดกรอกชื่อขนาดของสินค้า',
                'size_size.required' => '*โปรดกรอกขนาดของสินค้า',
                'size_price.required' => '*โปรดกรอกราคาขนาดสินค้า',
            ]
        );

        $create = Size::create(
            [
                'name' => $req->size_name,
                'size' => $req->size_size,
                'price' => $req->size_price,
            ]
        );

        if(!empty($create))
        {
            alert()->success('แจ้งเตือน','เพิ่มขนาดของสินค้าสำเร็จ');
            return redirect()->route('dashboard.size.index');
        }else{
            alert()->error('แจ้งเตือน','เพิ่มขนาดของสินค้าไม่สำเร็จ');
            return redirect()->route('dashboard.size.add');
        }

    }

    public function SizeEdit($id=null)
    {

        $size = Size::find($id);

        if(!empty($size->id))

            return view(
                'dashboard.size.edit',
                [
                    'size' => $size,
                ]
            );

        else
            return redirect()->route('dashboard.size.index');

    }

    public function SizeUpdate(Request $req, $id)
    {

        $size = Size::find($id);

        if(empty($size->id))
        {
            alert()->error('แจ้งเตือน', 'ผิดพลาดไม่สามารถแก้ไขได้, โปรดลองใหม่อีกครั้ง');
            print 'error record';
            return redirect()->route('dashboard.size.index');
        }

        $req->validate(
            [
                'size_name' => 'required',
                'size_sizes' => 'required',
                'size_price' => 'required',
            ],
            [
                'size_name.required' => '*โปรดกรอกชื่อขนาดของสินค้า',
                'size_size.required' => '*โปรดกรอกขนาดของสินค้า',
                'size_price.required' => '*โปรดกรอกราคาขนาดสินค้า',
            ]
        );

        $update = $size->update(
            [
                'name' => $req->size_name,
                'size' => $req->size_sizes,
                'price' => $req->size_price,
            ]
        );

        if(!empty($update))
        {
            alert()->success('แจ้งเตือน','แก้ไขประเภทสินค้าสำเร็จ');
            return redirect()->route('dashboard.size.index');
        }else{
            alert()->error('แจ้งเตือน','แก้ไขประเภทสินค้าไม่สำเร็จ');
            return redirect()->route('dashboard.size.edit');
        }

    }

    public function SizeDelete($id=null)
    {

        $size = Size::find($id);

        if(!empty($size->id))
        {
            $size->delete();
            alert()->success('แจ้งเตือน', 'ลบสำเร็จ');
            return redirect()->route('dashboard.size.index');
        }else{
            alert()->error('แจ้งเตือน', 'ผิดพลาดไม่สามารถลบได้, โปรดลองใหม่อีกครั้ง');
            return redirect()->route('dashboard.size.index');
        }

    }

}
