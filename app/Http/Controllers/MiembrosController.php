<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Miembro;
use App\Departamento;
use App\Municipio;

class MiembrosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin', ['only' => ['edit', 'update', 'delete']]);
        $this->middleware('admin',['except'=> ['index','show','create', 'store']]);
    }
    
    public function index()
    {
        $miembros = Miembro::paginate(15);
        return view('miembros.index', compact('miembros'));
    }

    
    public function create()
    {
        $depar = Departamento::all()->pluck('departamento','id_departamento');
        return view('miembros.create', compact('depar'));
    }


    public function municipios(){
      $departamento_id = Input::get('id_departamento');
      $municipio = Municipio::where('departamento_id', '=', $departamento_id)->get();
      return response()->json($municipio);
    }


   
    public function store(Request $request)
    {
        //validar la informacion infgresada en el formulario
        $this->validate($request, [
            'nombres' => 'required',
            'apellidos' => 'required',
            'identificacion' => 'required',
            'n_identificacion' => 'required|unique:miembros',
            'nacimiento' => 'required',
            'lugar_nacimiento' => 'required',
            'genero' => 'required',
            'estado_civil' => 'required',
            'cabeza_hogar' => 'required',
            'ministerio' => 'required',
            'profesion' => 'required',
            'estado' => 'required',
            'habilidades' => 'required',
            'direccion' => 'required',
            'barrio' => 'required',
            'departamento' => 'required',
            'ciudad' => 'required',
            'celular' => 'required',
            'telefono' => 'required',
            'email' => 'required|email|unique:miembros'
        ]);
        //guardar la informacion en la tabla
        $miembros = Miembro::create([
            'nombres' => $request->get('nombres'),
            'apellidos' => $request->get('apellidos'),
            'identificacion' => $request->get('identificacion'),
            'n_identificacion' => $request->get('n_identificacion'),
            'genero' => $request->get('genero'),
            'estado_civil' => $request->get('estado_civil'),
            'cabeza_hogar' => $request->get('cabeza_hogar'),
            'nacimiento' => $request->get('nacimiento'),
            'lugar_nacimiento' => $request->get('lugar_nacimiento'),
            'ministerio' => $request->get('ministerio'),
            'profesion' => $request->get('profesion'),
            'estado' => $request->get('estado'),
            'habilidades' => $request->get('habilidades'),
            'direccion' => $request->get('direccion'),
            'barrio' => $request->get('barrio'),
            'departamento' => $request->get('departamento'),
            'ciudad' => $request->get('ciudad'),
            'celular' => $request->get('celular'),
            'telefono' => $request->get('telefono'),
            'email' => $request->get('email')
        ]);

        $mensaje = $miembros?'Registro Guardado Correctamente':'Error Al Guardar los Datos :(';
        return redirect()->route('miembros.index')->with('mensaje',$mensaje); 

    }

   
    public function show($id)
    {
        $miembro = Miembro::find($id);
        return view('miembros.show', compact('miembro'));  
    }

    
    public function edit($id)
    {
        $miembro = Miembro::find($id);
        return view('miembros.edit', compact('miembro'));
    }

    
    public function update(Request $request, $id)
    {
        //validar la informacion infgresada en el formulario
        $this->validate($request, [
            'nombres' => 'required',
            'apellidos' => 'required',
            'identificacion' => 'required',
            'n_identificacion' => 'required',
            'nacimiento' => 'required',
            'lugar_nacimiento' => 'required',
            'genero' => 'required',
            'estado_civil' => 'required',
            'cabeza_hogar' => 'required',
            'ministerio' => 'required',
            'profesion' => 'required',
            'estado' => 'required',
            'habilidades' => 'required',
            'direccion' => 'required',
            'barrio' => 'required',
            'departamento' => 'required',
            'ciudad' => 'required',
            'celular' => 'required',
            'telefono' => 'required',
            'email' => 'required|email'
        ]);
        //actualizar la informacion
        $miembro = Miembro::find($id);
        $miembro->nombres = $request->get('nombres');
        $miembro->apellidos = $request->get('apellidos');
        $miembro->identificacion = $request->get('identificacion');
        $miembro->n_identificacion = $request->get('n_identificacion');
        $miembro->nacimiento = $request->get('nacimiento');
        $miembro->lugar_nacimiento = $request->get('lugar_nacimiento');
        $miembro->genero = $request->get('genero');
        $miembro->estado_civil = $request->get('estado_civil');
        $miembro->cabeza_hogar = $request->get('cabeza_hogar');
        $miembro->ministerio = $request->get('ministerio');
        $miembro->profesion = $request->get('profesion');
        $miembro->estado = $request->get('estado');
        $miembro->habilidades = $request->get('habilidades');
        $miembro->direccion = $request->get('direccion');
        $miembro->barrio = $request->get('barrio');
        $miembro->departamento = $request->get('departamento');
        $miembro->ciudad = $request->get('ciudad');
        $miembro->celular = $request->get('celular');
        $miembro->telefono = $request->get('telefono');
        $miembro->email = $request->get('email');
        $miembro->save();

        $mensaje = $miembro?'Registro Actualizado Correctamente':'No Se Pudo Actualizar';
        return redirect()->route('miembros.index')->with('mensaje',$mensaje); 

    }

    
    public function destroy($id)
    {
        //eliminar registro
        $miembro = Miembro::find($id);
        $miembro->delete();

        $mensaje = $miembro?'Registro Borrado Correctamente':'El registro No Se Pudo Borrar';
        return redirect()->route('miembros.index')->with('mensaje',$mensaje);
    }
}
