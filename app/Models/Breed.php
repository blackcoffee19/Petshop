<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    use HasFactory;
    protected $table = 'breeds';
    protected $primaryKey = 'id_breed';
    public $timestamps = false;
    public function TypeProduct(){
        return $this->belongsTo(TypeProduct::class,'id_type_product','id_type');
    }
    public function Product(){
        return $this->hasMany(Product::class, 'id_breeds','id_breed');
    }
}
