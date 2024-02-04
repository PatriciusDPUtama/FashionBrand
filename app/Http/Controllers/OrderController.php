<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Promo;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $promos = Promo::all();
        $products = Product::all();
        $users = User::all();
        $data = Order::all();
        return view('layout_backend.order.index',compact('data','promos','users','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->authorize('checkowner');
        $data = new Order();

        $data->user_id = $request->get('userorder');
        $data->promo_id = $request->get('promoorder');
        $products = $request->get('productorder');
        $data->save();
        foreach($products as $pid)
        {
            $p = Product::find($pid);
            $quantity = $request->get('quantity'.$p->id);
            $total = $p->harga * $quantity; 
            $data->products()->attach($p->id,['quantity' => $quantity,'total'=>$total]);
        }
        

        return redirect()->route('order-admin.index')->with('status', 'New order added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function getOrderForm(Request $request)
    {
        $id = ($request->get('id'));
        $data = Order::find($id);
        $dataProduk = $data->products;
        return response()->json(array(
            'msg'=> view('layout_backend.order.orderdetails',compact('data','dataProduk'))->render()
        ),200);
    }
}
