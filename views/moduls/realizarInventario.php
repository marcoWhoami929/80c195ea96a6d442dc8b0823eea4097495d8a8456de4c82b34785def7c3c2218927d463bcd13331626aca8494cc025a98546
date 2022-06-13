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

                                                                            <div class="col-lg-12 col-md-12 col-sm-12" style="text-align:left">
                                                                                <h3 id="nombreSolicitante"></h3>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="filter-group">
                                                                        <!--
                                                                        <button type="button" class="btn nestable-info" id="btnRefresh" onclick="cargarListaProductosInventarios(1);"> <i class="fa fa-refresh"></i>Actualizar</button>
-->
                                                                        <button type="button" class="btn nestable-success" onclick="generarInventario()"><i class="fa fa-edit"></i>Generar</button>
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
                                                                            <!--
                                                                            <label>Empresa:</label>
                                                                            <select class="form-control" name="empresaInventario" id="empresaInventario" onchange="setFiltrosInventario()">
                                                                                <option value="PINTURAS">PINTURAS</option>
                                                                                <option value="FLEX">FLEX</option>
                                                                            </select>
-->
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
                                                                            <select class="form-control" name="almacen" id="almacen" onchange="cargarListaProductosInventarios(1);">
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
                                                                            <label>Marca</label>
                                                                            <span class="filter-icon"><i class="fa fa-filter"></i></span>
                                                                            <select class="form-control selectorMarca" multiple="multiple" name="marca[]" id="marca">

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
                                                                            <select class="form-control selectorFamilia" multiple="multiple" name="familia[]" id="familia">
                                                                                <option value=""></option>
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
                                                                            <select class="form-control selectorCategoria" multiple="multiple" name="categoria[]" id="categoria">
                                                                                <option value=""></option>
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
                                                                            <select class="form-control selectorAnaquel" multiple="multiple" name="anaquel[]" id="anaquel">
                                                                                <option value=""></option>
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
                                                                            <select class="form-control selectorRepisa" multiple="multiple" name="repisa[]" id="repisa">
                                                                                <option value=""></option>
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
                                                                            <select class="form-control selectorProveedor" multiple="multiple" name="proveedor[]" id="proveedor">
                                                                                <option value=""></option>
                                                                                <?php

                                                                                $proveedores = new ModelAdmon();
                                                                                $proveedores = $proveedores->mdlObtenerListaProveedores();

                                                                                foreach ($proveedores as $key => $value) {
                                                                                    echo "<option value='" . $value["Proveedor"] . "'>" . $value['Proveedor'] . "</option>";
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="filter-group">
                                                                            <label>Realizador:</label>
                                                                            <select class="form-control" name="realizador" id="realizador" onchange="elegirRealizador()">
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
                                                                            <span>Campo Orden</span>
                                                                            <select class="form-control" id="campoOrden" onchange="cargarListaProductosInventarios(1);">

                                                                                <option value="amax.CANAQUEL">Anaquel</option>
                                                                                <option value="amax.CREPISA">Repisa</option>
                                                                                <option value="amax.CZONA">Proveedor</option>
                                                                                <option value="aprod.CCODIGOPRODUCTO">Codigo Producto</option>

                                                                            </select>
                                                                        </div>
                                                                        <div class="filter-group">
                                                                            <span>Orden</span>
                                                                            <select class="form-control" id="orden" onchange="cargarListaProductosInventarios(1);">
                                                                                <option value="asc">Asc</option>
                                                                                <option value="desc">Desc</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="filter-group">
                                                                            <a onclick="generarReporteRealizarInventario()"><i class="fa fa-file-excel-o fa-3x" aria-hidden="true"></i></a>
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
                                                                    <table class="table table-responsive table-striped table-hover centerDiv" id="tablaInventarios">
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
                                                                                <th style="background:#33FF96">CONVER</th>
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
<script type="text/javascript">
    function Verificar() {
        var tecla = window.event.keyCode;
        if (tecla == 116) {
            var mensaje = 'Si recarga la página perdera todos los datos ingresados, ¿Deseas recargar la página?';
            if (confirm(mensaje) === true) {

                location.reload();

            } else {
                event.keyCode = 0;
                event.returnValue = false;
            }
        }
    }
    window.addEventListener('keydown', Verificar);
</script>