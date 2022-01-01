<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->latest()->paginate(5);
        return view('frontend.orders.index', compact('orders'));
    }

    public function view($id)
    {
        $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();
        return view('frontend.orders.view', compact('orders'));
    }

    public function dashboard()
    {


       $totalAllOrder = Order::where('user_id', Auth::id())->count();
       $totalOrderPending = Order::where('user_id', Auth::id())->where('status', '0')->count();
       $totalOrderCompleted = Order::where('user_id', Auth::id())->where('status', '1')->count();
       $totalSpend = Order::where('user_id', Auth::id())->sum('total_price'); 
       
       $user = auth()->id();

        


     


        return view('frontend.dashboard.index', compact('totalOrderPending', 'totalOrderCompleted', 'totalSpend', 'totalAllOrder'));
    }
}
