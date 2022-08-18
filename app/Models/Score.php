<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'listpoint_score',
        'midterm_score',
        'lastterm_score',
        'note',
        'rank',
        'subject_id'
    ];
}
