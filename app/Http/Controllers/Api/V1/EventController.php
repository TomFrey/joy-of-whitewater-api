<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Requests\V1\StoreEventRequest;
use App\Http\Requests\V1\UpdateEventRequest;
use App\Filters\V1\EventFilter;
use App\Models\Event;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\EventResource;
use App\Http\Resources\V1\EventCollection;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         //return Event::all();

        //Benutzt die Collection, resp. die EventResource
        //return new EventCollection(Event::all());

        //Gibt die Collection innerhalb von Seiten zurück
        //return new EventCollection(Event::paginate());


        $filter = new EventFilter();
        $queryItems = $filter->transform($request);  //[['column', 'operator', 'value']]

        if(count($queryItems) == 0){
            return new EventCollection(Event::all());
        } else {
            return new EventCollection(Event::where($queryItems)->get());
            //return new EventCollection(Event::where($queryItems)->paginate());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        return new EventResource(Event::create($request->all()));
    }

    /**
     * Display the specified resource.
     * Also z.B. http://localhost:8888/api/v1/events/1  -> liefert den Kurs mit der id=1
     *
     */
    public function show(Event $event)
    {
          //nimmt jetzt die Resource und passt den Output entsprechend an
          return new EventResource($event);
          //return $event;
    }

    /**
     * Update the specified resource in storage.
     * 
     * Behandelt die PUT und PATCH Requests.
     * PUT   -> alle Daten liefern
     * PATCH -> nur die Daten liefern, die geändert werden müssen.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        $event->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        Event::find($event->id)->delete();
    }
}
