<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class internship extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $table = 'internship';
    protected $fillable = [
        'student_id',
        'teacher_id',
        'industry_id',
        'start_date',
        'end_date',
    ];
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];
    public function student()
    {
        return $this->belongsTo(student::class, 'student_id');
    }

    public function industry()
    {
        return $this->belongsTo(industry::class, 'industry_id');
    }

    public function teacher()
    {
        return $this->belongsTo(teacher::class, 'teacher_id');
    }

}
