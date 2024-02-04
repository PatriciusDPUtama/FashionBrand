<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Type;
use App\Models\User;
use App\Models\Order;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderPageController extends Controller
{
    //
    public function index()
    {
        $userid = Auth::user()->id;
        $orders = Order::where('user_id','=',$userid)->get();
        return view('layout_template.history', ['orders'=>$orders]);
    }

    public function getDetailOrders(Request $request)
    {
        $id = ($request->get('id'));
        $data = Order::find($id);
        $dataProduk = $data->products;
        return response()->json(array(
            'msg'=> view('layout_template.orderdetails',compact('data','dataProduk'))->render()
        ),200);
    }

}
