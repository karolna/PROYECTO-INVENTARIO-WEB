<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    protected $guard = [
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
