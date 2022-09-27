<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courser extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'description',
        'teacher_id',
        'category_id',
        'image',
    ];

    public function teacher(){
        return $this->belongsTo(Teacher::class );
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getExtractoAttribute()
    {
        return substr($this->description,0,80). '.';
    }

    public function getGetImageAttribute()
    {
        return url("storage/$this->image");
    }


    public function similar()
    {
        return $this->where('category_id',$this->category_id)
            ->with('teacher','category')
            ->latest()
            ->get();
    }



}
