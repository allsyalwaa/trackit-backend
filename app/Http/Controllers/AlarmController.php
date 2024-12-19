<?php

namespace App\Http\Controllers;

use App\Models\Alarm;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AlarmController extends Controller
{
    public function index()
    {
        $alarms = Alarm::query();
        return response()->json($alarms->get());
    }

    public function show($id){
        $alarm = Alarm::query()->findOrFail($id);
        return response()->json($alarm);
    }

    public function showBinding(Alarm $alarm){
        return response()->json($alarm);
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'time' => 'required',
            'name' => 'required',
        ]);

        Alarm::create($validateData);

        return response()->json([
            'success' => true,
        ], Response::HTTP_CREATED);
    }

    public function destroy(Alarm $alarm){
        $alarm->delete();
        return response()->json([
            'success' => true,

        ], Response::HTTP_ACCEPTED);
    }

    public function update(Request $request, Alarm $alarm){
        $validateData = $request->validate([
            'time' => 'required',
            'name' => 'required',

        ]);
        $alarm->update($validateData);
        return response()->json([
            'success' => true,
        ], Response::HTTP_ACCEPTED);
    }
}
