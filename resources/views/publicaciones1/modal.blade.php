<!-- Como crear un modan // Aparece la confirmacion -con este -->
<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$pb->id}}">

    <!-- Crea formulario y llama --- al controlador -->
    {{Form::Open(array('action'=>array('PublicacionController@destroy',$pb->id),'method'=>'delete'))}}

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Eliminar Publicidad</h4>
            </div>
            <div class="modal-body">
                <p>Confirme si desea Eliminar Esta publicidad Su Usuario es: {{$pb->usuarios->nombre}}</p>
                <!-- <p>Confirme si desea Eliminar La Persona</p> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"> Cerrar </button>
                <button type="submit" class="btn btn-primary"> Confirmar </button>
            </div>
        </div>
    </div>

    {{Form::Close()}}