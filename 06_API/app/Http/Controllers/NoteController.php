<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Http\Resources\NoteResource;
use App\Models\Note;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NoteController extends Controller
{

    public function index():JsonResource
    {
        //Lista todos los elementos del recurso
        // return response()->json(Note::all(), 200);
        return NoteResource::collection(Note::all());
    }

    public function store(NoteRequest $request): JsonResponse
    {
        //Crea nuevas Notas
        $note = Note::create($request->all());

        return response()->json([
            'succes' => true,
            'date'=> new NoteResource($note)
        ], 201); //201 estado de nuevo elemento creado
    }

    public function show(string $id):JsonResource
    {
        // Muestra un elemento concreto
        $note = Note::find($id);
        // return response()->json($note, 200);
        return new NoteResource($note);
    }

    public function update(NoteRequest $request, string $id): JsonResponse
    {
        //

        $note = note::find($id);
        $note -> title = $request ->title;
        $note ->content = $request -> content;
        $note->save();
        return request()->json([
            'success' => true,
            'data'=> new NoteResource($note)
        ],200);
    }


    public function destroy(string $id): JsonResponse
    {
        //
        Note::find($id)->delete();

        return response()->json([
            'success' => true
        ],200);
    }
}
