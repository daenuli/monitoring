<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectProgress extends Model
{
    public function progress()
    {
        return $this->belongsTo(Progress::class);
    }
}
