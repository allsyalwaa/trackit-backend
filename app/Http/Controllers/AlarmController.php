<?php

namespace App\Http\Controllers;

use App\Models\Alarm;
use Illuminate\Http\Request;

class AlarmController extends Controller
{
    public function index()
    {
        $alarms = Alarm::all();
        return response()->json($alarms);
    }
}
