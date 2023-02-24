<?php

namespace App\Http\Controllers;

use App\Models\planning;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $planning = planning::orderBy('id', 'DESC')->paginate(8);
        return view('pages.emploi-du-temps',[
            'planning' => $planning
        ]);
    }

    public function store(Request $request)
    {
        $data = new planning ;
        $fichier = $request->fichier ;
        $fichiername = time().'.'.$fichier->getClientOriginalExtension();
        $request->fichier->move('fichiers',$fichiername);
        $data->specialite = $request->specialite;
        $data->nom_complet = $request->nom_complet;
        $data->fichier = $fichiername;
        $data->save() ;
        return back();
    }

    public function show($id)
    {
        $planning = planning::find($id);
        return view('pages.voir-planning',[
            'planning' => $planning
        ]);
    }
}
