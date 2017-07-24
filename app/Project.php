<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function organization() 
    {
    	return $this->belongsTo(Organization::class);
    }

    public function donor()
    {
    	return $this->belongsToMany(Donor::class);
    }
}

