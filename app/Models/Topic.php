<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    public function rooms()
    {
        return $this->hasMany('App\Models\Room', 'topic_id');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }
}
