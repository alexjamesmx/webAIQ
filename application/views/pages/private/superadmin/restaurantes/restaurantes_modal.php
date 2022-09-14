<div class="modal fade" id="modal-actions-restaurantes" tabindex="-1" role="dialog" aria-hidden="true" data-action="">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id='modal-actions-title-restaurantes'></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3 needs-validation" id='modal-form-restaurantes' novalidate>
                    <div class="col-12">

                        <label for="nombre" class="form-label">Restaurante</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text"><i class="simple-icon-home"></i></span>
                            <input type="text" class="form-control" required name='nombre' id='nombre'>
                            <div class="nombre invalid-feedback">

                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="password" class="form-label">Contraseña</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text"><i class="simple-icon-lock"></i></span>
                            <input type="password" class=" form-control" aria-describedby="inputGroupPrepend" required name="password" id='password'>
                            <div class="password invalid-feedback">
                            </div>
                        </div>

                    </div>
                    <div class="col-12">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text"><i class="iconsminds-envelope"></i></span>
                            <input pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control" required name='email' id='email'>
                            <div class="email invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="phone" class="form-label">Teléfono</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text"><i class="simple-icon-phone"></i></span>
                            <input type="tel" pattern="[0-9]{0,20}" class=" form-control" aria-describedby="inputGroupPrepend" required name="phone" id='phone'>
                            <div class="phone invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <label hidden for="id_user"></label>
                    <input hidden name="id_user" id='id_user'>
            </div>
            <div class=" col-12 d-flex flex-row-reverse mb-2">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger mr-2" type="button" class="close" data-dismiss="modal" aria-label="Close">Cancelar</button>
            </div>
            </form>
        </div>
    </div>
</div>