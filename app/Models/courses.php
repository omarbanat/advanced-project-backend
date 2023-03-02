<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class courses extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'durationByDays',
    ];

    public function courseCycle()
    {
        return $this->belongsToMany(courseCycle::class);
    }
}
