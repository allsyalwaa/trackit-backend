<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use Illuminate\Http\Request;

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
}
