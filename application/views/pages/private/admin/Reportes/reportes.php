<div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>Reportes</h1>
                    <div class="separator mb-5"></div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <table class="data-table data-table-scrollable responsive nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Total</th>
                                    <th>Duración (Min)</th>
                                    <th>Detalle Pedido</th>
                                    <th>Fecha/Hora Aceptado</th>
                                    <th>Status</th>
                                    <th>Fecha/Hora Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <td>1</td>
                                    <td>$549</td>
                                    <td>19:42(-5:42)</td>
                                    <td>
                                        <p>Café MOKA</p>
                                        <p>Matcha</p>
                                    </td>
                                    <td>
                                        <p>2022/09/02</p>
                                        <p>16:22</p>
                                    </td>
                                    <td>1</td>
                                    <td>
                                        <p>2022/09/02</p>
                                        <p>17:56</p>
                                    </td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 mb-5">
                        <h6 class="mb-4 d-flex justify-content-center">PEDIDO VS TIEMPO</h6>
                        <div class="chart-container chart">
                            <canvas id="areaChart"></canvas>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-5">
                        <h6 class="mb-4 d-flex justify-content-center">TIMEPO ON VS OFF</h6>
                        <div class="chart-container chart">
                            <canvas id="pieChart"></canvas>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-5">
                        <h6 class="mb-4 d-flex justify-content-center">GANANCIAS</h6>
                        <div class="chart-container chart">
                            <canvas id="productChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 mb-5">
                        <h6 class="mb-4 d-flex justify-content-center">PEDIDOS</h6>
                        <h10 class="mb-4 d-flex justify-content-center">(RECHAZADO-DEVOLUCIÓN-PAGADOS)</h10>
                        <div class="chart-container chart">
                            <canvas id="pieChartNoShadow"></canvas>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-5">
                        <h6 class="mb-4 d-flex justify-content-center">MÉTODO DE PAGO</h6>
                        <div class="chart-container chart">
                            <canvas id="productChartNoShadow"></canvas>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-5">
                        <h6 class="mb-4 d-flex justify-content-center">TOP 5 MEJORES ALIMENTOS</h6>
                        <div class="chart-container chart">
                            <canvas id="categoryChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>