<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class courseCycle extends Model
{
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
