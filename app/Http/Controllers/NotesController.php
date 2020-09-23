<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function home()
    {
        $notes = Note::all();
        return view('home',['notes'=>$notes]);
    }

    public function postNote(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|string',
            'content'=>'required|string'
        ]);
        $title = $request->get('title');
        $content = $request->get('content');
        $Note = new Note;
        $Note->title = $title;
        $Note->content = $content;
        $Note->save();
        return redirect()->to('/');
    }

    public function deleteNote(int $id)
    {
        Note::destroy($id);
        return redirect()->to('/');
    }

    public function updateNote(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|string|max:200',
            'content'=>'required|string',
            'id'=>'required|integer|exists:notes,id'
        ]);
        $title = $request->get('title');
        $content = $request->get('content');
        $id = $request->get('id');
        $Note = Note::find($id);
        $Note->title = $title;
        $Note->content = $content;
        return $Note->save();
    }
}
