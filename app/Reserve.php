<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    protected $fillable = [
        'name',
        'dni',
        'phone',
        'product_id',
        'quantity',
        'price',
        'reserve_date',
        'status'
    ];
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
