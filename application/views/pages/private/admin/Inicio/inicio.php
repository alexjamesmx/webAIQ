<div class="container-fluid">
    <div class="row">
        <!--pendiente-->
        <div class="col-xl-6 col-sm-6 mb-3">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between align-items-center pt-4 pb-0 brad">

                    <h2 class="card-title"> Solicitudes de pedido </h2>
                    <button onclick="refrescar_aceptar()" type="button" class="btn btn-primary restaricon">
                        <i class="simple-icon-bell"></i>&nbsp;
                        <span id="contidadporacetpar" class="badge badge-light"></span>
                    </button>

                </div>
                <div class="card-body pt-0">

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Detalle del pedido</th>
                                <th scope="col">Aceptar / Declinar</th>
                            </tr>
                        </thead>
                        <tbody id="table-poraceptar">

                            <!-- traer datos de base de datos por ajax -->

                        </tbody>
                    </table>


                </div>
                <div class="card-footer bradb">
                    <h4 class="text-right m-1"> Total por día <span class="badge badge-light">7</span> </h4>
                </div>
            </div>
        </div>
        <!--Aceptados (Preparando)-->
        <div class="col-xl-6 col-sm-6 mb-3">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between align-items-center pt-4 pb-0 bg-primary brad">

                    <h2 class="card-title"> Aceptados (preparando) </h2>
                    <button onclick="refrescar_preparando()" type="button" class="btn btn-light restaricon">
                        <i class="simple-icon-bell"></i>&nbsp;
                        <span id="contidadpreparando" class="badge badge-dark"></span>
                    </button>

                </div>
                <div class="card-body pt-0">

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Platillos en preparación</th>
                                <th scope="col">Tiempo que ha pasado</th>
                                <th scope="col">¿Salido de cocina?</th>
                            </tr>
                        </thead>
                        <tbody id="table-preparando">

                            <!-- traer datos de base de datos por ajax -->

                        </tbody>
                    </table>
                </div>
                <div class="card-footer bradb">
                    <h4 class="text-right m-1"> Total por día <span class="badge badge-light">7</span> </h4>
                </div>
            </div>
        </div>
        <!--Listo para envio-->
        <div class="col-xl-6 col-sm-6 mb-3">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between align-items-center pt-4 pb-0 bg-secondary brad">

                    <h2 class="card-title"> Empaquetado y en espera </h2>
                    <button onclick="refrescar_espera()" type="button" class="btn btn-light restaricon">
                        <i class="simple-icon-bell"></i>&nbsp;
                        <span id="contidadespera" class="badge badge-dark"></span>
                    </button>

                </div>
                <div class="card-body pt-0">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Forma de pago</th>
                                <th scope="col">Repartidor</th>
                                <th scope="col">Cliente</th>
                                <th scope="col">Enviado / Cancelado</th>
                            </tr>
                        </thead>
                        <tbody id="table-espera">

                            <!-- traer datos de base de datos por ajax -->

                        </tbody>
                    </table>
                </div>
                <div class="card-footer bradb">
                    <h4 class="text-right m-1"> Total por día <span class="badge badge-light">7</span> </h4>
                </div>


            </div>
        </div>
        <!--Enviado-->
        <div class="col-xl-6 col-sm-6 mb-3">
            <div class="card h-100">
                <div
                    class="card-header d-flex justify-content-between align-items-center pt-4 pb-0 bg-info brad text-white">

                    <h2 class="card-title"> Pedidos por cobrar </h2>
                    <button onclick="refrescar_enviados()" type="button" class="btn btn-light restaricon">
                        <i class="simple-icon-bell"></i>&nbsp;
                        <span id="contidadenviados" class="badge badge-dark"></span>
                    </button>

                </div>
                <div class="card-body pt-0">

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Repartidor</th>
                                <th scope="col">Total</th>
                                <th scope="col">Forma de pago</th>
                                <th scope="col">Pagado / Devolución</th>
                            </tr>
                        </thead>
                        <tbody id="table-enviados">

                            <!-- traer datos de base de datos por ajax -->

                        </tbody>
                    </table>
                </div>
                <div class="card-footer bradb">
                    <h4 class="text-right m-1"> Total por día <span class="badge badge-light">7</span> </h4>
                </div>
            </div>
        </div>

    </div>
</div>