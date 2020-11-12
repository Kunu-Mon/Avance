<!-- Vista -- de edicion -->

@extends('layout.plantilla')

@section ('contenido')

<div class="row">

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

        <h3>Editar Publicacion</h3>

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
{{Form::open(array('action'=>array('PublicacionController@update', $publicaciones->id),'method'=>'patch'))}}

<!--
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <div class="form-group">
        <label for="Role">Nombre De quien Publica</label>
        <select name="usuarios_id" id="usuarios_id" class="form-control-plaintext form-control selectpicker" data-livesearch="true" value="{{$publicaciones->usuarios_id}}" >  <!--readonly -> valor estatico-->
<!--           <option value=""  disabled selected>Nombre De Usuario:</option>
          //  @foreach($usuario as $usuario)
        //    <option value="{{$usuario->id}}">{{$usuario->nombre}}
            </option>
            @endforeach
        </select>
    </div>
</div>  -->

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <br><label for="titulo">Titulo De La Publicidad</label>
        <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Titulo" value="{{$publicaciones->titulo}}"> <!-- // value="<?php // echo $titulo;
                                                                                                                                                    ?>" -->
    </div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <br><label for="cuerpo">Cuerpo De La Publicidad</label>
        <input type="text" name="cuerpo" id="cuerpo" class="form-control" placeholder="Cuerpo" value="{{$publicaciones->cuerpo}}">
    </div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

    <div class="form-group"> <br>

        <a> <button class="btn btn-primary" type="submit" data-target="#modal-delete-{{$publicaciones->id}}" data-toggle="modal"> <span class="glyphicon glyphicon-refresh"></span> Actualizar </button></a>

        <a class="btn btn-info" type="reset" href="{{url('salidav')}}"><span class="glyphicon glyphicon-home"></span> Regresar </a>

    </div>

</div>

</div>

{!!Form::close()!!}

@endsection