<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Cuenta</h1>
            <div class="separator mb-5"></div>
        </div>
    </div>
</div>
<form class="row g-3 needs-validation d-flex justify-content-center" novalidate>
    <div class="card d-flex justify-content-center">
        <div class="card-body" style="height:auto; width:1000px;">
            <div class="text-center">
                <div class="mb-3">
                    <img alt="Profile" src="<?=base_url()?>static/img/Starbucks.jpg"
                        class="img-thumbnail border-0 rounded-circle list-thumbnail" style="width:200px; height:200px;">
                </div>
                <div class="html_button btn-left">
                    <a href="#" class="btn btn-primary rounded active mb-1" role="button" aria-pressed="true">Seleccione
                        Imagen</a>
                </div>
                <div class="col-12 mt-5">
                    <label for="phone" class="form-label">Nombre</label>
                    <div class="input-group has-validation ">
                        <span class="input-group-text"><i class="simple-icon-home"></i></span>
                        <input type="text" class="form-control" aria-describedby="inputGroupPrepend"
                            placeholder="El mejor restaurante" required>
                        <div class="invalid-feedback">
                            Este campo es requerido.
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <label for="phone" class="form-label">Correo electrónico</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text"><i class="iconsminds-envelope"></i></span>
                        <input type="text" class="form-control precio" aria-describedby="inputGroupPrepend"
                            placeholder="Correo electrónico" required>
                        <div class="invalid-feedback">
                            Este campo es requerido.
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <label for="phone" class="form-label">Teléfono</label>
                    <div class="input-group has-validation telefono">
                        <span class="input-group-text"><i class="simple-icon-phone"></i></span>
                        <input type="text" class="form-control" aria-describedby="inputGroupPrepend"
                            placeholder="Teléfono" required>
                        <div class="invalid-feedback">
                            Este campo es requerido.
                        </div>
                    </div>
                </div>
                <div class=" col-12 d-flex justify-content-center mt-4">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</form>