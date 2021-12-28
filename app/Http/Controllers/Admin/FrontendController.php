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
        $category = Category::all()->count();
        $product = Product::all()->count();
        $order = Order::all()->count();
        $result= DB::select(DB::raw('select c.name as category_name, count(p.id) counter from categories c left join products p on p.cate_id = c.id group by c.id, c.name'));
        $sales= DB::select(DB::raw('select sum(total_price) as total_price from orders'));

        $data = "";
        foreach ($result as $val) {
            $data.="['".$val->category_name."', ".$val->counter."],";
        }
        $chartData = $data;
     
        $data2 = "";
        foreach ($sales as $val) {
            $data2.="$val->total_price";
        }
        $amt_sales = $data2;

        return view('admin.index', compact('category', 'product', 'chartData', 'order', 'amt_sales'));
    }

  
}
