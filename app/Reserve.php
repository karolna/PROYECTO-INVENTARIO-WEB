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
        'status',
        'client_id'
    ];
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function client(){
        return $this->belongsTo(Client::class);
    }
    public function sale()
    {
    return $this->hasOne(Sale::class);
    }
}
