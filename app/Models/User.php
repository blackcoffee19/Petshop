<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users';
    protected $primaryKey = 'id_user';
    public function Order(){
        return $this->hasMany(Order::class,'id_user','id_user');
    }
    public function Cart(){
        return $this->hasMany(Cart::class,'id_user','id_user');
    }
    public function Comment(){
        return $this->hasMany(Comment::class,'id_user','id_user');
    }
    public function Favourite(){
        return $this->hasMany(Favourite::class,'id_user','id_user');
    }
}
