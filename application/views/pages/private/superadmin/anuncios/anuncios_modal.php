<div class="modal fade" id="modal-actions-anuncios" tabindex="-1" role="dialog" aria-hidden="true" data-action="">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id='modal-actions-title-anuncios'></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3 needs-validation" id='modal-form-anuncios' novalidate>
                    <div class="input-daterange input-group">
                        <label class='mt-4'>Tiempo de activacion</label>
                        </br>
                        <input type="date" class="input-sm form-control" name="inicio_anuncio" id='inicio_anuncio' placeholder="Inicio" required />
                        <span class="input-group-addon"></span>
                        <input type="date" class="input-sm form-control" name="fin_anuncio" id='fin_anuncio' placeholder="Fin" required />
                    </div>
                    <div class="fin_anuncio invalid-feedback"></div>
                    <div class="inicio_anuncio invalid-feedback"></div>

                    <input id='id_ad' class=" form-control" type="hidden" required name="id_ad">
                    <div class=" col-12 d-flex flex-row-reverse mb-2 mt-2">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                        <button class="btn btn-danger mr-2" type="button" class="close" data-dismiss="modal" aria-label="Close">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id='modal-delete-anuncios' class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm brad bradb">
        <div class="modal-content brad bradb">
            <div class="modal-header brad bg-primary">
                <h5 id='modal-delete-title-anuncios'></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bradb">
                <p class="mb-4" id='modal-delete-text-anuncios'></p>
                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal" name='delete' data-id="">Eliminar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal ANUNCIOS -->
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
                <form id="form-actualizar-img">
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
                    <input type="file" name="actualizaImagen" id="actualizaImagen" class="form-control btn btn-primary required btn-block mt-3">
                    <button id="actualizaImg" class="btn btn-primary btn-block mb-4 mt-2" style="font-size: 18px" data-dismiss="modal">
                        Subir imagen
                    </button>
                </form>
            </div>
        </div>
    </div>

</div>