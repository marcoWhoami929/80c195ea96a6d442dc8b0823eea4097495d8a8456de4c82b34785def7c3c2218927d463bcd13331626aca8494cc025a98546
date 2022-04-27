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
                                                                    <div class="container col-lg-12 col-md-12 col-sm-12">
                                                                        <div class="row">
                                                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                                                <span>Documento Autorización</span>
                                                                                <h3 id="documento"></h3>
                                                                            </div>
                                                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                                                <span>Documento Origen</span>
                                                                                <h3 id="documentoOrigen"></h3>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                </div>

                                                                <div class="table-filter filterParams2" style="margin-top:2px">
                                                                    <div class="row">


                                                                        <div class="filter-group">
                                                                            <a href="autorizacionesCompra">
                                                                                <div class="homeCircle">
                                                                                    <center><i class="fa fa-arrow-left fa-1x"></i></center>
                                                                                </div>
                                                                            </a>
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
                                                                            <label>Fecha:</label>
                                                                            <input type="date" id="fecha" class="form-control">
                                                                        </div>

                                                                        <div class="filter-group">
                                                                            <label>Solicitante:</label>
                                                                            <select class="form-control" name="solicitante" id="solicitante" onchange="elegirSolicitante()">
                                                                                <option value="">Elegir</option>
                                                                                <?php
                                                                                if ($_SESSION["idGrupo"] == 0 || $_SESSION["idGrupo"] == 1) {
                                                                                    $idGrupo = null;
                                                                                } else {
                                                                                    $id = $_SESSION["id"];
                                                                                }

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
                                                                            <h4 id="nombreSolicitante"></h4>
                                                                        </div>
                                                                        <div class="filter-group">
                                                                            <button type="button" class="btn btn-warning" id="btnGenerarOrdenCompra" onclick="autorizacionCompra()" style="display:none"><i class="fa fa-paper-plane"></i>Generar orden</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="container col-lg-12 col-md-12 col-sm-12">
                                                                    <div class="row">
                                                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                                                            <label>Observaciones:</label>
                                                                            <textarea class="form-control" name="observaciones" id="observaciones" cols="4" rows="3"></textarea>
                                                                        </div>

                                                                    </div>
                                                                </div>

                                                                <div>
                                                                    <table class="table table-responsive table-striped table-hover ">
                                                                        <thead>
                                                                            <tr id="headMain">
                                                                                <th>#</th>
                                                                                <th>CODIGO</th>
                                                                                <th>DESCRIPCION</th>
                                                                                <th>ALMACEN</th>
                                                                                <th>UNIDADES</th>
                                                                                <th>UNIDAD</th>
                                                                                <th>COSTO</th>
                                                                                <th>IMPORTE</th>
                                                                                <th></th>
                                                                            </tr>
                                                                            <tr style="display:none" id="headSecond">
                                                                                <th>#</th>
                                                                                <th>CODIGO</th>
                                                                                <th>DESCRIPCION</th>
                                                                                <th>ALMACEN</th>
                                                                                <th>COSTO</th>
                                                                                <th>EXISTENCIAS</th>
                                                                                <th># UNIDADES</th>
                                                                                <th>UNIDAD</th>
                                                                                <th># APROBADO</th>
                                                                                <th># PENDIENTE</th>
                                                                                <th>$ IMPORTE</th>
                                                                                <th>$ APROBADO</th>
                                                                                <th>$ PENDIENTE</th>
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
                                                                        <div class="col-lg-3 col-md-3 col-md-3">
                                                                            <div class="container">
                                                                                <div class="row">
                                                                                    <div class="col-lg-7 col-md-7 col-sm-7" style="background:#00BCD4;color:#ffffff">
                                                                                        <h6>UNIDADES TOTALES:</h6>
                                                                                    </div>
                                                                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                                                                        <input type="text" class="form-control" style="width:150px;font-size:20px;font-weight:bold" id="cantidadTotal" readonly>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-3 col-md-3 col-md-3">
                                                                            <div class="container">
                                                                                <div class="row">
                                                                                    <div class="col-lg-7 col-md-7 col-sm-7" style="background:#00BCD4;color:#ffffff">
                                                                                        <h6>IMPORTE TOTAL:</h6>
                                                                                    </div>
                                                                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                                                                        <input type="text" class="form-control" style="width:150px;font-size:20px;font-weight:bold" id="importeTotal" readonly>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-3 col-md-3 col-md-3" id="unidadesSurtidas">
                                                                            <div class="container">
                                                                                <div class="row">
                                                                                    <div class="col-lg-7 col-md-7 col-sm-7" style="background:#00BCD4;color:#ffffff">
                                                                                        <h6>UNIDADES APROBADAS:</h6>
                                                                                    </div>
                                                                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                                                                        <input type="text" class="form-control" style="width:150px;font-size:20px;font-weight:bold" id="cantidadTotalAprobada" readonly>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-3 col-md-3 col-md-3" id="importeSurtido">
                                                                            <div class="container">
                                                                                <div class="row">
                                                                                    <div class="col-lg-7 col-md-7 col-sm-7" style="background:#00BCD4;color:#ffffff">
                                                                                        <h6>IMPORTE APROBADO:</h6>
                                                                                    </div>
                                                                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                                                                        <input type="text" class="form-control" style="width:150px;font-size:20px;font-weight:bold" id="importeTotalAprobado" readonly>
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