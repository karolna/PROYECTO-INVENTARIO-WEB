<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'dni',
        'ruc',
        'address',
        'phone',
        'email',
    ];
    public function sales(){
        return $this->hasMany(Sale::class);
    }
    public function orders()
    {
    return $this->hasMany(Order::class);
    }
    public function reserves()
    {
    return $this->hasOne(Reserve::class);
    }


}
