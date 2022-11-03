<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Cuenta</h1>
            <div class="separator mb-5"></div>
        </div>
    </div>
</div>
<form class="row g-3 needs-validation d-flex justify-content-center" id='modal-form-cuenta' novalidate>
    <div class="card d-flex justify-content-center">
        <div class="card-body" style="height:auto; width:1000px;">
            <div class="text-center">
                <a type="button" data-toggle="modal" data-target="#exampleModalPopovers" onclick="return imagenModal2(this)">
                    <div class="mb-3">
                        <img id="img-pr" alt="Profile" class="img-thumbnail border-0 rounded-circle list-thumbnail" style="width:200px; height:200px;">
                    </div>
                </a>
                <div class="col-12 mt-4">
                    <label for="cuenta_nombre" class="form-label">Restaurante</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text"><i class="simple-icon-home"></i></span>
                        <input type="text" class="form-control" required name='cuenta_nombre' id='cuenta_nombre'>
                        <div class="cuenta_nombre invalid-feedback">

                        </div>
                    </div>
                </div> 
                <div class="col-12 mt-4"> 
                    <label for="cuenta_password" class="form-label">Contraseña</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text"><i class="simple-icon-lock"></i></span> 
                        <input type="password" minlength="4" class=" form-control" required name="cuenta_password" id='cuenta_password'>
                        <div class="cuenta_password invalid-feedback">
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-4">
                    <label for="cuenta_email" class="form-label">Correo electrónico</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text"><i class="iconsminds-envelope"></i></span>
                        <input pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control" required name='cuenta_email' id='cuenta_email'>
                        <div class="cuenta_email invalid-feedback">
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-4">
                    <label for="cuenta_phone" class="form-label">Teléfono</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text"><i class="simple-icon-phone"></i></span>
                        <input type="tel" pattern="[0-9]{0,20}" class="form-control" required name="cuenta_phone" id='cuenta_phone'>
                        <div class="cuenta_phone invalid-feedback">
                        </div>
                    </div>
                </div>

            </div>
            <div class=" col-12 d-flex justify-content-center mb-2 mt-4">
                <button class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</form>