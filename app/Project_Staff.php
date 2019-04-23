<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_Staff extends Model
{
    public $table = "Project_Staff";
    protected $guarded = []; 

    public function Project()
    {
        
        return $this->belongsTo(Project::class);
    }

    public function Staff()
    {
        
        return $this->belongsTo(Staff::class);
    }
}
