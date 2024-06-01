<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Products;
use App\Models\Category;

class DashboardController extends Controller
{

    public function product()
    {
        return view(
            'dashboard.products.index',
            [
                'products' => Products::paginate(10),
                'categorys' => Category::all(),
            ]
        );
    }

    public function product_add(Request $req)
    {

        return view(
            'dashboard.products.add',
            [
                'categorys' => Category::all(),
            ]
        );

    }

    public function product_insert(Request $req)
    {

        $req->validate(
            [
                'name' => '',
                'category_id' => '',
                'detail' => '',
                'price' => '',
            ]
        );

    }

    public function product_update(Request $req)
    {

    }

    public function category()
    {
        return view(
            'dashboard.category.index',
            [
                'categorys' => Category::paginate(10),
            ]
        );
    }

}
