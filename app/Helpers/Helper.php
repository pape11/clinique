<?php

namespace App\Helpers;

class Helper
{
    public static function idGenerator($model , $trow , $length = 5, $prefix){
        $data = $model::orderBy('id','desc')->first();
        if(!$data){
            $og_length = $length; // taille à parcourir dans le boucle ci-dessous
            $last_number = '';
            $increment_last_number = 1 ; //initialisation de la variable increment_last_number à 1
        }else{
            $increment_last_number = $data->id + 1 ; // si le dernier code était 000012 alors  alors le dernier nombre sera 12 + 1
            $last_number_length = strlen($increment_last_number);
            $og_length = $length - $last_number_length ;
            $last_number = $increment_last_number ;
        }
        $zeros = "" ;
        for($i = 0 ; $i < $og_length ; $i++){

            if(!$data){
                $zeros = "0000";
            }else{
                $zeros.= "0";
            }
        }
        return $prefix.'-'.$zeros.$increment_last_number;
    }


































    // public static function idGenerator($model , $trow , $length = 5, $prefix){
    //     $data = $model::orderBy('id','desc')->first();
    //     if(!$data){
    //         $og_length = $length;
    //         $last_number = '';
    //     }else{
    //         $code = substr($data->trow, strlen($prefix)+1) ; //recupère le code sans son préfix
    //         dd($data->trow);
    //         $actial_last_number = ($code/1)*1 ; //si le dernier code était 000012 alors $actia--- va recevoir (000012/1)*1 = 12
    //         $increment_last_number = $actial_last_number + 1 ; // si le dernier code était 000012 alors  alors le dernier nombre sera 12 + 1
    //         $last_number_length = strlen($increment_last_number);
    //         $og_length = $length - $last_number_length ;
    //         $last_number = $increment_last_number ;
    //     }
    //     $zeros = "" ;
    //     for($i = 0 ; $i < $og_length ; $i++){
    //         $zeros.= "0";
    //     }
    //     return $prefix.'-'.$zeros.$last_number ;
    // }
}
