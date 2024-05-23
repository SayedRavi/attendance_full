<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Teacher extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subjects()
    {
        return DB::table('teacher_subjects')
            ->join('subjects','subjects.id','teacher_subjects.subject_id')
            ->where('teacher_subjects.teacher_id','=',$this->id)
            ->where('subjects.status' , '=', true)
            ->select('*','teacher_subjects.id as tid','subjects.id as sid')->get();
    }
}
