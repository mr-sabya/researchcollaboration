<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'topic_id',
        'image',
        'cover',
        'short_description',
        'description',
        'paper_link',
        'status',
    ];

    public function publisher()
    {
    	return $this->belongsTo('App\Models\User', 'user_id');
    }


    public function members()
    {
        return $this->belongsToMany('App\Models\User' ,'room_members');
    }

    public function topic()
    {
        return $this->belongsTo('App\Models\Topic' ,'topic_id');
    }
}
