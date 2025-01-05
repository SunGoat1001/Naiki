<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'long_desc',
        'main_image_url',
        'category_id',
        'imported_date',
    ];  

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }
    // public function relatedProducts()
    // {
    //     return $this->belongsToMany(Product::class, 'product_related', 'product_id', 'related_product_id');
    // }
    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }
}
