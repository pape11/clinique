<?php

namespace App\Http\Controllers;

use App\Models\patients;
use App\Models\profession;
use App\Models\rendez_vous;
use Illuminate\Http\Request;

class ChrController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $rendez_vous = rendez_vous::paginate(4);
       $rendez_vous = rendez_vous::all();
       return view('pages.CHR.liste_patients',[
           'categories' =>profession::all(),
           'rendez_vous' => $rendez_vous,
           'total' => $rendez_vous
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
            return redirect()->Route('espace-CHR');;
        }
        $total = patients::where('prenom', 'like', "{$prenom}%")->get();
        $patients = patients::where('prenom', 'like', "%{$prenom}%")
                            ->orderBy('created_at', 'desc')
                            ->paginate(4);
        // dd($patients);
        return view('pages.CHR.recherche-patient',[
            'patients' => $patients,
            'total' => $total
        ]);
    }

    public function recherche(Request $request)
    {
        //
        $prenom = $request->prenom ;
        if($prenom == null){
            return redirect()->Route('espace-chr');
        }
        $total =  rendez_vous::where('nom_complet', 'like', $prenom)->get();
        $rendez_vous = rendez_vous::where('nom_complet', 'like', "%$prenom%")
                            ->orderBy('created_at', 'desc')
                            ->paginate(4);
        // dd($rendez_vous);
        return view('pages.CHR.liste_patients',[
            'rendez_vous' => $rendez_vous,
            'total' => $total,
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
