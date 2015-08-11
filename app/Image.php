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
    * Connecting the images and events
    *
    * @return connection to events  
    */
    
    public function event()
    {
        
        return $this->hasMany('App\Event');

    }
}
