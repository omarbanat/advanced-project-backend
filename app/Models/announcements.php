<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class announcements extends Model
{
    use HasFactory;


    use SoftDeletes;

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

