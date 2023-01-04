<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guard = [
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
