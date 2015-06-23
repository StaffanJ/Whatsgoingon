<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flag_Event extends Model
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */

    protected $table = 'flag_event';

	//Kanske lägga till ett exta fillable fält för counter.

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
		'description'
	];

	/**
	* Connection between the flag and events. 
	*
	*/

	public function flag_events(){

		return $this->belongsTo('App\Event');
		
	}
}