<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'client_id',
        'user_id',
        'sale_date',
        'tax',
        'total',
        'status',
        'reserve_id',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function client(){
        return $this->belongsTo(Client::class);
    }
    public function reserve(){
        return $this->belongsTo(Reserve::class);
    }
    public function saleDetails(){
        return $this->hasMany(SaleDetail::class);
    }

}
