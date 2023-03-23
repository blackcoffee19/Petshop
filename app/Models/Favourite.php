<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;
    protected $table = 'favourites';
    protected $primaryKey = 'id_fa';
    public function User(){
        return $this->belongsTo(User::class,'id_user','id_user');
    }
    public function Product(){
        return $this->belongsTo(Product::class,'id_product','id_product');
    }
}
