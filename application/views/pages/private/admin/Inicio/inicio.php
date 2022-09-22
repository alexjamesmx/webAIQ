<div class="container-fluid">
            <div class="row">
                <!--pendiente-->
                <div class="col-xl-6 col-sm-6 mb-3">
                    <div class="card h-100">
                        <div class="card-header d-flex justify-content-between align-items-center pt-4 pb-0 brad">

                            <h2 class="card-title"> Solicitudes de pedido </h2>
                            <button type="button" class="btn btn-primary restaricon">
                                <i class="simple-icon-bell"></i>&nbsp;
                                <span id="contidadporacetpar" class="badge badge-light"></span>
                            </button>

                        </div>
                        <div class="card-body">

                            <table class="data-table table-striped data-table-scrollable responsive nowrap"
                                data-order="[[ 1, &quot;desc&quot; ]]">
                                <thead>
                                    <tr class="text-center">
                                        <th class="mx-3">Id</th>
                                        <th class="mx-3">Nombre del Cliente</th>
                                        <th class="mx-3">Total</th>
                                        <th class="mx-3">Fecha y Hora de entrada</th>
                                        <th class="mx-3">Detalle del pedido</th>
                                        <th></th>
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
                        <div
                            class="card-header d-flex justify-content-between align-items-center pt-4 pb-0 bg-primary brad">

                            <h2 class="card-title"> Aceptados (Preparando) </h2>
                            <button type="button" class="btn btn-light restaricon">
                                <i class="simple-icon-bell"></i>&nbsp;
                                <span id="contidadpreparando" class="badge badge-dark"></span>
                            </button>

                        </div>
                        <div class="card-body pt-0">
                            <table class="data-table table-striped data-table-scrollable responsive nowrap"
                                data-order="[[ 1, &quot;desc&quot; ]]">
                                <thead>
                                    <tr class="text-center">
                                        <th> Platillos en Preparacion</th>
                                        <th> Tiempo que a pasado</th>
                                        <th> Id </th>
                                        <th> ¿Salido de Cosina?</th>
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
                        <div
                            class="card-header d-flex justify-content-between align-items-center pt-4 pb-0 bg-secondary brad">

                            <h2 class="card-title"> Empaquetado y en Espera </h2>
                            <button type="button" class="btn btn-light restaricon">
                                <i class="simple-icon-bell"></i>&nbsp;
                                <span id="contidadespera" class="badge badge-dark"></span>
                            </button>

                        </div>
                        <div class="card-body pt-0">
                            <table class="data-table table-striped data-table-scrollable responsive nowrap"
                                data-order="[[ 1, &quot;desc&quot; ]]">
                                <thead>
                                    <tr class="text-center">
                                        <th>Id</th>
                                        <th>Total</th>
                                        <th>Forma de Pago</th>
                                        <th>Repartidor</th>
                                        <th>Cliente</th>
                                        <th>Pedido</th>
                                        <th></th>
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
                            <button type="button" class="btn btn-light restaricon">
                                <i class="simple-icon-bell"></i>&nbsp;
                                <span id="contidadenviados" class="badge badge-dark"></span>
                            </button>

                        </div>
                        <div class="card-body pt-0">

                            <table class="data-table table-striped data-table-scrollable responsive nowrap"
                                data-order="[[ 1, &quot;desc&quot; ]]">
                                <thead>
                                    <tr class="text-center">
                                        <th>Id</th>
                                        <th>Repartidor</th>
                                        <th>Total</th>
                                        <th>Forma de Pago</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="table-enviados">

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