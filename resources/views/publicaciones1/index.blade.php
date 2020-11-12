@extends('layout.plantilla')
@section('contenido')
<div class="row">
    <div class="col-md-8 col-xs-12">
        @include('publicaciones1.search')
    </div>
    <div class="col-md-2">
        <a href="salidav/create" class="pull-right">
            <button class="btn btn-info">PUBLICAR</button>
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
    <div class="col-md-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <th>Id</th>
                    <th>Nombre Del Usuario</th>
                    <th>Titulo De La Publicidad</th>
                    <th>Cuerpo Del Detalle</th>
                    <th>Opciones</th>
                </thead>
                <tbody>

                    @foreach($publicaciones as $pb) <tr>
                        <td>{{ $pb->id }}</td>
                        <td>{{ $pb->usuarios->nombre}}</td>
                        <td>{{ $pb->titulo}}</td>
                        <td>{{ $pb->cuerpo}}</td>
                        <td>

                            <a href="{{URL::action('PublicacionController@edit',$pb->id)}}">
                                <button class="btn btn-primary"> <i class="fa fa-refresh" aria-hidden="true"></i></button></a>

                            <a href="" data-target="#modal-delete-{{$pb->id}}" data-toggle="modal">
                                <button class="btn btn-danger"><i class="fa fa-times-circle-o" aria-hidden="true"></i></button>
                            </a>
                        </td>
                    </tr>
                    @include('publicaciones1.modal')
                    @endforeach
                </tbody>
            </table>
        </div>
        {{$publicaciones->links()}}
        <!--paginacion-->
    </div>
</div>

@endsection