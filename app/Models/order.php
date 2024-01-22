<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_name',
        'phone',
        'email',
        'address',
        'product_name',
        'product_price',
        'total_price',
        'quantity',
        'img',
        'order_status'
        ];
}
