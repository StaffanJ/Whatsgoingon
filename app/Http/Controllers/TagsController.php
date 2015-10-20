<?php

namespace App\Http\Controllers;

use App\Tag;
use App\City;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagsController extends Controller {

    public function show($city, Tag $tag){

        $events = $tag->events;

        $events = $events->where('city_id', $city->id);

        $imageTag = $tag->img;

        foreach ($events as $event) {
            $eventDates[] = $event->date;
            $eventTags[] = $event->tags;
            $images[] = $event->img;
        }

        return response()->json(['events' => $events, 'imageTag' => $imageTag]);
    }

    /**
    * Comment
    *
    * @return void
    * @param  array  
    */
    
    public function showCategories()
    {
        $tags = Tag::get();

        $imageTags = null;

        foreach ($tags as $key => $value) {
            $imageTags[] = $value->img;
        }

        return response()->json(['imageTags' => $imageTags, 'tags' => $tags]);

    }

}
