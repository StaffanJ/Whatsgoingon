<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Tag;
use App\Event;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Requests\EventsRequest;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
	/**
	* Displaying the event
	*
	* @return eventView  
	*/
	
	public function index()
   	{

   		$events = Event::latest('published_at')->get();

    	return view('events.index', compact('events'));
    }

    /**
    * View to creating an event.
    *
    * @return View for creating events
    */
    
	public function create()
    {

        $tags = Tag::lists('name', 'id');

    	return view('events.create', compact('tags'));
    }

    /**
    * Showing an indidual event
    *
    * @return A new view that shows an event
    * @param  $event
    */
    
    public function show(Event $event){
        
        return view('events.show', compact('event'));
        
    }

    /**
    * Inserting into the database
    *
    * @return A new entry into the database
    * @param  $request
    */
    
    public function store(EventsRequest $request)
    {
        $this->createEvent($request);

        return redirect('events');
    }

    /**
    * A view for editing an event.
    *
    * @return A view to edit event.
    * @param  array
    */
    
    public function edit(Event $event){

        $tags = Tag::lists('name', 'id');

        return view('events.edit', compact('event', 'tags'));

    }

    /**
    * An updated item in the database.
    *
    * @return void
    * @param  array  
    */
    
    public function update(Event $event, EventsRequest $request)
    {
        $event->update($request->all());

        $this->syncTags($event, $request->input('tag_list'));

        return redirect('events');

    }

    private function syncTags(Event $event, array $tags){

        $event->tags()->sync($tags);

    }

    private function createEvent(EventsRequest $request){

        $event = Auth::user()->events()->create($request->all());

        $this->syncTags($event, $request->input('tag_list'));

        return $event;

    }
}
