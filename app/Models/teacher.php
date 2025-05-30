<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    protected $table = 'teachers';
    protected $fillable = [
        'name',
        'nip',
        'gender',
        'address',
        'phone',
        'email',
    ];

    public function industry()
    {
        return $this->hasMany(industry::class);
    }
    
    public function intership()
    {
        return $this->hasMany(intership::class);
    }

}
