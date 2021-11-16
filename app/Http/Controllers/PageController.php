<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gasto;
use App\Aporte;
use App\ConceptoAporte;
use App\User;

class PageController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

	function index(){
    $aporte = Aporte::all()->sum('valor');
    $gasto = Gasto::all()->sum('valor');
    return view('index',compact('gasto','aporte'));
	}


	  public function totales()
    {
        
        $anio=date("Y");
        $mes=date("m");
        $concept = ConceptoAporte::all()->pluck('nombre','id');
        return view('welcome',compact('anio','mes','concept'));
        
    }

    public function user()
    {
        $user= User::all();
        return view('user.index', compact('user'));
    }


}
