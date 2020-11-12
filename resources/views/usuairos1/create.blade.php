<!-- Primera vista , creacion de propietario-->

@extends('layout.plantilla')

@section('contenido')

<div class="row">

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

        <h3>Nuevo Ingreso </h3>

        @if (count($errors)>0)

        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)

                <li>{{$error}}</li>

                @endforeach </ul>
        </div>
        @endif
    </div>
</div>

{!!Form::open(array('url'=>'usuario','method'=>'POST','autocomplete'=>'off'))!!}

{{Form::token()}}

<div class="row">

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

        <div class="form-group">
            <br><label for="pnombre">Nombre De Usuario</label>
            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" value="{{ old('nombre')}}">

        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <br> <label for="email">Correo Electronico</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Correo Electronico" value="{{ old('email')}}">
            <!--   <p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones, guion bajo.-> correo@correo.com </p>-->
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <br> <button class="btn btn-primary" type="submit"> <a data-toggle="modal" data-target="#create" <span class="glyphicon glyphicon-ok"></span></a> Guardar</button>
            <button class="btn btn-danger" type="reset"><span class="glyphicon glyphicon-remove"></span> Vaciar Campos</button>
            <a class="btn btn-info" type="reset" href="{{url('usuario')}}"><span class="glyphicon glyphicon-home"></span> Regresar </a>
        </div>
    </div>
</div>

{!!Form::close()!!}

@endsection