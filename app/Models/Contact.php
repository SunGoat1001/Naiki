<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contacts';

   
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'message',
    ];

    /**
     * Tùy chọn kiểu dữ liệu mặc định.
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}

