<?php
error_reporting(0);
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
function color($porcentaje)
{
    if ($porcentaje > 40) {
        $color = "green";
    } else if ($porcentaje < 40 and $porcentaje > 35) {
        $color = "orange";
    } else if ($porcentaje < 35) {
        $color = "red";
    }
    return $color;
}
if ($action == 'ventasCanal') {
    include('../clases/detalleVentas.php');
    $database = new detalleVentas();
    //Recibir variables enviadas
    $query = strip_tags($_REQUEST['query']);
    $vista = strip_tags($_REQUEST['vista']);
    $año = strip_tags($_REQUEST['anio']);
    $estatus = strip_tags($_REQUEST['estatus']);
    $canal = strip_tags($_REQUEST['canal']);
    $centro = strip_tags($_REQUEST['centro']);
    $agente = strip_tags($_REQUEST['agente']);
    $per_page = intval($_REQUEST['per_page']);
    $campo = strip_tags($_REQUEST['campo']);
    $orden = strip_tags($_REQUEST['orden']);

    $tables = "dbo.admDocumentos";
    $campos = "*";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;
    $search = array("query" => $query, "año" => $año, "estatus" => $estatus, "canal" => $canal, "centro" => $centro, "agente" => $agente, "per_page" => $per_page, "offset" => $offset, "campo" => $campo, "orden" => $orden);
    //consulta principal para recuperar los datos
    $datos = $database->getVentasCanal($tables, $campos, $search);

    $countAll = $database->getCounter();
    $row = $countAll;

    if ($row > 0) {
        $numrows = $countAll;
    } else {
        $numrows = 0;
    }
    $total_pages = ceil($numrows / $per_page);

    //Recorrer los datos recuperados

    if ($numrows > 0) {
?> <div class="fixedColumns">
            <table class="table table-responsive table-striped table-hover ">
                <thead>
                    <tr>
                        <th>CANAL</th>
                        <th>CENTRO DE TRABAJO</th>

                        <th>ENERO</th>
                        <th>FEBRERO</th>
                        <th>MARZO</th>
                        <th>ABRIL</th>
                        <th>MAYO</th>
                        <th>JUNIO</th>
                        <th>JULIO</th>
                        <th>AGOSTO</th>
                        <th>SEPTIEMBRE</th>
                        <th>OCTUBRE</th>
                        <th>NOVIEMBRE</th>
                        <th>DICIEMBRE</th>
                        <th>TOTALES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    $mes1 = 0;
                    $mes2 = 0;
                    $mes3 = 0;
                    $mes4 = 0;
                    $mes5 = 0;
                    $mes6 = 0;
                    $mes7 = 0;
                    $mes8 = 0;
                    $mes9 = 0;
                    $mes10 = 0;
                    $mes11 = 0;
                    $mes12 = 0;
                    $mesTotales = 0;

                    foreach ($datos as $key => $row) {
                        $mes1 += $row['1'];
                        $mes2 += $row['2'];
                        $mes3 += $row['3'];
                        $mes4 += $row['4'];
                        $mes5 += $row['5'];
                        $mes6 += $row['6'];
                        $mes7 += $row['7'];
                        $mes8 += $row['8'];
                        $mes9 += $row['9'];
                        $mes10 += $row['10'];
                        $mes11 += $row['11'];
                        $mes12 += $row['12'];
                        $mesTotales += $row['Totales'];
                    ?>
                        <tr>
                            <th><?= $row['canalComercial']; ?></th>
                            <td><?= $row['centroTrabajo']; ?></td>
                            <td style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('<?= $row['canalComercial']; ?>','Canal','','<?= $_REQUEST['anio'] ?>','1','')">$<?= number_format($row['1'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('<?= $row['canalComercial']; ?>','Canal','','<?= $_REQUEST['anio'] ?>','2','')">$<?= number_format($row['2'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('<?= $row['canalComercial']; ?>','Canal','','<?= $_REQUEST['anio'] ?>','3','')">$<?= number_format($row['3'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('<?= $row['canalComercial']; ?>','Canal','','<?= $_REQUEST['anio'] ?>','4','')">$<?= number_format($row['4'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('<?= $row['canalComercial']; ?>','Canal','','<?= $_REQUEST['anio'] ?>','5','')">$<?= number_format($row['5'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('<?= $row['canalComercial']; ?>','Canal','','<?= $_REQUEST['anio'] ?>','6','')">$<?= number_format($row['6'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('<?= $row['canalComercial']; ?>','Canal','','<?= $_REQUEST['anio'] ?>','7','')">$<?= number_format($row['7'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('<?= $row['canalComercial']; ?>','Canal','','<?= $_REQUEST['anio'] ?>','8','')">$<?= number_format($row['8'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('<?= $row['canalComercial']; ?>','Canal','','<?= $_REQUEST['anio'] ?>','9','')">$<?= number_format($row['9'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('<?= $row['canalComercial']; ?>','Canal','','<?= $_REQUEST['anio'] ?>','10','')">$<?= number_format($row['10'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('<?= $row['canalComercial']; ?>','Canal','','<?= $_REQUEST['anio'] ?>','11','')">$<?= number_format($row['11'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('<?= $row['canalComercial']; ?>','Canal','','<?= $_REQUEST['anio'] ?>','12','')">$<?= number_format($row['12'], 2) ?></td>
                            <th style="font-weight:bold;text-align:right">$<?= number_format($row['Totales'], 2) ?></th>
                        </tr>
                    <?php
                        $finales++;
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Total General</th>
                        <th></th>
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Canal','','<?= $_REQUEST['anio'] ?>','1','')">$<?= number_format($mes1, 2) ?></th>
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Canal','','<?= $_REQUEST['anio'] ?>','2','')">$<?= number_format($mes2, 2) ?></th>
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Canal','','<?= $_REQUEST['anio'] ?>','3','')">$<?= number_format($mes3, 2) ?></th>
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Canal','','<?= $_REQUEST['anio'] ?>','4','')">$<?= number_format($mes4, 2) ?></th>
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Canal','','<?= $_REQUEST['anio'] ?>','5','')">$<?= number_format($mes5, 2) ?></th>
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Canal','','<?= $_REQUEST['anio'] ?>','6','')">$<?= number_format($mes6, 2) ?></th>
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Canal','','<?= $_REQUEST['anio'] ?>','7','')">$<?= number_format($mes7, 2) ?></th>
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Canal','','<?= $_REQUEST['anio'] ?>','8','')">$<?= number_format($mes8, 2) ?></th>
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Canal','','<?= $_REQUEST['anio'] ?>','9','')">$<?= number_format($mes9, 2) ?></th>
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Canal','','<?= $_REQUEST['anio'] ?>','10','')">$<?= number_format($mes10, 2) ?></th>
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Canal','','<?= $_REQUEST['anio'] ?>','11','')">$<?= number_format($mes11, 2) ?></th>
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Canal','','<?= $_REQUEST['anio'] ?>','12','')">$<?= number_format($mes12, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($mesTotales, 2) ?></th>
                    </tr>
                </tfoot>

            </table>
        </div>
        <div class="clearfix">
            <?php
            $inicios = $offset + 1;
            $finales += $inicios - 1;
            echo '<div class="hint-text">Mostrando ' . $inicios . ' al ' . $finales . ' de ' . $numrows . ' registros</div>';


            include '../clases/pagination.php'; //include pagination class
            $pagination = new Pagination($page, $total_pages, $adjacents);
            echo $pagination->paginateVentasCanal($vista);

            ?>
        </div>
    <?php
    }
}
if ($action == 'indicadoresInventarios') {
    include('../clases/detalleVentas.php');
    $database = new detalleVentas();
    //Recibir variables enviadas
    $query = strip_tags($_REQUEST['query']);
    $vista = strip_tags($_REQUEST['vista']);
    $año = strip_tags($_REQUEST['anio']);
    $estatus = strip_tags($_REQUEST['estatus']);
    $centro = strip_tags($_REQUEST['centro']);
    $agente = strip_tags($_REQUEST['agente']);
    $per_page = intval($_REQUEST['per_page']);
    $campo = strip_tags($_REQUEST['campo']);
    $orden = strip_tags($_REQUEST['orden']);

    $tables = "dbo.admDocumentos";
    $campos = "*";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;
    $search = array("query" => $query, "año" => $año, "estatus" => $estatus, "centro" => $centro, "agente" => $agente, "per_page" => $per_page, "offset" => $offset, "campo" => $campo, "orden" => $orden);
    //consulta principal para recuperar los datos
    $datos = $database->getIndicadoresInventarios($search);
    $indicadores = $database->getIndicadoresEntradasSalidas($search);

    $countAll = $database->getCounter();
    $row = $countAll;

    if ($row > 0) {
        $numrows = $countAll;
    } else {
        $numrows = 0;
    }
    $total_pages = ceil($numrows / $per_page);

    //Recorrer los datos recuperados

    if ($numrows > 0) {
    ?> <div class="fixedColumns">
            <table class="table table-responsive table-striped table-hover ">
                <thead>
                    <tr>
                        <th style="text-align:left">CENTRO <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left">ENERO <span style="color:transparent">LoremIpsumis</span>
                        </th>
                        <th style="text-align:left">FEBRERO <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left">MARZO <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left">ABRIL <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left">MAYO <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left">JUNIO <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left">JULIO <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left">AGOSTO <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left">SEPTIEMBRE <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left">OCTUBRE <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left">NOVIEMBRE <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left">DICIEMBRE <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left">TOTALES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    $mes1 = 0;
                    $mes2 = 0;
                    $mes3 = 0;
                    $mes4 = 0;
                    $mes5 = 0;
                    $mes6 = 0;
                    $mes7 = 0;
                    $mes8 = 0;
                    $mes9 = 0;
                    $mes10 = 0;
                    $mes11 = 0;
                    $mes12 = 0;
                    $mesTotales = 0;
                    foreach ($datos as $key => $row) {
                        $mes1 += $row['1'];
                        $mes2 += $row['2'];
                        $mes3 += $row['3'];
                        $mes4 += $row['4'];
                        $mes5 += $row['5'];
                        $mes6 += $row['6'];
                        $mes7 += $row['7'];
                        $mes8 += $row['8'];
                        $mes9 += $row['9'];
                        $mes10 += $row['10'];
                        $mes11 += $row['11'];
                        $mes12 += $row['12'];
                        $mesTotales += $row['Totales'];
                        $utilidad1 = bcdiv(($row["1"] - $indicadores[$key]["1"]) / $row["1"] * 100, '1', 2);
                        $utilidad2 = bcdiv(($row["2"] - $indicadores[$key]["2"]) / $row["2"] * 100, '1', 2);
                        $utilidad3 = bcdiv(($row["3"] - $indicadores[$key]["3"]) / $row["3"] * 100, '1', 2);
                        $utilidad4 = bcdiv(($row["4"] - $indicadores[$key]["4"]) / $row["4"] * 100, '1', 2);
                        $utilidad5 = bcdiv(($row["5"] - $indicadores[$key]["5"]) / $row["5"] * 100, '1', 2);
                        $utilidad6 = bcdiv(($row["6"] - $indicadores[$key]["6"]) / $row["6"] * 100, '1', 2);
                        $utilidad7 = bcdiv(($row["7"] - $indicadores[$key]["7"]) / $row["7"] * 100, '1', 2);
                        $utilidad8 = bcdiv(($row["8"] - $indicadores[$key]["8"]) / $row["8"] * 100, '1', 2);
                        $utilidad9 = bcdiv(($row["9"] - $indicadores[$key]["9"]) / $row["9"] * 100, '1', 2);
                        $utilidad10 = bcdiv(($row["10"] - $indicadores[$key]["10"]) / $row["10"] * 100, '1', 2);
                        $utilidad11 = bcdiv(($row["11"] - $indicadores[$key]["11"]) / $row["11"] * 100, '1', 2);
                        $utilidad12 = bcdiv(($row["12"] - $indicadores[$key]["12"]) / $row["12"] * 100, '1', 2);
                        $utilidadGeneral =  bcdiv(($row['Totales'] - $indicadores[$key]['Totales']) / $row["Totales"] * 100, '1', 2);

                        $porceUtilidad1 = is_nan($utilidad1) === NULL ? 0 : $utilidad1;
                        $porceUtilidad2 = is_nan($utilidad2) === NULL ? 0 : $utilidad2;
                        $porceUtilidad3 = is_nan($utilidad3) === NULL ? 0 : $utilidad3;
                        $porceUtilidad4 = is_nan($utilidad4) === NULL ? 0 : $utilidad4;
                        $porceUtilidad5 = is_nan($utilidad5) === NULL ? 0 : $utilidad5;
                        $porceUtilidad6 = is_nan($utilidad6) === NULL ? 0 : $utilidad6;
                        $porceUtilidad7 = is_nan($utilidad7) === NULL ? 0 : $utilidad7;
                        $porceUtilidad8 = is_nan($utilidad8) === NULL ? 0 : $utilidad8;
                        $porceUtilidad9 = is_nan($utilidad9) === NULL ? 0 : $utilidad9;
                        $porceUtilidad10 = is_nan($utilidad10) === NULL ? 0 : $utilidad10;
                        $porceUtilidad11 = is_nan($utilidad11) === NULL ? 0 : $utilidad11;
                        $porceUtilidad12 = is_nan($utilidad12) === NULL ? 0 : $utilidad12;
                    ?>
                        <tr>
                            <th style="border:none"><?= $row['centroTrabajo']; ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none"></th>
                        </tr>
                        <tr>
                            <td style="background:#00BCD4">
                                <p style="font-weight:bold;font-size:11px;color:white">Ventas</p>
                                <p style="font-weight:bold;font-size:11px;color:white">Requisiciones</p>
                                <p style="font-weight:bold;font-size:11px;color:white">Utilidad</p>
                                <p style="font-weight:bold;font-size:11px;color:white">Margen</p>
                            </td>
                            <td style="font-weight:bold;text-align:right">

                                <p class="btnSalesCanal" style="color:#333333" onclick="redireccionAccionVentasIndicadores('<?= $row['canalComercial']; ?>','Canal','','<?= $_REQUEST['anio'] ?>','1','<?= $row['centroTrabajo'] ?>')">$<?= number_format($row['1'], 2) ?></p>
                                <p style="color:#333333" class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','1','');">$<?= number_format($indicadores[$key]['1'], 2) ?></p>
                                <p style="color:blue">$<?= number_format($row['1'] - abs($indicadores[$key]['1']), 2) ?></p>
                                <p style="color:<?= color($porceUtilidad1); ?>"><?= $porceUtilidad1 ?>%</p>
                            </td>
                            <td style="font-weight:bold;text-align:right">
                                <p class="btnSalesCanal" style="color:#333333" onclick="redireccionAccionVentasIndicadores('<?= $row['canalComercial']; ?>','Canal','','<?= $_REQUEST['anio'] ?>','2','<?= $row['centroTrabajo'] ?>')">$<?= number_format($row['2'], 2) ?></p>
                                <p style="color:#333333" class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','2','');">$<?= number_format($indicadores[$key]['2'], 2) ?></p>
                                <p style="color:blue">$<?= number_format($row['2'] - abs($indicadores[$key]['2']), 2) ?></p>
                                <p style="color:<?= color($porceUtilidad2); ?>"><?= is_nan($utilidad2) === NULL ? 0 : $utilidad2 ?>%</p>
                            </td>
                            <td style="font-weight:bold;text-align:right">
                                <p class="btnSalesCanal" style="color:#333333" onclick="redireccionAccionVentasIndicadores('<?= $row['canalComercial']; ?>','Canal','','<?= $_REQUEST['anio'] ?>','3','<?= $row['centroTrabajo'] ?>')">$<?= number_format($row['3'], 2) ?></p>
                                <p style="color:#333333" class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','3','');">$<?= number_format($indicadores[$key]['3'], 2) ?></p>
                                <p style="color:blue">$<?= number_format($row['3'] - abs($indicadores[$key]['3']), 2) ?></p>
                                <p style="color:<?= color($porceUtilidad3); ?>"><?= is_nan($utilidad3) === NULL ? 0 : $utilidad3 ?>%</p>
                            </td>
                            <td style="font-weight:bold;text-align:right">
                                <p class="btnSalesCanal" style="color:#333333" onclick="redireccionAccionVentasIndicadores('<?= $row['canalComercial']; ?>','Canal','','<?= $_REQUEST['anio'] ?>','4','<?= $row['centroTrabajo'] ?>')">$<?= number_format($row['4'], 2) ?></p>
                                <p style="color:#333333" class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','4','');">$<?= number_format($indicadores[$key]['4'], 2) ?></p>
                                <p style="color:blue">$<?= number_format($row['4'] - abs($indicadores[$key]['4']), 2) ?></p>
                                <p style="color:<?= color($porceUtilidad4); ?>"><?= is_nan($utilidad4) === NULL ? 0 : $utilidad4 ?>%</p>
                            </td>
                            <td style="font-weight:bold;text-align:right">
                                <p class="btnSalesCanal" style="color:#333333" onclick="redireccionAccionVentasIndicadores('<?= $row['canalComercial']; ?>','Canal','','<?= $_REQUEST['anio'] ?>','5','<?= $row['centroTrabajo'] ?>')">$<?= number_format($row['5'], 2) ?></p>
                                <p style="color:#333333" class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','5','');">$<?= number_format($indicadores[$key]['5'], 2) ?></p>
                                <p style="color:blue">$<?= number_format($row['5'] - abs($indicadores[$key]['5']), 2) ?></p>
                                <p style="color:<?= color($porceUtilidad5); ?>"><?= is_nan($utilidad5) === NULL ? 0 : $utilidad5 ?>%</p>
                            </td>
                            <td style="font-weight:bold;text-align:right">
                                <p class="btnSalesCanal" style="color:#333333" onclick="redireccionAccionVentasIndicadores('<?= $row['canalComercial']; ?>','Canal','','<?= $_REQUEST['anio'] ?>','6','<?= $row['centroTrabajo'] ?>')">$<?= number_format($row['6'], 2) ?></p>
                                <p style="color:#333333" class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','6','');">$<?= number_format($indicadores[$key]['6'], 2) ?></p>
                                <p style="color:blue">$<?= number_format($row['6'] - abs($indicadores[$key]['6']), 2) ?></p>
                                <p style="color:<?= color($porceUtilidad6); ?>"><?= is_nan($utilidad6) === NULL ? 0 : $utilidad6 ?>%</p>
                            </td>
                            <td style="font-weight:bold;text-align:right">
                                <p class="btnSalesCanal" style="color:#333333" onclick="redireccionAccionVentasIndicadores('<?= $row['canalComercial']; ?>','Canal','','<?= $_REQUEST['anio'] ?>','7','<?= $row['centroTrabajo'] ?>')">$<?= number_format($row['7'], 2) ?></p>
                                <p style="color:#333333" class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','7','');">$<?= number_format($indicadores[$key]['7'], 2) ?></p>
                                <p style="color:blue">$<?= number_format($row['7'] - abs($indicadores[$key]['7']), 2) ?></p>
                                <p style="color:<?= color($porceUtilidad7); ?>"><?= is_nan($utilidad7) === NULL ? 0 : $utilidad7 ?>%</p>
                            </td>
                            <td style="font-weight:bold;text-align:right">
                                <p class="btnSalesCanal" style="color:#333333" onclick="redireccionAccionVentasIndicadores('<?= $row['canalComercial']; ?>','Canal','','<?= $_REQUEST['anio'] ?>','8','<?= $row['centroTrabajo'] ?>')">$<?= number_format($row['8'], 2) ?></p>
                                <p style="color:#333333" class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','8','');">$<?= number_format($indicadores[$key]['8'], 2) ?></p>
                                <p style="color:blue">$<?= number_format($row['8'] - abs($indicadores[$key]['8']), 2) ?></p>
                                <p style="color:<?= color($porceUtilidad8); ?>"><?= is_nan($utilidad8) === NULL ? 0 : $utilidad8 ?>%</p>
                            </td>
                            <td style="font-weight:bold;text-align:right">
                                <p class="btnSalesCanal" style="color:#333333" onclick="redireccionAccionVentasIndicadores('<?= $row['canalComercial']; ?>','Canal','','<?= $_REQUEST['anio'] ?>','9','<?= $row['centroTrabajo'] ?>')">$<?= number_format($row['9'], 2) ?></p>
                                <p style="color:#333333" class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','9','');">$<?= number_format($indicadores[$key]['9'], 2) ?></p>
                                <p style="color:blue">$<?= number_format($row['9'] - abs($indicadores[$key]['9']), 2) ?></p>
                                <p style="color:<?= color($porceUtilidad9); ?>"><?= is_nan($utilidad9) === NULL ? 0 : $utilidad9 ?>%</p>
                            </td>
                            <td style="font-weight:bold;text-align:right">
                                <p class="btnSalesCanal" style="color:#333333" onclick="redireccionAccionVentasIndicadores('<?= $row['canalComercial']; ?>','Canal','','<?= $_REQUEST['anio'] ?>','10','<?= $row['centroTrabajo'] ?>')">$<?= number_format($row['10'], 2) ?></p>
                                <p style="color:#333333" class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','10','');">$<?= number_format($indicadores[$key]['10'], 2) ?></p>
                                <p style="color:blue">$<?= number_format($row['10'] - abs($indicadores[$key]['10']), 2) ?></p>
                                <p style="color:<?= color($porceUtilidad10); ?>"><?= is_nan($utilidad10) === NULL ? 0 : $utilidad10 ?>%</p>
                            </td>
                            <td style="font-weight:bold;text-align:right">
                                <p class="btnSalesCanal" style="color:#333333" onclick="redireccionAccionVentasIndicadores('<?= $row['canalComercial']; ?>','Canal','','<?= $_REQUEST['anio'] ?>','11','<?= $row['centroTrabajo'] ?>')">$<?= number_format($row['11'], 2) ?></p>
                                <p style="color:#333333" class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','11','');">$<?= number_format($indicadores[$key]['11'], 2) ?></p>
                                <p style="color:blue">$<?= number_format($row['11'] - abs($indicadores[$key]['11']), 2) ?></p>
                                <p style="color:<?= color($porceUtilidad11); ?>"><?= is_nan($utilidad11) === NULL ? 0 : $utilidad11 ?>%</p>
                            </td>
                            <td style="font-weight:bold;text-align:right">
                                <p class="btnSalesCanal" style="color:#333333" onclick="redireccionAccionVentasIndicadores('<?= $row['canalComercial']; ?>','Canal','','<?= $_REQUEST['anio'] ?>','12','<?= $row['centroTrabajo'] ?>')">$<?= number_format($row['12'], 2) ?></p>
                                <p style="color:#333333" class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','12','');">$<?= number_format($indicadores[$key]['12'], 2) ?></p>
                                <p style="color:blue">$<?= number_format($row['12'] - abs($indicadores[$key]['12']), 2) ?></p>
                                <p style="color:<?= color($porceUtilidad12); ?>"><?= is_nan($utilidad12) === NULL ? 0 : $utilidad12 ?>%</p>
                            </td>
                            <th style="font-weight:bold;text-align:right">
                                <p style="color:#ffffff">$<?= number_format($row['Totales'], 2) ?></p>
                                <p style="color:#ffffff">$<?= number_format($indicadores[$key]['Totales'], 2) ?></p>
                                <p style="color:#ffffff">$<?= number_format($row['Totales'] - $indicadores[$key]['Totales'], 2) ?></p>
                                <p style="color:<?= color($utilidadGeneral); ?>"> <?= $utilidadGeneral ?>%</p>
                            </th>
                        </tr>
                    <?php
                        $finales++;
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>TOTAL</th>
                        <th style="font-weight:bold;text-align:right" ?></th>
                        <th style="font-weight:bold;text-align:right" ?></th>
                        <th style="font-weight:bold;text-align:right" ?></th>
                        <th style="font-weight:bold;text-align:right" ?></th>
                        <th style="font-weight:bold;text-align:right" ?></th>
                        <th style="font-weight:bold;text-align:right" ?></th>
                        <th style="font-weight:bold;text-align:right" ?></th>
                        <th style="font-weight:bold;text-align:right" ?></th>
                        <th style="font-weight:bold;text-align:right" ?></th>
                        <th style="font-weight:bold;text-align:right" ?></th>
                        <th style="font-weight:bold;text-align:right" ?></th>
                        <th style="font-weight:bold;text-align:right" ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($mesTotales, 2) ?></th>
                    </tr>
                </tfoot>

            </table>
        </div>
        <div class="clearfix">
            <?php
            $inicios = $offset + 1;
            $finales += $inicios - 1;
            echo '<div class="hint-text">Mostrando ' . $inicios . ' al ' . $finales . ' de ' . $numrows . ' registros</div>';


            include '../clases/pagination.php'; //include pagination class
            $pagination = new Pagination($page, $total_pages, $adjacents);
            echo $pagination->paginateVentasCanal($vista);

            ?>
        </div>
    <?php
    }
}
if ($action == 'indicadoresDetalladoInventarios') {
    include('../clases/detalleVentas.php');
    $database = new detalleVentas();
    //Recibir variables enviadas
    $query = strip_tags($_REQUEST['query']);
    $vista = strip_tags($_REQUEST['vista']);
    $año = strip_tags($_REQUEST['anio']);
    $estatus = strip_tags($_REQUEST['estatus']);
    $centro = strip_tags($_REQUEST['centro']);
    $agente = strip_tags($_REQUEST['agente']);
    $per_page = intval($_REQUEST['per_page']);
    $campo = strip_tags($_REQUEST['campo']);
    $orden = strip_tags($_REQUEST['orden']);

    $tables = "dbo.admDocumentos";
    $campos = "*";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;
    $search = array("query" => $query, "año" => $año, "estatus" => $estatus, "centro" => $centro, "agente" => $agente, "per_page" => $per_page, "offset" => $offset, "campo" => $campo, "orden" => $orden);
    //consulta principal para recuperar los datos
    $datos = $database->getIndicadoresInventarios($search);
    $indicadores = $database->getIndicadoresEntradasSalidas($search);

    $countAll = $database->getCounter();
    $row = $countAll;

    if ($row > 0) {
        $numrows = $countAll;
    } else {
        $numrows = 0;
    }
    $total_pages = ceil($numrows / $per_page);

    //Recorrer los datos recuperados

    if ($numrows > 0) {
    ?> <div class="fixedColumns">
            <table class="table table-responsive table-striped table-hover ">
                <thead>
                    <tr>
                        <th style="text-align:left">CENTRO <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left">ENERO <span style="color:transparent">LoremIpsumis</span>
                        </th>
                        <th style="text-align:left">FEBRERO <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left">MARZO <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left">ABRIL <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left">MAYO <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left">JUNIO <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left">JULIO <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left">AGOSTO <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left">SEPTIEMBRE <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left">OCTUBRE <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left">NOVIEMBRE <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left">DICIEMBRE <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left">TOTALES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    $mes1 = 0;
                    $mes2 = 0;
                    $mes3 = 0;
                    $mes4 = 0;
                    $mes5 = 0;
                    $mes6 = 0;
                    $mes7 = 0;
                    $mes8 = 0;
                    $mes9 = 0;
                    $mes10 = 0;
                    $mes11 = 0;
                    $mes12 = 0;
                    $mesTotales = 0;
                    foreach ($datos as $key => $row) {
                        $mes1 += $row['1'];
                        $mes2 += $row['2'];
                        $mes3 += $row['3'];
                        $mes4 += $row['4'];
                        $mes5 += $row['5'];
                        $mes6 += $row['6'];
                        $mes7 += $row['7'];
                        $mes8 += $row['8'];
                        $mes9 += $row['9'];
                        $mes10 += $row['10'];
                        $mes11 += $row['11'];
                        $mes12 += $row['12'];
                        $mesTotales += $row['Totales'];
                        $utilidad1 = bcdiv(($row["1"] - $indicadores[$key]["1"]) / $row["1"] * 100, '1', 2);
                        $utilidad2 = bcdiv(($row["2"] - $indicadores[$key]["2"]) / $row["2"] * 100, '1', 2);
                        $utilidad3 = bcdiv(($row["3"] - $indicadores[$key]["3"]) / $row["3"] * 100, '1', 2);
                        $utilidad4 = bcdiv(($row["4"] - $indicadores[$key]["4"]) / $row["4"] * 100, '1', 2);
                        $utilidad5 = bcdiv(($row["5"] - $indicadores[$key]["5"]) / $row["5"] * 100, '1', 2);
                        $utilidad6 = bcdiv(($row["6"] - $indicadores[$key]["6"]) / $row["6"] * 100, '1', 2);
                        $utilidad7 = bcdiv(($row["7"] - $indicadores[$key]["7"]) / $row["7"] * 100, '1', 2);
                        $utilidad8 = bcdiv(($row["8"] - $indicadores[$key]["8"]) / $row["8"] * 100, '1', 2);
                        $utilidad9 = bcdiv(($row["9"] - $indicadores[$key]["9"]) / $row["9"] * 100, '1', 2);
                        $utilidad10 = bcdiv(($row["10"] - $indicadores[$key]["10"]) / $row["10"] * 100, '1', 2);
                        $utilidad11 = bcdiv(($row["11"] - $indicadores[$key]["11"]) / $row["11"] * 100, '1', 2);
                        $utilidad12 = bcdiv(($row["12"] - $indicadores[$key]["12"]) / $row["12"] * 100, '1', 2);
                        $utilidadGeneral =  bcdiv(($row['Totales'] - $indicadores[$key]['Totales']) / $row["Totales"] * 100, '1', 2);

                        $porceUtilidad1 = is_nan($utilidad1) === NULL ? 0 : $utilidad1;
                        $porceUtilidad2 = is_nan($utilidad2) === NULL ? 0 : $utilidad2;
                        $porceUtilidad3 = is_nan($utilidad3) === NULL ? 0 : $utilidad3;
                        $porceUtilidad4 = is_nan($utilidad4) === NULL ? 0 : $utilidad4;
                        $porceUtilidad5 = is_nan($utilidad5) === NULL ? 0 : $utilidad5;
                        $porceUtilidad6 = is_nan($utilidad6) === NULL ? 0 : $utilidad6;
                        $porceUtilidad7 = is_nan($utilidad7) === NULL ? 0 : $utilidad7;
                        $porceUtilidad8 = is_nan($utilidad8) === NULL ? 0 : $utilidad8;
                        $porceUtilidad9 = is_nan($utilidad9) === NULL ? 0 : $utilidad9;
                        $porceUtilidad10 = is_nan($utilidad10) === NULL ? 0 : $utilidad10;
                        $porceUtilidad11 = is_nan($utilidad11) === NULL ? 0 : $utilidad11;
                        $porceUtilidad12 = is_nan($utilidad12) === NULL ? 0 : $utilidad12;


                        $datosDetalle = $database->getIndicadoresDetalladoEntradasSalidas($row['centroTrabajo'], '2022');

                    ?>
                        <tr>
                            <th style="border:none"><?= $row['centroTrabajo']; ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none"></th>
                        </tr>
                        <tr>
                            <td style="background:#00BCD4">
                                <p style="font-weight:bold;font-size:13px;color:white">Ventas</p>
                                <p style="font-weight:bold;font-size:13px;color:white">Requisiciones</p>
                                <p style="font-weight:bold;font-size:11px;color:white;text-align:right">Almacén</p>
                                <p style="font-weight:bold;font-size:11px;color:white;text-align:right">San Manuel</p>
                                <p style="font-weight:bold;font-size:11px;color:white;text-align:right">Reforma</p>
                                <p style="font-weight:bold;font-size:11px;color:white;text-align:right">Santiago</p>
                                <p style="font-weight:bold;font-size:11px;color:white;text-align:right">Capu</p>
                                <p style="font-weight:bold;font-size:11px;color:white;text-align:right">Torres</p>
                                <p style="font-weight:bold;font-size:13px;color:white">Utilidad</p>
                                <p style="font-weight:bold;font-size:13px;color:white">Margen</p>
                            </td>
                            <td style="font-weight:bold;text-align:right">

                                <p class="btnSalesCanal" style="color:#333333" onclick="redireccionAccionVentasIndicadores('<?= $row['canalComercial']; ?>','Canal','','<?= $_REQUEST['anio'] ?>','1','<?= $row['centroTrabajo'] ?>')">$<?= number_format($row['1'], 2) ?></p>
                                <p style="color:#333333" class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','1','');">$<?= number_format($indicadores[$key]['1'], 2) ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','1','0 GENERAL');">$<?= number_format(bcdiv($datosDetalle[0]['1'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','1','1 TIENDA SAN MANUEL');">$<?= number_format(bcdiv($datosDetalle[1]['1'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','1','3 TIENDA REFORMA');">$<?= number_format(bcdiv($datosDetalle[2]['1'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','1','6 TIENDA SANTIAGO');">$<?= number_format(bcdiv($datosDetalle[3]['1'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','1','7 TIENDA CAPU');">$<?= number_format(bcdiv($datosDetalle[4]['1'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','1','9 TIENDA TORRES');">$<?= number_format(bcdiv($datosDetalle[5]['1'], '1', 2), 2); ?></p>
                                <p style="color:blue">$<?= number_format($row['1'] - abs($indicadores[$key]['1']), 2) ?></p>
                                <p style="color:<?= color($porceUtilidad1); ?>"><?= $porceUtilidad1 ?>%</p>
                            </td>
                            <td style="font-weight:bold;text-align:right">
                                <p class="btnSalesCanal" style="color:#333333" onclick="redireccionAccionVentasIndicadores('<?= $row['canalComercial']; ?>','Canal','','<?= $_REQUEST['anio'] ?>','2','<?= $row['centroTrabajo'] ?>')">$<?= number_format($row['2'], 2) ?></p>
                                <p style="color:#333333" class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','2','');">$<?= number_format($indicadores[$key]['2'], 2) ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','2','0 GENERAL');">$<?= number_format(bcdiv($datosDetalle[0]['2'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','2','1 TIENDA SAN MANUEL');">$<?= number_format(bcdiv($datosDetalle[1]['2'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','2','3 TIENDA REFORMA');">$<?= number_format(bcdiv($datosDetalle[2]['2'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','2','6 TIENDA SANTIAGO');">$<?= number_format(bcdiv($datosDetalle[3]['2'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','2','7 TIENDA CAPU');">$<?= number_format(bcdiv($datosDetalle[4]['2'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','2','9 TIENDA TORRES');">$<?= number_format(bcdiv($datosDetalle[5]['2'], '1', 2), 2); ?></p>
                                <p style="color:blue">$<?= number_format($row['2'] - abs($indicadores[$key]['2']), 2) ?></p>
                                <p style="color:<?= color($porceUtilidad2); ?>"><?= is_nan($utilidad2) === NULL ? 0 : $utilidad2 ?>%</p>
                            </td>
                            <td style="font-weight:bold;text-align:right">
                                <p class="btnSalesCanal" style="color:#333333" onclick="redireccionAccionVentasIndicadores('<?= $row['canalComercial']; ?>','Canal','','<?= $_REQUEST['anio'] ?>','3','<?= $row['centroTrabajo'] ?>')">$<?= number_format($row['3'], 2) ?></p>
                                <p style="color:#333333" class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','3','');">$<?= number_format($indicadores[$key]['3'], 2) ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','3','0 GENERAL');">$<?= number_format(bcdiv($datosDetalle[0]['3'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','3','1 TIENDA SAN MANUEL');">$<?= number_format(bcdiv($datosDetalle[1]['3'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','3','3 TIENDA REFORMA');">$<?= number_format(bcdiv($datosDetalle[2]['3'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','3','6 TIENDA SANTIAGO');">$<?= number_format(bcdiv($datosDetalle[3]['3'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','3','7 TIENDA CAPU');">$<?= number_format(bcdiv($datosDetalle[4]['3'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','3','9 TIENDA TORRES');">$<?= number_format(bcdiv($datosDetalle[5]['3'], '1', 2), 2); ?></p>
                                <p style="color:blue">$<?= number_format($row['3'] - abs($indicadores[$key]['3']), 2) ?></p>
                                <p style="color:<?= color($porceUtilidad3); ?>"><?= is_nan($utilidad3) === NULL ? 0 : $utilidad3 ?>%</p>
                            </td>
                            <td style="font-weight:bold;text-align:right">
                                <p class="btnSalesCanal" style="color:#333333" onclick="redireccionAccionVentasIndicadores('<?= $row['canalComercial']; ?>','Canal','','<?= $_REQUEST['anio'] ?>','4','<?= $row['centroTrabajo'] ?>')">$<?= number_format($row['4'], 2) ?></p>
                                <p style="color:#333333" class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','4','');">$<?= number_format($indicadores[$key]['4'], 2) ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','4','0 GENERAL');">$<?= number_format(bcdiv($datosDetalle[0]['4'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','4','1 TIENDA SAN MANUEL');">$<?= number_format(bcdiv($datosDetalle[1]['4'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','4','3 TIENDA REFORMA');">$<?= number_format(bcdiv($datosDetalle[2]['4'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','4','6 TIENDA SANTIAGO');">$<?= number_format(bcdiv($datosDetalle[3]['4'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','4','7 TIENDA CAPU');">$<?= number_format(bcdiv($datosDetalle[4]['4'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','4','9 TIENDA TORRES');">$<?= number_format(bcdiv($datosDetalle[5]['4'], '1', 2), 2); ?></p>
                                <p style="color:blue">$<?= number_format($row['4'] - abs($indicadores[$key]['4']), 2) ?></p>
                                <p style="color:<?= color($porceUtilidad4); ?>"><?= is_nan($utilidad4) === NULL ? 0 : $utilidad4 ?>%</p>
                            </td>
                            <td style="font-weight:bold;text-align:right">
                                <p class="btnSalesCanal" style="color:#333333" onclick="redireccionAccionVentasIndicadores('<?= $row['canalComercial']; ?>','Canal','','<?= $_REQUEST['anio'] ?>','5','<?= $row['centroTrabajo'] ?>')">$<?= number_format($row['5'], 2) ?></p>
                                <p style="color:#333333" class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','5','');">$<?= number_format($indicadores[$key]['5'], 2) ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','5','0 GENERAL');">$<?= number_format(bcdiv($datosDetalle[0]['5'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','5','1 TIENDA SAN MANUEL');">$<?= number_format(bcdiv($datosDetalle[1]['5'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','5','3 TIENDA REFORMA');">$<?= number_format(bcdiv($datosDetalle[2]['5'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','5','6 TIENDA SANTIAGO');">$<?= number_format(bcdiv($datosDetalle[3]['5'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','5','7 TIENDA CAPU');">$<?= number_format(bcdiv($datosDetalle[4]['5'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','5','9 TIENDA TORRES');">$<?= number_format(bcdiv($datosDetalle[5]['5'], '1', 2), 2); ?></p>
                                <p style="color:blue">$<?= number_format($row['5'] - abs($indicadores[$key]['5']), 2) ?></p>
                                <p style="color:<?= color($porceUtilidad5); ?>"><?= is_nan($utilidad5) === NULL ? 0 : $utilidad5 ?>%</p>
                            </td>
                            <td style="font-weight:bold;text-align:right">
                                <p class="btnSalesCanal" style="color:#333333" onclick="redireccionAccionVentasIndicadores('<?= $row['canalComercial']; ?>','Canal','','<?= $_REQUEST['anio'] ?>','6','<?= $row['centroTrabajo'] ?>')">$<?= number_format($row['6'], 2) ?></p>
                                <p style="color:#333333" class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','6','');">$<?= number_format($indicadores[$key]['6'], 2) ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','6','0 GENERAL');">$<?= number_format(bcdiv($datosDetalle[0]['6'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','6','1 TIENDA SAN MANUEL');">$<?= number_format(bcdiv($datosDetalle[1]['6'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','6','3 TIENDA REFORMA');">$<?= number_format(bcdiv($datosDetalle[2]['6'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','6','6 TIENDA SANTIAGO');">$<?= number_format(bcdiv($datosDetalle[3]['6'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','6','7 TIENDA CAPU');">$<?= number_format(bcdiv($datosDetalle[4]['6'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','6','9 TIENDA TORRES');">$<?= number_format(bcdiv($datosDetalle[5]['6'], '1', 2), 2); ?></p>
                                <p style="color:blue">$<?= number_format($row['6'] - abs($indicadores[$key]['6']), 2) ?></p>
                                <p style="color:<?= color($porceUtilidad6); ?>"><?= is_nan($utilidad6) === NULL ? 0 : $utilidad6 ?>%</p>
                            </td>
                            <td style="font-weight:bold;text-align:right">
                                <p class="btnSalesCanal" style="color:#333333" onclick="redireccionAccionVentasIndicadores('<?= $row['canalComercial']; ?>','Canal','','<?= $_REQUEST['anio'] ?>','7','<?= $row['centroTrabajo'] ?>')">$<?= number_format($row['7'], 2) ?></p>
                                <p style="color:#333333" class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','7','');">$<?= number_format($indicadores[$key]['7'], 2) ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','7','0 GENERAL');">$<?= number_format(bcdiv($datosDetalle[0]['7'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','7','1 TIENDA SAN MANUEL');">$<?= number_format(bcdiv($datosDetalle[1]['7'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','7','3 TIENDA REFORMA');">$<?= number_format(bcdiv($datosDetalle[2]['7'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','7','6 TIENDA SANTIAGO');">$<?= number_format(bcdiv($datosDetalle[3]['7'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','7','7 TIENDA CAPU');">$<?= number_format(bcdiv($datosDetalle[4]['7'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','7','9 TIENDA TORRES');">$<?= number_format(bcdiv($datosDetalle[5]['7'], '1', 2), 2); ?></p>
                                <p style="color:blue">$<?= number_format($row['7'] - abs($indicadores[$key]['7']), 2) ?></p>
                                <p style="color:<?= color($porceUtilidad7); ?>"><?= is_nan($utilidad7) === NULL ? 0 : $utilidad7 ?>%</p>
                            </td>
                            <td style="font-weight:bold;text-align:right">
                                <p class="btnSalesCanal" style="color:#333333" onclick="redireccionAccionVentasIndicadores('<?= $row['canalComercial']; ?>','Canal','','<?= $_REQUEST['anio'] ?>','8','<?= $row['centroTrabajo'] ?>')">$<?= number_format($row['8'], 2) ?></p>
                                <p style="color:#333333" class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','8','');">$<?= number_format($indicadores[$key]['8'], 2) ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','8','0 GENERAL');">$<?= number_format(bcdiv($datosDetalle[0]['8'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','8','1 TIENDA SAN MANUEL');">$<?= number_format(bcdiv($datosDetalle[1]['8'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','8','3 TIENDA REFORMA');">$<?= number_format(bcdiv($datosDetalle[2]['8'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','8','6 TIENDA SANTIAGO');">$<?= number_format(bcdiv($datosDetalle[3]['8'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','8','7 TIENDA CAPU');">$<?= number_format(bcdiv($datosDetalle[4]['8'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','8','9 TIENDA TORRES');">$<?= number_format(bcdiv($datosDetalle[5]['8'], '1', 2), 2); ?></p>
                                <p style="color:blue">$<?= number_format($row['8'] - abs($indicadores[$key]['8']), 2) ?></p>
                                <p style="color:<?= color($porceUtilidad8); ?>"><?= is_nan($utilidad8) === NULL ? 0 : $utilidad8 ?>%</p>
                            </td>
                            <td style="font-weight:bold;text-align:right">
                                <p class="btnSalesCanal" style="color:#333333" onclick="redireccionAccionVentasIndicadores('<?= $row['canalComercial']; ?>','Canal','','<?= $_REQUEST['anio'] ?>','9','<?= $row['centroTrabajo'] ?>')">$<?= number_format($row['9'], 2) ?></p>
                                <p style="color:#333333" class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','9','');">$<?= number_format($indicadores[$key]['9'], 2) ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','9','0 GENERAL');">$<?= number_format(bcdiv($datosDetalle[0]['9'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','9','1 TIENDA SAN MANUEL');">$<?= number_format(bcdiv($datosDetalle[1]['9'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','9','3 TIENDA REFORMA');">$<?= number_format(bcdiv($datosDetalle[2]['9'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','9','6 TIENDA SANTIAGO');">$<?= number_format(bcdiv($datosDetalle[3]['9'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','9','7 TIENDA CAPU');">$<?= number_format(bcdiv($datosDetalle[4]['9'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','9','9 TIENDA TORRES');">$<?= number_format(bcdiv($datosDetalle[5]['9'], '1', 2), 2); ?></p>
                                <p style="color:blue">$<?= number_format($row['9'] - abs($indicadores[$key]['9']), 2) ?></p>
                                <p style="color:<?= color($porceUtilidad9); ?>"><?= is_nan($utilidad9) === NULL ? 0 : $utilidad9 ?>%</p>
                            </td>
                            <td style="font-weight:bold;text-align:right">
                                <p class="btnSalesCanal" style="color:#333333" onclick="redireccionAccionVentasIndicadores('<?= $row['canalComercial']; ?>','Canal','','<?= $_REQUEST['anio'] ?>','10','<?= $row['centroTrabajo'] ?>')">$<?= number_format($row['10'], 2) ?></p>
                                <p style="color:#333333" class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','10','');">$<?= number_format($indicadores[$key]['10'], 2) ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','10','0 GENERAL');">$<?= number_format(bcdiv($datosDetalle[0]['10'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','10','1 TIENDA SAN MANUEL');">$<?= number_format(bcdiv($datosDetalle[1]['10'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','10','3 TIENDA REFORMA');">$<?= number_format(bcdiv($datosDetalle[2]['10'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','10','6 TIENDA SANTIAGO');">$<?= number_format(bcdiv($datosDetalle[3]['10'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','10','7 TIENDA CAPU');">$<?= number_format(bcdiv($datosDetalle[4]['10'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','10','9 TIENDA TORRES');">$<?= number_format(bcdiv($datosDetalle[5]['10'], '1', 2), 2); ?></p>
                                <p style="color:blue">$<?= number_format($row['10'] - abs($indicadores[$key]['10']), 2) ?></p>
                                <p style="color:<?= color($porceUtilidad10); ?>"><?= is_nan($utilidad10) === NULL ? 0 : $utilidad10 ?>%</p>
                            </td>
                            <td style="font-weight:bold;text-align:right">
                                <p class="btnSalesCanal" style="color:#333333" onclick="redireccionAccionVentasIndicadores('<?= $row['canalComercial']; ?>','Canal','','<?= $_REQUEST['anio'] ?>','11','<?= $row['centroTrabajo'] ?>')">$<?= number_format($row['11'], 2) ?></p>
                                <p style="color:#333333" class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','11','');">$<?= number_format($indicadores[$key]['11'], 2) ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','11','0 GENERAL');">$<?= number_format(bcdiv($datosDetalle[0]['11'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','11','1 TIENDA SAN MANUEL');">$<?= number_format(bcdiv($datosDetalle[1]['11'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','11','3 TIENDA REFORMA');">$<?= number_format(bcdiv($datosDetalle[2]['11'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','11','6 TIENDA SANTIAGO');">$<?= number_format(bcdiv($datosDetalle[3]['11'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','11','7 TIENDA CAPU');">$<?= number_format(bcdiv($datosDetalle[4]['11'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','11','9 TIENDA TORRES');">$<?= number_format(bcdiv($datosDetalle[5]['11'], '1', 2), 2); ?></p>
                                <p style="color:blue">$<?= number_format($row['11'] - abs($indicadores[$key]['11']), 2) ?></p>
                                <p style="color:<?= color($porceUtilidad11); ?>"><?= is_nan($utilidad11) === NULL ? 0 : $utilidad11 ?>%</p>
                            </td>
                            <td style="font-weight:bold;text-align:right">
                                <p class="btnSalesCanal" style="color:#333333" onclick="redireccionAccionVentasIndicadores('<?= $row['canalComercial']; ?>','Canal','','<?= $_REQUEST['anio'] ?>','12','<?= $row['centroTrabajo'] ?>')">$<?= number_format($row['12'], 2) ?></p>
                                <p style="color:#333333" class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','12','');">$<?= number_format($indicadores[$key]['12'], 2) ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','12','0 GENERAL');">$<?= number_format(bcdiv($datosDetalle[0]['12'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','12','1 TIENDA SAN MANUEL');">$<?= number_format(bcdiv($datosDetalle[1]['12'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','12','3 TIENDA REFORMA');">$<?= number_format(bcdiv($datosDetalle[2]['12'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','12','6 TIENDA SANTIAGO');">$<?= number_format(bcdiv($datosDetalle[3]['12'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','12','7 TIENDA CAPU');">$<?= number_format(bcdiv($datosDetalle[4]['12'], '1', 2), 2); ?></p>
                                <p class="btnDetailIndicadores" onclick="detalleIndicadores('<?= $row['centroTrabajo']; ?>','<?= $_REQUEST['anio'] ?>','12','9 TIENDA TORRES');">$<?= number_format(bcdiv($datosDetalle[5]['12'], '1', 2), 2); ?></p>
                                <p style="color:blue">$<?= number_format($row['12'] - abs($indicadores[$key]['12']), 2) ?></p>
                                <p style="color:<?= color($porceUtilidad12); ?>"><?= is_nan($utilidad12) === NULL ? 0 : $utilidad12 ?>%</p>
                            </td>
                            <th style="font-weight:bold;text-align:right">
                                <p style="color:#ffffff">$<?= number_format($row['Totales'], 2) ?></p>
                                <p style="color:#ffffff">$<?= number_format($indicadores[$key]['Totales'], 2) ?></p>
                                <p>0</p>
                                <p>0</p>
                                <p>0</p>
                                <p>0</p>
                                <p>0</p>
                                <p>0</p>
                                <p style="color:#ffffff">$<?= number_format($row['Totales'] - $indicadores[$key]['Totales'], 2) ?></p>
                                <p style="color:<?= color($utilidadGeneral); ?>"> <?= $utilidadGeneral ?>%</p>
                            </th>
                        </tr>
                    <?php
                        $finales++;
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>TOTAL</th>
                        <th style="font-weight:bold;text-align:right" ?></th>
                        <th style="font-weight:bold;text-align:right" ?></th>
                        <th style="font-weight:bold;text-align:right" ?></th>
                        <th style="font-weight:bold;text-align:right" ?></th>
                        <th style="font-weight:bold;text-align:right" ?></th>
                        <th style="font-weight:bold;text-align:right" ?></th>
                        <th style="font-weight:bold;text-align:right" ?></th>
                        <th style="font-weight:bold;text-align:right" ?></th>
                        <th style="font-weight:bold;text-align:right" ?></th>
                        <th style="font-weight:bold;text-align:right" ?></th>
                        <th style="font-weight:bold;text-align:right" ?></th>
                        <th style="font-weight:bold;text-align:right" ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($mesTotales, 2) ?></th>
                    </tr>
                </tfoot>

            </table>
        </div>
        <div class="clearfix">
            <?php
            $inicios = $offset + 1;
            $finales += $inicios - 1;
            echo '<div class="hint-text">Mostrando ' . $inicios . ' al ' . $finales . ' de ' . $numrows . ' registros</div>';


            include '../clases/pagination.php'; //include pagination class
            $pagination = new Pagination($page, $total_pages, $adjacents);
            echo $pagination->paginateVentasCanal($vista);

            ?>
        </div>
    <?php
    }
}

if ($action == 'inventarioActual') {
    include('../clases/detalleVentas.php');
    $database = new detalleVentas();

    $vista = strip_tags($_REQUEST['vista']);
    $empresa = strip_tags($_REQUEST['empresa']);
    $ejercicio = strip_tags($_REQUEST['ejercicio']);

    $tables = "dbo.admDocumentos";
    $campos = "*";

    $search = array("vista" => $vista, "empresa" => $empresa, "ejercicio" => $ejercicio);
    //consulta principal para recuperar los datos
    $datos = $database->getInventarioActual($search);
    $countAll = $database->getCounter();
    $row = $countAll;

    if ($row > 0) {
        $numrows = $countAll;
    } else {
        $numrows = 0;
    }
    $total_pages = ceil($numrows / $per_page);

    //Recorrer los datos recuperados

    if ($numrows > 0) {
    ?> <div class="fixedColumns">
            <table class="table table-responsive table-striped table-hover ">
                <thead>
                    <tr>
                        <th style="text-align:left">CENTRO <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left"><span style="color:transparent">LoremIpsum</span></th>
                        <th style="text-align:left">ENERO <span style="color:transparent">LoremIpsumisIps</span>
                        </th>
                        <th style="text-align:left">FEBRERO <span style="color:transparent">LoremIpsumisIps</span></th>
                        <th style="text-align:left">MARZO <span style="color:transparent">LoremIpsumisIps</span></th>
                        <th style="text-align:left">ABRIL <span style="color:transparent">LoremIpsumisIps</span></th>
                        <th style="text-align:left">MAYO <span style="color:transparent">LoremIpsumisIps</span></th>
                        <th style="text-align:left">JUNIO <span style="color:transparent">LoremIpsumisIps</span></th>
                        <th style="text-align:left">JULIO <span style="color:transparent">LoremIpsumisIps</span></th>
                        <th style="text-align:left">AGOSTO <span style="color:transparent">LoremIpsumisIps</span></th>
                        <th style="text-align:left">SEPTIEMBRE <span style="color:transparent">LoremIpsumisIps</span></th>
                        <th style="text-align:left">OCTUBRE <span style="color:transparent">LoremIpsumisIps</span></th>
                        <th style="text-align:left">NOVIEMBRE <span style="color:transparent">LoremIpsumisIps</span></th>
                        <th style="text-align:left">DICIEMBRE <span style="color:transparent">LoremIpsumisIps</span></th>
                        <th style="text-align:left">TOTALES <span style="color:transparent">LoremIpsumisIps</span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    $totalInventarioInicial = 0;
                    foreach ($datos as $key => $row) {
                        $totalInventarioInicial = $row["INVINI"] + $row["INVINI2"] + $row["INVINI3"] + $row["INVINI4"] + $row["INVINI5"] + $row["INVINI6"] + $row["INVINI7"] + $row["INVINI8"] + $row["INVINI9"] + $row["INVINI10"] + $row["INVINI11"] + $row["INVINI12"];
                        $totalEntradas = $row["ENT1"] + $row["ENT2"] + $row["ENT3"] + $row["ENT4"] + $row["ENT5"] + $row["ENT6"] + $row["ENT7"] + $row["ENT8"] + $row["ENT9"] + $row["ENT10"] + $row["ENT11"] + $row["ENT12"];
                        $totalSalidas = $row["SAL1"] + $row["SAL2"] + $row["SAL3"] + $row["SAL4"] + $row["SAL5"] + $row["SAL6"] + $row["SAL7"] + $row["SAL8"] + $row["SAL9"] + $row["SAL10"] + $row["SAL11"] + $row["SAL12"];
                        $totalExistencias = $row["EXIS"] + $row["EXIS2"] + $row["EXIS3"] + $row["EXIS4"] + $row["EXIS5"] + $row["EXIS6"] + $row["EXIS7"] + $row["EXIS8"] + $row["EXIS9"] + $row["EXIS10"] + $row["EXIS11"] + $row["EXIS12"];
                    ?>
                        <!--
                        <tr>
                            <th style="border:none"><?= $row['CANAL']; ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none"></th>
                        </tr>
                    -->
                        <tr>
                            <td style="font-size:12px">
                                <?= $row['CANAL']; ?>
                            </td>
                            <td style="background:#00BCD4">
                                <p style="font-weight:bold;font-size:11px;color:white;text-align:right">Inventario Inicial</p>
                                <p style="font-weight:bold;font-size:11px;color:white;text-align:right">Entradas</p>
                                <p style="font-weight:bold;font-size:11px;color:white;text-align:right">Salidas</p>
                                <p style="font-weight:bold;font-size:11px;color:white;text-align:right">Existencias</p>
                            </td>
                            <td style="font-weight:bold;text-align:right">

                                <p style="font-weight:bold;font-size:11px;color:#00BCD4">$ <?= number_format($row["INVINI"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right">$ <?= number_format($row["ENT1"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right">$ <?= number_format($row["SAL1"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right">$ <?= number_format($row["EXIS1"], 3) ?></p>
                            </td>
                            <td style="font-weight:bold;text-align:right">

                                <p style="font-weight:bold;font-size:11px;color:#00BCD4">$ <?= number_format($row["INVINI2"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right">$ <?= number_format($row["ENT2"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right">$ <?= number_format($row["SAL2"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right">$ <?= number_format($row["EXIS2"], 3) ?></p>
                            </td>
                            <td style="font-weight:bold;text-align:right">

                                <p style="font-weight:bold;font-size:11px;color:#00BCD4">$ <?= number_format($row["INVINI3"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right">$ <?= number_format($row["ENT3"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right">$ <?= number_format($row["SAL3"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right">$ <?= number_format($row["EXIS3"], 3) ?></p>
                            </td>
                            <td style="font-weight:bold;text-align:right">

                                <p style="font-weight:bold;font-size:11px;color:#00BCD4">$ <?= number_format($row["INVINI4"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right">$ <?= number_format($row["ENT4"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right">$ <?= number_format($row["SAL4"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right">$ <?= number_format($row["EXIS4"], 3) ?></p>
                            </td>
                            <td style="font-weight:bold;text-align:right">

                                <p style="font-weight:bold;font-size:11px;color:#00BCD4">$ <?= number_format($row["INVINI5"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right">$ <?= number_format($row["ENT5"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right">$ <?= number_format($row["SAL5"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right">$ <?= number_format($row["EXIS5"], 3) ?></p>
                            </td>
                            <td style="font-weight:bold;text-align:right">
                                <p style="font-weight:bold;font-size:11px;color:#00BCD4">$ <?= number_format($row["INVINI6"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right">$ <?= number_format($row["ENT6"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right">$ <?= number_format($row["SAL6"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right">$ <?= number_format($row["EXIS6"], 3) ?></p>
                            </td>
                            <td style="font-weight:bold;text-align:right">

                                <p style="font-weight:bold;font-size:11px;color:#00BCD4">$ <?= number_format($row["INVINI7"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right">$ <?= number_format($row["ENT7"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right">$ <?= number_format($row["SAL7"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right">$ <?= number_format($row["EXIS7"], 3) ?></p>
                            </td>
                            <td style="font-weight:bold;text-align:right">

                                <p style="font-weight:bold;font-size:11px;color:#00BCD4">$ <?= number_format($row["INVINI8"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right">$ <?= number_format($row["ENT8"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right">$ <?= number_format($row["SAL8"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right">$ <?= number_format($row["EXIS8"], 3) ?></p>
                            </td>
                            <td style="font-weight:bold;text-align:right">

                                <p style="font-weight:bold;font-size:11px;color:#00BCD4">$ <?= number_format($row["INVINI9"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right">$ <?= number_format($row["ENT9"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right">$ <?= number_format($row["SAL9"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right">$ <?= number_format($row["EXIS9"], 3) ?></p>
                            </td>
                            <td style="font-weight:bold;text-align:right">

                                <p style="font-weight:bold;font-size:11px;color:#00BCD4">$ <?= number_format($row["INVINI10"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right">$ <?= number_format($row["ENT10"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right">$ <?= number_format($row["SAL10"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right">$ <?= number_format($row["EXIS10"], 3) ?></p>
                            </td>
                            <td style="font-weight:bold;text-align:right">

                                <p style="font-weight:bold;font-size:11px;color:#00BCD4">$ <?= number_format($row["INVINI11"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right">$ <?= number_format($row["ENT11"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right">$ <?= number_format($row["SAL11"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right">$ <?= number_format($row["EXIS11"], 3) ?></p>
                            </td>
                            <td style="font-weight:bold;text-align:right">

                                <p style="font-weight:bold;font-size:11px;color:#00BCD4">$ <?= number_format($row["INVINI12"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right">$ <?= number_format($row["ENT12"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right">$ <?= number_format($row["SAL12"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right">$ <?= number_format($row["EXIS12"], 3) ?></p>
                            </td>
                            <th style="font-weight:bold;text-align:right">
                                <p style="font-weight:bold;font-size:11px;color:#ffffff">$ <?= number_format($totalInventarioInicial, 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;color:white;text-align:right">$ <?= number_format($totalEntradas, 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;color:white;text-align:right">$ <?= number_format($totalSalidas, 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;color:white;text-align:right">$ <?= number_format($totalExistencias, 3) ?></p>
                            </th>
                        </tr>
                    <?php
                        $finales++;
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>TOTAL</th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                    </tr>
                </tfoot>

            </table>
        </div>
        <div class="clearfix">
            <?php
            $inicios = $offset + 1;
            $finales += $inicios - 1;
            echo '<div class="hint-text">Mostrando ' . $inicios . ' al ' . $finales . ' de ' . $numrows . ' registros</div>';


            include '../clases/pagination.php'; //include pagination class
            $pagination = new Pagination($page, $total_pages, $adjacents);
            echo $pagination->paginateVentasCanal($vista);

            ?>
        </div>
    <?php
    }
}
if ($action == 'inventarioActualUnidades') {
    include('../clases/detalleVentas.php');
    $database = new detalleVentas();

    $vista = strip_tags($_REQUEST['vista']);
    $empresa = strip_tags($_REQUEST['empresa']);
    $ejercicio = strip_tags($_REQUEST['ejercicio']);

    $tables = "dbo.admDocumentos";
    $campos = "*";

    $search = array("vista" => $vista, "empresa" => $empresa, "ejercicio" => $ejercicio);
    //consulta principal para recuperar los datos
    $datos = $database->getInventarioActualUnidades($search);
    $countAll = $database->getCounter();
    $row = $countAll;

    if ($row > 0) {
        $numrows = $countAll;
    } else {
        $numrows = 0;
    }
    $total_pages = ceil($numrows / $per_page);

    //Recorrer los datos recuperados

    if ($numrows > 0) {
    ?> <div class="fixedColumns">
            <table class="table table-responsive table-striped table-hover ">
                <thead>
                    <tr>
                        <th style="text-align:left">CENTRO <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left"> <span style="color:transparent">LoremIpsum</span></th>
                        <th style="text-align:left">ENERO <span style="color:transparent">LoremIpsumis</span>
                        </th>
                        <th style="text-align:left">FEBRERO <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left">MARZO <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left">ABRIL <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left">MAYO <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left">JUNIO <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left">JULIO <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left">AGOSTO <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left">SEPTIEMBRE <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left">OCTUBRE <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left">NOVIEMBRE <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left">DICIEMBRE <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left">TOTALES <span style="color:transparent">LoremIpsumis</span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    $totalInventarioInicial = 0;
                    foreach ($datos as $key => $row) {
                        $totalInventarioInicial = $row["INVINI"] + $row["INVINI2"] + $row["INVINI3"] + $row["INVINI4"] + $row["INVINI5"] + $row["INVINI6"] + $row["INVINI7"] + $row["INVINI8"] + $row["INVINI9"] + $row["INVINI10"] + $row["INVINI11"] + $row["INVINI12"];
                        $totalEntradas = $row["ENT1"] + $row["ENT2"] + $row["ENT3"] + $row["ENT4"] + $row["ENT5"] + $row["ENT6"] + $row["ENT7"] + $row["ENT8"] + $row["ENT9"] + $row["ENT10"] + $row["ENT11"] + $row["ENT12"];
                        $totalSalidas = $row["SAL1"] + $row["SAL2"] + $row["SAL3"] + $row["SAL4"] + $row["SAL5"] + $row["SAL6"] + $row["SAL7"] + $row["SAL8"] + $row["SAL9"] + $row["SAL10"] + $row["SAL11"] + $row["SAL12"];
                        $totalExistencias = $row["EXIS"] + $row["EXIS2"] + $row["EXIS3"] + $row["EXIS4"] + $row["EXIS5"] + $row["EXIS6"] + $row["EXIS7"] + $row["EXIS8"] + $row["EXIS9"] + $row["EXIS10"] + $row["EXIS11"] + $row["EXIS12"];
                    ?>
                        <!--
                        <tr>
                            <th style="border:none"><?= $row['CANAL']; ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none"></th>
                        </tr>
                    -->
                        <tr>
                            <td style="font-size:12px">
                                <?= $row['CANAL']; ?>
                            </td>
                            <td style="background:#00BCD4">
                                <p style="font-weight:bold;font-size:11px;color:white;text-align:right">Inventario Inicial</p>
                                <p style="font-weight:bold;font-size:11px;color:white;text-align:right">Entradas</p>
                                <p style="font-weight:bold;font-size:11px;color:white;text-align:right">Salidas</p>
                                <p style="font-weight:bold;font-size:11px;color:white;text-align:right">Existencias</p>
                            </td>
                            <td style="font-weight:bold;text-align:right">

                                <p style="font-weight:bold;font-size:11px;color:#00BCD4"># <?= number_format($row["INVINI"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right"># <?= number_format($row["ENT1"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right"># <?= number_format($row["SAL1"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right"># <?= number_format($row["EXIS1"], 3) ?></p>
                            </td>
                            <td style="font-weight:bold;text-align:right">

                                <p style="font-weight:bold;font-size:11px;color:#00BCD4"># <?= number_format($row["INVINI2"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right"># <?= number_format($row["ENT2"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right"># <?= number_format($row["SAL2"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right"># <?= number_format($row["EXIS2"], 3) ?></p>
                            </td>
                            <td style="font-weight:bold;text-align:right">

                                <p style="font-weight:bold;font-size:11px;color:#00BCD4"># <?= number_format($row["INVINI3"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right"># <?= number_format($row["ENT3"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right"># <?= number_format($row["SAL3"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right"># <?= number_format($row["EXIS3"], 3) ?></p>
                            </td>
                            <td style="font-weight:bold;text-align:right">

                                <p style="font-weight:bold;font-size:11px;color:#00BCD4"># <?= number_format($row["INVINI4"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right"># <?= number_format($row["ENT4"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right"># <?= number_format($row["SAL4"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right"># <?= number_format($row["EXIS4"], 3) ?></p>
                            </td>
                            <td style="font-weight:bold;text-align:right">

                                <p style="font-weight:bold;font-size:11px;color:#00BCD4"># <?= number_format($row["INVINI5"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right"># <?= number_format($row["ENT5"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right"># <?= number_format($row["SAL5"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right"># <?= number_format($row["EXIS5"], 3) ?></p>
                            </td>
                            <td style="font-weight:bold;text-align:right">
                                <p style="font-weight:bold;font-size:11px;color:#00BCD4"># <?= number_format($row["INVINI6"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right"># <?= number_format($row["ENT6"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right"># <?= number_format($row["SAL6"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right"># <?= number_format($row["EXIS6"], 3) ?></p>
                            </td>
                            <td style="font-weight:bold;text-align:right">

                                <p style="font-weight:bold;font-size:11px;color:#00BCD4"># <?= number_format($row["INVINI7"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right"># <?= number_format($row["ENT7"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right"># <?= number_format($row["SAL7"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right"># <?= number_format($row["EXIS7"], 3) ?></p>
                            </td>
                            <td style="font-weight:bold;text-align:right">

                                <p style="font-weight:bold;font-size:11px;color:#00BCD4"># <?= number_format($row["INVINI8"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right"># <?= number_format($row["ENT8"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right"># <?= number_format($row["SAL8"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right"># <?= number_format($row["EXIS8"], 3) ?></p>
                            </td>
                            <td style="font-weight:bold;text-align:right">

                                <p style="font-weight:bold;font-size:11px;color:#00BCD4"># <?= number_format($row["INVINI9"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right"># <?= number_format($row["ENT9"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right"># <?= number_format($row["SAL9"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right"># <?= number_format($row["EXIS9"], 3) ?></p>
                            </td>
                            <td style="font-weight:bold;text-align:right">

                                <p style="font-weight:bold;font-size:11px;color:#00BCD4"># <?= number_format($row["INVINI10"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right"># <?= number_format($row["ENT10"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right"># <?= number_format($row["SAL10"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right"># <?= number_format($row["EXIS10"], 3) ?></p>
                            </td>
                            <td style="font-weight:bold;text-align:right">

                                <p style="font-weight:bold;font-size:11px;color:#00BCD4"># <?= number_format($row["INVINI11"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right"># <?= number_format($row["ENT11"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right"># <?= number_format($row["SAL11"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right"># <?= number_format($row["EXIS11"], 3) ?></p>
                            </td>
                            <td style="font-weight:bold;text-align:right">

                                <p style="font-weight:bold;font-size:11px;color:#00BCD4"># <?= number_format($row["INVINI12"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right"># <?= number_format($row["ENT12"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right"># <?= number_format($row["SAL12"], 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;text-align:right"># <?= number_format($row["EXIS12"], 3) ?></p>
                            </td>
                            <th style="font-weight:bold;text-align:right">
                                <p style="font-weight:bold;font-size:11px;color:#ffffff"># <?= number_format($totalInventarioInicial, 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;color:white;text-align:right"># <?= number_format($totalEntradas, 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;color:white;text-align:right"># <?= number_format($totalSalidas, 3) ?></p>
                                <p style="font-weight:bold;font-size:11px;color:white;text-align:right"># <?= number_format($totalExistencias, 3) ?></p>
                            </th>
                        </tr>
                    <?php
                        $finales++;
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>TOTAL</th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                    </tr>
                </tfoot>

            </table>
        </div>
        <div class="clearfix">
            <?php
            $inicios = $offset + 1;
            $finales += $inicios - 1;
            echo '<div class="hint-text">Mostrando ' . $inicios . ' al ' . $finales . ' de ' . $numrows . ' registros</div>';


            include '../clases/pagination.php'; //include pagination class
            $pagination = new Pagination($page, $total_pages, $adjacents);
            echo $pagination->paginateVentasCanal($vista);

            ?>
        </div>
    <?php
    }
}
if ($action == 'indicadoresUtilidad') {
    include('../clases/detalleVentas.php');
    $database = new detalleVentas();
    //Recibir variables enviadas
    $query = strip_tags($_REQUEST['query']);
    $vista = strip_tags($_REQUEST['vista']);
    $año = strip_tags($_REQUEST['anio']);
    $estatus = strip_tags($_REQUEST['estatus']);
    $centro = strip_tags($_REQUEST['centro']);
    $agente = strip_tags($_REQUEST['agente']);
    $per_page = intval($_REQUEST['per_page']);
    $campo = strip_tags($_REQUEST['campo']);
    $orden = strip_tags($_REQUEST['orden']);

    $tables = "dbo.admDocumentos";
    $campos = "*";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;
    $search = array("query" => $query, "año" => $año, "estatus" => $estatus, "centro" => $centro, "agente" => $agente, "per_page" => $per_page, "offset" => $offset, "campo" => $campo, "orden" => $orden);
    //consulta principal para recuperar los datos
    $datos = $database->getIndicadoresVentas($search);
    $indicadores = $database->getIndicadoresUtilidad($search);

    $countAll = $database->getCounter();
    $row = $countAll;

    if ($row > 0) {
        $numrows = $countAll;
    } else {
        $numrows = 0;
    }
    $total_pages = ceil($numrows / $per_page);

    //Recorrer los datos recuperados

    if ($numrows > 0) {
    ?> <div class="fixedColumns">
            <table class="table table-responsive table-striped table-hover ">
                <thead>
                    <tr>
                        <th style="text-align:left">CENTRO <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left">ENERO <span style="color:transparent">LoremIpsumis</span>
                        </th>
                        <th style="text-align:left">FEBRERO <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left">MARZO <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left">ABRIL <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left">MAYO <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left">JUNIO <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left">JULIO <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left">AGOSTO <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left">SEPTIEMBRE <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left">OCTUBRE <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left">NOVIEMBRE <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left">DICIEMBRE <span style="color:transparent">LoremIpsumis</span></th>
                        <th style="text-align:left">TOTALES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    $mes1 = 0;
                    $mes2 = 0;
                    $mes3 = 0;
                    $mes4 = 0;
                    $mes5 = 0;
                    $mes6 = 0;
                    $mes7 = 0;
                    $mes8 = 0;
                    $mes9 = 0;
                    $mes10 = 0;
                    $mes11 = 0;
                    $mes12 = 0;
                    $mesTotales = 0;
                    foreach ($datos as $key => $row) {
                        $mes1 += $row['1'];
                        $mes2 += $row['2'];
                        $mes3 += $row['3'];
                        $mes4 += $row['4'];
                        $mes5 += $row['5'];
                        $mes6 += $row['6'];
                        $mes7 += $row['7'];
                        $mes8 += $row['8'];
                        $mes9 += $row['9'];
                        $mes10 += $row['10'];
                        $mes11 += $row['11'];
                        $mes12 += $row['12'];
                        $mesTotales += $row['Totales'];
                        $utilidad1 = bcdiv(($row["1"] - $indicadores[$key]["1"]) / $row["1"] * 100, '1', 2);
                        $utilidad2 = bcdiv(($row["2"] - $indicadores[$key]["2"]) / $row["2"] * 100, '1', 2);
                        $utilidad3 = bcdiv(($row["3"] - $indicadores[$key]["3"]) / $row["3"] * 100, '1', 2);
                        $utilidad4 = bcdiv(($row["4"] - $indicadores[$key]["4"]) / $row["4"] * 100, '1', 2);
                        $utilidad5 = bcdiv(($row["5"] - $indicadores[$key]["5"]) / $row["5"] * 100, '1', 2);
                        $utilidad6 = bcdiv(($row["6"] - $indicadores[$key]["6"]) / $row["6"] * 100, '1', 2);
                        $utilidad7 = bcdiv(($row["7"] - $indicadores[$key]["7"]) / $row["7"] * 100, '1', 2);
                        $utilidad8 = bcdiv(($row["8"] - $indicadores[$key]["8"]) / $row["8"] * 100, '1', 2);
                        $utilidad9 = bcdiv(($row["9"] - $indicadores[$key]["9"]) / $row["9"] * 100, '1', 2);
                        $utilidad10 = bcdiv(($row["10"] - $indicadores[$key]["10"]) / $row["10"] * 100, '1', 2);
                        $utilidad11 = bcdiv(($row["11"] - $indicadores[$key]["11"]) / $row["11"] * 100, '1', 2);
                        $utilidad12 = bcdiv(($row["12"] - $indicadores[$key]["12"]) / $row["12"] * 100, '1', 2);
                        $utilidadGeneral =  bcdiv(($row['Totales'] - $indicadores[$key]['Totales']) / $row["Totales"] * 100, '1', 2);

                        $porceUtilidad1 = is_nan($utilidad1) === NULL ? 0 : $utilidad1;
                        $porceUtilidad2 = is_nan($utilidad2) === NULL ? 0 : $utilidad2;
                        $porceUtilidad3 = is_nan($utilidad3) === NULL ? 0 : $utilidad3;
                        $porceUtilidad4 = is_nan($utilidad4) === NULL ? 0 : $utilidad4;
                        $porceUtilidad5 = is_nan($utilidad5) === NULL ? 0 : $utilidad5;
                        $porceUtilidad6 = is_nan($utilidad6) === NULL ? 0 : $utilidad6;
                        $porceUtilidad7 = is_nan($utilidad7) === NULL ? 0 : $utilidad7;
                        $porceUtilidad8 = is_nan($utilidad8) === NULL ? 0 : $utilidad8;
                        $porceUtilidad9 = is_nan($utilidad9) === NULL ? 0 : $utilidad9;
                        $porceUtilidad10 = is_nan($utilidad10) === NULL ? 0 : $utilidad10;
                        $porceUtilidad11 = is_nan($utilidad11) === NULL ? 0 : $utilidad11;
                        $porceUtilidad12 = is_nan($utilidad12) === NULL ? 0 : $utilidad12;
                    ?>
                        <tr>
                            <th style="border:none"><?= $row['centroTrabajo']; ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none" ?></th>
                            <th style="font-weight:bold;text-align:left;border:none"></th>
                        </tr>
                        <tr>
                            <td style="background:#00BCD4">
                                <p style="font-weight:bold;font-size:11px;color:white">Ventas</p>
                                <p style="font-weight:bold;font-size:11px;color:white">Costo Prod. Vendidos</p>
                                <p style="font-weight:bold;font-size:11px;color:white">Utilidad</p>
                                <p style="font-weight:bold;font-size:11px;color:white">Margen</p>
                            </td>
                            <td style="font-weight:bold;text-align:right">

                                <p class="btnSalesCanal" style="color:#333333" onclick="redireccionAccionVentasIndicadores('<?= $row['canalComercial']; ?>','Canal','','<?= $_REQUEST['anio'] ?>','1','<?= $row['centroTrabajo'] ?>')">$<?= number_format($row['1'], 2) ?></p>
                                <p style="color:#333333" class="btnDetailIndicadores">$<?= number_format($indicadores[$key]['1'], 2) ?></p>
                                <p style="color:blue">$<?= number_format($row['1'] - abs($indicadores[$key]['1']), 2) ?></p>
                                <p style="color:<?= color($porceUtilidad1); ?>"><?= $porceUtilidad1 ?>%</p>
                            </td>
                            <td style="font-weight:bold;text-align:right">
                                <p class="btnSalesCanal" style="color:#333333" onclick="redireccionAccionVentasIndicadores('<?= $row['canalComercial']; ?>','Canal','','<?= $_REQUEST['anio'] ?>','2','<?= $row['centroTrabajo'] ?>')">$<?= number_format($row['2'], 2) ?></p>
                                <p style="color:#333333" class="btnDetailIndicadores">$<?= number_format($indicadores[$key]['2'], 2) ?></p>
                                <p style="color:blue">$<?= number_format($row['2'] - abs($indicadores[$key]['2']), 2) ?></p>
                                <p style="color:<?= color($porceUtilidad2); ?>"><?= is_nan($utilidad2) === NULL ? 0 : $utilidad2 ?>%</p>
                            </td>
                            <td style="font-weight:bold;text-align:right">
                                <p class="btnSalesCanal" style="color:#333333" onclick="redireccionAccionVentasIndicadores('<?= $row['canalComercial']; ?>','Canal','','<?= $_REQUEST['anio'] ?>','3','<?= $row['centroTrabajo'] ?>')">$<?= number_format($row['3'], 2) ?></p>
                                <p style="color:#333333" class="btnDetailIndicadores">$<?= number_format($indicadores[$key]['3'], 2) ?></p>
                                <p style="color:blue">$<?= number_format($row['3'] - abs($indicadores[$key]['3']), 2) ?></p>
                                <p style="color:<?= color($porceUtilidad3); ?>"><?= is_nan($utilidad3) === NULL ? 0 : $utilidad3 ?>%</p>
                            </td>
                            <td style="font-weight:bold;text-align:right">
                                <p class="btnSalesCanal" style="color:#333333" onclick="redireccionAccionVentasIndicadores('<?= $row['canalComercial']; ?>','Canal','','<?= $_REQUEST['anio'] ?>','4','<?= $row['centroTrabajo'] ?>')">$<?= number_format($row['4'], 2) ?></p>
                                <p style="color:#333333" class="btnDetailIndicadores">$<?= number_format($indicadores[$key]['4'], 2) ?></p>
                                <p style="color:blue">$<?= number_format($row['4'] - abs($indicadores[$key]['4']), 2) ?></p>
                                <p style="color:<?= color($porceUtilidad4); ?>"><?= is_nan($utilidad4) === NULL ? 0 : $utilidad4 ?>%</p>
                            </td>
                            <td style="font-weight:bold;text-align:right">
                                <p class="btnSalesCanal" style="color:#333333" onclick="redireccionAccionVentasIndicadores('<?= $row['canalComercial']; ?>','Canal','','<?= $_REQUEST['anio'] ?>','5','<?= $row['centroTrabajo'] ?>')">$<?= number_format($row['5'], 2) ?></p>
                                <p style="color:#333333" class="btnDetailIndicadores">$<?= number_format($indicadores[$key]['5'], 2) ?></p>
                                <p style="color:blue">$<?= number_format($row['5'] - abs($indicadores[$key]['5']), 2) ?></p>
                                <p style="color:<?= color($porceUtilidad5); ?>"><?= is_nan($utilidad5) === NULL ? 0 : $utilidad5 ?>%</p>
                            </td>
                            <td style="font-weight:bold;text-align:right">
                                <p class="btnSalesCanal" style="color:#333333" onclick="redireccionAccionVentasIndicadores('<?= $row['canalComercial']; ?>','Canal','','<?= $_REQUEST['anio'] ?>','6','<?= $row['centroTrabajo'] ?>')">$<?= number_format($row['6'], 2) ?></p>
                                <p style="color:#333333" class="btnDetailIndicadores">$<?= number_format($indicadores[$key]['6'], 2) ?></p>
                                <p style="color:blue">$<?= number_format($row['6'] - abs($indicadores[$key]['6']), 2) ?></p>
                                <p style="color:<?= color($porceUtilidad6); ?>"><?= is_nan($utilidad6) === NULL ? 0 : $utilidad6 ?>%</p>
                            </td>
                            <td style="font-weight:bold;text-align:right">
                                <p class="btnSalesCanal" style="color:#333333" onclick="redireccionAccionVentasIndicadores('<?= $row['canalComercial']; ?>','Canal','','<?= $_REQUEST['anio'] ?>','7','<?= $row['centroTrabajo'] ?>')">$<?= number_format($row['7'], 2) ?></p>
                                <p style="color:#333333" class="btnDetailIndicadores">$<?= number_format($indicadores[$key]['7'], 2) ?></p>
                                <p style="color:blue">$<?= number_format($row['7'] - abs($indicadores[$key]['7']), 2) ?></p>
                                <p style="color:<?= color($porceUtilidad7); ?>"><?= is_nan($utilidad7) === NULL ? 0 : $utilidad7 ?>%</p>
                            </td>
                            <td style="font-weight:bold;text-align:right">
                                <p class="btnSalesCanal" style="color:#333333" onclick="redireccionAccionVentasIndicadores('<?= $row['canalComercial']; ?>','Canal','','<?= $_REQUEST['anio'] ?>','8','<?= $row['centroTrabajo'] ?>')">$<?= number_format($row['8'], 2) ?></p>
                                <p style="color:#333333" class="btnDetailIndicadores">$<?= number_format($indicadores[$key]['8'], 2) ?></p>
                                <p style="color:blue">$<?= number_format($row['8'] - abs($indicadores[$key]['8']), 2) ?></p>
                                <p style="color:<?= color($porceUtilidad8); ?>"><?= is_nan($utilidad8) === NULL ? 0 : $utilidad8 ?>%</p>
                            </td>
                            <td style="font-weight:bold;text-align:right">
                                <p class="btnSalesCanal" style="color:#333333" onclick="redireccionAccionVentasIndicadores('<?= $row['canalComercial']; ?>','Canal','','<?= $_REQUEST['anio'] ?>','9','<?= $row['centroTrabajo'] ?>')">$<?= number_format($row['9'], 2) ?></p>
                                <p style="color:#333333" class="btnDetailIndicadores">$<?= number_format($indicadores[$key]['9'], 2) ?></p>
                                <p style="color:blue">$<?= number_format($row['9'] - abs($indicadores[$key]['9']), 2) ?></p>
                                <p style="color:<?= color($porceUtilidad9); ?>"><?= is_nan($utilidad9) === NULL ? 0 : $utilidad9 ?>%</p>
                            </td>
                            <td style="font-weight:bold;text-align:right">
                                <p class="btnSalesCanal" style="color:#333333" onclick="redireccionAccionVentasIndicadores('<?= $row['canalComercial']; ?>','Canal','','<?= $_REQUEST['anio'] ?>','10','<?= $row['centroTrabajo'] ?>')">$<?= number_format($row['10'], 2) ?></p>
                                <p style="color:#333333" class="btnDetailIndicadores">$<?= number_format($indicadores[$key]['10'], 2) ?></p>
                                <p style="color:blue">$<?= number_format($row['10'] - abs($indicadores[$key]['10']), 2) ?></p>
                                <p style="color:<?= color($porceUtilidad10); ?>"><?= is_nan($utilidad10) === NULL ? 0 : $utilidad10 ?>%</p>
                            </td>
                            <td style="font-weight:bold;text-align:right">
                                <p class="btnSalesCanal" style="color:#333333" onclick="redireccionAccionVentasIndicadores('<?= $row['canalComercial']; ?>','Canal','','<?= $_REQUEST['anio'] ?>','11','<?= $row['centroTrabajo'] ?>')">$<?= number_format($row['11'], 2) ?></p>
                                <p style="color:#333333" class="btnDetailIndicadores">$<?= number_format($indicadores[$key]['11'], 2) ?></p>
                                <p style="color:blue">$<?= number_format($row['11'] - abs($indicadores[$key]['11']), 2) ?></p>
                                <p style="color:<?= color($porceUtilidad11); ?>"><?= is_nan($utilidad11) === NULL ? 0 : $utilidad11 ?>%</p>
                            </td>
                            <td style="font-weight:bold;text-align:right">
                                <p class="btnSalesCanal" style="color:#333333" onclick="redireccionAccionVentasIndicadores('<?= $row['canalComercial']; ?>','Canal','','<?= $_REQUEST['anio'] ?>','12','<?= $row['centroTrabajo'] ?>')">$<?= number_format($row['12'], 2) ?></p>
                                <p style="color:#333333" class="btnDetailIndicadores">$<?= number_format($indicadores[$key]['12'], 2) ?></p>
                                <p style="color:blue">$<?= number_format($row['12'] - abs($indicadores[$key]['12']), 2) ?></p>
                                <p style="color:<?= color($porceUtilidad12); ?>"><?= is_nan($utilidad12) === NULL ? 0 : $utilidad12 ?>%</p>
                            </td>
                            <th style="font-weight:bold;text-align:right">
                                <p style="color:#ffffff">$<?= number_format($row['Totales'], 2) ?></p>
                                <p style="color:#ffffff">$<?= number_format($indicadores[$key]['Totales'], 2) ?></p>
                                <p style="color:#ffffff">$<?= number_format($row['Totales'] - $indicadores[$key]['Totales'], 2) ?></p>
                                <p style="color:<?= color($utilidadGeneral); ?>"> <?= $utilidadGeneral ?>%</p>
                            </th>
                        </tr>
                    <?php
                        $finales++;
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>TOTAL</th>
                        <th style="font-weight:bold;text-align:right" ?></th>
                        <th style="font-weight:bold;text-align:right" ?></th>
                        <th style="font-weight:bold;text-align:right" ?></th>
                        <th style="font-weight:bold;text-align:right" ?></th>
                        <th style="font-weight:bold;text-align:right" ?></th>
                        <th style="font-weight:bold;text-align:right" ?></th>
                        <th style="font-weight:bold;text-align:right" ?></th>
                        <th style="font-weight:bold;text-align:right" ?></th>
                        <th style="font-weight:bold;text-align:right" ?></th>
                        <th style="font-weight:bold;text-align:right" ?></th>
                        <th style="font-weight:bold;text-align:right" ?></th>
                        <th style="font-weight:bold;text-align:right" ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($mesTotales, 2) ?></th>
                    </tr>
                </tfoot>

            </table>
        </div>
        <div class="clearfix">
            <?php
            $inicios = $offset + 1;
            $finales += $inicios - 1;
            echo '<div class="hint-text">Mostrando ' . $inicios . ' al ' . $finales . ' de ' . $numrows . ' registros</div>';


            include '../clases/pagination.php'; //include pagination class
            $pagination = new Pagination($page, $total_pages, $adjacents);
            echo $pagination->paginateVentasCanal($vista);

            ?>
        </div>
<?php
    }
}
?>