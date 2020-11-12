@extends('layout.plantilla') 
@section('contenido') 
<div class="row">
    <div class="col-md-8 col-xs-12"> 
    @include('usuairos1.search')
    </div>
    <div class="col-md-2"> 
        <a href="usuario/create" class="pull-right"> 
        <button class="btn btn-info">Crear Usuario</button>  <!--success-->
    </a> 
</div>
</div>

<!--Mensaje de alerta con Boostra-->
@if($flash = Session::get('exito'))
    <div class="alert alert-success " role="alert">
        <!-- Mensaje simple- creacion-1 --> 
        <strong>EXITO!</strong>
                 {{Session::get('exito')}}
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

    </div>
    @endif

<div class="row">
    <div class="col-md-8 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>email</th>
                    <th width="180">Opciones</th>
                </thead>
                <tbody> @foreach($usuarios as $usu) <tr>
                        <td>{{ $usu->id }}</td>
                        <td>{{ $usu->nombre }}</td>
                        <td>{{ $usu->email }}</td>
                        <td> 

                            <a href="{{URL::action('UsuarioController@edit',$usu->id)}}">
                                <button class="btn btn-primary">Actualizar</button></a>

                            <a href="" data-target="#modal-delete-{{$usu->id}}" data-toggle="modal"> 
                                <button class="btn btn-danger">Eliminar</button> 
                            </a> 
                        </td>
                    </tr> 
                    @include('usuairos1.modal')
                    @endforeach 
                </tbody>
            </table>
        </div>
        {{$usuarios->links()}}
    </div>
</div> 
@endsection