<?php

namespace App\Http\Controllers;

use App\Models\Reminder;
use Illuminate\Http\Request;

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

}
