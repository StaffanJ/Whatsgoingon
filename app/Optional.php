<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Optional extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'event_optional';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
	    'cost',
        'description'
	];

    /**
    * The connection between the event and optional pricing 
    *
    */

    public function events(){

        return $this->belongsTo('App\Event');
        
    }
}
