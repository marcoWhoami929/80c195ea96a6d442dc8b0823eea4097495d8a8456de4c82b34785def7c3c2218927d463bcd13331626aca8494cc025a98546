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
                                        <h5 class="m-b-10">INDICADORES</h5>
                                        <p class="m-b-0"></p>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="dashboard"> <i class="fa fa-home"></i> </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#!">Detalle</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Page-header end -->
                    <div class="pcoded-inner-content">
                        <!-- Main-body start -->
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" style="margin-left:80px">
                            <li class="nav-item">
                                <a style="font-size:14px" onclick="cargarIndicadoresUtilidad(1)" class="nav-link active" data-toggle="tab" href="#view1">Indicadores Utilidad</a>
                            </li>
                            <li class="nav-item">
                                <a style="font-size:14px" onclick="cargarIndicadoresInventarios(1)" class="nav-link" data-toggle="tab" href="#view2">Indicadores Traspasos</a>
                            </li>
                            <li class="nav-item">
                                <a style="font-size:14px" onclick="cargarIndicadoresDetalladoInventarios(1)" class="nav-link" data-toggle="tab" href="#view3">Indicadores Traspasos Detallado</a>
                            </li>

                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="container col-lg-12 col-md-12 col-sm-12  tab-pane active" id="view1">
                                <div class="main-body">
                                    <div class="pcoded-inner-content">
                                        <div class="main-body">
                                            <div class="page-wrapper">

                                                <div class="page-body">
                                                    <div class="row">
                                                        <div class="col-sm-12">

                                                            <div class="card">
                                                                <div class="card-header">


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
                                                                        <div class="table-title" style="margin-top:-80px;height:50px">
                                                                            <div class="filter-group">
                                                                                <button type="button" class="btn nestable-info" onclick="cargarIndicadoresUtilidad(1)"> <i class="fa fa-refresh"></i>Actualizar</button>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row text-center" id="loaderView1" style="position: absolute;top: 50px;left: 40%;color:#ffffff;font-size:22px">

                                                                        </div>


                                                                        <div class="table-filter filterParams">
                                                                            <div class="row">

                                                                                <div class="col-lg-12 col-md-12 col-sm-12">

                                                                                    <div class="filter-group">
                                                                                        <span class="filter-icon"><i class="fa fa-filter"></i></span>
                                                                                        <label>Año</label>

                                                                                        <select class="form-control" id="anio" onchange="cargarIndicadoresUtilidad(1);">
                                                                                            <option value="2021">2021</option>
                                                                                            <option value="2022" selected="">2022</option>
                                                                                            <option value="2023">2023</option>
                                                                                            <option value="2024">2024</option>
                                                                                            <option value="2025">2025</option>

                                                                                        </select>
                                                                                    </div>

                                                                                    <div class="filter-group">
                                                                                        <label>Estatus</label>
                                                                                        <span class="filter-icon"><i class="fa fa-filter"></i></span>
                                                                                        <select class="form-control" id="estatus" onchange="cargarIndicadoresUtilidad(1);">
                                                                                            <option value="0">0</option>
                                                                                            <option value="1">1</option>
                                                                                        </select>
                                                                                    </div>

                                                                                    <div class="filter-group">
                                                                                        <span>Mostrar</span>
                                                                                        <select class="form-control" id="per_page" onchange="cargarIndicadoresUtilidad(1);">

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
                                                                                        <select class="form-control" id="campoOrden" onchange="cargarIndicadoresUtilidad(1);">
                                                                                            <option value="centro">Centro</option>


                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="filter-group">
                                                                                        <span>Orden</span>
                                                                                        <select class="form-control" id="orden" onchange="cargarIndicadoresUtilidad(1);">
                                                                                            <option value="asc">Asc</option>

                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="filter-group">
                                                                                        <a onclick="generarReporteIndicadores('indicadoresUtilidad')"><i class="fa fa-file-excel-o fa-3x" aria-hidden="true"></i></a>
                                                                                    </div>


                                                                                </div>

                                                                                <div class="col-sm-3 text-right">
                                                                                    <div class="show-entries">


                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <div class="indicadoresUtilidad dataParams">

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
                            <div class="container col-lg-12 col-md-12 col-sm-12 tab-pane fade" id="view2">
                                <div class="main-body">
                                    <div class="pcoded-inner-content">
                                        <div class="main-body">
                                            <div class="page-wrapper">

                                                <div class="page-body">
                                                    <div class="row">
                                                        <div class="col-sm-12">

                                                            <div class="card">
                                                                <div class="card-header">


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
                                                                        <div class="table-title" style="margin-top:-80px;height:50px">
                                                                            <div class="filter-group">
                                                                                <button type="button" class="btn nestable-info" onclick="cargarIndicadoresInventarios(1)"> <i class="fa fa-refresh"></i>Actualizar</button>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row text-center" id="loaderView2" style="position: absolute;top: 50px;left: 40%;color:#ffffff;font-size:22px">

                                                                        </div>


                                                                        <div class="table-filter filterParams">
                                                                            <div class="row">

                                                                                <div class="col-lg-12 col-md-12 col-sm-12">

                                                                                    <div class="filter-group">
                                                                                        <span class="filter-icon"><i class="fa fa-filter"></i></span>
                                                                                        <label>Año</label>

                                                                                        <select class="form-control" id="anio" onchange="cargarIndicadoresInventarios(1);">
                                                                                            <option value="2021">2021</option>
                                                                                            <option value="2022" selected="">2022</option>
                                                                                            <option value="2023">2023</option>
                                                                                            <option value="2024">2024</option>
                                                                                            <option value="2025">2025</option>

                                                                                        </select>
                                                                                    </div>

                                                                                    <div class="filter-group">
                                                                                        <label>Estatus</label>
                                                                                        <span class="filter-icon"><i class="fa fa-filter"></i></span>
                                                                                        <select class="form-control" id="estatus" onchange="cargarIndicadoresInventarios(1);">
                                                                                            <option value="0">0</option>
                                                                                            <option value="1">1</option>
                                                                                        </select>
                                                                                    </div>

                                                                                    <div class="filter-group">
                                                                                        <span>Mostrar</span>
                                                                                        <select class="form-control" id="per_page" onchange="cargarIndicadoresInventarios(1);">

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
                                                                                        <select class="form-control" id="campoOrden" onchange="cargarIndicadoresInventarios(1);">
                                                                                            <option value="canal">Centro</option>


                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="filter-group">
                                                                                        <span>Orden</span>
                                                                                        <select class="form-control" id="orden" onchange="cargarIndicadoresInventarios(1);">
                                                                                            <option value="asc">Asc</option>

                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="filter-group">
                                                                                        <a onclick="generarReporteIndicadores('indicadoresMensual')"><i class="fa fa-file-excel-o fa-3x" aria-hidden="true"></i></a>
                                                                                    </div>


                                                                                </div>

                                                                                <div class="col-sm-3 text-right">
                                                                                    <div class="show-entries">


                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <div class="indicadores dataParams">

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
                            <div class="container col-lg-12 col-md-12 col-sm-12  tab-pane fade" id="view3">
                                <div class="main-body">
                                    <div class="pcoded-inner-content">
                                        <div class="main-body">
                                            <div class="page-wrapper">

                                                <div class="page-body">
                                                    <div class="row">
                                                        <div class="col-sm-12">

                                                            <div class="card">
                                                                <div class="card-header">


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
                                                                        <div class="table-title" style="margin-top:-80px;height:50px">
                                                                            <div class="filter-group">
                                                                                <button type="button" class="btn nestable-info" onclick="cargarIndicadoresDetalladoInventarios(1)"> <i class="fa fa-refresh"></i>Actualizar</button>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row text-center" id="loaderView3" style="position: absolute;top: 50px;left: 40%;color:#ffffff;font-size:22px">

                                                                        </div>


                                                                        <div class="table-filter filterParams">
                                                                            <div class="row">

                                                                                <div class="col-lg-12 col-md-12 col-sm-12">

                                                                                    <div class="filter-group">
                                                                                        <span class="filter-icon"><i class="fa fa-filter"></i></span>
                                                                                        <label>Año</label>

                                                                                        <select class="form-control" id="anio" onchange="cargarIndicadoresDetalladoInventarios(1);">
                                                                                            <option value="2021">2021</option>
                                                                                            <option value="2022" selected="">2022</option>
                                                                                            <option value="2023">2023</option>
                                                                                            <option value="2024">2024</option>
                                                                                            <option value="2025">2025</option>

                                                                                        </select>
                                                                                    </div>

                                                                                    <div class="filter-group">
                                                                                        <label>Estatus</label>
                                                                                        <span class="filter-icon"><i class="fa fa-filter"></i></span>
                                                                                        <select class="form-control" id="estatus" onchange="cargarIndicadoresDetalladoInventarios(1);">
                                                                                            <option value="0">0</option>
                                                                                            <option value="1">1</option>
                                                                                        </select>
                                                                                    </div>

                                                                                    <div class="filter-group">
                                                                                        <span>Mostrar</span>
                                                                                        <select class="form-control" id="per_page" onchange="cargarIndicadoresDetalladoInventarios(1);">

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
                                                                                        <select class="form-control" id="campoOrden" onchange="cargarIndicadoresDetalladoInventarios(1);">
                                                                                            <option value="canal">Centro</option>


                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="filter-group">
                                                                                        <span>Orden</span>
                                                                                        <select class="form-control" id="orden" onchange="cargarIndicadoresDetalladoInventarios(1);">
                                                                                            <option value="asc">Asc</option>

                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="filter-group">
                                                                                        <a onclick="generarReporteDetalladoIndicadores('indicadoresMensual')"><i class="fa fa-file-excel-o fa-3x" aria-hidden="true"></i></a>
                                                                                    </div>


                                                                                </div>

                                                                                <div class="col-sm-3 text-right">
                                                                                    <div class="show-entries">


                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <div class="indicadoresDetallado dataParams">

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
    </div>
</div>

<div class="modal fade" id="modalEntradasSalidasCanal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header estilosTablas">
                <h4 class="modal-title" id="exampleModalLabel"><span>DETALLE</span></h4>

                <button type="button" class="close btnCerrarDetalleIndicadores" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12">

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div id="detalleIndicadores" name="detalleIndicadores">

                                <div class="table-responsive">
                                    <table class="table" id="tablaDetalleIndicadores">

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
                        <button type="button" class="btn nestable-danger btnCerrarDetalleIndicadores" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalDetalleEntradasSalidas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header estilosTablas">
                <h4 class="modal-title" id="exampleModalLabel"><span id="textModal"></span></h4>

                <button type="button" class="close btnCerrarEntradasSalidas" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12">

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div id="detalleIEntradasSalidas" name="detalleEntradasSalidas">

                                <div class="table-responsive">
                                    <table class="table table-responsive table-striped table-hover " id="tablaDetalleEntradasSalidas" style="max-height:450px">

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
                        <button type="button" class="btn nestable-danger btnCerrarEntradasSalidas" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalDetalleDocumentoIndicadores" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header estilosTablas">
                <h4 class="modal-title" id="exampleModalLabel"><span id="textModal"></span></h4>

                <button type="button" class="close btnCerrarDetalleDocumentoIndicadores" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12">

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div id="detalleDocumentoIndicadores" name="detalleDocumentoIndicadores">

                                <div class="table-responsive">
                                    <table class="table table-responsive table-striped table-hover " id="tablaDetalleDocumentoIndicadores" style="max-height:450px">

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
                        <button type="button" class="btn nestable-danger btnCerrarDetalleDocumentoIndicadores" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>