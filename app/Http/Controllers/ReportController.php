<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //
    public function bestSellingProducts()
    {
        $bestSellingProducts = Transaction::select('product_id')
            ->selectRaw('SUM(quantity) as total_quantity')
            ->with('product')
            ->groupBy('product_id')
            ->orderByDesc('total_quantity')
            ->limit(3)
            ->get();

        return view('layout_backend.report.bestSelling', compact('bestSellingProducts'));
    }

    public function userMost()
    {
        $users = User::where('role', 'member')
        ->withCount('orders')
        ->orderByDesc('orders_count')
        ->get();
    
        $orders = [];
        foreach ($users as $u) {
            $orders[$u->id] = Order::where('user_id', '=', $u->id)->get();
        }
    
        return view('layout_backend.report.mostOrder', compact('users', 'orders'));
    }
}
