<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ofrenda;

class OfrendasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth','admin',['except'=> array('index','create','store')]);
    }

    public function index()
    {
        $ofrenda = Ofrenda::all();
        $mesT = Ofrenda::whereMonth('fecha', '>', 6)->whereMonth('fecha', '<', 8)->whereYear('fecha', '=', 2018)->sum('valor');
        $total = Ofrenda::all()->sum('valor');
        return view('ofrendas.index', compact('ofrenda','total','mesT'));
    }


    public function create()
    {
        return view('ofrendas.create');
    }


    public function store(Request $request)
    {
        //validar la informacion infgresada en el formulario
        $this->validate($request, [
            'concepto' => 'required',
            'fecha' => 'required',
            'valor' => 'required'
        ]);
        //guardar la informacion en la tabla
        $ofrenda = Ofrenda::create([
            'concepto' => $request->get('concepto'),
            'fecha' => $request->get('fecha'),
            'valor' => $request->get('valor')
        ]);

        $mensaje = $ofrenda?'Registro Guardado Correctamente':'Error Al Guardar los Datos :(';
        return redirect()->route('ofrendas.index')->with('mensaje',$mensaje); 


    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $ofrenda = Ofrenda::find($id);
        return view('ofrendas.edit', compact('ofrenda'));
    }

  
    public function update(Request $request, $id)
    {
        //validar la informacion infgresada en el formulario
        $this->validate($request, [
            'concepto' => 'required',
            'fecha' => 'required',
            'valor' => 'required'
        ]);
        //actualizar la informacion
        $ofrenda = Ofrenda::find($id);
        $ofrenda->concepto = $request->get('concepto');
        $ofrenda->fecha = $request->get('fecha');
        $ofrenda->valor = $request->get('valor');
        $ofrenda->save();

        $mensaje = $ofrenda?'Registro Actualizado Correctamente':'Error Al Actualizar los Datos :(';
        return redirect()->route('ofrendas.index')->with('mensaje',$mensaje);
    }

 
    public function destroy($id)
    {
         //eliminar registro
        $ofrenda = Ofrenda::find($id);
        $ofrenda->delete();

        $mensaje = $ofrenda?'Registro Borrado Correctamente':'El registro No Se Pudo Borrar';
        return redirect()->route('ofrendas.index')->with('mensaje',$mensaje);
    }
}
