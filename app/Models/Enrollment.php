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
        return $this->belongsTo(classModel::class);
    }
    public function userID()
    {
        return $this->belongsTo(User::class);
    }
    public function courseCycleID()
    {
        return $this->belongsTo(courseCycle::class);
    }
}
