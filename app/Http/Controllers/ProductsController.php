<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function products()
    {
        return view('dashboard.products.teble');
    }

    public function from_add()
    {
        // $typeproduct = TypeProduct::all();
        return view('dashboard.products.add'
        // ,compact('typeproduct')
    );
    }
}
