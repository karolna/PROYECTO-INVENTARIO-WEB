<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'id',
        'client_id',
        'user_id',
        'date',
        'image'
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function purchaseDetails(){
        return $this->hasMany(PurchaseDetails::class);
    }
}
