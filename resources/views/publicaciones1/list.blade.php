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


<span>Usuarios </span>
<select class="form-control-plaintext form-control selectpicker" name="usuarios_id" id="usuarios_id" data-livesearch="true">
  <option value="0" disabled="true" selected="true">-Select-</option>
    @foreach($usuario as $usu)
        <option value="{{$usu->id}}">{{$usu->id}} - {{$usu->nombre}} - {{$usu->email}}</option>
    @endforeach
  </select>
  <span>Nombre </span>
  <input type="text" name="nombre" id="nombre" class="form-control" >
  <span>Email: </span>
  <input type="email" name="email" id="email" class="form-control" >

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function(){
        $("#usuarios_id").on('change',function () { 
            var usuarios_id=$(this).val();   
            console.log(usuarios_id);
            $.ajax({
                type:'get',
                url:'{!!URL::to('getUsuarios')!!}',//Enviamos url 
                data:{'id':usuarios_id}, //Pasamos el Id
                dataType:'json',//return data con json
                success:function(data){  
                    
                    console.log(data);
                   console.log(data.nombre);
                  console.log(data.email);
                   $("#nombre").val(data.nombre);
                   $("#email").val(data.email);

                },
                error:function(){
                }
            });



        });  
    });


  </script>
@endsection