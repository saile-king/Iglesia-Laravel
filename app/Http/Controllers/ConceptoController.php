<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ConceptoAporte;

class ConceptoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin', ['only' => ['edit', 'update', 'delete']]);
        $this->middleware('admin',['except'=> array('index','create','store')]);
    }

    public function index()
    {
        
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
         //validar la informacion infgresada en el formulario
        $this->validate($request, [
            'nombre' => 'required|unique:concepto_aportes'
        ]);
        //guardar la informacion en la tabla
        $concepto = ConceptoAporte::create([
            'nombre' => $request->get('nombre')
        ]);
        $mensaje = $concepto?'Registro Guardado Correctamente':'Error Al Guardar los Datos :(';
        return redirect()->route('aportes.create')->with('mensaje',$mensaje);  
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
