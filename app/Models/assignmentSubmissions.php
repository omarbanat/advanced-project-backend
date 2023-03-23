<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class assignmentSubmissions extends Model
{

    use SoftDeletes;

    use HasFactory;

    protected $fillable = [
        "grade",
        "submissionDate",
        "submission"
        
        
    ];
     public function classID()
    {
        return $this->belongsTo(classSection::class);
    }
    public function userID()
    {
        return $this->belongsToMany(User::class);
    }
    public function assignmetns()
    {
        return $this->belongsToMany(assignments::class);
    }
}
