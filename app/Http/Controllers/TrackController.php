<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;
use App\Models\Interpreter;
use Illuminate\Support\Facades\Storage;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tracks = Track::all();
        return view('tracks.index', compact('tracks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $interpreters = Interpreter::all();
        return view('tracks.create', compact('interpreters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|max:100',
            'music'=>'required|mimes:mp3',
            'interpreter' => 'required|exists:interpreters,id', 
        ]);
        $path = $request->music->store('public/music');
        $track = Track::create([
            'title'=>$request->title,
            'path'=>$path,
            'interpreter_id' => $request->interpreter,
        ]);
        $track->save();
        return redirect()->route('tracks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Track $track)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Track $track)
    {
        return view('tracks.edit', compact('track'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Track $track)
    {
        $request->validate([
            'title' => 'required|max:100',
        ]);
    
        $track->title = $request->title;
        $track->save();
        
    
        return redirect()->route('tracks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Track $track)
    {
        // Eliminar el archivo de la canción en el almacenamiento
        Storage::delete($track->path);

        // Eliminar la canción de la base de datos
        $track->delete();

        return redirect()->route('tracks.index')->with('success', 'Canción eliminada exitosamente.');
    }

    public function play(Track $track)
    {
        $filePath = storage_path('app/' . $track->path);

        if (!file_exists($filePath)) {
            return redirect()->route('tracks.index')->with('error', 'La canción no está disponible.');
        }

        return response()->file($filePath);
    }
}

