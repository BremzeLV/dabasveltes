<?php

namespace App;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'group','subscribed_for_news'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['notifications_seen'];

    public function products(){
        return $this->hasMany('App\Product');
    }

    public function getAvatar(){
        if(Storage::disk('public')->exists($this->image_path))
            $this->avatar = Storage::url($this->image_path);
        else
            $this->avatar = asset('images/no-profile.svg');

        return $this;
    }
}
