<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Save extends Model
{
    use HasFactory;
    protected $fillable = [
        'category',
        'name',
        'desc',
        'price',
        'discount_price',
        'quantity',
        'img'
        ];

}