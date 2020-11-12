@extends('layout.plantilla')
@section('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>ingreso de publicidad</h3>
        <!-- Este nos permite mostrar los errores, como tsambien tiene un foreach -- en tonces nos muestra uno a uno-->
        @if (count($errors)>0)
        <div class="alert alert-danger">
            <!-- Atravez de Bootstrap-->
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>


{!!Form::open(array('url'=>'salidav','method'=>'POST','autocomplete'=>'off'))!!} {{Form::token()}}

<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <div class="form-group">
        <label for="Role">Nombre De quien Publica</label>
        <select name="usuarios_id" id="usuarios_id" class="form-control selectpicker" data-livesearch="true">
            <option value="" disabled selected>Nombre De Usuario:</option>
            @foreach($usuario as $usuario)
                <option value="{{$usuario->id}}" 
                {{old('usuarios_id')==$usuario->id ? 'selected' :''}}> {{$usuario->nombre}}
                </option>
            <!--  // <option value="{{$usuario->id}}" {{old('usuarios_id' , $usuario->id)==$usuario->id ? 'selected' : ''}}> {{$usuario->nombre}}</option> --> 
            <!-- <option// value="{{$usuario->id}}">{{ $usuario->nombre}}</option> ->
            <!--Se le paso la variable como tal de los Publicaciones registrados-->
            @endforeach
        </select>
    </div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <br><label for="titulo">Titulo De La Publicidad</label>
        <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Titulo" value="{{ old('titulo')}}"> <!-- // value="<?php // echo $titulo;?>" -->  
    </div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <br><label for="cuerpo">Cuerpo De La Publicidad</label>
        <input type="text" name="cuerpo" id="cuerpo" class="form-control" placeholder="Cuerpo" value="{{ old('cuerpo')}}">  
    </div>
</div>


<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group"> <br>
        <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-ok"></span> Guardar</button>
        <button class="btn btn-danger" type="reset"><span class="glyphicon glyphicon-remove"></span> Vaciar Campos</button>
        <a class="btn btn-info" type="reset" href="{{url('salidav')}}"><span class="glyphicon glyphicon-home"></span> Regresar </a>
    </div>
</div>
</div>

{!!Form::close()!!}

@endsection