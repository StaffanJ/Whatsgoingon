<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City_Image extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table = 'city_image';

	/**
	* Connecting the city and events
	*
	* @return connection to events  
	*/
	
	public function city()
	{
		
		return $this->hasOne('App\City');

	}
}
