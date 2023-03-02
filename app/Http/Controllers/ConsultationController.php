<?php

namespace App\Http\Controllers;

use App\Models\patients;
use App\Models\consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //dd($request);
        $data = new consultation ;
        if($request->temperature != "" && $request->temperature != null ){
            $data->temperature = $request->temperature;
        }
        if($request->tension != "" && $request->tension != null ){
            $data->tension = $request->tension;
        }
        if($request->glycerine != "" && $request->glycerine != null ){
            $data->glycerine = $request->glycerine;
        }
        if($request->motif != "" && $request->motif != null ){
            $data->motif = $request->motif;
        }
        if($request->poids != "" && $request->poids != null ){
            $data->poids = $request->poids;
        }
        if($request->remarque != "" && $request->remarque != null ){
            $data->remarque = $request->remarque;
        }else{
            $data->remarque = "null";
        }
        if($request->tdr != "" && $request->tdr != null ){
            $data->tdr = $request->tdr;
        }
        if($request->test_grossesse != "" && $request->test_grossesse != null ){
            $data->test_grossesse = $request->test_grossesse;
        }
        if($request->traitement != "" && $request->traitement != null ){
            $data->traitement = $request->traitement;
        }
        if($request->specialite != "" && $request->specialite != null ){
            $data->specialite = $request->specialite;
        }
        if($request->patient_id != "" && $request->patient_id != null ){
            $data->patient_id = $request->patient_id;
        }
        if($request->analyse != "" && $request->analyse != null ){
            $analyse = "";
           foreach($request->analyse as $item){
                if($item != null){
                    $analyse .= $item.", ";
                }
           }
           $data->analyse = $analyse.'...';
        }
        if($request->radio != "" && $request->radio != null ){
            $radio = "";
           foreach($request->radio as $item){
                if($item != null){
                    $radio .= $item.", ";
                }
           }
           $data->radio = $radio.'...';
        }
        if($request->echo != "" && $request->echo != null ){
            $echo = "";
           foreach($request->echo as $item){
                if($item != null){
                    $echo .= $item.", ";
                }
           }
           $data->echo = $echo.'...';
        }
        if($request->image != "" && $request->image != null ){
            $image = $request->image ;
            $imagername = time().'.'.$image->getClientOriginalExtension();
           $request->image->move('resultat',$imagername);
            $data->image = $imagername;
        }
        if($request->img1 != "" && $request->img1 != null ){
            $image1 = $request->img1 ;
            $imagername1 = '1'.time().'.'.$image1->getClientOriginalExtension();
            $request->img1->move('resultat',$imagername1);
            $data->image1 = $imagername1;
        }
        if($request->img2 != "" && $request->img2 != null ){
            $image2 = $request->img2 ;
            $imagername2 = '2'.time().'.'.$image2->getClientOriginalExtension();
            $request->img2->move('resultat',$imagername2);
            $data->image2 = $imagername2;
        }
        $data->save() ;
        Session::flash('ok', 'patient sauvgardé');
        // ---------------------------------------------------------------

        $patient = patients::find($request->patient_id);
        $patient->update([
            'etat' => "true",
        ]);
        return redirect()->route('dossier-medical', ['id' => $request->patient_id]);
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
