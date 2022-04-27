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
                                                                    <h3>Mi Almacén</h3>
                                                                    <small>*Atajo Para Buscador Productos: <strong>CTRL + X</strong></small>
                                                                    <div class="filter-group">
                                                                        <button type="button" class="btn btn-warning" onclick="productosAlmacenes()"> <i class="fa fa-refresh"></i>Actualizar</button>
                                                                    </div>
                                                                </div>
                                                                <div class="row text-center" id="loader" style="position: absolute;top: 80px;left: 40%;color:#ffffff;font-size:22px">

                                                                </div>
                                                                <div class="table-filter filterParams2" style="margin-top:2px">
                                                                    <div class="row">
                                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                                            <div class="row">
                                                                                <div style="width: 100%; margin: auto;">

                                                                                    <input class="form-control" id="arregloProductos">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filter-group">
                                                                            <button type="button" id="searchProductoVenta" class="btn btn-primary" data-toggle="modal" data-target="#modalProductosVenta"> <i class="fa fa-search"></i>Productos</button>
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
                                                                            <label>Marca</label>
                                                                            <span class="filter-icon"><i class="fa fa-filter"></i></span>
                                                                            <select class="form-control selectorMarca" name="marca[]" multiple="multiple" id="marca">

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
                                                                            <label>Categoria:</label>
                                                                            <select class="form-control selectorCategoria" name="categoria" id="categoria" onchange="productosAlmacenes();">
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
                                                                            <label>Clasificacion:</label>
                                                                            <select class="form-control" name="clasificacion" id="clasificacion" onchange="productosAlmacenes();">
                                                                                <option value="">Todas</option>
                                                                                <option value="A">A</option>
                                                                                <option value="B">B</option>
                                                                                <option value="C">C</option>
                                                                                <option value="D">D</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="filter-group">
                                                                            <label>Almacen:</label>
                                                                            <select class="form-control" name="almacen" id="almacen" onchange="productosAlmacenes();">
                                                                                <?php
                                                                                if ($_SESSION["idGrupo"] == 0) {
                                                                                    $idGrupo = null;
                                                                                } else {
                                                                                    $idGrupo = $_SESSION["idGrupo"];
                                                                                }

                                                                                $listaAlmacenes = ModelAdmon::mdlListaAlmacenes($idGrupo);
                                                                                foreach ($listaAlmacenes as $key => $value) {
                                                                                    echo '<option value="' . $value["cidalmacen"] . '" idAlmacen="' . $value["cidalmacenold"] . '">' . $value["cnombrealmacen"] . '</option>';
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>

                                                                        <div class="filter-group">
                                                                            <span>Mostrar</span>
                                                                            <select class="form-control" id="per_page" onchange="productosAlmacenes();">

                                                                                <option>15</option>
                                                                                <option>20</option>
                                                                                <option>50</option>
                                                                                <option>100</option>
                                                                                <option>500</option>
                                                                                <option selected="">1000</option>
                                                                                <option>1500</option>
                                                                                <option>2000</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="filter-group">
                                                                            <span>Campo Orden</span>
                                                                            <select class="form-control" id="campoOrden" onchange="productosAlmacenes();">

                                                                                <option value="CCODIGOPRODUCTO">Codigo</option>
                                                                                <option value="EXISTENCIAS">Existencias</option>
                                                                                <option value="CNOMBREPRODUCTO">Producto</option>

                                                                            </select>
                                                                        </div>
                                                                        <div class="filter-group">
                                                                            <span>Orden</span>
                                                                            <select class="form-control" id="orden" onchange="productosAlmacenes();">
                                                                                <option value="asc">Asc</option>
                                                                                <option value="desc">Desc</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="data">

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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
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
                            <div class="col-lg-9 col-md-9 col-sm-9">

                                <input type="text" class="form-control" id="nombreProductoSearch" placeholder="Buscar producto" onkeyup="loadProductosVenta(1)">
                                <input type="hidden" class="form-control" id="clasificacionVenta" value="cargarListaProductosAlmacenes">
                                <input type="hidden" class="form-control" id="clasificacionVenta2" value="cargarListaProductosAlmacenes">
                            </div>

                        </div>
                    </div>
                </form>
                <div id="loader2" style="position: absolute;	text-align: center;	top: 55px;	width: 100%;display:none;"></div><!-- Carga gif animado -->
                <div class="outer_div2"></div><!-- Datos ajax Final -->
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalDetalleSalidas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header estilosTablas">
                <h4 class="modal-title" id="exampleModalLabel"><span id="conceptoCompra">DETALLE SALIDAS</span></h4>

                <button type="button" class="close btnCerrarDetalleSalidas" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12">

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div id="detalleSalidas" name="detalleSalidas">

                                <div class="table-responsive">
                                    <h4 id="codigoDetalle"></h4>
                                    <table class="table" id="tablaDetalleSalidas">

                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <br>
            <div class="modal-footer">

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <button type="button" class="btn nestable-danger btnCerrarDetalleSalidas" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    shortcut.add("Ctrl+X", function() {
        document.getElementById("searchProductoVenta").click();
    });
    $('#arregloProductos').tagEditor({
        initialTags: JSON.parse(localStorage.getItem("arrayProductos")),
        delimiter: ', ',
        forceLowercase: false,
        beforeTagDelete: function(field, editor, tags, val) {
            var arrayProductos = localStorage.getItem("arrayProductos");
            removeItemFromArregloBusqueda(arrayProductos, val, "arrayProductos")
        }

    });
</script>