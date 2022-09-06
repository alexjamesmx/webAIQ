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
                        <table class="data-table data-table-feature ">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Total</th>
                                    <th>Duración (Min)</th>
                                    <th>Detalle Pedido</th>
                                    <th>Fecha/Hora Aceptado</th>
                                    <th>Fecha/Hora No Aceptado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>$549</td>
                                    <td>15:00(0)</td>
                                    <td>
                                        <p>Café MOKA</p>
                                        <p>Matcha</p>
                                    </td>
                                    <td>
                                        <p>2022/09/02</p>
                                        <p>16:22</p>
                                    </td>
                                    <td>
                                        <p>2022/09/02</p>
                                        <p>12:09</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>$549</td>
                                    <td>15:00(0)</td>
                                    <td>
                                        <p>Café MOKA</p>
                                        <p>Matcha</p>
                                    </td>
                                    <td>
                                        <p>2022/09/02</p>
                                        <p>16:22</p>
                                    </td>
                                    <td>
                                        <p>2022/09/02</p>
                                        <p>12:09</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>$549</td>
                                    <td>15:00(0)</td>
                                    <td>
                                        <p>Café MOKA</p>
                                        <p>Matcha</p>
                                    </td>
                                    <td>
                                        <p>2022/09/02</p>
                                        <p>16:22</p>
                                    </td>
                                    <td>
                                        <p>2022/09/02</p>
                                        <p>12:09</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>$549</td>
                                    <td>15:00(0)</td>
                                    <td>
                                        <p>Café MOKA</p>
                                        <p>Matcha</p>
                                    </td>
                                    <td>
                                        <p>2022/09/02</p>
                                        <p>16:22</p>
                                    </td>
                                    <td>
                                        <p>2022/09/02</p>
                                        <p>12:09</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>$128</td>
                                    <td>17:43(-2:43)</td>
                                    <td>
                                        <p>Café MUACK</p>
                                        <p>Matcha</p>
                                    </td>
                                    <td>
                                        <p>2022/09/02</p>
                                        <p>16:22</p>
                                    </td>
                                    <td>
                                        <p>2022/09/02</p>
                                        <p>12:09</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>$54</td>
                                    <td>18:15(-3:15)</td>
                                    <td>
                                        <p>Café LINDO</p>
                                        <p>Matcha</p>
                                    </td>
                                    <td>
                                        <p>2022/09/02</p>
                                        <p>16:22</p>
                                    </td>
                                    <td>
                                        <p>2022/09/02</p>
                                        <p>12:09</p>
                                    </td>
                                </tr>
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