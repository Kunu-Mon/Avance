<!-- Se manda de parametro por url-propietario la unica que se tiene en el momento /// 
el meto sera Get. porque es por url -- que no autocomplete- y este rol sera de busqueda--> 


{!! Form::open(array('url'=>'salidav','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}

<form action="" method="GET"> 
    <div class="form-group"> 
        <div class="input-group"> 
            <input type="text" name="searchText" class="form-control" placeholder="Buscar..." value="{{$searchText}}">  <!--//value="{{$searchText}}"> -->  <!-- Esto es lo que me pide // "{{$searchText ?? ''}}" --->             <span class="input-group-btn"> 
                <button type="submit" class="btn btn-primary">Buscar</button> 
            </span> 
        </div> 
    </div> 
</form>

{{Form::close()}}
