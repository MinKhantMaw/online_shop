<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // order list
    public function orderList()
    {

        $order = Order::all();

        return view('admin.order-list', compact('order'));
    }
    // order deliver
    public function orderDeliver($id)
    {
        $order = Order::find($id);
        $order->status = 'deliver';
        $order->save();
        return redirect()->back()->with('success', 'Order deliver successfully');
    }
}
