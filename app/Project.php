<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = []; 

    public function Project_Staff()
    {
        return $this->hasMany(Project_Staff::class);
    }

    public function Task()
    {
        return $this->hasMany(Task::class);
    }
}

