<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class CheckoutController extends Controller
{
    public function index()
    {
        $old_cartitems = Cart::where('user_id', Auth::id())->get();
        foreach($old_cartitems as $item)
        {
            if(!Product::where('id', $item->prod_id)->where('qty', '>=',$item->prod_qty)->exists())
            {
                $removeItem = Cart::where('user_id', Auth::id())->where('prod_id', $item->prod_id)->first();
                $removeItem->delete();

            }
        }

        $cartitems = Cart::where('user_id', Auth::id())->get();
        return view('frontend.checkout', compact('cartitems'));

    }

    public function placeorder(Request $request)
    {
        $order = new Order();
        $order->fname = $request->input('fname');
        $order->fname = $request->input('lname');
        $order->fname = $request->input('email');
        $order->fname = $request->input('phone');
        $order->fname = $request->input('address1');
        $order->fname = $request->input('address2');
        $order->fname = $request->input('city');
        $order->fname = $request->input('state');
        $order->fname = $request->input('country');
        $order->fname = $request->input('pincode');
        $order->tracking_no = 'ENT'.rand(1111,9999);

        $order->save();

        $order->id;

        $cartitems = Cart::where('user_id', Auth::id())->get();
        foreach($cartitems as $item)
        {
            OrderItem::create([
                'order_id'=>$order->id,
                'prod_id'=>$item->prod_id,
                'qty'=>$item->prod_qty,
                'price'=>$item->products->original_price * $item->prod_qty  * (1 - $item->products->selling_price / 100)
            ]);
        }
    
    }
}
