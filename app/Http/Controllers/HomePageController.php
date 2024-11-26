<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomePageController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('homepage', [
            'products' => $products,
        ]);
    }
}
