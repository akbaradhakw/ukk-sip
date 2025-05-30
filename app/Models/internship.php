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
}
