<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\patients;
use App\Models\consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PatientController extends Controller
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
        return view('pages.liste_patients',[
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
        return view('pages.ajout-patient');
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
        $data = new patients ;
        $patient_id = Helper::idGenerator(new patients, 'patient_id', 5 , 'PT' ); //Génére un nouveau patient_id
        //dd($patient_id);
        $data->patient_id = $patient_id;
        $data->prenom = $request->prenom;
        $data->nom = $request->nom;
        $data->age = $request->age;
        $data->adresse = $request->adresse;
        $data->sexe = $request->sexe;
        $data->telephone = $request->telephone;
       if($request->rv != null && $request->rv != ""){
            $data->rv = $request->rv;
       }
        $data->save() ;
        Session::flash('ok', 'patient sauvgardé son id est '.$patient_id);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $patient = patients::find($id);
        $consultations = consultation::where('patient_id',$id)->get();

        return view('pages.dossier-medical',[
            'patient' => $patient,
            'consultations' => $consultations
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
        $patient = patients::find($id) ;
        return view('pages.modifier-patient',[
            'patient' => $patient,
        ]);
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
        //
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
        $patient = patients::find($id) ;
        $patient->delete();
        return back();
    }
}
