<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Notes;
use App\Models\Assignment;

class Project extends Model
{
    use HasFactory, Notifiable;

    //public $timestamps = false;

    protected $table = 'project';

    protected $fillable = [
        'id',
        'title',
        'body',
        'description',
        'state'
    ];

    public function notes() {
        return $this->hasMany(Note::class, 'id_project' , 'id' );
    }

    public function assignment() {
        return $this->hasMany(Assignment::class, 'id_project' , 'id' );
    }
}
