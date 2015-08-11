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
	    'published_at',
	    'img',
	    'age',
	    'start_time',
        'end_time',
	    'cost',
	    'address',
	    'date',
	    'event_page',
        'city_id',
        'flag_id'
	];

    //Makes this row Carbon timestamp.

    protected $dates = ['date'];

    /**
    * Returning time as a Carbon instance.
    *
    * @return Date attribute as Carbon
    * @param  $date
    */
    
    public function getDateAttribute($date)
    {
        return new Carbon($date);    
    }

    public function setDateAttribute($date){

        //Carbon::parse($date); //Remove the time and change it to 00:00:00

        $this->attributes['date'] = Carbon::parse($date);
    }

    /**
    * Get the newest event.
    *
    */

    public function scopePublished($query){
        $query->where('date', '<=', Carbon::now());
    }
    
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
    * The connection between the images and events
    *
    */
    
    public function images(){

        return $this->belongsToMany('App\Image')->withTimestamps();
        
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