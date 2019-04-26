<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    public $table = "Work";
    protected $guarded = [];

    public function Project()
    {
        return $this->belongsTo(Project::class);
    }
}
