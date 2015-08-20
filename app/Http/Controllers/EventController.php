<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Tag;
use App\Flag;
use App\City;
use App\Image;
use App\Event;
use App\Optional_Pricing;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Requests\EventsRequest;
use App\Http\Requests\ReportRequest;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Routing\RepsonseFactory;

class EventController extends Controller
{
	/**
	* Displaying the event
	*
	* @return eventView  
	*/
	
	public function index()
   	{

   		$cities = City::get();

    	return response()->json($cities);

        //return view('events.index', compact('cities'));
    }

    /**
    * View to creating an event.
    *
    * @return View for creating events
    */
    
	public function create()
    {
        
        $tags = Tag::get();

        $cities = City::get();

        $images = Image::get();

        $optional_categories = Optional_Pricing::get();

        return response()->json(['tags' => $tags, 'cities' => $cities, 'images' => $images, 'optional_categories' => $optional_categories]);

    }

    /**
    * Showing an indidual event
    *
    * @return A new view that shows an event
    * @param  $event
    */
    
    public function show($city, $id)
    {

        $event = Event::findOrFail($id);

        $tags = $event->tags;

        $image = $event->img;

        $city = $event->city;

        return response()->json(['event' => $event, 'tags' => $tags, 'image' => $image, 'city' => $city]);


        if($event->city_id === $city->id){
    
            return response()->json($event, $tags);

            return view('events.show', compact('event'));

        }else{

            $url = action('EventController@show', [$event->city['name'], $event->id]);

            return redirect($url);
        }

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

        return redirect('/');
    }

    /**
    * A view for editing an event.
    *
    * @return A view to edit event.
    * @param  array
    */
    
    public function edit(Event $event)
    {

        $tags = Tag::get();

        $cities = City::get();

        $current_tags = $event->tags->lists('id')->toArray();

        return response()->json(['event' => $event, 'tags' => $tags, 'current_tags' => $current_tags, 'cities' => $cities]);

    }

    /**
    * A method to update items in the database.
    *
    * @return An updated item
    * @param  array  
    */
    
    public function update(Event $event, EventsRequest $request)
    {

        $event->update($request->all());

        $this->syncTags($event, $request->input('tag_list'));

    }

    /**
    * A method for reporting events
    *
    * @return void
    * @param  array  
    */
    
    public function report(Event $event)
    {

        //Kolla upp om det finns någon förbättring för identifierande av information och att de ska kunna ha möjlighet att ta bort sin report.

        foreach ($event->flag_status as $key => $user) {
            if(Auth::user()->id === $event->flag_status[$key]){
                return redirect('/');
            }
        }

        return view('events.report', compact('event'));
    }

    /**
    * The post method for reporting
    *
    * @return void
    * @param  array  
    */
    
    public function postReport(ReportRequest $request, Event $event)
    {

        if($event->flag->count() >= 5){
            dd('Fuck to many reports');
        }else{
            dd('Yay we made it');
        }

        $report = Auth::user()->flag()->create($request->all());

        $event->flag()->attach($report->id);

        return redirect('/');
    }

    /**
    * Displaying events in the selected city
    *
    * @return void
    * @param  array  
    */
    
    public function city(City $city)
    {

        $events = $city->event()->published()->get();

        foreach ($events as $event) {
            $images[] = $event->img;
        }

        $city_image = $city->city_image;

        return response()->json(['events' => $events, 'cityImage' => $city_image, 'images' => $images]);

        //return view('events.city', compact('events'));
    
    }

    private function syncTags(Event $event, array $tags)
    {

        $event->tags()->sync($tags);

    }

    private function createEvent(EventsRequest $request)
    {

        $event = Auth::user()->events()->create($request->all());

        $this->syncTags($event, $request->input('tag_list'));

        return $event;

    }
}