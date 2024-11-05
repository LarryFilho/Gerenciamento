<?php

namespace App\Http\Controllers;

use App\Models\Encomenda;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EncomendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Buscando encomendas associadas aos usuários
        $encomendas = Encomenda::with('user')->get();

        return view('encomendas.index', compact('encomendas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all(); // Carrega todos os usuários

        return view('encomendas.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'horario_chegada' => 'required|date_format:H:i',
            'informacoes_adicionais' => 'nullable|string',
            'dia' => 'required|string|max:255',
            'mes' => 'required|string|max:255',
        ]);

        $user = User::findOrFail($request->user_id);

        $encomenda = Encomenda::create([
            'user_id' => $user->id,
            'dia' => $request->dia,
            'mes' => $request->mes,
            'horario_chegada' => $request->horario_chegada,
            'informacoes_adicionais' => $request->informacoes_adicionais,
        ]);

        // Aqui não criamos a notificação, mas podemos gravar a encomenda diretamente.

        return redirect()->route('cadastro.index')->with('success', 'Encomenda registrada com sucesso.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $encomenda = Encomenda::findOrFail($id);
        $users = User::all(); // Carrega todos os usuários

        return view('encomendas.edit', compact('encomenda', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer|exists:users,id', // Validação para user_id
            'horario_chegada' => 'required|date_format:H:i',
            'informacoes_adicionais' => 'nullable|string',
            'dia' => 'required|string|max:255',
            'mes' => 'required|string|max:255',
        ]);

        $encomenda = Encomenda::findOrFail($id);
        $user = User::findOrFail($request->user_id);

        $encomenda->update([
            'user_id' => $user->id,
            'dia' => $request->dia,
            'mes' => $request->mes,
            'horario_chegada' => $request->horario_chegada,
            'informacoes_adicionais' => $request->informacoes_adicionais,
        ]);

        return redirect()->route('cadastro.index')->with('success', 'Encomenda atualizada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Encomenda::destroy($id);
        return redirect()->route('cadastro.index')->with('flash_message', 'Encomenda deletada com sucesso!');
    }
    
    public function show($id)
    {
        $encomenda = Encomenda::findOrFail($id); // Busca a encomenda pelo ID

        return view('encomendas.show', compact('encomenda')); // Passa a encomenda para a view
    }
}
