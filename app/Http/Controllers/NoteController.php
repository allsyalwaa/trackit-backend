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
}
