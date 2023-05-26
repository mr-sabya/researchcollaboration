<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use \Rackbeat\UIAvatars\HasAvatar;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'department_id',
        'r_area_id',
        'email',
        'phone',
        'image',
        'password',
        'short_bio',
        'description',
        'facebook',
        'linkedin',
        'github',
        'stackoverflow',
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function department()
    {
        return $this->belongsTo('App\Models\Department', 'department_id');
    }

    public function r_area()
    {
        return $this->belongsTo('App\Models\Area', 'r_area_id');
    }
}
