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
	    'time',
	    'cost',
	    'address',
	    'date',
	    'event_page'
	];

    //Makes this row Carbon timestamp.

    protected $dates = ['date'];

    /**
    * The connection between the tags and events
    *
    */
    
    public function tags(){

        return $this->belongsToMany('App\Tag')->withTimestamps();
        
    }


    /**
    * Returning date as a Carbon instance
    *
    * @return Published_at attribute as Carbon
    * @param  $date
    */
    
    public function getPublishedAtAttribute($date)
    {
        return new Carbon($date);
    }

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

        $this->attributes['date'] = Carbon::createFromFormat('Y-m-d', $date);
    }

    /**
    * Gets the newest event.
    *
    */

    public function scopePublished($query){
        $query->where('published_at', '<=', Carbon::now());
    }
    /**
    * Tells us the user how this event belongs to.
    *
    */

    public function user(){

        return $this->belongsTo('App\User');
    
    }

    public function getTagListAttribute(){

        return $this->tags->lists('id');
    
    }

}