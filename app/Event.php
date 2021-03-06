<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'events';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
	    'title', 
	    'body', 
        'age',
        'price',
        'children_cost',
        'elderly_cost',
        'other_cost',
        'address',
        'event_page',
	    'img_id',
        'city_id',
        'flag_id',
	];
    
    /**
    * Tells us the user how this event belongs to.
    *
    */

    public function user(){

        return $this->belongsTo('App\User');
    
    }

    /**
    * The connection between the event and it's flag.
    *
    * @return void
    * @param  array  
    */
    
    public function flag()
    {
        return $this->belongsToMany('App\Flag')->withTimestamps();
    }

    /**
    * The connection between the tags and events
    *
    */
    
    public function tags(){

        return $this->belongsToMany('App\Tag')->withTimestamps();
        
    }

    /**
    * The connection between the image and event
    *
    */

    public function img(){

        return $this->belongsTo('App\Image');

    }

    /**
    * The connection between the event and optional pricing
    *
    */

    public function optional_price()
    {
        
        return $this->hasMany('App\Optional');
    }

    /**
    * The connection between the event and dates
    *
    */

    public function date()
    {
        
        return $this->hasMany('App\Date_Event')->published();
    }

    /**
    * The connection between the city and events
    *
    */

    public function city(){

        return $this->belongsTo('App\City');

    }

    public function getTagListAttribute(){

        return $this->tags->lists('id')->toArray();
    
    }

    public function getFlagStatusAttribute(){

        return $this->flag->lists('user_id')->toArray();
    
    }

}