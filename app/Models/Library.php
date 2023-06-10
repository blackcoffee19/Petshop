<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use HasFactory;
    protected $table = 'library';
    protected $primaryKey = 'id_lib';
    public function Product(){
        return $this->belongsTo(Product::class,'id_product','id_product');
    }
}
