<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // untuk memasukan data
    protected $fillable= [
        'nim', 'nama', 'user_id', 'jenis_kelamin', 'alamat', 'avatar',
    ];

    protected $hidden= [];

    // foto
    public function getAvatar(){
        if(!$this->avatar){
            return asset('images/default.jpg');
        }

        return asset('images/'.$this->avatar);
    }
   // relasi
   public function user(){
       return $this->belongsTo(User::class,'user_id','id');
    }
}
