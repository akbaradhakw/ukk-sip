<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class internship extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $table = 'internships';
    protected $fillable = [
        'student_id',
        'teacher_id',
        'industry_id',
        'start_date',
        'end_date',
    ];
    public function student()
    {
        return $this->belongsTo(student::class, 'siswa_id');
    }

    public function industry()
    {
        return $this->belongsTo(industry::class, 'industri_id');
    }

    public function teacher()
    {
        return $this->belongsTo(teacher::class, 'guru_id');
    }

}
