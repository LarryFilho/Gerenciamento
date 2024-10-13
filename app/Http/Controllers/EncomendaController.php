<?php

namespace App\Http\Controllers;

use App\Models\Encomenda;
use App\Models\Apto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EncomendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $encomenda = Encomenda::all();
        return view ('encomendas.index')->with('encomendas', $encomenda);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
        {
            $aptos = Apto::all();
            return view('encomendas.create', compact('aptos'));
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
            'name' => 'required|string|max:255',
            'apto' => 'required|integer',
            'horario_chegada' => 'required|date_format:H:i',
            'informacoes_adicionais' => 'nullable|string',
        ]);

        $aptoExists = Apto::where('unidade', $validated['apto'])->exists();
    
        if (!$aptoExists) {
            return redirect()->route('cadastro')->withErrors(['apto' => 'Apto invalid']);
        }

        Encomenda::create($validated);
    
        return redirect('cadastro')->with('flash_message', 'Encomenda Adicionada!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $encomenda = Encomenda::findOrFail($id);
        return view('encomendas.show')->with('encomendas', $encomenda);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $encomenda = Encomenda::find($id);
        return view('encomendas.edit')->with('encomendas', $encomenda);
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
            $encomenda = Encomenda::findOrFail($id);

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'apto' => 'required|integer|exists:aptos,unidade',
            ]);

            $encomenda->update($validated);

            return redirect('cadastro')->with('flash_message', 'Encomenda Atualizada!'); 
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Encomenda::destroy($id);
        return redirect('cadastro')->with('flash_message', 'Encomenda Deletada!'); 
    }
}
