<?php

namespace App\Http\Controllers;

use App\Models\Alarm;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NoteController extends Controller
{
    public function index(){
        $notes = Note::query();
        $search = request()->query('search');

        if($search){
            $notes = $notes->where('description', 'like', '%'.$search.'%');
        }

        return response()->json($notes->get());
    }

    public function show($id){
        $note = Note::query()->find($id);
        return response()->json($note);
    }

    public function showBinding(Note $note){
        return response()->json($note);
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'title' => 'required',
            'description' => 'required',

        ]);

        Note::create($validateData);

//        $note = Note::create([
//            'title'=> $request->title,
//            'description' => $request -> get('description'),
//
//        ]);
        return response()->json([
            'success' => true,
        ], Response::HTTP_CREATED);
    }

    public function destroy(Note $note){
        $note->delete();
        return response()->json([
            'success' => true,

        ], Response::HTTP_ACCEPTED);
    }

    public function update(Request $request, Note $note){
        $validateData = $request->validate([
            'title' => 'required',
            'description' => 'required',


        ]);
        $note->update($validateData);
        return response()->json([
            'success' => true,
        ], Response::HTTP_ACCEPTED);
    }
}
