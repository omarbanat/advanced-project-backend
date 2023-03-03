<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class CourseCycle extends Model
{
    use SoftDeletes;

    use HasFactory;

    protected $fillable = [
        'startDate',
        'endDate'
    ];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function courseID()
    {
        return $this->hasMany(Course::class);
    }
}
