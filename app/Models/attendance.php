<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class attendance extends Model
{


    use SoftDeletes;

    use HasFactory;

    protected $fillable = [
        'attendanceType',
        'date',
        'isDeleted',
    ];


    public function attendance(){
        return $this->belongsToMany(users::class);
    }
}
