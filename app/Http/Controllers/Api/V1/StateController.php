<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Requests\V1\StoreStateRequest;
use App\Http\Requests\V1\UpdateStateRequest;
use App\Models\State;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\StateResource;
use App\Http\Resources\V1\StateCollection;
use App\Filters\V1\StateFilter;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new StateFilter();
        $queryItems = $filter->transform($request); //[['column', 'operator', 'value']]  z.B. 'name', '=', 'Jeff'

        if(count($queryItems) == 0){
            //return State::all();
            return new StateCollection(State::all());
        } else {
            return new StateCollection(State::where($queryItems)->get());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStateRequest $request)
    {
        return new StateResource(State::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(State $state)
    {
          //return $state;
          return new StateResource($state);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStateRequest $request, State $state)
    {
        $state->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(State $state)
    {
        State::find($state->id)->delete();
    }
}
