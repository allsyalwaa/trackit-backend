<?php

namespace App\Http\Controllers;

use App\Models\Alarm;
use App\Models\Balance;
use App\Models\Reminder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReminderController extends Controller
{
    public function index(){
        $reminders = Reminder::query();
        return response()->json($reminders->get());

    }

    public function show($id){
        $reminder = Reminder::query()->find($id);
        return response()->json($reminder);
    }

    public function showBinding(Reminder $reminder)
    {
        return response()->json($reminder);

    }

    public function store(Request $request){
        $validateData = $request->validate([
            'title' => 'required',
            'reminder' => 'required',
            'description' => 'required',
        ]);

        Reminder::query()->create($validateData);

        return response()->json([
            'success' => true,
        ], Response::HTTP_CREATED);
    }

    public function destroy(Reminder $reminder){
        $reminder->delete();
        return response()->json([
            'success' => true,

        ], Response::HTTP_ACCEPTED);
    }

    public function update(Request $request, Reminder $reminder){
        $validateData = $request->validate([
            'title' => 'required',
            'reminder' => 'required',
            'description' => 'required',

        ]);
        $reminder->update($validateData);
        return response()->json([
            'success' => true,
        ], Response::HTTP_ACCEPTED);
    }

}
