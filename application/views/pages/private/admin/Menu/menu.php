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
                        <li class="m-2"><a href="#clickable1" onclick="get_menu('1')">
                                <h3> Combos <i class="iconsminds-cookies"></i> </h3>
                            </a></li>
                        <li class="done m-2"><a href="#clickable2" onclick="get_menu('2')">
                                <h3> Platillos <i class="iconsminds-hamburger"></i> </h3>
                            </a></li>
                        <li class="done m-2"><a href="#clickable3" onclick="get_menu('3')">
                                <h3> Bebidas <i class="iconsminds-coffee-to-go"></i> </h3>
                            </a></li>
                    </ul>

                    <div class="card-body">
                        <div id="clickable1">
                            <div id="combos-log">
                                <table  cellpadding="0" cellspacing="0" width="100%" class="table_loader">
                                    <tr>
                                        <th class="col3">
                                            <span></span>
                                        </th>
                                        <th class="col3">
                                            <span></span>
                                        </th>
                                        <th class="col3">
                                            <span></span>
                                        </th>
                                        <th class="col3">
                                            <span></span>
                                        </th>
                                        <th class="col3">
                                            <span></span>
                                        </th>
                                    </tr>
                                    <tr>
                                      <td class="col3">
                                        <span class="img"></span>
                                      </td>
                                      <td class="col3">
                                        <span></span>	
                                      </td>
                                      <td class="col3">
                                        <span></span>	
                                      </td>
                                      <td class="col3">
                                        <span></span>	
                                      </td>
                                      <td class="col3">
                                        <span></span>	
                                      </td>
                                    </tr>
                                    <tr>
                                      <td class="col3">
                                        <span class="img"></span>
                                      </td>
                                      <td class="col3">
                                        <span></span>	
                                      </td>
                                      <td class="col3">
                                        <span></span>	
                                      </td>
                                      <td class="col3">
                                        <span></span>	
                                      </td>
                                      <td class="col3">
                                        <span></span>	
                                      </td>
                                    </tr>
                                    <tr>
                                      <td class="col3">
                                        <span class="img"></span>
                                      </td>
                                      <td class="col3">
                                        <span></span>	
                                      </td>
                                      <td class="col3">
                                        <span></span>	
                                      </td>
                                      <td class="col3">
                                        <span></span>	
                                      </td>
                                      <td class="col3">
                                        <span></span>	
                                      </td>
                                    </tr>
                                
                                </table>
                            </div>

                            <div id="combos" class="d-none">
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
                                                <h4>Tiempo de preparación</h4>
                                            </th>
                                            <th scope="col" class="text-center">
                                                <h4>Status</h4>
                                            </th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableCombos">
                                       
                                    </tbody>
                                </table>
                                </div>

                                </div>
    

                        <div id="clickable2">
                            <div id="platillos-log">
                                <table  cellpadding="0" cellspacing="0" width="100%" class="table_loader">
                                    <tr>
                                        <th class="col3">
                                            <span></span>
                                        </th>
                                        <th class="col3">
                                            <span></span>
                                        </th>
                                        <th class="col3">
                                            <span></span>
                                        </th>
                                        <th class="col3">
                                            <span></span>
                                        </th>
                                        <th class="col3">
                                            <span></span>
                                        </th>
                                    </tr>
                                    <tr>
                                      <td class="col3">
                                        <span class="img"></span>
                                      </td>
                                      <td class="col3">
                                        <span></span>	
                                      </td>
                                      <td class="col3">
                                        <span></span>	
                                      </td>
                                      <td class="col3">
                                        <span></span>	
                                      </td>
                                      <td class="col3">
                                        <span></span>	
                                      </td>
                                    </tr>
                                    <tr>
                                      <td class="col3">
                                        <span class="img"></span>
                                      </td>
                                      <td class="col3">
                                        <span></span>	
                                      </td>
                                      <td class="col3">
                                        <span></span>	
                                      </td>
                                      <td class="col3">
                                        <span></span>	
                                      </td>
                                      <td class="col3">
                                        <span></span>	
                                      </td>
                                    </tr>
                                    <tr>
                                      <td class="col3">
                                        <span class="img"></span>
                                      </td>
                                      <td class="col3">
                                        <span></span>	
                                      </td>
                                      <td class="col3">
                                        <span></span>	
                                      </td>
                                      <td class="col3">
                                        <span></span>	
                                      </td>
                                      <td class="col3">
                                        <span></span>	
                                      </td>
                                    </tr>
                                
                                </table>
                            </div>
                            <div id="platillos" class="d-none">
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
                                                <h4>Tiempo de preparación</h4>
                                            </th>
                                            <th scope="col" class="text-center">
                                                <h4>Status</h4>
                                            </th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="tablePlatillos">
                                
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="clickable3">
                            <div id="bebidas-log">
                                <table  cellpadding="0" cellspacing="0" width="100%" class="table_loader">
                                    <tr>
                                        <th class="col3">
                                            <span></span>
                                        </th>
                                        <th class="col3">
                                            <span></span>
                                        </th>
                                        <th class="col3">
                                            <span></span>
                                        </th>
                                        <th class="col3">
                                            <span></span>
                                        </th>
                                        <th class="col3">
                                            <span></span>
                                        </th>
                                    </tr>
                                    <tr>
                                      <td class="col3">
                                        <span class="img"></span>
                                      </td>
                                      <td class="col3">
                                        <span></span>	
                                      </td>
                                      <td class="col3">
                                        <span></span>	
                                      </td>
                                      <td class="col3">
                                        <span></span>	
                                      </td>
                                      <td class="col3">
                                        <span></span>	
                                      </td>
                                    </tr>
                                    <tr>
                                      <td class="col3">
                                        <span class="img"></span>
                                      </td>
                                      <td class="col3">
                                        <span></span>	
                                      </td>
                                      <td class="col3">
                                        <span></span>	
                                      </td>
                                      <td class="col3">
                                        <span></span>	
                                      </td>
                                      <td class="col3">
                                        <span></span>	
                                      </td>
                                    </tr>
                                    <tr>
                                      <td class="col3">
                                        <span class="img"></span>
                                      </td>
                                      <td class="col3">
                                        <span></span>	
                                      </td>
                                      <td class="col3">
                                        <span></span>	
                                      </td>
                                      <td class="col3">
                                        <span></span>	
                                      </td>
                                      <td class="col3">
                                        <span></span>	
                                      </td>
                                    </tr>
                                
                                </table>
                            </div>
                            <div id="bebidas" class="d-none">
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
                                                <h4>Tiempo de preparación</h4>
                                            </th>
                                            <th scope="col" class="text-center">
                                                <h4>Status</h4>
                                            </th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBebidas">
                                
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>