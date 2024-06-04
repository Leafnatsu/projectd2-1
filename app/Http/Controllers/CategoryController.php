<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function category()
    {
        $category = Category::orderBy('id', 'desc')->paginate(10);
        return view('dashboard.category.teble',compact('category'));
    }

    public function from_add()
    {
        return view('dashboard.category.add');
    }
    public function add(Request $request){
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        // toast('บันทีกข้อมูลสำเร็จ','success');
        return redirect()->route('dashboard.category');
    }
    public function edit($id){
        $category = Category::find($id);
        return view('dashboard.category.edit',compact('category'));
    }
    public function delete($id){
        $category = Category::find($id);
        $category->delete();
        // toast('ลบข้อมูลสำเร็จ','success');
        return redirect()->route('dashboard.category');
    }
    public function update(Request $request, $id){
        $category = Category::find($id);
        $category->name = $request->name;
        $category->update();

    // toast('แก้ไขข้อมูลสำเร็จ','success');
        $category->update();
        return redirect()->route('dashboard.category');
    }


}
