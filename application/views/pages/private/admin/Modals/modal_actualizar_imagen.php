<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Cambiar imagen</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                   </button>
            </div>
            <div class="modal-body">
            <form id="form-actualizar-img" >
            <input type="hidden" class="form-control" id="id_comida_imagen" name="id_comida_imagen" value=""> </input>
                               
            <div class="row">
                                    <div class="col-12 mt-3">
                                        <div class="alert alert-warning">
                                            <h9>
                                                <i class="fas fa-exclamation-triangle"></i> 
                                                El logo de la empresa debe ser un archivo en formato 
                                                <h9 class="text-success"> .gif .jpeg .png o .jpg</h9>.
                                                <br>
                                                Con un pesso máximo de <h9 class="text-success"> 512 kb.</h9>
                                            </h9>
                                        </div>
                                    </div>
                                </div>
                                <input type="file" name="actualizaImagen" id="actualizaImagen"  class="form-control btn btn-primary required btn-block mt-3">
                                <button id="actualizaImg" class="btn btn-primary btn-block mb-4 mt-2" style="font-size: 18px" data-dismiss="modal">
                                        Subir imagen
                                </button>
            </form>
            </div>
        </div>
    </div>
    
</div>