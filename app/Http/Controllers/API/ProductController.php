<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Product::query()
            ->when(request('search'), function (Builder $query, $search) {
                return $query->where('name', 'like', '%'.$search.'%');
            });

        return $query->simplePaginate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([   
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'long_desc' => 'required|max:255',
            'main_image_url' => 'required|url',
            'category_id' => 'required|exists:categories',
            'imported_date' => 'required|date',
        ]);

        return Product::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'long_desc' => 'required|max:255',
            'main_image_url' => 'required|url',
            'category_id' => 'required|exists:categories',
            'imported_date' => 'required|date',
        ]);

        $product->update($validated);

        return $product;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
    }
}
