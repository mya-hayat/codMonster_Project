<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'order_number',
        'total_price',
        'sub_total',
        'total_discount',
        'note',
        'status',
        'customerID',
        'storeID',
    ];

}
