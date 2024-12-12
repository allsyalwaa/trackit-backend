<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        $tasks=Task::query();

        return response()->json($tasks->get());
    }

    public function show($id){
        $task=Task::query()->find($id);
        return response()->json($task);

    }

    public function showBinding(Task $task)
    {
        return response()->json($task);
    }
}
