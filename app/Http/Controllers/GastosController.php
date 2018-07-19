<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gasto;

class GastosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin', ['only' => ['edit', 'update', 'delete']]);
        $this->middleware('admin',['except'=> ['index','show','create', 'store']]);
    }
    
    public function index()
    {
        $anio=date("Y");
        $mes=date("m");
        $gastos = Gasto::all();
        $total = Gasto::all()->sum('valor');
        return view('gastos.index', compact('gastos','total','anio','mes'));
    }

   
    public function create()
    {
        return view('gastos.create');
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
        $gastos = Gasto::create([
            'concepto' => $request->get('concepto'),
            'fecha' => $request->get('fecha'),
            'valor' => $request->get('valor')
        ]);

        $mensaje = $gastos?'Registro Guardado Correctamente':'Error Al Guardar los Datos :(';
        return redirect()->route('gastos.index')->with('mensaje',$mensaje); 
    }

   
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $gasto = Gasto::find($id);
        return view('gastos.edit', compact('gasto'));
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
        $gasto = Gasto::find($id);
        $gasto->concepto = $request->get('concepto');
        $gasto->fecha = $request->get('fecha');
        $gasto->valor = $request->get('valor');
        $gasto->save();

        $mensaje = $gasto?'Registro Actualizado Correctamente':'Error Al Actualizar los Datos :(';
        return redirect()->route('gastos.index')->with('mensaje',$mensaje);
    }

 
    public function destroy($id)
    {
         //eliminar registro
        $gasto = Gasto::find($id);
        $gasto->delete();

        $mensaje = $gasto?'Registro Borrado Correctamente':'El registro No Se Pudo Borrar';
        return redirect()->route('gastos.index')->with('mensaje',$mensaje);
    }
}
