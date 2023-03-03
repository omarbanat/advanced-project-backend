<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'cancelled',
        'cancellationReason',
    ];


    public function classID()
    {
        return $this->belongsTo(classSection::class);
    }
    public function userID()
    {
        return $this->belongsToMany(User::class);
    }
    public function courseCycleID()
    {
        return $this->belongsToMany(courseCycle::class);
    }
}
