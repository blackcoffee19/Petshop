<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $table = 'expense';
    protected $primaryKey = 'id_expense';

    public function Product(){
        return $this->belongsTo(Product::class,'id_product','id_product');
    }
}
