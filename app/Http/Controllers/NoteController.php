<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

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
}
