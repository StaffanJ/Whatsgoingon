<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    /**
    * The connection between the users and roles.
    *
    */

    public function rolesUser(){

        return $this->belongsTo('App\Roles');
        
    }

    /**
    * Tells us who published this event.
    *
    */

    public function events(){

        return $this->hasMany('App\Event');
    
    }

    /**
    * Tells us who flagged the event.
    *
    */

    public function flag(){

        return $this->hasMany('App\Flag');
    
    }
}