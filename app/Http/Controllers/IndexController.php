<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// use App\Models\Products;
// use App\Models\Category;

class IndexController extends Controller
{

    public function index()
    {
        return view('frontend.order.index');
    }

}
