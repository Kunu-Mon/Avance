<!-- Vista -- de edicion --> 

@extends('layout.plantilla')

@section ('contenido')

<div class="row">

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

        <h3>Editar Usuario</h3>

        @if (count($errors)>0)

        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)

                <li>{{$error}}</li>

                @endforeach

            </ul>

        </div>

        @endif

    </div>

</div>

<!-- Formulario tambien llama al controlador  // atraves del metodo -- 'method'=>'patch' --> 
{{Form::open(array('action'=>array('UsuarioController@update', $usuarios->id),'method'=>'patch'))}}

<div class="row">
    
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

        <div class="form-group"> <br> 
           <label for="pnombre">Nombre De Usuario</label> 
           <input type="text" name="nombre" id="nombre" class="form-control" value="{{$usuarios->nombre}}">
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

        <div class="form-group"> <br>
            <label for="email">Correo Electronico</label>
            <input type="email" name="email" id="email" class="form-control" value="{{$usuarios->email}}">
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

        <div class="form-group"> <br>

            <a> <button class="btn btn-primary" type="submit" data-target="#modal-delete-{{$usuarios->id}}" data-toggle="modal"> <span class="glyphicon glyphicon-refresh"></span> Actualizar </button></a> 

            <a class="btn btn-info" type="reset" href="{{url('usuario')}}"><span class="glyphicon glyphicon-home"></span> Regresar </a>

        </div>

    </div>

</div>

{!!Form::close()!!}

@endsection