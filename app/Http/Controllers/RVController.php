<?php

namespace App\Http\Controllers;

use App\Models\patients;
use App\Models\categories;
use App\Models\rendez_vous;
use Illuminate\Http\Request;
use App\Models\consultation;
use Illuminate\Support\Facades\Session;

class RVController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       // $rendez_vous = rendez_vous::paginate(4);
        $total =rendez_vous::all();
        return view('pages.liste-rendez-vous',[
            'categories' =>categories::all(),
            'total' => $total
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
        return view('pages.ajout-rendez-vous',[
            'patient' => $patient
        ]);
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
        $data = new rendez_vous ;
         // $data->rendez_vous = $request->rendez_vous;
        $data->specialite = $request->specialite;
        $data->nom_complet = $request->nom_complet;
        $data->patient_id = $request->patient_id;
        $consultation = consultation::where('patient_id', $request->patient_id)->orderBy('id', 'DESC')->first() ;
        if($consultation != null){
            $consultation->update([
                'rendez_vous' => $request->specialite,
            ]);
        }
         $data->save();
        Session::flash('ok rendez_vous', 'Rendez vous sauvgardé');
        return redirect()->back();
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
        $date = $request->date ;
        if($date == null){
            return redirect()->Route('liste-rendez-vous');
        }
        $total =  rendez_vous::where('rendez_vous', 'like', $date)->get();
        $rendez_vous = rendez_vous::where('rendez_vous', 'like', $date)
                            ->orderBy('created_at', 'desc')
                            ->paginate(4);
        // dd($rendez_vous);
        return view('pages.resultat-recherche',[
            'rendez_vous' => $rendez_vous,
            'total' => $total,
            'categories' =>categories::all(),
        ]);
    }
    public function infos($id){
        $rendez_vous = rendez_vous::find($id);
        $id_patient = $rendez_vous->patient_id ;
        $patient = patients::find($id_patient);
        // dd($patient);
        return view('pages.infos-rendez-vous',[
            'patient' => $patient,
            'rendez_vous' => $rendez_vous,
        ]);

    }
    public function voir($id){
        $patient = patients::find($id);
        $rendez_vous = rendez_vous::where('patient_id', $id) ->orderBy('created_at', 'desc')->paginate(1);
        // dd($rendez_vous);
        $count = $rendez_vous ;
        return view('pages.voir-rendez-vous',[
            'patient' => $patient,
            'rendez_vous' => $rendez_vous,
            'count' => $count
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
    }
}
