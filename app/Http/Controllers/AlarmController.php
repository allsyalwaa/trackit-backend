<?php

namespace App\Http\Controllers;

use App\Models\Alarm;
use Illuminate\Http\Request;

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
}
