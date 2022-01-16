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

    public function invoice($id)
    {
        $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();
        return view('frontend.orders.invoice', compact('orders'));
    }

    public function dashboard()
    {


       $totalAllOrder = Order::where('user_id', Auth::id())->count();
       $totalOrderPending = Order::where('user_id', Auth::id())->where('status', '0')->count();
       $totalOrderCompleted = Order::where('user_id', Auth::id())->where('status', '1')->count();
       $totalSpend = Order::where('user_id', Auth::id())->sum('total_price'); 
       
       $user = auth()->id();

        // get linechart for total sales by month
        // $salesByMonth = DB::select(DB::raw('select DATE_FORMAT(created_at, "%Y-%m") AS day_date, SUM(orders.total_price) AS main_total, COUNT(*) 
        // AS total_orders FROM orders WHERE orders.created_at >= "2021-08-31 00:00:00" AND orders.created_at <= "2022-11-31 23:59:59" 
        // GROUP BY DATE_FORMAT(created_at, "%Y-%m") ORDER BY day_date ASC'));


        $salesByMonth = DB::table('orders')
                   ->select('user_id', DB::raw('DATE_FORMAT(created_at, "%Y-%m") AS day_date, SUM(orders.total_price) AS main_total,
                   CAST(AVG(orders.total_price) AS DECIMAL(10,2)) as avg_total, COUNT(*) AS total_orders'))
                   ->where('user_id', $user)
                   ->groupBy(DB::raw('DATE_FORMAT(created_at, "%Y-%m") ORDER BY day_date ASC'))
                   ->get();


        $data1 = "";
        foreach ($salesByMonth as $val) {
            $data1.="['".$val->day_date."', ".$val->main_total.", ".$val->avg_total."],";
        }
        $chartSales = $data1;


        $data2 = "";
        foreach ($salesByMonth as $val) {
            $data2.="['".$val->day_date."', ".$val->total_orders."],";
        }
        $chartOrder = $data2;



        $topProduct = DB::table('products')
            ->join('order_items', 'products.id', '=', 'order_items.prod_id')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->select(DB::raw('sum(order_items.qty) as total_sell, products.name as product_name, orders.user_id'))
            ->groupBy(DB::raw('products.name order by sum(order_items.qty) DESC limit 3'))
            ->where('orders.user_id', $user)
            ->get();

        $data4 = "";
        foreach ($topProduct as $val) {
            $data4.="['".$val->product_name."', ".$val->total_sell."],";
        }
        $chartProduct = $data4;

        $orderPayment = DB::table('orders')
            ->select('user_id', 'country', DB::raw('COUNT(country) AS order_type'))
            ->where('user_id', $user)
            ->groupBy(DB::raw('country'))
            ->get();

        
        $data5 = "";
        foreach ($orderPayment as $val) {
            $data5.="['".$val->country."', ".$val->order_type."],";
        }
        $chartPayment = $data5;


        $orderStatus = DB::table('orders')
            ->select('user_id', 'status', DB::raw('IF(status=0, "Pending", "Completed") AS order_status, COUNT(status) AS no_order'))
            ->where('user_id', $user)
            ->groupBy(DB::raw('status'))
            ->get();

        // dd($orderStatus);

        
        $data5 = "";
        foreach ($orderStatus as $val) {
            $data5.="['".$val->order_status."', ".$val->no_order."],";
        }
        $chartStatus = $data5;


        // dd($chartStatus);


        return view('frontend.dashboard.index', compact('totalOrderPending', 'totalOrderCompleted', 'totalSpend', 'totalAllOrder', 'chartSales', 'chartOrder', 'chartProduct', 'chartStatus'));
    }
}
