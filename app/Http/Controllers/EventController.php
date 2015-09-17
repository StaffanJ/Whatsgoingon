<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Mail;
use App\Tag;
use App\Flag;
use App\City;
use App\Image;
use App\Event;
use App\Optional;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Requests\MailRequest;
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

        return response()->json(['tags' => $tags, 'cities' => $cities, 'images' => $images]);

    }

    public function mailTip(MailRequest $request)
    {

        Mail::send('email.tip', ['request' => $request], function($message){

            $message->to('sjansson11@gmail.com', 'Staffan Smith')->subject('Tack för tipset!');
        
        });
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

        $optional_informations = $event->optional_price;

        return response()->json(['event' => $event, 'tags' => $tags, 'image' => $image, 'city' => $city, 'optional_informations' => $optional_informations]);


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

        $optional_categories = Optional::get();

        $current_categories = $event->optional_price;

        return response()->json(['event' => $event, 'tags' => $tags, 'current_tags' => $current_tags, 'cities' => $cities,  'optional_categories' => 
        $optional_categories, 'current_categories' => $current_categories]);

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

        $optional = $request->input('optional_list');
        
        if($optional != 0){

        $optional_cost = array();
        $cost = $request->input('cost');
        
            foreach ($optional as $key => $value) {
                $optional_cost[] = array('optional' => $value, 'cost' => $cost[$key]);
            }

            $this->syncOptional($event, $optional_cost);
        
        }

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

        $images = null;

        foreach ($events as $event) {
            $images[] = $event->img;
        }

        $city_image = $city->city_image;

        return response()->json(['events' => $events, 'cityImage' => $city_image, 'images' => $images]);
    
    }

    private function syncTags(Event $event, array $tags)
    {

        $event->tags()->sync($tags);

    }

    private function syncOptional(Event $event, $optional)
    {

        foreach ($optional as $key => $value) {
            $event->optional_price()->create($optional[$key]);
        }

    }

    private function createEvent(EventsRequest $request)
    {

        $event = Auth::user()->events()->create($request->all());

        $this->syncTags($event, $request->input('tag_list'));

        $optional = $request->input('desc_alternativ');
        
        if($optional != 0){

        $optional_cost = null;
        $cost = $request->input('price_alternativ');

            foreach ($optional as $key => $value) {
                $optional_cost[] = array('description' => $value, 'cost' => $cost[$key]);
            }

            $this->syncOptional($event, $optional_cost);
        
        }

        return $event;

    }
}