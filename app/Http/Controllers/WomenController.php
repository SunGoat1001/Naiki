<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class WomenController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();

        return view('women', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }
}
