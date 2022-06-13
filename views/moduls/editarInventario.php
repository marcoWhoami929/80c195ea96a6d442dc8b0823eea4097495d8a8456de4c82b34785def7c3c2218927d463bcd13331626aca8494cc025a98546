<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">

        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">

                <div class="pcoded-content">
                    <!-- Page-header start -->

                    <!-- Page-header end -->
                    <div class="pcoded-inner-content">
                        <!-- Main-body start -->
                        <div class="main-body">
                            <div class="pcoded-inner-content">
                                <div class="main-body">
                                    <div class="page-wrapper">
                                        <div class="page-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <div class="card-header-left">
                                                                <div class="row">


                                                                </div>
                                                            </div>
                                                            <div class="card-header-right">
                                                                <ul class="list-unstyled card-option">
                                                                    <li>
                                                                        <i class="fa fa fa-wrench open-card-option"></i>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa fa-window-maximize full-card"></i>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa fa-minus minimize-card"></i>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa fa-refresh reload-card"></i>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa fa-trash close-card"></i>
                                                                    </li>
                                                                </ul>
                                                            </div>

                                                        </div>
                                                        <div class="card-block table-border-style">
                                                            <div class="table-wrapper">
                                                                <div class="table-title" style="margin-top:-80px">

                                                                    <div class="container">
                                                                        <div class="row">
                                                                            <div class="col-lg-2 col-md-2 col-sm-2">
                                                                                <h3 id="documento"></h3>
                                                                            </div>

                                                                            <div class="col-lg-3 col-md-3 col-sm-3">
                                                                                <h3 id="almacenInventario"></h3>
                                                                            </div>
                                                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                                                <h4 id="nombreSolicitante"></h4>
                                                                            </div>
                                                                            <div class="col-lg-2 col-md-2 col-sm-2">
                                                                                <h4 id="estatusDocumento" style="color:transparent"></h4>
                                                                            </div>

                                                                            <div class="col-lg-2 col-md-2 col-sm-2">
                                                                                <h4 id="habilitadoDocumento" style="color:transparent"></h4>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="table-filter filterParams2" style="margin-top:2px">
                                                                    <div class="row">


                                                                        <div class="filter-group">
                                                                            <a href="inventarios">
                                                                                <div class="homeCircle">
                                                                                    <center><i class="fa fa-arrow-left fa-1x"></i></center>
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                        <div class="filter-group">
                                                                            <label>Fecha:</label>
                                                                            <input type="date" id="fecha" class="form-control">
                                                                        </div>
                                                                        <div class="filter-group">
                                                                            <label>Periodo:</label>
                                                                            <select class="form-control" name="periodo" id="periodo" disabled>
                                                                                <option value="1">Enero</option>
                                                                                <option value="2">Febrero</option>
                                                                                <option value="3">Marzo</option>
                                                                                <option value="4">Abril</option>
                                                                                <option value="5">Mayo</option>
                                                                                <option value="6">Junio</option>
                                                                                <option value="7">Julio</option>
                                                                                <option value="8">Agosto</option>
                                                                                <option value="9">Septiembre</option>
                                                                                <option value="10">Octubre</option>
                                                                                <option value="11">Noviembre</option>
                                                                                <option value="12">Diciembre</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="filter-group">
                                                                            <label>Almacen:</label>

                                                                            <input type="text" class="form-control" name="almacen" id="almacen">
                                                                        </div>
                                                                        <div class="filter-group">
                                                                            <label>Marca</label>

                                                                            <select class="form-control" name="marca" id="marca">
                                                                                <option value="">Todo</option>
                                                                                <?php

                                                                                $marcas = new ModelAdmon();
                                                                                $marcas = $marcas->mdlObtenerListaMarcasDekkerlab();

                                                                                foreach ($marcas as $key => $value) {
                                                                                    echo "<option value='" . $value["Marca"] . "'>" . $value['Marca'] . "</option>";
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="filter-group">
                                                                            <label>Familia:</label>
                                                                            <select class="form-control" name="familia" id="familia">
                                                                                <option value="">Todo</option>
                                                                                <?php

                                                                                $categorias = new ModelAdmon();
                                                                                $categorias = $categorias->mdlObtenerListaFamilias();

                                                                                foreach ($categorias as $key => $value) {
                                                                                    echo "<option value='" . $value["Id"] . "'>" . $value['Familia'] . "</option>";
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="filter-group">
                                                                            <label>Categoria:</label>
                                                                            <select class="form-control" name="categoria" id="categoria">
                                                                                <option value="">Todo</option>
                                                                                <?php

                                                                                $categorias = new ModelAdmon();
                                                                                $categorias = $categorias->mdlObtenerListaCategorias();

                                                                                foreach ($categorias as $key => $value) {
                                                                                    echo "<option value='" . $value["Id"] . "'>" . $value['Categoria'] . "</option>";
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>

                                                                        <div class="filter-group">
                                                                            <label>Anaquel:</label>
                                                                            <select class="form-control" name="anaquel" id="anaquel">
                                                                                <option value="">Todo</option>
                                                                                <?php

                                                                                $anaqueles = new ModelAdmon();
                                                                                $anaqueles = $anaqueles->mdlObtenerListaAnaqueles();

                                                                                foreach ($anaqueles as $key => $value) {
                                                                                    echo "<option value='" . $value["Anaquel"] . "'>" . $value['Anaquel'] . "</option>";
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="filter-group">
                                                                            <label>Repisa:</label>
                                                                            <select class="form-control" name="repisa" id="repisa">
                                                                                <option value="">Todo</option>
                                                                                <?php

                                                                                $repisas = new ModelAdmon();
                                                                                $repisas = $repisas->mdlObtenerListaRepisas();

                                                                                foreach ($repisas as $key => $value) {
                                                                                    echo "<option value='" . $value["Repisa"] . "'>" . $value['Repisa'] . "</option>";
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="filter-group">
                                                                            <label>Proveedor:</label>
                                                                            <select class="form-control" name="proveedor" id="proveedor">
                                                                                <option value="">Todo</option>
                                                                                <?php

                                                                                $proveedores = new ModelAdmon();
                                                                                $proveedores = $proveedores->mdlObtenerListaProveedores();

                                                                                foreach ($proveedores as $key => $value) {
                                                                                    echo "<option value='" . $value["Proveedor"] . "'>" . $value['Proveedor'] . "</option>";
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="filter-group" id="filtroDiferencias" style="display:none">
                                                                            <label>Filtrar Diferencias:</label>
                                                                            <select class="form-control" name="filtroDiferencia" id="filtroDiferencia" onchange="cargarListaProductosInventario(0)">
                                                                                <option value="">Todo</option>
                                                                                <option value="0">Diferencias</option>

                                                                            </select>
                                                                        </div>
                                                                        <div class="filter-group" style="display:none" id="divGenerarMovimientos" onchange="obtenerMovimientosInventario()">
                                                                            <label>Movimientos:</label>
                                                                            <select name="accionMovimiento" id="accionMovimiento" class="form-control">
                                                                                <option value="">Todos los Movimientos</option>
                                                                                <option value="Entrada">Entradas</option>
                                                                                <option value="Salida">Salidas</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="filter-group">
                                                                            <button type="button" class="btn nestable-success" onclick="actualizarInventario()" id="btnActualizarInventario" style="display:none"><i class="fa fa-flag"></i>Finalizar Inventario</button>
                                                                            <button type="button" class="btn nestable-success" onclick="aprobarInventario()" id="btnAprobarInventario" style="display:none"><i class="fa fa-check"></i>Aprobar</button>
                                                                            <button type="button" class="btn nestable-danger" onclick="desaprobarInventario()" id="btnDesaprobarInventario" style="display:none"><i class="fa fa-times"></i>Desaprobar</button>
                                                                            <button type="button" class="btn nestable-success" onclick="generarMovimientosInventario()" id="btnGenerarMovimientosInventario" style="display:none"><i class="fa fa-check"></i>Generar Movimientos</button>

                                                                        </div>
                                                                        <div class="filter-group">
                                                                            <a onclick="generarReporteEditarInventario()"><i class="fa fa-file-excel-o fa-3x" aria-hidden="true"></i></a>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <label>Observaciones:</label>
                                                                    <textarea class="form-control" name="observaciones" id="observaciones" cols="4" rows="3"></textarea>
                                                                </div>
                                                                <div class="col-lg-12 col-md-12 col-sm-12" style="height:30px">
                                                                    <div class="row text-center" id="loader" style="position: absolute;left: 30%;color:#00BCD4;font-size:22px">

                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <table class="table table-responsive table-striped table-hover centerDiv" id="tablaDetalleInventarios">
                                                                        <thead>
                                                                            <tr>
                                                                                <th></th>
                                                                                <th></th>
                                                                                <th></th>
                                                                                <th></th>
                                                                                <th></th>
                                                                                <th style="background:#33FF96"></th>
                                                                                <th style="background:#33FF96"></th>
                                                                                <th style="background:#33FF96">UNIDADES</th>
                                                                                <th style="background:#33FF96"></th>
                                                                                <th></th>
                                                                                <th style="background:#FF7D33"></th>
                                                                                <th style="background:#FF7D33">IMPORTES</th>
                                                                                <th style="background:#FF7D33"></th>
                                                                                <th></th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>#</th>
                                                                                <th>CODIGO</th>
                                                                                <th>DESCRIPCION</th>
                                                                                <th>ALMACEN</th>
                                                                                <th>UNIDAD</th>
                                                                                <th>EXISTENCIAS</th>
                                                                                <th>EXISTENCIAS CONV</th>
                                                                                <th>INVENTARIO</th>
                                                                                <th>DIFERENCIAS</th>
                                                                                <th>COSTO</th>
                                                                                <th>EXISTENCIAS</th>
                                                                                <th>INVENTARIO</th>
                                                                                <th>DIFERENCIAS</th>
                                                                                <th>Accion</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody class="data" id="myDIV">

                                                                        </tbody>
                                                                    </table>
                                                                    <div class="dataFail"></div>
                                                                </div>
                                                                <div class="container col-lg-12 col-md-12 col-sm-12">
                                                                    <div class="row">

                                                                        <div class="col-lg-4 col-md-4 col-md-4">
                                                                            <div class="container">
                                                                                <div class="row">
                                                                                    <div class="col-lg-7 col-md-7 col-sm-7" style="background:#00BCD4;color:#ffffff">
                                                                                        <h5>#EXISTENCIA:</h5>
                                                                                    </div>
                                                                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                                                                        <input type="text" class="form-control" style="width:150px;font-size:20px;font-weight:bold" id="existenciaTotalUnidades" readonly>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4 col-md-4 col-md-4">
                                                                            <div class="container">
                                                                                <div class="row">
                                                                                    <div class="col-lg-7 col-md-7 col-sm-7" style="background:#00BCD4;color:#ffffff">
                                                                                        <h5>#INVENTARIO:</h5>
                                                                                    </div>
                                                                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                                                                        <input type="text" class="form-control" style="width:150px;font-size:20px;font-weight:bold" id="inventarioTotalUnidades" readonly>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4 col-md-4 col-md-4">
                                                                            <div class="container">
                                                                                <div class="row">
                                                                                    <div class="col-lg-7 col-md-7 col-sm-7" style="background:#00BCD4;color:#ffffff">
                                                                                        <h5>#DIFERENCIAS:</h5>
                                                                                    </div>
                                                                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                                                                        <input type="text" class="form-control" style="width:150px;font-size:20px;font-weight:bold" id="diferenciasTotalUnidades" readonly>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="container col-lg-12 col-md-12 col-sm-12">
                                                                    <div class="row">

                                                                        <div class="col-lg-4 col-md-4 col-md-4">
                                                                            <div class="container">
                                                                                <div class="row">
                                                                                    <div class="col-lg-7 col-md-7 col-sm-7" style="background:#00BCD4;color:#ffffff">
                                                                                        <h5>$ EXISTENCIA:</h5>
                                                                                    </div>
                                                                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                                                                        <input type="text" class="form-control" style="width:150px;font-size:20px;font-weight:bold" id="existenciaTotalImporte" readonly>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4 col-md-4 col-md-4">
                                                                            <div class="container">
                                                                                <div class="row">
                                                                                    <div class="col-lg-7 col-md-7 col-sm-7" style="background:#00BCD4;color:#ffffff">
                                                                                        <h5>$ INVENTARIO:</h5>
                                                                                    </div>
                                                                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                                                                        <input type="text" class="form-control" style="width:150px;font-size:20px;font-weight:bold" id="inventarioTotalImporte" readonly>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4 col-md-4 col-md-4">
                                                                            <div class="container">
                                                                                <div class="row">
                                                                                    <div class="col-lg-7 col-md-7 col-sm-7" style="background:#00BCD4;color:#ffffff">
                                                                                        <h5>$ DIFERENCIAS:</h5>
                                                                                    </div>
                                                                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                                                                        <input type="text" class="form-control" style="width:150px;font-size:20px;font-weight:bold" id="diferenciasTotalImporte" readonly>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="styleSelector"> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="loadDocument" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h5 class="modal-title" id="titleLoadDocument"></h5>
                </center>

            </div>
            <div class="modal-body">
                <center><img src="views/images/loader.gif" alt=""></center>
            </div>

        </div>
    </div>
</div>