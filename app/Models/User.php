<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class User extends Model{

    protected $table = 'students';
    protected $fillable = [
        'student_last_name', 'student_first_name', 'id'
    ];

    public $timestamps = false;
    protected $primaryKey = 'id';
}