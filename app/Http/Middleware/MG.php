<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MG
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // $user = Auth::User();
        // if(!$user){
        //     Session::flash('ACCES','Veuiller vous connectez d\'abord pour acceder à cette page !!!');
        //     return redirect()->route('login');
        // }
        // if($user->specialite !== "Médecin Général"){
        //     Session::flash('ACCESS','Veuiller vous connectez d\'abord en tant que medecin générale !!!');
        //     return redirect()->route('welcome');
        // }
       return $next($request);
    }
}
