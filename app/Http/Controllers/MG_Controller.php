<?php

namespace App\Http\Controllers;

use App\Models\patients;
use App\Models\consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        return view('pages.MG.liste_patients2',[
            'patients' => $patients
        ]);
    }
    public function tdr()
    {
        //
        $consultations = consultation::orderBy('id', 'DESC')->paginate(4);
        return view('pages.MG.tdr-positive',[
            'consultations' => $consultations
        ]);
    }

    public function liste()
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
    public function create($id)
    {
        //
        $patient = patients::find($id);
        Session::put('patient', $patient);
        return view('pages.MG.ajout-rendez-vous',[
            'patient' => $patient
        ]);
    }

    public function save()
    {
        //

        return view('pages.MG.ajout-patient');
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
        $patient_id = $request->patient_id ;
        if($patient_id == ""){
            return redirect()->Route('espace-medecin-generale');
        }
        $total = patients::where('patient_id', 'like', "{$patient_id}%")->get();
        $patients = patients::where('patient_id', 'like', "{$patient_id}%")
                            ->orderBy('created_at', 'desc')
                            ->paginate(4);
        // dd($patients);
        return view('pages.MG.recherche-patient',[
            'patients' => $patients,
            'total' => $total
        ]);
    }

    public function recherche_tdr(Request $request)
    {
        //
        $patient_id = $request->patient_id ;
        if($patient_id == ""){
             return redirect()->Route('MG-tdr-positive');
        }
        $patients = patients::where('patient_id', 'like', "{$patient_id}%")->first();
        $id = $patients->id ;
        $consultation = consultation::where('id', 'like', "{$id}%")
                            ->orderBy('created_at', 'desc')
                            ->paginate(4);
        //  dd($consultation);
        return view('pages.MG.tdr-positive',[
            'consultations' => $consultation,
        ]);
    }

    public function Confidentialite(Request $request)
    {
        //

        $patients = patients::orderBy('id', 'desc')->paginate(4);
        return view('pages.MG.confidentialite',[
            'patients' => $patients,
        ]);
    }

    public function controle_access($id)
    {

        $patient = patients::find($id);
        if($patient->status == 'false'){
            $patient->update([
                'status' => "true",
            ]);
        }else{
            $patient->update([
                'status' => "false",
            ]);
        }

        return redirect()->Route('Confidentialite');
    }

    public function connexion_dossier()
    {
        return view('pages.MG.connexion-dossier');
    }

    public function verification(Request $request)
    {
        $mot_cle = "passer";
        $mot_de_passe = "12345";
        if($request->mot_cle == $mot_cle && $request->mot_passe == $mot_de_passe){
            Session::flash('access',true);
            $patient = Session::get('patient') ;
            return redirect()->Route('dossier-medical', $patient->id);
        }else{
            Session::flash('non','les informations ne correspondent pas');
            return view('pages.MG.connexion-dossier');
        }
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
