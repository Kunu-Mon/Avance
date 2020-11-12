<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Usuario;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests\UsuarioCreateRequest;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        ///* $usuarios=Usuario::orderBy('id','DESC')->paginate(3); return view('usuairos1.index',compact('usuarios'));**/

        if ($request) {

            $query = trim($request->get('searchText'));

            $usuarios = Usuario::where('nombre', 'LIKE', '%' . $query . '%')
                ->orwhere('email', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'DESC')->paginate(3);

            return view("usuairos1.index", ["usuarios" => $usuarios, "searchText" => $query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuairos1.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioCreateRequest $request)
    {
        $usuarios = new Usuario;
        $usuarios->nombre = $request->get('nombre');
        $usuarios->email = $request->get('email');

        $usuarios->save();  //Es como hacer un inser en la BDD pero con laravel

        session()->flash('exito', 'Su Usuario y Correo Fue Creada Exitosamente.');

        return Redirect::to('usuario');
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

        $usuarios = Usuario::findOrFail($id);
        return view("usuairos1.edit", ["usuarios" => $usuarios]);
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

        $usuarios = Usuario::findOrFail($id);
        $usuarios->nombre = $request->get('nombre');
        $usuarios->email = $request->get('email');
        $usuarios->update(); //metodo update -- llamo a la funcion update

        session()->flash('exito', 'Su Usuario y Correo Fue Editado Con Exito.');


        return Redirect::to('usuario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //pide el id
        $usuarios = Usuario::findOrFail($id);
        $usuarios->delete();  // es como un delet * from.... 

        session()->flash('exito', 'Su Usuario y Correo Fue Eliminada Exitosamente.');

        return Redirect::to('usuario'); //redireciona a propietarios
        // findOrFail -- Como si estubiera selecionando/buscando el id---pero con laravel
    }
}
