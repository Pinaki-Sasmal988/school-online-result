<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{

    protected $fillable = ['school_id', 'class_name'];
    use HasFactory;

}
