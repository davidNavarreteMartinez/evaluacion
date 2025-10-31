<?php

namespace App\Http\Controllers;

use App\Models\Edificio;
use App\Http\Requests\StoreEdificioRequest;
use App\Http\Requests\UpdateEdificioRequest;

class EdificioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function agregarAula(StoreEdificioRequest $request, Edificio $edificio)
    {
        // Validar los datos de la solicitud
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'capacidad' => 'required|integer|min:1',
        ]);

        // Crear una nueva aula asociada al edificio
        $edificio->aulas()->create($validatedData);

        // Redirigir de vuelta a la página del edificio con un mensaje de éxito
        return redirect()->route('edificios.show', $edificio->id)
                         ->with('success', 'Aula agregada exitosamente.');
    }
    public function store(Request $request, Edificio $edificio)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'capacidad' => 'nullable|integer|min:1',
        ]);

        $aula = $edificio->aulas()->create($validated);

        return redirect()
            ->route('edificio.show', $edificio->id)
            ->with('success', 'Aula agregada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Edificio $edificio)
    {
        return view('edificios.edificio-show', compact('edificio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Edificio $edificio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEdificioRequest $request, Edificio $edificio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Edificio $edificio)
    {
        //
    }
}
