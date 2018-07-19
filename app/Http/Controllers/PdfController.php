<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aporte;
use App\ConceptoAporte;
use App\Gasto;


class PdfController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function diezmospdf(){
    	$aportes = Aporte::all();
    	$total = Aporte::all()->sum('valor');
    	$pdf = \App::make('dompdf.wrapper');
    	$vista = \View('pdfs.diezmos', compact('aportes','total'))->render();
		$pdf->loadHTML($vista);
		return $pdf->download('Diezmos.pdf');
		//return View('pdfs.diezmos', compact('aportes','total'));
    }

    public function aportepdf(Request $request){
 		
 		$aporte = Aporte::buscador($request->year,$request->month,$request->concepto)->all();
        
        $total_mes = Aporte::whereMonth('fecha', '=', $request->month)->whereYear('fecha', '=', $request->year)->where('id_concepto','=',$request->concepto)->sum('valor');

        //:whereMonth('fecha', '>', $mes-1)->whereMonth('fecha', '<', $mes+1)->whereYear('fecha', '=', $a)->sum('valor');
        $pdf = \App::make('dompdf.wrapper');
        $vista = \View('pdfs.aportes', compact('total_mes','aporte'))->render();
        $pdf->loadHTML($vista);
        return $pdf->download('Aportes.pdf');
        //return View('pdfs.diezmos',compact('total_mes','aporte'));

    }

    public function gastopdf(Request $request){
        
        $gasto = Gasto::buscador($request->year,$request->month)->all();
        
        $total_mes = Gasto::whereMonth('fecha', '=', $request->month)->whereYear('fecha', '=', $request->year)->sum('valor');

        //:whereMonth('fecha', '>', $mes-1)->whereMonth('fecha', '<', $mes+1)->whereYear('fecha', '=', $a)->sum('valor');
        $pdf = \App::make('dompdf.wrapper');
        $vista = \View('pdfs.gastos', compact('total_mes','gasto'))->render();
        $pdf->loadHTML($vista);
        return $pdf->download('Gastos.pdf');
        //return View('pdfs.diezmos',compact('total_mes','aporte'));

    }

}
