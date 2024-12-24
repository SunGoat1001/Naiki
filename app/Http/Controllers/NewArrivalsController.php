<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class NewArrivalsController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::query()
            ->when(request('search'), function ($query, $search) {
                return $query->where('name', 'like', '%'.trim($search).'%');
            })
            ->when(request('sort'), function ($query, $sort) {
                return match (strval($sort)) {
                    'lowestprice' => $query->orderBy('price', 'asc'),
                    'highestprice' => $query->orderBy('price', 'desc'),
                    default => $query,
                };
            })
            ->paginate(4);
    
        return view('new-arrivals', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }
}