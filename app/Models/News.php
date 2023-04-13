<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table='news';
    protected $primaryKey='id_news';
    public function User(){
    	return $this->belongsTo(User::class,'id_user','id_user');
    }
    public function Order(){
        return $this->belongsTo(Order::class,'order_code','order_code');
    }
}
