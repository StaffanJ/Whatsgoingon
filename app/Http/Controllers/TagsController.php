<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagsController extends Controller {

    public function show(Tag $tag){

        $events = $tag->events()->published()->get();

        return view('events.index', compact('events'));
    }

}
