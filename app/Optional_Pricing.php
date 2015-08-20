<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Optional_Pricing extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'optional_price';

    /**
    * The connection between the event and optional pricing 
    *
    */

    public function event()
    {
        
        return $this->hasOne('App\Event');

    }

}
