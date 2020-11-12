<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Publicados;     //Salida_vehiculo

use App\Usuario;     //vehiculo

use Illuminate\Support\Facades\Redirect;

use App\Http\Requests\PublicacionCreateRequest;  //UsuarioFormRequest
use Illuminate\Support\Facades\Auth;

//use App\Http\Requests\Salida_vehiculoCreateRequest;


class PublicacionController extends Controller
{

    public function index(Request $request)
    {
        if ($request) {

            $query = trim($request->get('searchText'));
            $publicaciones = Publicados::where('titulo', 'LIKE', '%' . $query . '%')
                // ->orwhere('titulo','LIKE','%'.$query.'%')
                ->orwhere('cuerpo', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'DESC')
                ->paginate(4);

            return view("publicaciones1.index", ["publicaciones" => $publicaciones, "searchText" => $query]);

            /***************************************************************************************
             *   $query = trim($request->get('searchText'));

                $usuarios = Usuario::all('nombre');
                $publicaciones = Publicados::
                join('usuarios', 'usuarios.id', '=', 'publicaciones.usuarios_id')
                ->select('publicaciones.titulo', 'usuarios.nombre')
                ->where('usuarios.id','LIKE','%'.$query.'%')
                //->orderBy('id', 'DESC')->paginate(3)
                ->get();

           return view("publicaciones1.index", ["publicaciones" => $publicaciones, "usuarios" => $usuarios, "searchText" => $query]);
             *****************************************************************************************/ //////

            // $query=trim($request->get('searchText'));
            // $publicaciones=Publicados::join('publicaciones','usuarios_id' , '=', 'publicaciones.usuarios_id')
            /*  // ->orwhere('titulo','LIKE','%'.$query.'%')
             ->select("usuarios.nombre", "publicaciones.cuerpo", "publicaciones.titulo")             
             ->orderBy('id','DESC')->paginate(3)
             ->get(); */ //   return view("publicaciones1.index",["publicaciones"=>$publicaciones,"searchText"=>$query]);

            /**
             * if($request){
            $query=trim($request->get('searchText'));
            $publicaciones=Usuario::join('publicaciones','publicaciones.usuarios_id', '=', 'usuarios.id')
            // ->orwhere('titulo','LIKE','%'.$query.'%')
             ->select("usuarios.nombre", "publicaciones.cuerpo", "publicaciones.titulo")
             ->get();
             return view("publicaciones1.index",["publicaciones"=>$publicaciones,"searchText"=>$query]);
             */

            /*$publicaciones=Publicados::where('titulo','LIKE','%'.$query.'%')
          // ->orwhere('titulo','LIKE','%'.$query.'%')
          ->orwhere('cuerpo','LIKE','%'.$query.'%')
          ->orderBy('id','DESC')->paginate(3);
          return view("publicaciones1.index",["publicaciones"=>$publicaciones,"searchText"=>$query]);
        */
        }
        /*  if ($request) {
            $query=trim($request->get('searchText'));
            $publicaciones=Publicados::orderBy('id', 'DESC')  //publicacion
            ->paginate(3);
            return view('publicaciones1.index', ["publicaciones" => $publicaciones, "searchText" => $query]); } */
    }

    public function create()
    {

        $usuarios = Usuario::orderBy('nombre', 'DESC')
            ->select('usuarios.email', 'usuarios.nombre', 'usuarios.id')
            // ->whereNotIn('usuarios.id',  // no se encuentree en la tabla salida vehiculos
            //   function ($query) 
            // {   
            //   $query->select('publicaciones.usuarios.id')
            //             ->from('publicaciones')
            //              ->where('email',1);
            //      })

            ->get();
        //dd($vehiculo)
        return view('publicaciones1.create')->with('usuario', $usuarios);
    }

    public function store(PublicacionCreateRequest $request)  //Salida_vehiculoCreateRequest
    {    //Request 

        $salida = new Publicados;
        $salida->titulo = $request->get('titulo'); //? $this->redirectTo : '/titulo'
        $salida->cuerpo = $request->get('cuerpo');
        $salida->usuarios_id = $request->get('usuarios_id');
        // estos campos salen de como lo tenemos nombrados en la vista el get
        $salida->save();
        //  return 'DATOS GUARDADO';
        //Flash('Estudiante creado correctamente!') ;
        session()->flash('exito', 'Su Publicacion Fue Creada Exitosamente.');

        return Redirect::to('salidav');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $publicaciones = Publicados::findOrFail($id);
        $usuarios = Usuario::all();  //all -> de todo
        //$usuarios=Usuario::where('usuarios', Auth::User()->id)->get();
        return view("publicaciones1.edit", ["publicaciones" => $publicaciones, "usuario" => $usuarios]);
        //"usuario" -> ese es alque se le envia a la vista..
        // compact('usuario');
    }

    public function update(Request $request, $id)
    {
        $publicaciones = Publicados::findOrFail($id);
        $publicaciones->titulo = $request->get('titulo'); //? $this->redirectTo : '/titulo'
        $publicaciones->cuerpo = $request->get('cuerpo');
        //  $publicaciones->usuarios_id = $request->get('usuarios_id');
        $publicaciones->update(); //metodo update -- llamo a la funcion update

        session()->flash('exito', 'Su Publicacion Fue Editada Con Exito.');


        return Redirect::to('salidav');
    }

    public function destroy($id)
    {
        //pide el id
        $publicaciones = Publicados::findOrFail($id);
        $publicaciones->delete();  // es como un delet * from.... 

        session()->flash('exito', 'Su Publicacion Fue Eliminada Exitosamente.');


        return Redirect::to('salidav'); //redireciona a a publicidad
        // findOrFail -- Como si estubiera selecionando/buscando el id---pero con laravel

        //  return redirect(action('PublicacionController@index'));  //atravez del controlador y el metodo
        // return redirect(route('borrarDato'));  //nombre de rutas en laravel se le ponen algun nombre a la ruta /ejm/ ->name('borrarDato');

    }
}
