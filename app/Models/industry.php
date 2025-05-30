<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class industry extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $table = 'industries';
    protected $fillable = [
        'name',
        'business fields',
        'address',
        'phone',
        'email',
        'website',
    ];
}
