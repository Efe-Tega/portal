<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $guarded = [];

    public function records()
    {
        return $this->hasMany(StudentRecordScore::class, 'exam_id');
    }
}
