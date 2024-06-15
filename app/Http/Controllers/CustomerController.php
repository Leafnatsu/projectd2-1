<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Products;
use App\Models\Category;

class CustomerController extends Controller
{

    public function menu()
    {
        return view(
            'frontend.menu.index',
            [
                'categorys' => Category::all(),
            ]
        );
    }

    public function cart()
    {

    }

    public function home()
    {
        return view('frontend.home.index');
    }
}
