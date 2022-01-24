<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    //
    public function index()
    {
        // get total count for category, product and order 
        $category = Category::all()->count();
        $product = Product::all()->count();
        $order = Order::all()->count();


        // get sum of total sales
        $sales= DB::select(DB::raw('select sum(total_price) as total_price from orders'));
        $data1 = "";
        foreach ($sales as $val) {
            $data1.="$val->total_price";
        }
        $amt_sales = $data1;


        // get piechart for producy by category
        $result= DB::select(DB::raw('select c.name as category_name, count(p.id) counter from categories c left join products p on p.cate_id = c.id group by c.id, c.name'));
       
        $data2 = "";
        foreach ($result as $val) {
            $data2.="['".$val->category_name."', ".$val->counter."],";
        }
        $chartData = $data2;


        // get linechart for total sales by month
        $salesByMonth = DB::select(DB::raw('select DATE_FORMAT(created_at, "%Y-%m") AS day_date, SUM(orders.total_price) AS main_total, CAST(AVG(orders.total_price) AS DECIMAL(10,2)) as avg_total,
        COUNT(*) AS total_orders FROM orders WHERE orders.created_at >= "2021-07-31 00:00:00" AND orders.created_at <= "2022-11-31 23:59:59" 
        GROUP BY DATE_FORMAT(created_at, "%Y-%m") ORDER BY day_date ASC'));

        $data3 = "";
        foreach ($salesByMonth as $val) {
            $data3.="['".$val->day_date."', ".$val->main_total."],";
        }
        $chartSales = $data3;

        // dd($salesByMonth);

        // get top 3 best selling product
        $topProduct = DB::select(DB::raw('select sum(o.qty) as total_sell, p.name as 
        product_name from order_items as o, products as p where o.prod_id=p.id group by p.name order by sum(o.qty) DESC limit 3'));

        $data4 = "";
        foreach ($topProduct as $val) {
            $data4.="['".$val->product_name."', ".$val->total_sell."],";
        }
        $chartProduct = $data4;

        // get top 5 order by state
        $topState = DB::select(DB::raw('select state as state_name, count(state) as no_order from orders group by state order by count(state)'));

        $data5 = "";
        foreach ($topState as $val) {
            $data5.="['".$val->state_name."', ".$val->no_order."],";
        }
        $chartState = $data5;


        // get top 3 most bought order by customer
         $topOrderCust = DB::select(DB::raw('select CONCAT(fname ," " , lname) as name, count(user_id) as no_order from orders group by user_id order by count(user_id) DESC limit 3'));
      
        $data6 = "";
        foreach ($topOrderCust as $val) {
            $data6.="['".$val->name."', ".$val->no_order."],";
        }
        $chartOrderCust = $data6;

        
        // get top 3 most order spend by customer
        $topSpendCust = DB::select(DB::raw('select CONCAT(fname, " ", lname) as name, sum(total_price) as total_spend from orders group by user_id order by sum(total_price) DESC limit 3'));

        $data7 = "";
        foreach ($topSpendCust as $val) {
            $data7.="['".$val->name."', ".$val->total_spend."],";
        }
        $chartSpendCust = $data7;

        // get total order and total spend by customer
        $orderSpend = DB::select(DB::raw('select CONCAT(fname ," " , lname) as name, count(user_id) as no_order, sum(total_price) as total_spend, CAST(AVG(total_price) AS DECIMAL(10,2)) as avg_spend from orders group by user_id '));

        $data8 = "";
        foreach ($orderSpend as $val) {
            $data8.="['".$val->name."', ".$val->total_spend.", ".$val->no_order."],";
        }
        $chartOS = $data8;

         // get avg spend by one order for customer
        $avgSpend = DB::select(DB::raw('select CONCAT(fname ," " , lname) as name, count(user_id) as no_order, CAST(AVG(total_price) AS DECIMAL(10,2)) as avg_spend from orders group by user_id '));

        $data9 = "";
        foreach ($orderSpend as $val) {
            $data9.="['".$val->name."', ".$val->avg_spend."],";
        }
        $chartAvg = $data9;


    
        return view('admin.index', compact('category', 'product', 'chartData', 'order', 'amt_sales', 'chartSales', 'chartProduct', 'chartState', 'chartOrderCust', 'chartSpendCust', 'chartOS', 'chartAvg'));
    }

  
}
