<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class courseCycle extends Model
{
    use SoftDeletes;

    use HasFactory;

    protected $fillable = [
        'startDate',
        'endDate'
    ];

    public function courses()
    {
        return $this->hasMany(courses::class);
    }
}
