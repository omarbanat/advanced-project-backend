<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class classModel extends Model
{

    use SoftDeletes;

    use HasFactory;


    protected $fillable = [
        "className",
        "studentsNumber",

    ];

    protected $table = 'classes';

    public function classSection()
    {
        return $this->belongsTo(classSection::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
