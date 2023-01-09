<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'code',
        'name',
        'stock',
        'image',
        'sell_price',
        'status',
        'category_id',
        'provider_id',
        'deleted_at'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function provider(){
        return $this->belongsTo(Provider::class);
    }
    public function saleDetails(){
        return $this->hasMany(SaleDetail::class);
    }
    public function reserve(){
        return $this->hasMany(Reserve::class);
    }

}
