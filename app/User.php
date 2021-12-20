<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\logsActivity;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasRoles, LogsActivity,HasApiTokens;

    protected $table = "users";

    protected static $logAttributes = ['name','email'];
    protected static $ignoreChangedAttributes = ['password','updated_at'];
    protected static $recordEvents = ['created','updated','deleted'];
    protected static $logOnlyDirty = true;
    protected static $logName = 'user';

    public function getDescriptionForEvent(string $eventName):string
    {
        return "You Have {$eventName} user";
    }
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guard_name = 'api';
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
}
