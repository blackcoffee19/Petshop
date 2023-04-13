<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $table = 'coupon';
    protected $primaryKey = 'id_coupon'; 

    public function Order(){
        return $this->hasMany(Order::class,'code_coupon','code');
    }
}
