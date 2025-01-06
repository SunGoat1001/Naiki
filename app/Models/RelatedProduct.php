<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RelatedProduct extends Model
{
    protected $table = 'related_products';

    // Liên kết sản phẩm gốc
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    // Liên kết sản phẩm liên quan
    public function relatedProduct()
    {
        return $this->belongsTo(Product::class, 'related_product_id');
    }
}