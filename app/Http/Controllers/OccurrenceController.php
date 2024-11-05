<?php

namespace App\Http\Controllers;

use App\Models\Occurrence;
use App\Models\Resident;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OccurrenceController extends Controller
{

    public function index()
    {
        $occurrences = Occurrence::all();
        return view('occurrences.index', compact('occurrences'));


   
    $occurrences = Occurrence::with('resident')->get();
    return view('occurrences.index', compact('occurrences'));

    }

    public function create()
    {
        $residents = Resident::all();
        return view('occurrences.create', compact('residents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'occurrence_date' => 'required|date|before_or_equal:today',
            'occurrence_time' => 'required',
            'description' => 'required|string',
            'resident_id' => 'nullable|exists:residents,id',
            'resolved' => 'boolean',
        ]);

        $data = $request->all();
        $data['occurrence_date'] = Carbon::createFromFormat('Y-m-d', $request->occurrence_date);
        $data['occurrence_time'] = Carbon::createFromFormat('H:i', $request->occurrence_time);
        $data['resolved'] = $request->input('resolved', 0); 

        Occurrence::create($data);

        return redirect()->route('occurrences.index')->with('success', 'Ocorrência registrada com sucesso!');
    }


    public function show($id)
    {
        $occurrence = Occurrence::findOrFail($id);
        return view('occurrences.show', compact('occurrence'));
    }


    public function edit($id)
    {
        $occurrence = Occurrence::findOrFail($id);
        $residents = Resident::all();
        return view('occurrences.edit', compact('occurrence', 'residents'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'occurrence_date' => 'required|date|before_or_equal:today',
            'occurrence_time' => 'required',
            'description' => 'required|string',
            'resident_id' => 'nullable|exists:residents,id',
            'resolved' => 'boolean',
        ]);

        $occurrence = Occurrence::findOrFail($id);
        $occurrence->occurrence_date = Carbon::createFromFormat('Y-m-d', $request->occurrence_date);
        $occurrence->occurrence_time = Carbon::createFromFormat('H:i', $request->occurrence_time);
        $occurrence->description = $request->description;
        $occurrence->resident_id = $request->resident_id;
        $occurrence->resolved = $request->input('resolved', 0);

        $occurrence->save();

        return redirect()->route('occurrences.index')->with('success', 'Ocorrência atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $occurrence = Occurrence::findOrFail($id);
        $occurrence->delete();

        return redirect()->route('occurrences.index')->with('success', 'Ocorrência excluída com sucesso!');
    }
}
