<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{   
    protected $table = 'orders';

    protected $fillable = [

        'qty',
        'product_id',

    ];
    
    use HasFactory;
}
