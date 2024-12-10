<?php

namespace App\Http\Controllers;

use App\Models\Reminder;
use Illuminate\Http\Request;

class ReminderController extends Controller
{
    public function index(){
        $reminders = Reminder::all();
        return response()->json($reminders);

    }

}
