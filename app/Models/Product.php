<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id_product';
    public $timestamps = false;
    public function Breed(){
        return $this->belongsTo(Breed::class,'id_breed','id_breed');
    }
    public function Comment(){
        return $this->hasMany(Comment::class,'id_product','id_product');
    }
}
