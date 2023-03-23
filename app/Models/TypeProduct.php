<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeProduct extends Model
{
    use HasFactory;
    protected $table = 'type_products';
    protected $primaryKey = 'id_type';
    public $timestamps = false;
    public function Breed(){
        return $this->hasMany(Breed::class,'id_type_product','id_type');
    }
}
