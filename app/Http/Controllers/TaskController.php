<?php

namespace App\Http\Controllers;

use App\Models\Alarm;
use App\Models\Balance;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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

    public function store(Request $request){
        $validateData = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Task::query()->create($validateData);

        return response()->json([
            'success' => true,
        ], Response::HTTP_CREATED);
    }

    public function destroy(Task $task){
        $task->delete();
        return response()->json([
            'success' => true,

        ], Response::HTTP_ACCEPTED);
    }

    public function update(Request $request, Task $task){

        $validateData = $request->validate([
            'title' => 'required',
            'description' => 'required',

        ]);
        $task->update($validateData);
        return response()->json([
            'success' => true,

        ], Response::HTTP_ACCEPTED);
    }
}
