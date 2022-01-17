<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    //public $timestamps = false;

    protected $table = 'notes';

    protected $fillable = [
        'id',
        'title',
        'body',
        'description',
        'id_project'
    ];
}
