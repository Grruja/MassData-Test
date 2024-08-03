<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'product_name',
        'product_sku',
        'category',
        'price',
        'stock_quantity',
        'supplier',
        'date_added',
        'description',
    ];
}
