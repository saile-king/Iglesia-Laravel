<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aporte;
use App\Miembro;
use App\ConceptoAporte;

class AportesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin', ['only' => ['edit', 'update', 'delete']]);
        $this->middleware('admin',['except'=> array('index','create','store')]);
    }
    
    public function index()
    {
        $anio=date("Y");
        $mes=date("m");
        $concept = ConceptoAporte::all()->pluck('nombre','id');
        $aporte = Aporte::all();
        $total = Aporte::all()->sum('valor');
        return view('aportes.index', compact('aporte','total','anio','mes','concept'));
    }

    
    public function create()
    {
        $concepto = ConceptoAporte::all()->pluck('nombre','id');
        $miembro = Miembro::all()->pluck('nombres','id');
        return view('aportes.create', compact('miembro','concepto'));
    }

    
    public function store(Request $request)
    {
        //validar la informacion infgresada en el formulario
        $this->validate($request, [
            'concepto' => 'required',
            'fecha' => 'required',
            'valor' => 'required',
            'miembro' => 'required'
        ]);
        //guardar la informacion en la tabla
        $aporte = Aporte::create([
            'id_concepto' => $request->get('concepto'),
            'fecha' => $request->get('fecha'),
            'valor' => $request->get('valor'),
            'id_miembro' => $request->get('miembro')
        ]);

        $mensaje = $aporte?'Registro Guardado Correctamente':'Error Al Guardar los Datos :(';
        return redirect()->route('aportes.index')->with('mensaje',$mensaje); 
    }

   
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $aporte = Aporte::find($id);
        $concepto = ConceptoAporte::all()->pluck('nombre','id');
        $miembro = Miembro::all()->pluck('nombres','id');
        return view('aportes.edit', compact('aporte','miembro','concepto'));
    }

    
    public function update(Request $request, $id)
    {
         //validar la informacion infgresada en el formulario
        $this->validate($request, [
            'concepto' => 'required',
            'fecha' => 'required',
            'valor' => 'required',
            'miembro' => 'required'
        ]);
        //actualizar la informacion
        $aporte = Aporte::find($id);
        $aporte->id_concepto = $request->get('concepto');
        $aporte->fecha = $request->get('fecha');
        $aporte->valor = $request->get('valor');
        $aporte->id_miembro = $request->get('miembro');
        $aporte->save();

        $mensaje = $aporte?'Registro Actualizado Correctamente':'Error Al Actualizar los Datos :(';
        return redirect()->route('aportes.index')->with('mensaje',$mensaje);
    }

    
    public function destroy($id)
    {
         //eliminar registro
        $aportes = Aporte::find($id);
        $aportes->delete();

        $mensaje = $aportes?'Registro Borrado Correctamente':'El registro No Se Pudo Borrar';
        return redirect()->route('aportes.index')->with('mensaje',$mensaje);
    }
}
