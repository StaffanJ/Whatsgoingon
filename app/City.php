<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
	/**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table = 'city';

	/**
	* Connecting the city and events
	*
	* @return connection to events  
	*/
	
	public function event()
	{
		
		return $this->hasMany('App\Event');

	}

}