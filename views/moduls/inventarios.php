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
                                        <h5 class="m-b-10">Mis Inventarios</h5>
                                        <p class="m-b-0"></p>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="dashboard"> <i class="fa fa-home"></i> </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#!">Inventarios</a>
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
                                                                <div class="row text-center" id="loader" style="position: absolute;top: 30px;left: 50%;color:#00BCD4;font-size:22px">

                                                                </div>
                                                                <div class="table-title" style="margin-top:-80px">
                                                                    <div class="row">
                                                                        <div class="col-lg-2 col-md-2 col-sm-2">
                                                                            <button type="button" class="btn nestable-danger" onclick=""><i class="fa fa-edit"></i>Inventario Generado</button>

                                                                        </div>
                                                                        <div class="col-lg-2 col-md-2 col-sm-2">
                                                                            <button type="button" class="btn nestable-warning" onclick=""><i class="fa fa-edit"></i>Segundo Conteo</button>

                                                                        </div>
                                                                        <div class="col-lg-2 col-md-2 col-sm-2">
                                                                            <button type="button" class="btn nestable-primary" onclick=""><i class="fa fa-eye"></i>En Revisión</button>

                                                                        </div>
                                                                        <div class="col-lg-2 col-md-2 col-sm-2">
                                                                            <button type="button" class="btn nestable-info" onclick=""><i class="fa fa-check"></i>Aprobado</button>

                                                                        </div>
                                                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                                                            <button type="button" class="btn nestable-success" onclick=""><i class="fa fa-flag-checkered"></i>Movimientos Generados</button>

                                                                        </div>
                                                                    </div>
                                                                    <div class="filter-group">
                                                                        <button type="button" class="btn nestable-info" id="btnRefresh"> <i class="fa fa-refresh"></i>Actualizar</button>
                                                                    </div>
                                                                </div>


                                                                <div class="table-filter filterParams">
                                                                    <div class="row">

                                                                        <div class="col-lg-12 col-md-12 col-sm-12">

                                                                            <div class="filter-group" style="display:none" id="btnListaSucursales">
                                                                                <span class="filter-icon"><i class="fa fa-filter"></i></span>
                                                                                <label>Sucursal</label>

                                                                                <select class="form-control" id="sucursal" onchange="listaInventarios();">
                                                                                    <option value="">Todas</option>
                                                                                    <option value="10">Sucursal San Manuel</option>
                                                                                    <option value="12">Sucursal Reforma</option>
                                                                                    <option value="13">Sucursal Santiago</option>
                                                                                    <option value="14">Sucursal Capu</option>
                                                                                    <option value="15">Sucursal Las Torres</option>

                                                                                </select>
                                                                            </div>

                                                                            <div class="filter-group">
                                                                                <span class="filter-icon"><i class="fa fa-filter"></i></span>
                                                                                <label>Año</label>

                                                                                <select class="form-control" id="anio" onchange="listaInventarios();">

                                                                                    <option value="2022" selected="">2022</option>
                                                                                    <option value="2023">2023</option>

                                                                                </select>
                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <span class="filter-icon"><i class="fa fa-filter"></i></span>
                                                                                <label>Mes</label>

                                                                                <select class="form-control" id="periodo" onchange="listaInventarios();">

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
                                                                                <span>Estatus</span>
                                                                                <select class="form-control" id="estatus" onchange="listaInventarios();">
                                                                                    <option value="">Todos</option>
                                                                                    <option value="0">Generado</option>
                                                                                    <option value="1">Segundo Conteo</option>
                                                                                    <option value="2">En Revisión</option>
                                                                                    <option value="3">Aprobado</option>
                                                                                    <option value="4">Movimientos Generados</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <span>Mostrar</span>
                                                                                <select class="form-control" id="per_page" onchange="listaInventarios();">

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
                                                                                <select class="form-control" id="campoOrden" onchange="listaInventarios();">
                                                                                    <option value="folio">Folio</option>
                                                                                    <option value="fecha">Fecha</option>

                                                                                </select>
                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <span>Orden</span>
                                                                                <select class="form-control" id="orden" onchange="listaInventarios();">
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
<div class="modal fade" id="modalMovimientosDocumento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header estilosTablas">
                <h4 class="modal-title" id="exampleModalLabel"><span id="textModal"></span></h4>

                <button type="button" class="close btnCerrarMovimientosDocumento" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12">

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div id="detalleMovimientosDocumento" name="detalleMovimientosDocumento">

                                <div class="table-responsive">
                                    <table class="table table-responsive table-striped table-hover " id="tablaMovimientosDocumento" style="max-height:450px">

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
                        <button type="button" class="btn nestable-danger btnCerrarMovimientosDocumento" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>