<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    protected $table = 'students';
    protected $fillable = [
        'name',
        'nis',
        'gender',
        'phone',
        'address',
        'email',
        'photo',
        'internship_status',
    ];
    }
