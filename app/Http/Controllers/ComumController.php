<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comum;
use App\Models\Apto;
use App\Models\Resident;
use App\Models\Area;
use Illuminate\Support\Facades\Validator;

class ComumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comum = Comum::with('resident')->get();
        return view ('comuns.index')->with('comums', $comum);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aptos = Apto::all();
        $comums = Comum::all();
        $residents = Resident::all();
        $areas = Area::all();
        
        return view('comuns.create', compact('aptos', 'residents', 'comums', 'areas'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'area_id' => 'required|exists:areas,id', 
            'resident_id' => 'nullable|exists:residents,id',
            'informacoes_adicionais' => 'nullable|string',
            'data' => 'required|date|before_or_equal:today',
        ]);

            $resident = Resident::find($validated['resident_id']);
            $validated['resident_apto'] = $resident->id;
    
        // Ensure you're only passing valid fields
        Comum::create($validated); // Now, 'name_id' will contain the area name
    
        return redirect()->route('comum')->with('success', 'Reserva Realizada com Sucesso!');
    }
       

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($resident_id)
    {
        $comum = Comum::findOrFail($resident_id);
        return view('comuns.show')->with('comuns', $comum);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comuns = Comum::find($id);
        $residents = Resident::all();
        $aptos = Apto::all();
        $areas = Area::all();
        return view('comuns.edit', compact('comuns', 'residents', 'aptos', 'areas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comum = Comum::findOrFail($id);
    
        $validated = $request->validate([
            'area_id' => 'required|exists:areas,id', 
            'resident_id' => 'nullable|exists:residents,id',
            'informacoes_adicionais' => 'nullable|string',
            'data' => 'required|date|before_or_equal:today',
        ]);

            $resident = Resident::find($validated['resident_id']);
            $validated['resident_apto'] = $resident->id;

        $comum->update($validated);
    
        return redirect()->route('comum')->with('success', 'Reserva Atualizada com Sucesso!');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comum::destroy($id);
        return redirect('comum')->with('flash_message', 'Deletada!'); 
    }
}
