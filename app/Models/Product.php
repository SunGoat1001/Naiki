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
        'gender',
        'main_image_url',
        'category_id',
        'imported_date',
    ];

    public const DEFAULT_CURRENCY = 'VNĐ';

    public const DEFAULT_IMAGE = 'https://images.unsplash.com/photo-1509042239860-f550ce710b93';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    /**
     * Format giá thành chuỗi với định dạng tiền tệ.
     *
     * @return string
     */
    public function getFormattedPriceAttribute()
    {
        return number_format($this->price, 0, ',', '.').' '.self::DEFAULT_CURRENCY;
    }

    /**
     * Tính tổng giá trị dựa trên số lượng.
     *
     * @param  int  $quantity
     * @return string
     */
    public function getFormattedTotalAmount($quantity = 1)
    {
        return number_format($this->price * $quantity, 0, ',', '.').' '.self::DEFAULT_CURRENCY;
    }

    /**
     * Lấy URL hình ảnh chính hoặc giá trị mặc định.
     *
     * @return string
     */
    public function getMainImageUrlAttribute()
    {
        return $this->main_image_url ?? self::DEFAULT_IMAGE;
    }
}
