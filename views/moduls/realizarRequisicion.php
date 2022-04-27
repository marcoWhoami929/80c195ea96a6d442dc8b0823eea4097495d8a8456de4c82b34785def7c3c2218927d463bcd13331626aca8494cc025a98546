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
                                                                    <h3>Solicitud de Materiales</h3>
                                                                </div>

                                                                <div class="table-filter filterParams2" style="margin-top:2px">
                                                                    <div class="row">


                                                                        <div class="filter-group">
                                                                            <a href="requisiciones">
                                                                                <div class="homeCircle">
                                                                                    <center><i class="fa fa-arrow-left fa-1x"></i></center>
                                                                                </div>
                                                                            </a>
                                                                        </div>


                                                                        <div class="filter-group">
                                                                            <button type="button" id="searchProductoVenta" class="btn btn-primary" data-toggle="modal" data-target="#modalProductosVenta"> <i class="fa fa-search"></i>Productos</button>
                                                                        </div>

                                                                        <div class="filter-group">
                                                                            <label>Fecha:</label>
                                                                            <input type="date" id="fecha" class="form-control">
                                                                        </div>
                                                                        <div class="filter-group">
                                                                            <label>Prioridad:</label>
                                                                            <select class="form-control" name="prioridad" id="prioridad">
                                                                                <option value="1">Urgente</option>
                                                                                <option value="2">Extra Urgente</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="filter-group">
                                                                            <label>Almacen:</label>
                                                                            <select class="form-control" name="almacenDestino" id="almacenDestino">
                                                                                <?php
                                                                                $idGrupo = $_SESSION["idGrupo"];
                                                                                $listaAlmacenes = ModelAdmon::mdlListaAlmacenes($idGrupo);
                                                                                foreach ($listaAlmacenes as $key => $value) {
                                                                                    echo '<option value="' . $value["cidalmacen"] . '">' . $value["cnombrealmacen"] . '</option>';
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="filter-group">
                                                                            <label>Solicitante:</label>
                                                                            <select class="form-control" name="solicitante" id="solicitante" onchange="elegirSolicitante()">
                                                                                <option value="">Elegir</option>
                                                                                <?php
                                                                                $id = $_SESSION["id"];
                                                                                $solicitantes = ControllerAdmon::ctrListarSolicitantes($id);
                                                                                foreach ($solicitantes as $key => $value) {
                                                                                    if ($key == 0) {
                                                                                        echo '<option value="' . $value["id"] . '" selected="">' . $value["nombre"] . '</option>';
                                                                                    } else {
                                                                                        echo '<option value="' . $value["id"] . '">' . $value["nombre"] . '</option>';
                                                                                    }
                                                                                }

                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="filter-group">
                                                                            <button type="button" class="btn btn-danger" onclick="generarDocumento('requisiciones')"><i class="fa fa-edit"></i>Generar</button>
                                                                        </div>
                                                                        <div class="filter-group">
                                                                            <h4 id="nombreSolicitante"></h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <label>Observaciones:</label>
                                                                    <textarea class="form-control" name="observaciones" id="observaciones" cols="4" rows="3"></textarea>
                                                                </div>
                                                                <div>
                                                                    <table class="table table-responsive table-striped table-hover centerDiv">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>#</th>
                                                                                <th>CODIGO</th>
                                                                                <th>DESCRIPCION</th>
                                                                                <th>ALMACEN</th>
                                                                                <th>UNIDADES</th>
                                                                                <th>UNIDAD MED</th>
                                                                                <th>COSTO</th>
                                                                                <th>IMPORTE</th>
                                                                                <th></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody class="data">

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
                                                                                        <h5>PIEZAS TOTALES:</h5>
                                                                                    </div>
                                                                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                                                                        <input type="text" class="form-control" style="width:150px;font-size:20px;font-weight:bold" id="cantidadTotal" readonly>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4 col-md-4 col-md-4">
                                                                            <div class="container">
                                                                                <div class="row">
                                                                                    <div class="col-lg-7 col-md-7 col-sm-7" style="background:#00BCD4;color:#ffffff">
                                                                                        <h5>IMPORTE TOTAL:</h5>
                                                                                    </div>
                                                                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                                                                        <input type="text" class="form-control" style="width:150px;font-size:20px;font-weight:bold" id="importeTotal" readonly>
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
<div class="modal" id="modalProductosVenta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#00BCD4;color:white">
                <h5 class="modal-title">Buscar Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <div class="col-lg-12 col-md-12 col-sm-12"></div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">

                                <input type="text" class="form-control" id="nombreProducto" placeholder="Buscar producto" onkeyup="loadProductosSolicitudes(1)">
                            </div>

                        </div>
                    </div>
                </form>
                <div id="loader2" style="position: absolute;	text-align: center;	top: 55px;	width: 100%;display:none;"></div><!-- Carga gif animado -->
                <div class="dataProductos"></div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
            </div>
        </div>
    </div>
</div>