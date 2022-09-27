<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'profession',
        'tel',
        'image',
    ];
    public function coursers(){
        return $this->hasMany(Courser::class, 'teacher_id');
    }
    public function getGetImageAttribute()
    {
        return url("storage/$this->image");
    }
}
