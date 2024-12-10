<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index(){
        $calendar = Calendar::all();
        return response()->json($calendar);
    }
}
