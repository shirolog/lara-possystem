<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesDetail extends Model
{   
    protected $table = 'salesdetails';

    protected $fillable = [

        'sales_id',
        'product_id',
        'price',
        'qty',
        'total_cost',
    ];

    //saleとのリレーション関係

    public function sale(){

        return $this->belongsTo(Sale::class, 'sales_id');
    }

    use HasFactory;
}
