<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use HasFactory;
    protected $guarded = [];

    public function classes()
    {
        return $this->belongsToMany(EduClass::class, 'teacher_classes', 'teacher_id', 'class_id');
    }
    //
}
