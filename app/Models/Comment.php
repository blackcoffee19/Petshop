<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $primaryKey = 'id_comment';
    public $timestamps = false;
    public function Product(){
        return $this->belongsTo(Product::class,'id_product','id_product');
    }
    public function User(){
        return $this->belongsTo(User::class,'id_user','id_user');
    }
    public function Comment(){
        return $this->hasMany(Comment::class,'reply_comment','id_comment');
    }
}
