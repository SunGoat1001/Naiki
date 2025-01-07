<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Cache;

class HomepageController extends Controller
{
    public function index()
    {
        $products = Cache::remember('homepage_data', 600, function () {
            return Product::select('id', 'name', 'price', 'main_image_url')
                ->orderBy('imported_date', 'desc')
                ->limit(8)
                ->get();
        });

        return view('homepage', ['products' => $products]);
    }
}
