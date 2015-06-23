<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */

    protected $table = 'roles';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
		'name'
	];

	/**
    * The connection between the users and roles.
    *
    */

	public function userRoles(){

		return $this->belongsTo('App\User');
		
	}
}
