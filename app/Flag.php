<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flag extends Model
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */

    protected $table = 'flag';

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

	public function flagEvent(){

		return $this->belongsToMany('App\Event');
		
	}
}