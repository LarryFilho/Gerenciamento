<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function index()
    {
        $visitors = Visitor::all();
        return view('visitors.index', compact('visitors'));
    }

    public function create()
    {
        return view('visitors.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'visitor_name' => 'required|string|max:255',
        'visitor_document' => [
            'required',
            'string',
            'min:10',
            'max:14',
            function ($attribute, $value, $fail) {
        
                $cleanedDocument = preg_replace('/\D/', '', $value);

                if (Visitor::where('visitor_document', $cleanedDocument)->exists()) {
                    $fail('O número do documento já está registrado.');
                }
            },
        ],
        'visitor_contact' => 'required|string|max:255',
        'reason' => 'required|string|max:255',
        'arrival' => 'required|date_format:H:i',
        'departure' => 'nullable|date_format:H:i',
    ]);

    $data = $request->all();
    $data['visitor_document'] = preg_replace('/\D/', '', $request->visitor_document);

    Visitor::create($data);

    return redirect()->route('visitors.index')->with('success', 'Visitante registrado com sucesso.');
}

    public function edit(Visitor $visitor)
    {
        return view('visitors.edit', compact('visitor'));
    }

    public function update(Request $request, Visitor $visitor)
    {
        $request->validate([
            'visitor_name' => 'required|string|max:255',
            'visitor_document' => 'required|string|max:255|unique:visitors,visitor_document,' . $visitor->id . ',id',
            'visitor_contact' => 'required|string|max:255',
            'reason' => 'required|string|max:255',
            'arrival' => 'required|date_format:H:i',
            'departure' => 'nullable|date_format:H:i'
        ]);

        
        $document = preg_replace('/\D/', '', $request->visitor_document);
        $request->merge(['visitor_document' => $document]); 

        $visitor->update($request->all());

        return redirect()->route('visitors.index')->with('success', 'Visitante atualizado com sucesso.');
    }

    public function destroy(Visitor $visitor)
    {
        $visitor->delete();
        return redirect()->route('visitors.index')->with('success', 'Visitante deletado com sucesso.');
    }

    public function show(Visitor $visitor)
    {
        return view('visitors.show', compact('visitor'));
    }
}
