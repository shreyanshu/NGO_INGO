<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    public function organization()
    {
    	return $this->belongsToMany(Organization::class);
    }

    public function project()
    {
    	return $this->belongsToMany(Project::class);
    }
}
