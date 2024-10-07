<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{   

    protected $table = 'sales';

    protected $fillable = [

        'total',
        'pay',
        'balance',
    ];

    //SaleDetailsとのリレーション関係

    public function SalesDetails(){

        return $this->hasMany(SalesDetail::class, 'sales_id');
    }

    use HasFactory;
}
