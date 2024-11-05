<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use Illuminate\Http\Request;
use App\Models\Apto;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ResidentController extends Controller
{
    public function index()
    {
        $residents = Resident::all();
        return view('residents.index', compact('residents'));
    }

    public function create()
    {
        $residents = Resident::all();
        $aptos = Apto::all();

        return view('residents.create', compact('aptos', 'residents'));
    }

    
       
        
        public function store(Request $request)
        {
            $request->validate([
                'resident_name' => 'required|string|max:255',
                'resident_document' => [
                    'required',
                    'string',
                    'min:10',
                    'max:14',
                    function ($attribute, $value, $fail) {
                        $cleanedDocument = preg_replace('/\D/', '', $value);
                        if (Resident::where('resident_document', $cleanedDocument)->exists()) {
                            $fail('O número do documento já está registrado.');
                        }
                    },
                ],
                'apto' => 'required|integer',
                'resident_contact' => 'required|string|max:255',
                'move_in_date' => 'required|date',
                'move_out_date' => 'nullable|date|after_or_equal:move_in_date',
            ]);
        
            $data = $request->all();
            $data['resident_document'] = preg_replace('/\D/', '', $request->resident_document);
        
          
            $resident = Resident::create($data);
        
            $user = User::create([
                'name' => $resident->resident_name,
                'email' => strtolower(trim("{$resident->resident_name}@gmail.com")),
                'password' => bcrypt($resident->resident_name),
            ]);
            $user->save();

            return redirect()->route('residents.index')->with('success', 'Morador registrado com sucesso.');
        }
        

    public function edit(Resident $resident)
    {
    
        $aptos = Apto::all();
    
        return view('residents.edit', compact('resident', 'aptos'));
    }
    

    public function update(Request $request, Resident $resident)
    {
        $request->validate([
            'resident_name' => 'required|string|max:255',
            'resident_document' => 'required|string|max:255|unique:residents,resident_document,' . $resident->id . ',id',
            'apto' => 'required|integer',
            'resident_contact' => 'required|string|max:255',
            'move_in_date' => 'required|date',
            'move_out_date' => 'nullable|date|after_or_equal:move_in_date',
        ]);

        $document = preg_replace('/\D/', '', $request->resident_document);
        $request->merge(['resident_document' => $document]);

        $resident->update($request->all());

        return redirect()->route('residents.index')->with('success', 'Morador atualizado com sucesso.');
    }

    public function destroy(Resident $resident)
    {
        $resident->delete();
        return redirect()->route('residents.index')->with('success', 'Morador deletado com sucesso.');
    }

    public function show(Resident $resident)
    {
        return view('residents.show', compact('resident'));
    }
}
