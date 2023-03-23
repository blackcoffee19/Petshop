<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart';
    protected $primaryKey = 'id_cart';
    public $timestamps = false;
    public function User(){
        return $this->belongsTo(User::class,'id_user','id_user');
    }
    public function Product(){
        return $this->belongsTo(Product::class,'id_product','id_product');
    }
    public function Order(){
        return $this->belongsTo(Order::class,'order_code','order_code');
    }
}
