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
                            <div class="page-wrapper">
                                <!-- Page-body start -->
                                <div class="page-body">
                                    <div class="row">
                                        <div class=" container col-lg-12 col-md-12 col-sm-12">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2 col-sm-2">
                                                    <div class="form-group">


                                                        <select class="form-control" name="añoDashboard" id="añoDashboard" onchange="setDiasSemana()">
                                                            <option value="2013">2013</option>
                                                            <option value="2014">2014</option>
                                                            <option value="2015">2015</option>
                                                            <option value="2016">2016</option>
                                                            <option value="2017">2017</option>
                                                            <option value="2018">2018</option>
                                                            <option value="2019">2019</option>
                                                            <option value="2020">2020</option>
                                                            <option value="2021">2021</option>
                                                            <option value="2022" selected="">2022</option>

                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-3">
                                                    <div class="form-group">


                                                        <select class="form-control" name="semanaDashboard" id="semanaDashboard" onchange="setDiasSemana()">
                                                          
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>
                                                            <option value="11">11</option>
                                                            <option value="12">12</option>
                                                            <option value="13">13</option>
                                                            <option value="14">14</option>
                                                            <option value="15">15</option>
                                                            <option value="16">16</option>
                                                            <option value="17">17</option>
                                                            <option value="18">18</option>
                                                            <option value="19">19</option>
                                                            <option value="20">20</option>
                                                            <option value="21">21</option>
                                                            <option value="22">22</option>
                                                            <option value="23">23</option>
                                                            <option value="24">24</option>
                                                            <option value="25">25</option>
                                                            <option value="26">26</option>
                                                            <option value="27">27</option>
                                                            <option value="28">28</option>
                                                            <option value="29">29</option>
                                                            <option value="30">30</option>
                                                            <option value="31">31</option>
                                                            <option value="32">32</option>
                                                            <option value="33">33</option>
                                                            <option value="34">34</option>
                                                            <option value="35">35</option>
                                                            <option value="36">36</option>
                                                            <option value="37">37</option>
                                                            <option value="38">38</option>
                                                            <option value="39">39</option>
                                                            <option value="40">40</option>
                                                            <option value="41">41</option>
                                                            <option value="42">42</option>
                                                            <option value="43">43</option>
                                                            <option value="44">44</option>
                                                            <option value="45">45</option>
                                                            <option value="46">46</option>
                                                            <option value="47">47</option>
                                                            <option value="48">48</option>
                                                            <option value="49">49</option>
                                                            <option value="50">50</option>
                                                            <option value="51">51</option>
                                                            <option value="52">52</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-2">
                                                    <div class="form-group">
                                                        <select class="form-control" name="diaDashboard" id="diaDashboard">

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-2">
                                                    <div class="form-group">

                                                        <button class="btn btn-primary" type="button" onClick="dataDashboard()">Buscar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <h4 id='numberWeek' class='m-b-0' style='color:#00BCD4'></h4>

                                            <h5 id='periodWeek' class='m-b-0' style='color:#00BCD4'></h5>
                                        </div>
                                        <div class="col-sm-12 col-xl-12 m-b-30">
                                            <h4 class="sub-title">Elegir que se muestra en el tablero</h4>
                                            <span>VENTAS SEMANA NUM <strong id="numSemana"></strong></span>
                                            <label class="switch">
                                                <input type="checkbox" id="checkSalesDay" name="checkSalesDay" onClick="accionesVista('ventasDay')">
                                                <span class="slider round"></span>
                                            </label>
                                            <span>VENTAS YEAR TO DAY</span>
                                            <label class="switch">
                                                <input type="checkbox" id="checkSalesYearDay" name="checkSalesYearDay" onClick="accionesVista('ventasYearToDay')">
                                                <span class="slider round"></span>
                                            </label>
                                            <span>VENTAS YEAR TO WEEK</span>
                                            <label class="switch">
                                                <input type="checkbox" id="checkSalesYearWeek" name="checkSalesYearWeek" onClick="accionesVista('ventasYearToWeek')">
                                                <span class="slider round"></span>
                                            </label>
                                            <span>VENTAS YEAR TO MONTH</span>
                                            <label class="switch">
                                                <input type="checkbox" id="checkSalesYearMonth" name="checkSalesYearMonth" onClick="accionesVista('ventasYearToMonth')">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                        <div class="col-lg-12 col-xl-12 col-md-12">
                                            <div class="row">

                                                <!-- sale card start -->
                                                <div class="col-lg-2 col-md-2 col-sm-2">
                                                    <div class="card bg-c-purple total-card divVentaData" onclick="redireccionAcion('MAYOREO')">
                                                        <div class="card-block">
                                                            <div class="text-left">
                                                                <h5 class="m-b-0" style="color:white">CEDIS</h5>
                                                                <h4 id="dashboardMayoreo"></h4>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-2">
                                                    <div class="card bg-c-orenge total-card divVentaData" onclick="redireccionAcion('ECOMMERCE')">
                                                        <div class="card-block">
                                                            <div class="text-left">
                                                                <h5 class="m-b-0" style="color:white">E-COMMERCE</h5>
                                                                <h4 id="dashboardEcommerce"></h4>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-2">
                                                    <div class="card bg-c-green total-card divVentaData" onclick="redireccionAcion('FLOTILLAS')">
                                                        <div class="card-block">
                                                            <div class="text-left">
                                                                <h5 class="m-b-0" style="color:white">FLOTILLAS</h5>
                                                                <h4 id="dashboardFlotillas"></h4>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-lg-2 col-md-2 col-sm-2">
                                                    <div class="card bg-c-red total-card divVentaData" onclick="redireccionAcion('RUTAS')">
                                                        <div class="card-block">
                                                            <div class="text-left">
                                                                <h5 class="m-b-0" style="color:white">RUTAS</h5>
                                                                <h4 id="dashboardRutas"></h4>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-2">
                                                    <div class="card bg-c-blue total-card divVentaData">
                                                        <div class="card-block">
                                                            <div class="text-left">
                                                                <h5 class="m-b-0" style="color:white">TIENDAS</h5>
                                                                <h4 id="dashboardTiendas"></h4>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-2">
                                                    <div class="card bg-c-danger total-card divVentaData" style="border:1px solid #00BCD4">
                                                        <div class="card-block">
                                                            <div class="text-left">
                                                                <h5 class="m-b-0" style="color:#00BCD4">ACUMULADO CANALES</h5>
                                                                <h4 style="color:#00BCD4" id="dashboardTotales"></h4>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-sm-6 col-md-2">
                                                    <div class="card text-center order-visitor-card divVentaData" onclick="redireccionAcion('CAPU')">
                                                        <div class="card-block">
                                                            <h6 class="m-b-0">CAPU</h6>
                                                            <h4 class="m-t-15 m-b-15" id="dataCapu"></h4>
                                                            </h4>
                                                            <p class="m-b-0">VENTA ACUMULADA</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-sm-6 col-md-2">
                                                    <div class="card text-center order-visitor-card divVentaData" onclick="redireccionAcion('REFORMA')">
                                                        <div class="card-block">
                                                            <h6 class="m-b-0">REFORMA</h6>
                                                            <h4 class="m-t-15 m-b-15" id="dataReforma"></h4>
                                                            </h4>
                                                            <p class="m-b-0">VENTA ACUMULADA</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-sm-6 col-md-2">
                                                    <div class="card text-center order-visitor-card divVentaData" onclick="redireccionAcion('SAN MANUEL')">
                                                        <div class="card-block">
                                                            <h6 class="m-b-0">SAN MANUEL</h6>
                                                            <h4 class="m-t-15 m-b-15" id="dataSanManuel"></h4>
                                                            </h4>
                                                            <p class="m-b-0">VENTA ACUMULADA</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-sm-6 col-md-2">
                                                    <div class="card text-center order-visitor-card divVentaData" onclick="redireccionAcion('SANTIAGO')">
                                                        <div class="card-block">
                                                            <h6 class="m-b-0">SANTIAGO</h6>
                                                            <h4 class="m-t-15 m-b-15" id="dataSantiago"></h4>
                                                            </h4>
                                                            <p class="m-b-0">VENTA ACUMULADA</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-sm-6 col-md-2">
                                                    <div class="card text-center order-visitor-card divVentaData" onclick="redireccionAcion('LAS TORRES')">
                                                        <div class="card-block">
                                                            <h6 class="m-b-0">LAS TORRES</h6>
                                                            <h4 class="m-t-15 m-b-15" id="dataLasTorres"></h4>
                                                            </h4>
                                                            <p class="m-b-0">VENTA ACUMULADA</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-2">
                                                    <div class="card bg-c-danger total-card divVentaData" style="border:1px solid #00BCD4">
                                                        <div class="card-block">
                                                            <div class="text-left">
                                                                <h5 class="m-b-0" style="color:#00BCD4">ACUMULADO TIENDAS</h5>
                                                                <h4 style="color:#00BCD4" id="dashboardTotalesTiendas"></h4>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-sm-6 col-md-2">
                                                    <div class="card text-center order-visitor-card divVentaData" onclick="redireccionAcion('CARGO')">
                                                        <div class="card-block">
                                                            <h6 class="m-b-0">NOTAS DE CARGO</h6>
                                                            <h4 class="m-t-15 m-b-15" id="dataNotasCargo"></h4>
                                                            </h4>
                                                            <p class="m-b-0"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-sm-6 col-md-2">
                                                    <div class="card text-center order-visitor-card divVentaData" onclick="redireccionAcion('CREDITO')">
                                                        <div class="card-block">
                                                            <h6 class="m-b-0">NOTAS DE CRÉDITO</h6>
                                                            <h4 class="m-t-15 m-b-15" id="dataNotasCredito"></h4>
                                                            </h4>
                                                            <p class="m-b-0"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-sm-6 col-md-2">
                                                    <div class="card text-center order-visitor-card divVentaData" onclick="redireccionAcion('DEVOLUCION')">
                                                        <div class="card-block">
                                                            <h6 class="m-b-0">NOTAS DE DEVOLUCIÓN</h6>
                                                            <h4 class="m-t-15 m-b-15" id="dataNotasDevolucion"></h4>
                                                            </h4>
                                                            <p class="m-b-0"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-sm-6 col-md-2">
                                                    <div class="card text-center order-visitor-card divVentaData" onclick="redireccionAcion('FACTURAS')">
                                                        <div class="card-block">
                                                            <h6 class="m-b-0">FACTURAS</h6>
                                                            <h4 class="m-t-15 m-b-15" id="facturas"></h4>
                                                            </h4>
                                                            <p class="m-b-0"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-2 col-md-2 col-sm-2">
                                                    <div class="card bg-c-danger total-card divVentaData" style="border:1px solid #00BCD4">
                                                        <div class="card-block">
                                                            <div class="text-left">
                                                                <h5 class="m-b-0" style="color:#00BCD4">ACUMULADO CONCEPTOS</h5>
                                                                <h4 style="color:#00BCD4" id="totalesConceptos"></h4>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6" id="containerVentasDiariasBar">

                                                    <div id="graficoVentasDiariasBar" data-highcharts-chart="0"></div>

                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <figure class="highcharts-figure">
                                                        <div id="graficoVentasDiariasPie"></div>

                                                    </figure>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">

                                                    <div class="card text-center">
                                                        <div class="card-block">
                                                            <?php
                                                            $hoy = date("Y-m-d", strtotime($fecha_actual . "- 1 days"));
                                                            $anterior = date("Y-m-d", strtotime($fecha_actual . "- 1 year -1 days"));
                                                            echo "<h4>YEAR TO DAY </h4><h5 class='m-b-0'>2021-01-01 - $anterior VS 2022-01-01 - $hoy</h5>";
                                                            ?>
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <div class="ventasYearToDay">

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">

                                                    <div class="card text-center">
                                                        <div class="card-block">
                                                            <figure class="highcharts-figure">

                                                                <div id="graficoYearToDayBar"></div>

                                                            </figure>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-sm-12 col-md-12 col-lg-12">

                                                    <div class="card text-center">
                                                        <div class="card-block">
                                                            <?php
                                                            $arreglo = array();
                                                            $arreglo2 = array();
                                                            $week = date('W');
                                                            $year = 2021;
                                                            $year2 = "2022";

                                                            for ($i = 1; $i < 7; $i++) {
                                                                $dia = date('Y-m-d', strtotime(strip_tags($year) . "W" . str_pad($week, 2, '0', STR_PAD_LEFT) . $i));
                                                                array_push($arreglo, $dia);
                                                            }

                                                            for ($i = 1; $i < 7; $i++) {
                                                                $dia2 = date('Y-m-d', strtotime(strip_tags($year2) . "W" . str_pad($week, 2, '0', STR_PAD_LEFT) . $i));
                                                                array_push($arreglo2, $dia2);
                                                            }

                                                            $anterior = $arreglo[0] . " - " . $arreglo[5];
                                                            $hoy = $arreglo2[0] . " - " . $arreglo2[5];
                                                            echo "<h4>YEAR TO WEEK</h4><h5 class='m-b-0'>$anterior VS $hoy</h5>";
                                                            ?>
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <div class="ventasYearToWeek">

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-sm-12 col-md-12 col-lg-12">

                                                    <div class="card text-center">
                                                        <div class="card-block">
                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                <div id="graficoYearToWeekBar"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12 col-lg-12">

                                                    <div class="card text-center">
                                                        <div class="card-block">
                                                            <?php
                                                            $hoy = "2022";
                                                            $anterior = "2021";
                                                            echo "<h4>YEAR TO MONTH</h4><h5 class='m-b-0'>$anterior VS $hoy</h5>";
                                                            ?>
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <div class="ventasYearToMonth">

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-sm-12 col-md-12 col-lg-12">

                                                    <div class="card text-center">
                                                        <div class="card-block">
                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                <div id="graficoYearToMonthBar"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                                <div id="styleSelector"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style type="text/css">
        .highcharts-figure,
        .highcharts-data-table table {
            min-width: 310px;
            max-width: 800px;
            margin: 1em auto;
        }

        #graficoVentasDiariasBar {
            height: 400px;
        }

        #graficoVentasDiariasPie {
            height: 400px;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #EBEBEB;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }

        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
            padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }
    </style>