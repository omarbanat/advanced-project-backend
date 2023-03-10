<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Section extends Model
{
    use SoftDeletes;
    use HasFactory;


    protected $fillable = [
        "sectionName",
        "capacity",

    ];

    public function sectionID()
    {
        return $this->belongsToMany(classSection::class);
    }
}
