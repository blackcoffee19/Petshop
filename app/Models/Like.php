<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $table = 'like_comment';
    protected $primaryKey = 'id';
    public function Comment(){
        return $this->belongsTo(Comment::class,'id_comment','id_comment');
    }
    public function User(){
        return $this->belongsTo(User::class,'id_user','id_user');
    }
}
