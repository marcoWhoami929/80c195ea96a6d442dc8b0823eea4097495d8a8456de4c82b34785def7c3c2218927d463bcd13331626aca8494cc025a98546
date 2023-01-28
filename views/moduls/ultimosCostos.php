<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">

        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">

                <div class="pcoded-content">
                    <!-- Page-header start -->
                    <div class="page-header">
                        <div class="page-block">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <div class="page-header-title">
                                        <h5 class="m-b-10">ULTIMOS COSTOS</h5>
                                        <p class="m-b-0">Listado Ulitimos Costos Productos</p>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="dashboard"> <i class="fa fa-home"></i> </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#!">Ultimos Costos</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                                            <h5></h5>
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
                                                                <div class="table-title">
                                                                    <div class="row">
                                                                        <div class="col-sm-8">
                                                                            <h2>ULTIMOS COSTOS</h2>

                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <button type="button" class="btn nestable-danger" id="btnDescargarReporteCostos" onclick="descargarReporteCostos();"><i class="fa fa-file-excel-o" aria-hidden="true"></i></button>
                                                                            <a onclick="limpiarFiltros('3')"><i class="fa fa-trash fa-3x" aria-hidden="true"></i></a>
                                                                        </div>


                                                                    </div>
                                                                </div>

                                                                <div class="row text-center" id="loader" style="position: absolute;top: 80px;left: 40%;color:#00BCD4;font-size:22px">

                                                                </div>


                                                                <div class="table-filter filterParams">
                                                                    <div class="row">

                                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                                            <div style="width: 100%; margin: auto;">
                                                                                <input id="arregloProductosCostos">
                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <span class="filter-icon"><i class="fa fa-filter"></i></span>
                                                                                <label>Empresa</label>

                                                                                <select class="form-control" id="empresa" onchange="cargarUltimosCostos(1);">

                                                                                    <option value="PINTURAS">PINTURAS</option>
                                                                                    <option value="FLEX">FLEX</option>
                                                                                    <option value="TORRES">TORRES</option>
                                                                                    <option value="DEKKERLAB" selected="">DEKKERLAB</option>

                                                                                </select>
                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <span class="filter-icon"><i class="fa fa-filter"></i></span>
                                                                                <label>Año</label>

                                                                                <select class="form-control" id="anio" onchange="cargarUltimosCostos(1);">

                                                                                    <option value="2013">2013</option>
                                                                                    <option value="2014">2014</option>
                                                                                    <option value="2015">2015</option>
                                                                                    <option value="2016">2016</option>
                                                                                    <option value="2017">2017</option>
                                                                                    <option value="2018">2018</option>
                                                                                    <option value="2019">2019</option>
                                                                                    <option value="2020">2020</option>
                                                                                    <option value="2021">2021</option>
                                                                                    <option value="2022">2022</option>
                                                                                    <option value="2023" selected="">2023</option>

                                                                                </select>
                                                                            </div>

                                                                            <div class="filter-group">
                                                                                <button type="button" id="searchProductoVenta" class="btn btn-primary" data-toggle="modal" data-target="#modalProductosVenta"> <i class="fa fa-search"></i>Productos</button>


                                                                            </div>

                                                                            <div class="filter-group">
                                                                                <span>Mostrar</span>
                                                                                <select class="form-control" id="per_page" onchange="cargarUltimosCostos(1);">

                                                                                    <option>15</option>
                                                                                    <option>20</option>
                                                                                    <option>50</option>
                                                                                    <option>100</option>
                                                                                    <option selected="">500</option>
                                                                                    <option>1000</option>
                                                                                    <option>1500</option>
                                                                                    <option>2000</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <span>Campo Orden</span>
                                                                                <select class="form-control" id="campoOrden" onchange="cargarUltimosCostos(1);">

                                                                                    <option value="codigo">Codigo</option>
                                                                                    <option value="nombre">Producto</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <span>Orden</span>
                                                                                <select class="form-control" id="orden" onchange="cargarUltimosCostos(1);">
                                                                                    <option value="desc">Desc</option>
                                                                                    <option value="asc">Asc</option>
                                                                                </select>
                                                                            </div>

                                                                            <!----->
                                                                        </div>

                                                                        <div class="col-sm-3 text-right">
                                                                            <div class="show-entries">


                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                </div>
                                                                <div class="datos_ajax">

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

<div class="modal fade" id="modalverdatosdocumento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header estilosTablas">
                <h4 class="modal-title" id="exampleModalLabel"><span id="conceptoCompra"></span></h4>

                <button type="button" class="close btnCerrarDetalleCompra" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12">

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div id="detalleCompra" name="detalleCompra">

                                <div class="table-responsive">
                                    <table class="table" id="tablaDetalleCompra">

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
                        <button type="button" class="btn nestable-danger btnCerrarDetalleCompra" data-dismiss="modal">Cerrar</button>
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
                                <input type="hidden" class="form-control" id="clasificacionVenta" value="ultimosCostos">
                                <input type="hidden" class="form-control" id="clasificacionVenta2" value="ultimosCostos">
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
<script type="text/javascript">
    /*ACCESOS DIRECTOS CLIENTES*/
    shortcut.add("Ctrl+X", function() {
        document.getElementById("searchProductoVenta").click();
    });

    $('#arregloProductosCostos').tagEditor({
        initialTags: JSON.parse(localStorage.getItem("arrayProductosCostos")),
        delimiter: ', ',
        forceLowercase: false,
        beforeTagDelete: function(field, editor, tags, val) {
            var arrayProductosCostos = localStorage.getItem("arrayProductosCostos");
            removeItemFromArregloBusqueda(arrayProductosCostos, val, "arrayProductosCostos")
        }

    });
</script>