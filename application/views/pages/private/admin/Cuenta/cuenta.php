<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Cuenta</h1>
            <div class="separator mb-5"></div>
        </div>
    </div>
</div>
<form class="row g-3 needs-validation d-flex justify-content-center" id='modal-form' novalidate>
    <div class="card d-flex justify-content-center">
        <div class="card-body" style="height:auto; width:1000px;">
            <div class="text-center">
                <a type="button" data-toggle="modal" data-target="#exampleModalPopovers" onclick="return imagenModal2(this)">
                    <div class="mb-3">
                        <img id="img-pr" alt="Profile"
                            class="img-thumbnail border-0 rounded-circle list-thumbnail" style="width:200px; height:200px;">
                    </div>
                </a>
                <div class="col-12 mt-4">
                    <label for="nombre" class="form-label">Restaurante</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text"><i class="simple-icon-home"></i></span>
                        <input type="text" class="form-control" aria-describedby="inputGroupPrepend" required name='nombre' id='nombre12'>
                        <div class="nombre invalid-feedback">

                        </div>
                    </div>
                </div>
                <div class="col-12 mt-4">
                    <label for="password" class="form-label">Contraseña</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text"><i class="simple-icon-lock"></i></span>
                        <input type="password" minlength="4" class=" form-control" aria-describedby="inputGroupPrepend" required name="password" id='password'>
                        <div class="password invalid-feedback">
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-4">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text"><i class="iconsminds-envelope"></i></span>
                        <input type="email" class="form-control" aria-describedby="inputGroupPrepend" required name='email' id='email'>
                        <div class="email invalid-feedback">
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-4">
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
            <div class=" col-12 d-flex justify-content-center mb-2 mt-4">
                <button class="btn btn-primary" id="btn-save">Guardar</button>
            </div>
        </div>
    </div>
</form>