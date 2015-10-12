<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */

    protected $table = 'tags';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
		'name'
	];

	/**
    * The connection between the tags and events
    *
    */

	public function events(){

		return $this->belongsToMany('App\Event');
		
	}

	public function img(){

		return $this->belongsTo('App\Image');
		
	}
}
