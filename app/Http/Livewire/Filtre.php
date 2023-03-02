<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\rendez_vous;

class Filtre extends Component
{
    public $categories ;
    public $total ;
    public $activefilters = [];
    public function render()
    {
        $this->activefilters = array_filter($this->activefilters , function($val){
            return $val != false ;
        });


        return view('livewire.filtre',[
            'rendez_vous' => (empty($this->activefilters))
                        ?  $rendez_vous = rendez_vous::orderBy('created_at','desc')->get()
                         :  $rendez_vous = rendez_vous::whereIn('specialite' , array_keys($this->activefilters))->get()
        ]);
    }
}
