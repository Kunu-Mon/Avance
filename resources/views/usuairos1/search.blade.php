
{!! Form::open(array('url'=>'usuario','id'=>'form1','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
  <div class="form-group">
  <div class="input-group">
  <input type="text" name="searchText" id="searchText" class="form-control" placeholder="Buscar..." value="{{$searchText}}" data-live-search="true">
 
    <span class="input-group-btn">
       <button type="submit" class="btn btn-primary">Buscar</button>
    </span>
  </div>
  </div>
</form>
{{Form::close()}}
 
<script>
window.addEventListener('load',function(){
  //Evento cuando el usuario ingresa al menos un caracter y se elimina
        document.getElementById("searchText").addEventListener("keyup", () => { 
               document.getElementById("form1").submit();
        
            })
});
</script>