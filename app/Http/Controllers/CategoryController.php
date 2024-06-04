<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category()
    {
        return view('dashboard.category.teble');
    }

    public function from_add()
    {
        // $typeproduct = TypeProduct::all();
        return view('dashboard.category.add'
        // ,compact('typeproduct')
    );
    }
}
