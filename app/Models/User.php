<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
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
    public function Like(){
        return $this->hasMany(Like::class,'id_user','id_user');
    }
    public function Favourite(){
        return $this->hasMany(Favourite::class,'id_user','id_user');
    }
    public function News(){
    	return $this->hasMany(News::class,'id_user','id_user');
    }
    public function Message(){
    	return $this->hasMany(Message::class,'id_user','id_user');
    }
    public function Groupmessage1(){
    	return $this->hasMany(Message::class,'id_user','id_user');
    }
    public function Groupmessage2(){
    	return $this->hasMany(Message::class,'id_user','id_admin');
    }
    public function Address()
    {
        return $this->hasMany(Address::class, 'id_user', 'id_user');
    }
    public function Resetpassword(){
        return $this->hasMany(ResetPassword::class, 'email', 'email');
    }
}
