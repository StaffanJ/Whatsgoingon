<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Date_Event extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'date_event';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
	    'start_time',
	    'end_time',
	    'date'
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

        $this->attributes['date'] = Carbon::parse($date);
    }

    /**
    * Get the newest event.
    *
    */

    public function scopePublished($query){
        $query->where('date', '>', Carbon::now())
              ->orderBy('date', 'ASC');
    }

	public function event()
    {
        
        return $this->belongsTo('App\Event');

    }
}
