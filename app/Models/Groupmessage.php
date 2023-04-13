<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupmessage extends Model
{
    use HasFactory;
    protected $table = 'group_chat';
    protected $primaryKey = 'id_group';
    public function Message(){
        return $this->hasMany(Message::class,'code_group','code_group');
    }
    public function User1 (){
        return $this->belongsTo(User::class,'id_user1','id_user');
    }
    public function User2 (){
        return $this->belongsTo(User::class,'id_user2','id_user');
    }
}
