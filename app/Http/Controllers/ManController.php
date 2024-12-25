<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class ManController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();

        return view('new-arrivals', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }
}
