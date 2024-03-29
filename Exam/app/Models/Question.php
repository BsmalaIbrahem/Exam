<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['exam_id', 'body', 'grade'];

    public function exam()
    {
        return $this->belongsTo(Exam::class, 'id', 'exam_id');
    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }
}
