<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use App\Models\RelatedProduct;


class DetailsController extends Controller
{
    public function show($id)
    {
        $product = Product::findOrFail($id);
      
        $product_images = ProductImage::where('product_id', $id)->get();
        $colors = ProductVariant::where('product_id', $product->id) 
        ->pluck('color') // Lấy danh sách các màu
        ->unique()
        ->map(fn($color) => (object)['name' => $color]); // Biến thành đối tượng
        
        $sizes = ProductVariant::where('product_id', $product->id)
        ->pluck('size') // Lấy danh sách các kích thước
        ->unique()
        ->map(fn($size) => (object)['name' => $size]);

        // Bắt đầu thêm từ code 2
        $allSizes = $sizes->pluck('name'); // Lấy tất cả kích thước
        $selectedColor = request('color', $colors->first()->name ?? null);
        $availableSizes = ProductVariant::where('product_id', $product->id)
            ->where('color', $selectedColor)
            ->pluck('size');

   // Lấy danh sách sản phẩm liên quan dựa trên danh mục
$relatedProducts = Product::where('category_id', $product->category_id ?? null)
->where('id', '!=', $product->id)
->get();



        if (request()->ajax()) {
            $sizesHtml = view('partials.sizes', compact('allSizes', 'availableSizes'))->render();
            return response()->json([
                'sizesHtml' => $sizesHtml,
                'mainImageUrl' => $product_images->first()->image_url ?? null,
            ]);
        }
        // Kết thúc thêm từ code 2

        return view('details', [
            'product' => $product,
            'product_images' => $product_images,
            'colors' => $colors,
            'sizes' => $sizes,
            'allSizes' => $allSizes ?? null, // Đảm bảo không gây lỗi nếu allSizes không được thiết lập
            'availableSizes' => $availableSizes ?? null,
            'relatedProducts' => $relatedProducts ,
            'selectedColor' => $selectedColor ?? null,
        ]);
    }
}
