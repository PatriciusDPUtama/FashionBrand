<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;

class FrontPageController extends Controller
{
    //
    public function index()
    {
        $categories= Category::all();
        $types=Type::all();
        $products=Product::all();
        return view('layout_template.homepage', ['categories'=>$categories, 'types'=>$types,'products'=>$products]);
    }
    public function list($id)
    {
        $data = Product::list($id);
        return view('layout_template.product-list', ['data' => $data]);
    }

    public function profile()
    {
        return view('layout_template.profile');
    }
}
