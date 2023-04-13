<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'id_order';
    public $timestamps = false;
    public function User(){
        return $this->belongsTo(User::class,'id_user','id_user');
    }
    public function Cart(){
        return $this->hasMany(Cart::class,'order_code','order_code');
    }
    public function News(){
        return $this->hasMany(News::class,'order_code','order_code');
    }
    public function Coupon(){
        return $this->belongsTo(Coupon::class,'code_coupon','code');
    }
}
