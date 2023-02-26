<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class announcements extends Model
{
    use HasFactory;

    protected $fillable =[
        "title",
        "description",
        "senderID",
        "receiverID",
        "createdAt",
        "updatedAt"
    ];
    public function class(){
       return $this->belongsTo(users::class);
    }
}

