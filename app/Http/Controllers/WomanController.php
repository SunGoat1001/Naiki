<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class WomanController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();

        return view('woman', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }
}
