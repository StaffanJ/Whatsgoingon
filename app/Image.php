<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'event_image';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
	    'name',
	    'url'
	];

	/**
    * The connection between the images and events
    *
    */
    
    public function events(){

        return $this->belongsToMany('App\Tag');
        
    }
}
