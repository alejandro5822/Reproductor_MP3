<?php

namespace App\Http\Controllers;

use App\Models\Interpreter;
use Illuminate\Http\Request;
use App\Models\Track;


class InterpreterController extends Controller
{
    public function index()
    {
        $interpreters = Interpreter::all();
        return view('interpreters.index', compact('interpreters'));
    }

    public function create()
    {
        return view('interpreters.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
        ]);

        Interpreter::create([
            'name' => $request->name,
        ]);

        return redirect()->route('interpreters.index')->with('success', 'Intérprete creado exitosamente.');
    }

    public function destroy(Interpreter $interpreter)
    {
        // Verificar si el intérprete tiene canciones asignadas
        if ($interpreter->tracks->isEmpty()) {
            $interpreter->delete();
            return redirect()->route('interpreters.index')->with('success', 'Intérprete eliminado correctamente.');
        } else {
            return redirect()->route('interpreters.index')->with('error', 'No se puede eliminar el intérprete porque tiene canciones asignadas.');
        }
    }


    public function edit(Interpreter $interpreter)
    {
        return view('interpreters.edit', compact('interpreter'));
    }

    public function update(Request $request, Interpreter $interpreter)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);
        $interpreter->update([
            'name' => $request->name,
        ]);
        return redirect()->route('interpreters.index')->with('success', 'Datos del intérprete actualizados exitosamente.');
    }
}

