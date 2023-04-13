<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\GroupUse;

class Message extends Model
{
    use HasFactory;
    protected $table = 'message';
    protected $primaryKey = 'id_message';
    
    public function Groupmessage(){
        return $this->belongsTo(Groupmessage::class,'code_group','code_group');
    }
    public function User(){
        return $this->belongsTo(User::class,'id_user','id_user');
    }
}
