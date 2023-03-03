<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class classSection extends Model
{
    use SoftDeletes;
    use HasFactory;

    public function classID()
    {
        return $this->hasMany(classModel::class);
    }

    public function sectionID()
    {
        return $this->hasMany(Section::class);
    }
}
