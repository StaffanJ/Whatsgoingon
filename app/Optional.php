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
    protected $table = 'optional_price';

    /**
    * The connection between the event and optional pricing 
    *
    */

    public function events(){

        return $this->belongsToMany('App\Event')->withPivot('cost');
        
    }

}
