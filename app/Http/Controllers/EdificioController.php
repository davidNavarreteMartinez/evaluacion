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
    public function store(StoreEdificioRequest $request)
    {
        //
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
