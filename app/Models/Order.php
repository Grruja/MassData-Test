<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'order_date',
        'channel',
        'sku',
        'item_description',
        'origin',
        'so_num',
        'total_price',
        'cost',
        'shipping_cost',
        'profit',
    ];
}
