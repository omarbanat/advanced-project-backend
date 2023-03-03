<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Model
{

    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'fName',
        'lName',
        'email',
        'password',
        'DOB',
        'phoneNumber',
        'gender',
        'role'
    ];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
