<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherClass extends Model
{
    protected $guarded = [];

    public function classes()
    {
        return $this->belongsTo(EduClass::class, 'class_id');
    }
}
