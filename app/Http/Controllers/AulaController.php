<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\Edificio;
use Illuminate\Http\Request;

class AulaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    protected $fillable = ['nombre', 'capacidad', 'edificio_id'];

    public function edificio()
    {
        return $this->belongsTo(Edificio::class);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('aulas.aula-create')->with([
            'edificios' => Edificio::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $aula = Aula::create($request->all());

        // $aula = new Aula();
        // $aula->edificio_id = $request->edificio_id;
        // $aula->numero = $request->numero;
        // $aula->capacidad = $request->capacidad;
        // $aula->save();

        return redirect()->route('edificio.show', $aula->edificio_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Aula $aula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aula $aula)
    {
        return view('aulas.aula-edit')->with([
            'aula' => $aula,
            'edificios' => Edificio::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aula $aula)
    {
        $aula->update($request->all());

        return redirect()->route('edificio.show', $aula->edificio_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aula $aula)
    {
        //
    }
}
