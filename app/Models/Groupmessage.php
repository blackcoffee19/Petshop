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
    public function User (){
        return $this->belongsTo(User::class,'id_user','id_user');
    }
    public function Admin (){
        return $this->belongsTo(User::class,'id_admin','id_user');
    }
}
