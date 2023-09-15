<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Models\Note;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NoteController extends Controller
{
   public function index(): View 
   {
        $notes = Note::all();

        return view('note.index', compact('notes'));
   }

   public function create(): View
   {
        return view('note.create');
   }

   public function store(NoteRequest $request): RedirectResponse
   {
        //Forma para operar con los datos
        /**
        $note = new Note;
        $note->title= $request->title;
        $note->description = $request->description;
        $note->save();
        */
        
        // Forma para guardar directamente en la DB
        /**
        Note::create([
            'title'=> $request->title,
            'description'=> $request->description
        ]);
        */
        
        // Atajo para guardar directamente lo que viene del request
        // Tiene que coincidir los name de los inputs con la db

        //Aca se realiza una validacion


        Note::create($request->all());

        return redirect()->route('note.index');
   }

   public function edit(Note $note): View
   {
        return view('note.edit', compact('note'));
   }

   public function update(NoteRequest $request,Note $note): RedirectResponse
   {
     //Aca se realiza una validacion
        $note -> update($request->all());

        return redirect()->route('note.index');
   }

   public function show(Note $note): View
   {
        return view('note.show', compact('note'));
   }

   public function destroy(Note $note): RedirectResponse
   {
        $note->delete();

        return redirect()->route('note.index');
   }
}