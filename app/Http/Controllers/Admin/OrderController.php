<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index() 
    {
        $orders = \App\Models\Order::where('status', '0')->latest()->paginate(4);
        return view('admin.order.index', compact('orders'));
    }

    public function view($id) 
    {
        $orders = Order::where('id', $id)->first();
        return view('admin.order.view',  compact('orders'));
    }

    public function updateorder(Request $request, $id) 
    {
        $orders = Order::find($id);
        $orders->status = $request->input('order_status');
        $orders->update();
        return redirect('orders')->with('status', "Order Updated Successfully");

    }

    public function orderhistory() 
    {
        $orders = \App\Models\Order::where('status', '1')->latest()->paginate(4);
        return view('admin.order.history', compact('orders'));
    }
}
