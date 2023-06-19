<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $table = "address";
    protected $primaryKey = 'id_address';
    public function User(){
        return $this->belongsTo(User::class,'id_user','id_user');
    }
}
