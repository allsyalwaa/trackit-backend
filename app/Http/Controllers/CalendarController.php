<?php

namespace App\Http\Controllers;

use App\Models\Alarm;
use App\Models\Balance;
use App\Models\Calendar;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CalendarController extends Controller
{
    public function index(){
        $calendar = Calendar::query();
        return response()->json($calendar->get());
    }

    public function show($id){
        $date = Calendar::query()->find($id);
        return response()->json($date);
    }

    public function showBinding(Calendar $date){
        return response()->json($date);
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'calendar' => 'required',
            'title' => 'required',

        ]);

        Calendar::query()->create($validateData);

        return response()->json([
            'success' => true,
        ], Response::HTTP_CREATED);
    }

    public function destroy(Calendar $date){
        $date->delete();
        return response()->json([
            'success' => true,

        ], Response::HTTP_ACCEPTED);
    }

    public function update(Request $request, Calendar $date){
        $validateData = $request->validate([
            'calendar' => 'required',
            'title' => 'required',

        ]);
        $date->update($validateData);
        return response()->json([
            'success' => true,

        ], Response::HTTP_ACCEPTED);
    }
}
