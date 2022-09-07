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
                                        <h5 class="m-b-10">ANALISIS DE VENTAS</h5>
                                        <p class="m-b-0"></p>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="dashboard"> <i class="fa fa-home"></i> </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#!">Ventas Por Canal Filtro</a>
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
                                                            <h3>Ventas Por Canal Filtro</h3>
                                                         
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
                                                               

                                                                <div class="row text-center" id="loader" style="position: absolute;top: 80px;left: 40%;color:#00BCD4;font-size:22px">

                                                                </div>


                                                                <div class="table-filter filterParams">
                                                                    <div class="row">

                                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                                           
                                                                            <div class="filter-group">
                                                                                <a href="dashboard">
                                                                                    <div class="homeCircle">
                                                                                        <center><i class="fa fa-home fa-2x"></i></center>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <span>Fecha Inicio Filtro Año 1</span>
                                                                                <input type="date" name="fechaInicio1" id="fechaInicio1" class="form-control">
                                                                               
                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <span>Fecha Final Filtro Año 1</span>
                                                                                 <input type="date" name="fechaFinal1" id="fechaFinal1" class="form-control">
                                                                               
                                                                            </div>
                                                                             <div class="filter-group">
                                                                                <span>Fecha Inicio Filtro Año 2</span>
                                                                                <input type="date" name="fechaInicio2" id="fechaInicio2" class="form-control">
                                                                               
                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <span>Fecha Final Filtro Año 2</span>
                                                                                 <input type="date" name="fechaFinal2" id="fechaFinal2" class="form-control">
                                                                               
                                                                            </div>
                                                                            <div class="filter-group">
                                                                               <button class='btn btn-primary' onclick="cargarVentasCanalFiltro(1)">Buscar</button>
                                                                            </div>
                                                                          
                                                                            


                                                                        </div>

                                                                        <div class="col-sm-3 text-right">
                                                                            <div class="show-entries">


                                                                            </div>
                                                                        </div>




                                                                    </div>
                                                                </div>
                                                                <div class="ventasCanalFiltroData dataParams">

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
