<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;

class DetailsController extends Controller
{
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $product_images = ProductImage::where('product_id', $id)->get();

        return view('details', [
            'product' => $product,
            'product_images' => $product_images,
        ]);
    }
}
