<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    //
    public function index()
    {
        $category = Category::all()->count();
        $product = Product::all()->count();
        return view('admin.index', compact('category', 'product'));
    }
}
