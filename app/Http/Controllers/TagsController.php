<?php

namespace App\Http\Controllers;

use App\Tag;
use App\City;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagsController extends Controller {

    public function show($city, Tag $tag){

        $events = $tag->events()->published()->get();

        $events = $events->where('city_id', $city->id);

        return view('events.tags', compact('events'));
    }

}
