<?php

namespace App\Http\Controllers;

use App\Http\Resources\CalendarResource;
use App\Models\Calendar;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return CalendarResource::collection(Calendar::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $new_calendar = Calendar::create($request->all());
        return response()->json([
            'data' => new CalendarResource($new_calendar),
            'message' => 'Évènement ajouté au Calendrier',
            // 'status' => Response::HTTP_CREATED
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $calendar
     * @return \Illuminate\Http\Response
     */
    public function show(Calendar $calendar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $calendar
     * @return \Illuminate\Http\Response
     */
    public function edit(Calendar $calendar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $calendar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Calendar $calendar)
    {
        //
        $calendar->update($request->all());
        return response()->json([
            'data' => new CalendarResource($calendar),
            'message' => 'Évènement modifié !',
            // 'status' => Response::HTTP_CREATED
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calendar $calendar)
    {
        //
        $calendar->delete();
        return response('Évènement supprimé _');
    }
}
