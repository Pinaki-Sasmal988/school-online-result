<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentMark extends Model
{
    protected $fillable = [
        'school_id',  // Add any other attributes you want to allow for mass assignment
        'roll_no',
        'class',
        'student_id',
        'obtain_marks'
        
        
    ];

    use HasFactory;
}
