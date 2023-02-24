<?php

namespace App\Http\Controllers;

use App\Models\patients;
use Illuminate\Http\Request;

class MG_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $patients = patients::orderBy('id', 'DESC')->paginate(4);
        return view('pages.MG.liste_patients',[
            'patients' => $patients
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        $prenom = $request->prenom ;
        if($prenom == ""){
            return redirect()->Route('espace-medecin-generale');;
        }
        $total = patients::where('prenom', 'like', "{$prenom}%")->get();
        $patients = patients::where('prenom', 'like', "%{$prenom}%")
                            ->orderBy('created_at', 'desc')
                            ->paginate(4);
        // dd($patients);
        return view('pages.MG.recherche-patient',[
            'patients' => $patients,
            'total' => $total
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $id = $request->id;
        $patient = patients::find($id);
        $patient->update([
            'prenom' => $request->prenom,
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'age' => $request->age,
            'sexe' => $request->sexe,
            'telephone' => $request->telephone,
        ]);
        return Back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
