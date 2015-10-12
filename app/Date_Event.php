<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Date_Event extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'date_events';

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

	public function event()
    {
        
        return $this->belongsTo('App\Event');

    }
}
