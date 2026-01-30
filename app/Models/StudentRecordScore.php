<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentRecordScore extends Model
{
    protected $guarded = [];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class, 'exam_id');
    }
}
