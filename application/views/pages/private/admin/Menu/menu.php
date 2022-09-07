<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Menú</h1>
                <button type="button" class="btn btn-outline-success m-1 textabla" data-toggle="modal"
                    data-target="#exampleModalContent" data-whatever="Agregar Producto" data-action="agregar" onclick="return handleModal(this)"> Agregar <i
                        class="simple-icon-plus"></i></button>
            </div>


            <div class="separator mb-5"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card mb-4">
                <div id="smartWizardClickable">
                    <ul class="card-header">
                        <li class="m-2"><a href="#clickable1">
                                <h3> Combos <i class="iconsminds-cookies"></i> </h3>
                            </a></li>
                        <li class="done m-2"><a href="#clickable2">
                                <h3> Platillos <i class="iconsminds-hamburger"></i> </h3>
                            </a></li>
                        <li class="done m-2"><a href="#clickable3">
                                <h3> Bebidas <i class="iconsminds-coffee-to-go"></i> </h3>
                            </a></li>
                    </ul>

                    <div class="card-body">
                        <div id="clickable1">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">
                                            <h4>Imagen</h4>
                                        </th>
                                        <th scope="col" class="text-center">
                                            <h4>Nombre</h4>
                                        </th>
                                        <th scope="col" class="text-center">
                                            <h4>Precio</h4>
                                        </th>
                                        <th scope="col" class="text-center">
                                            <h4>Tipo de preparacion</h4>
                                        </th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">
                                            <img src="<?=base_url()?>static/img/Sandwich1.png" alt="Fat Rascal"
                                                class="list-thumbnail responsive border-0 card-img-left" />
                                        </th>
                                        <td class="align-middle text-center">
                                            <p class="textabla">Sandwich y Coca de 355ml</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="textabla">$45.00</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="textabla"><i class="iconsminds-stopwatch"></i> 15:00 min
                                            </p>
                                        </td>
                                        <td class="align-middle text-right">
                                            <button type="button" class="btn btn-outline-primary m-1"
                                                data-toggle="modal" data-target="#exampleModalContent"
                                                data-whatever="Editar"><i
                                                    class="simple-icon-pencil textabla"></i></button>
                                            <button type="button" class="btn btn-outline-danger m-1" data-toggle="modal"
                                                data-target=".bd-example-modal-sm"><i
                                                    class="simple-icon-trash textabla"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <img src="<?=base_url()?>static/img/Bagel1.png" alt="Fat Rascal"
                                                class="list-thumbnail responsive border-0 card-img-left" />
                                        </th>
                                        <td class="align-middle text-center">
                                            <p class="textabla">Bagel y Coca de 355ml</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="textabla">$85.00</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="textabla"><i class="iconsminds-stopwatch"></i> 15:00 min
                                            </p>
                                        </td>
                                        <td class="align-middle text-right">
                                            <button type="button" class="btn btn-outline-primary m-1"
                                                data-toggle="modal" data-target="#exampleModalContent"
                                                data-whatever="Editar"><i
                                                    class="simple-icon-pencil textabla"></i></button>
                                            <button type="button" class="btn btn-outline-danger m-1"><i
                                                    class="simple-icon-trash textabla"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <img src="<?=base_url()?>static/img/Baguette1.png" alt="Fat Rascal"
                                                class="list-thumbnail responsive border-0 card-img-left" />
                                        </th>
                                        <td class="align-middle text-center">
                                            <p class="textabla">Baguette y Coca de 355ml</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="textabla">$150.00</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="textabla"><i class="iconsminds-stopwatch"></i> 20:00 min
                                            </p>
                                        </td>
                                        <td class="align-middle text-right">
                                            <button type="button" class="btn btn-outline-primary m-1"
                                                data-toggle="modal" data-target="#exampleModalContent"
                                                data-whatever="Editar"><i
                                                    class="simple-icon-pencil textabla"></i></button>
                                            <button type="button" class="btn btn-outline-danger m-1"><i
                                                    class="simple-icon-trash textabla"></i></button>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <div id="clickable2">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">
                                            <h4>Imagen</h4>
                                        </th>
                                        <th scope="col" class="text-center">
                                            <h4>Nombre</h4>
                                        </th>
                                        <th scope="col" class="text-center">
                                            <h4>Precio</h4>
                                        </th>
                                        <th scope="col" class="text-center">
                                            <h4>Tiempo de preparacion</h4>
                                        </th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">
                                            <img src="<?=base_url()?>static/img/Sandwich1.png" alt="Fat Rascal"
                                                class="list-thumbnail responsive border-0 card-img-left" />
                                        </th>
                                        <td class="align-middle">
                                            <p class="textabla text-center">Sandwich</p>
                                        </td>
                                        <td class="align-middle">
                                            <p class="textabla text-center">$25.00</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="textabla"><i class="iconsminds-stopwatch"></i> 15:00 min
                                            </p>
                                        </td>
                                        <td class="align-middle text-right">
                                            <button type="button" class="btn btn-outline-primary m-1"
                                                data-toggle="modal" data-target="#exampleModalContent"
                                                data-whatever="Editar"><i
                                                    class="simple-icon-pencil textabla"></i></button>
                                            <button type="button" class="btn btn-outline-danger m-1"><i
                                                    class="simple-icon-trash textabla"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <img src="<?=base_url()?>static/img/Bagel1.png" alt="Fat Rascal"
                                                class="list-thumbnail responsive border-0 card-img-left" />
                                        </th>
                                        <td class="align-middle text-center">
                                            <p class="textabla">Bagel</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="textabla">$65.00</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="textabla"><i class="iconsminds-stopwatch"></i> 15:00 min
                                            </p>
                                        </td>
                                        <td class="align-middle text-right">
                                            <button type="button" class="btn btn-outline-primary m-1"
                                                data-toggle="modal" data-target="#exampleModalContent"
                                                data-whatever="Editar"><i
                                                    class="simple-icon-pencil textabla"></i></button>
                                            <button type="button" class="btn btn-outline-danger m-1"><i
                                                    class="simple-icon-trash textabla"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <img src="<?=base_url()?>static/img/Baguette1.png" alt="Fat Rascal"
                                                class="list-thumbnail responsive border-0 card-img-left" />
                                        </th>
                                        <td class="align-middle text-center">
                                            <p class="textabla">Baguette</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="textabla">$130.00</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="textabla"><i class="iconsminds-stopwatch"></i> 20:00 min
                                            </p>
                                        </td>
                                        <td class="align-middle text-right">
                                            <button type="button" class="btn btn-outline-primary m-1"
                                                data-toggle="modal" data-target="#exampleModalContent"
                                                data-whatever="Editar"><i
                                                    class="simple-icon-pencil textabla"></i></button>
                                            <button type="button" class="btn btn-outline-danger m-1"><i
                                                    class="simple-icon-trash textabla"></i></button>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <div id="clickable3">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">
                                            <h4>Imagen</h4>
                                        </th>
                                        <th scope="col" class="text-center">
                                            <h4>Nombre</h4>
                                        </th>
                                        <th scope="col" class="text-center">
                                            <h4>Precio</h4>
                                        </th>
                                        <th scope="col" class="text-center">
                                            <h4>Tipo de preparacion</h4>
                                        </th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">
                                            <img src="<?=base_url()?>static/img/chai1.png" alt="Fat Rascal"
                                                class="list-thumbnail responsive border-0 card-img-left" />
                                        </th>
                                        <td class="align-middle">
                                            <p class="textabla text-center">Chai1</p>
                                        </td>
                                        <td class="align-middle">
                                            <p class="textabla text-center">$30.00</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="textabla"><i class="iconsminds-stopwatch"></i> 10:00 min
                                            </p>
                                        </td>
                                        <td class="align-middle text-right">
                                            <button type="button" class="btn btn-outline-primary m-1"
                                                data-toggle="modal" data-target="#exampleModalContent"
                                                data-whatever="Editar"><i
                                                    class="simple-icon-pencil textabla"></i></button>

                                            <button type="button" class="btn btn-outline-danger m-1"><i
                                                    class="simple-icon-trash textabla"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <img src="<?=base_url()?>static/img/frappuccino1.png" alt="Fat Rascal"
                                                class="list-thumbnail responsive border-0 card-img-left" />
                                        </th>
                                        <td class="align-middle text-center">
                                            <p class="textabla">Chip Frappuccino</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="textabla">$50.00</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="textabla"><i class="iconsminds-stopwatch"></i> 10:00 min
                                            </p>
                                        </td>
                                        <td class="align-middle text-right">
                                            <button type="button" class="btn btn-outline-primary m-1"
                                                data-toggle="modal" data-target="#exampleModalContent"
                                                data-whatever="Editar"><i
                                                    class="simple-icon-pencil textabla"></i></button>
                                            <button type="button" class="btn btn-outline-danger m-1"><i
                                                    class="simple-icon-trash textabla"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <img src="<?=base_url()?>static/img/frappuccino2.png" alt="Fat Rascal"
                                                class="list-thumbnail responsive border-0 card-img-left" />
                                        </th>
                                        <td class="align-middle text-center">
                                            <p class="textabla">Berry Yogurt Frappuccino</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="textabla">$55.00</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="textabla"><i class="iconsminds-stopwatch"></i> 10:00 min
                                            </p>
                                        </td>
                                        <td class="align-middle text-right">
                                            <button type="button" class="btn btn-outline-primary m-1"
                                                data-toggle="modal" data-target="#exampleModalContent"
                                                data-whatever="Editar"><i
                                                    class="simple-icon-pencil textabla"></i></button>
                                            <button type="button" class="btn btn-outline-danger m-1"><i
                                                    class="simple-icon-trash textabla"></i></button>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>