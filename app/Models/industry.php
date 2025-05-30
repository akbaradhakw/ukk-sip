<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class industry extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $table = 'industries';
    protected $fillable = [
        'name',
        'business_fields',
        'address',
        'phone',
        'email',
        'website',
        'logo',
    ];
    public function teacher()
    {
        return $this->belongsTo(teacher::class, 'guru_pembimbing');
    }
    
    public function intership()
    {
        return $this->hasMany(intership::class);
    }

}
