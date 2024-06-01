<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// use App\Models\Products;
// use App\Models\Category;

class MenuController extends Controller
{

    public function menu()
    {
        return view('promote.menu');
    }

}
