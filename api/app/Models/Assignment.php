<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    //public $timestamps = false;

    protected $table = 'assignment';

    protected $fillable = [
        'id',
        'title',
        'body',
        'description',
        'state',
        'id_project'
    ];
}
