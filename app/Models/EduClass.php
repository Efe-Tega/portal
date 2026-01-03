<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EduClass extends Model
{
    protected $table = "classes";

    protected $guarded = [];
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teacher_classes', 'class_id', 'teacher_id');
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}
