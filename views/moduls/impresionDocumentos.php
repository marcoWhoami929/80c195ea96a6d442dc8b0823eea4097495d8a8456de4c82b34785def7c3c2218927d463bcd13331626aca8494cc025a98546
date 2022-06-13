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
                                        <h5 class="m-b-10">Impresión Masiva de Documentos</h5>
                                        <p class="m-b-0"></p>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="dashboard"> <i class="fa fa-home"></i> </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#!">Impresión de Documentos</a>
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

                                                                    </div>
                                                                    <div class="filter-group">
                                                                        <button type="button" class="btn nestable-info" id="btnRefresh" onclick="listarDocumentosNoImpresos(1)"> <i class="fa fa-refresh"></i>Actualizar</button>
                                                                    </div>
                                                                </div>


                                                                <div class="table-filter filterParams">
                                                                    <div class="row">

                                                                        <div class="col-lg-12 col-md-12 col-sm-12">

                                                                            <div class="filter-group">
                                                                                <span class="filter-icon"><i class="fa fa-filter"></i></span>
                                                                                <label>Elegir Documento</label>

                                                                                <select class="form-control" id="idDocumentoDe" onchange="listarDocumentosNoImpresos(1);">

                                                                                    <option value="32">Entradas</option>
                                                                                    <option value="33">Salidas</option>
                                                                                    <option value="34">Traspasos</option>

                                                                                </select>
                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <span class="filter-icon"><i class="fa fa-filter"></i></span>
                                                                                <label>Elegir Concepto</label>

                                                                                <select class="form-control" id="idConcepto" onchange="listarDocumentosNoImpresos(1);">
                                                                                    <option value="">TODOS</option>
                                                                                    <option value="34">Entrada al Alm. Capu</option>
                                                                                    <option value="37">Entrada al Alm. General</option>
                                                                                    <option value="3023">Entrada al Alm. Reforma</option>
                                                                                    <option value="3024">Entrada al Alm. San Manuel</option>
                                                                                    <option value="3025">Entrada al Alm. Santiago</option>
                                                                                    <option value="3026">Entrada al Alm. Torres</option>
                                                                                    <option value="3036">Entrada al Alm. Laboratorio</option>
                                                                                    <option value="35">Salida del Alm. Capu</option>
                                                                                    <option value="38">Salida del Alm. General</option>
                                                                                    <option value="3027">Salida del Alm. Reforma</option>
                                                                                    <option value="3028">Salida del Alm. San Manuel</option>
                                                                                    <option value="3029">Salida del Alm. Santiago</option>
                                                                                    <option value="3030">Salida del Alm. Torres</option>
                                                                                    <option value="3037">Salida del Alm. Laboratorio</option>
                                                                                    <option value="36">Traspaso Alm. Capu</option>
                                                                                    <option value="3031">Traspaso Alm. Reforma</option>
                                                                                    <option value="3032">Traspaso Alm. San Manuel</option>
                                                                                    <option value="3033">Traspaso Alm. Santiago</option>
                                                                                    <option value="3034">Traspaso Alm. Torres</option>
                                                                                    <option value="3035">Traspaso Alm. General</option>
                                                                                    <option value="3038">Traspaso Alm. Laboratorio</option>
                                                                                    <option value="3066">Traspaso Ruta A</option>
                                                                                    <option value="3067">Traspaso Ruta B</option>
                                                                                    <option value="3068">Traspaso Ruta C</option>


                                                                                </select>
                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <span>Estatus</span>
                                                                                <select class="form-control" id="estatus" onchange="listarDocumentosNoImpresos(1);">
                                                                                    <option value="0">Vigente</option>
                                                                                    <option value="1">Cancelada</option>

                                                                                </select>
                                                                            </div>

                                                                            <div class="filter-group">
                                                                                <span>Campo Orden</span>
                                                                                <select class="form-control" id="campoOrden" onchange="listarDocumentosNoImpresos(1);">
                                                                                    <option value="CFOLIO">Folio</option>
                                                                                    <option value="CFECHA">Fecha</option>

                                                                                </select>
                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <span>Orden</span>
                                                                                <select class="form-control" id="orden" onchange="listarDocumentosNoImpresos(1);">
                                                                                    <option value="desc">Desc</option>
                                                                                    <option value="asc">Asc</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <button type="button" class="btn btn-info" style="background:#00BCD4;color:white" onclick="impresionDocumentos()"><i class="fa fa-print"></i>Impresion masiva</button>
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