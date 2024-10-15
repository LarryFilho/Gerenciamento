<?php

namespace App\Http\Controllers;

use App\Models\Operation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OperationController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'operation_type' => 'required|in:load,unload',
            'quantity' => 'required|integer|min:1',
            'description' => 'nullable|string|max:255',
            'horario_chegada' => 'required|date_format:H:i',
            'dia' => 'required|integer|min:1|max:31',
            'mes' => 'required|integer|min:1|max:12',
        ]);
    
        
        $date = sprintf('%04d-%02d-%02d %s', date('Y'), $request->mes, $request->dia, $request->horario_chegada);
        
        $operation = Operation::create([
            'product_name' => $request->product_name,
            'user_id' => Auth::id(),
            'operation_type' => $request->operation_type,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'operation_date_time' => $date
        ]);
        
        return redirect()->route('operations.index')->with('success', 'Operation created successfully.');
    }
    

    public function index()
    {
        $operations = Operation::with('user')->orderBy('operation_date_time', 'desc')->get();
        return view('operations.index', compact('operations'));
    }
    public function edit(Operation $operation)
    {
        return view('operations.edit', compact('operation'));
    }

   
    public function update(Request $request, Operation $operation)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'operation_type' => 'required|in:load,unload',
            'quantity' => 'required|integer|min:1',
            'description' => 'nullable|string|max:255',
            'horario_chegada' => 'required|date_format:H:i',
            'dia' => 'required|string|max:255',
            'mes' => 'required|string|max:255',
        ]);

        $date = sprintf('%04d-%02d-%02d %s', date('Y'), $request->mes, $request->dia, $request->horario_chegada);

        $operation->update([
            'product_name' => $request->product_name,
            'operation_type' => $request->operation_type,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'operation_date_time' => $date

        ]);

     
        return redirect()->route('operations.index')->with('success', 'Operation updated successfully.');
    }

    public function destroy(Operation $operation)
    {
     
        $operation->delete();

        
        return redirect()->route('operations.index')->with('success', 'Operation deleted successfully.');
    }

    public function create()
{
    return view('operations.create'); 
}
public function show(Operation $operation)
    {
        return view('operations.operation_detail', compact('operation'));
    }
}