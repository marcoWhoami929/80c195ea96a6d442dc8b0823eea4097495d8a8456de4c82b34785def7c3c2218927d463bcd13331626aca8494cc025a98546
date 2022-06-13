<?php
session_start();
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if ($action == 'listaInventarios') {

    include('../clases/dataInventarios.php');
    $database = new dataInventarios();
    //Recibir variables enviadas

    if ($_REQUEST['usuario'] == '10' || $_REQUEST['usuario'] == '12' || $_REQUEST['usuario'] == '13' || $_REQUEST['usuario'] == '14' || $_REQUEST['usuario'] == '15') {
        $usuario = strip_tags($_REQUEST['usuario']);
    } else {
        $usuario = 0;
    }

    $vista = strip_tags($_REQUEST['vista']);
    $per_page = intval($_REQUEST['per_page']);
    $campo = strip_tags($_REQUEST['campo']);
    $orden = strip_tags($_REQUEST['orden']);
    $mes = strip_tags($_REQUEST['mes']);
    $año = strip_tags($_REQUEST['año']);
    $estatus = strip_tags($_REQUEST['estatus']);
    $sucursal = strip_tags($_REQUEST['sucursal']);
    $campos = "inv.*,adm.nombre as 'Solicitante',adm2.nombre as 'Realizador',alm.cnombrealmacen as 'Almacen',MONTH(inv.fecha) as 'Mes',YEAR(inv.fecha) as 'Año'";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;

    $search = array("estatus" => $estatus, "usuario" => $usuario, "sucursal" => $sucursal, "año" => $año, "mes" => $mes,   "per_page" => $per_page, "offset" => $offset, "campo" => $campo, "orden" => $orden);
    //consulta principal para recuperar los datos
    $datos = $database->getInventarios($campos, $search);
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
?>
        <table class="table table-responsive table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>AREA</th>
                    <th>SERIE</th>
                    <th>FOLIO</th>
                    <th>FECHA</th>
                    <th>ALMACEN</th>
                    <th># EXISTENCIA</th>
                    <th># INVENTARIO</th>
                    <th># DIFERENCIA</th>
                    <th>$ EXISTENCIA</th>
                    <th>$ INVENTARIO</th>
                    <th>$ DIFERENCIA</th>
                    <th>%</th>
                    <th>SOLICITADO POR</th>
                    <th>REALIZADO POR</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $finales = 0;
                foreach ($datos as $key => $row) {

                    switch ($row["idEstatus"]) {
                        case '0':
                            $estatus = '#FF5252';
                            $estado = "";
                            break;
                        case '1':
                            $estatus = '#E06D00';
                            $estado = "";
                            break;
                        case '2':
                            $estatus = '#007AE0';
                            $estado = "none";
                            break;
                        case '3':
                            $estatus = '#003AE0';
                            $estado = "none";
                            break;
                        case '4':
                            $estatus = '#11C15B';
                            $estado = "none";
                            break;
                    }

                    $porcentaje = number_format((($row['inventarioImportes'] / $row['existenciasImportes']) * 100), 2);
                    if ($porcentaje < 40) {
                        $indicador = "<i class='fa fa-circle fa-2x' style='color:red' aria-hidden='true'></i>";
                    } else if ($porcentaje > 40 and $porcentaje < 70) {
                        $indicador = "<i class='fa fa-circle fa-2x' style='color:yellow' aria-hidden='true'></i>";
                    } else if ($porcentaje >= 70) {
                        $indicador = "<i class='fa fa-circle fa-2x' style='color:green' aria-hidden='true'></i>";
                    }


                ?>
                    <tr>
                        <td style="background:<?php echo $estatus ?>;color:white"><?= $row['id']; ?></td>
                        <td style="font-weight:bold;text-align:left"><?= $row['area']; ?></td>
                        <td style="font-weight:bold;text-align:left"><?= $row['serie']; ?></td>
                        <td style="font-weight:bold;text-align:left"><?= $row['folio'] ?></td>
                        <td><?= $row['fecha'] ?></td>
                        <td><?= $row['Almacen'] ?></td>
                        <td><?= bcdiv($row['existencias'], '1', 2) ?></td>
                        <td><?= bcdiv($row['inventario'], '1', 2) ?></td>
                        <td><?= bcdiv($row['diferencia'], '1', 2) ?></td>
                        <td>$ <?= number_format($row['existenciasImportes'], 2) ?></td>
                        <td>$ <?= number_format($row['inventarioImportes'], 2) ?></td>
                        <td>$ <?= number_format($row['diferenciaImportes'], 2) ?></td>
                        <td><?= $indicador . " " . $porcentaje ?></td>
                        <td><?= $row['Solicitante'] ?></td>
                        <td><?= $row['Realizador'] ?></td>

                        <td>
                            <button type="button" class="btn btn-primary" onclick="editarInventario('<?= $row['folio'] ?>')"><i class="fa fa-edit"></i></button>
                            &nbsp;
                            <!--
                            <button type="button" style="display:<?= $estado ?>" class="btn btn-primary" onclick="eliminarDocumento('inventario','<?= $row['folio'] ?>')"><i class="fa fa-trash"></i></button>
                -->
                        </td>
                    </tr>
                <?php
                    $finales++;
                }
                ?>
            </tbody>
        </table>
        <div class="clearfix">
            <?php
            $inicios = $offset + 1;
            $finales += $inicios - 1;
            echo '<div class="hint-text">Mostrando ' . $inicios . ' al ' . $finales . ' de ' . $numrows . ' registros</div>';


            include '../clases/pagination.php'; //include pagination class
            $pagination = new Pagination($page, $total_pages, $adjacents);
            echo $pagination->paginateInventarios($vista);

            ?>
        </div>
    <?php
    }
}

if ($action == 'listaPedidosFaltantes') {

    include('../clases/dataInventarios.php');
    $database = new dataInventarios();
    //Recibir variables enviadas
    $usuario = strip_tags($_REQUEST['usuario']);
    $vista = strip_tags($_REQUEST['vista']);
    $per_page = intval($_REQUEST['per_page']);
    $prioridad = strip_tags($_REQUEST['prioridad']);
    $campo = strip_tags($_REQUEST['campo']);
    $orden = strip_tags($_REQUEST['orden']);
    $campos = "ped.id,ped.prioridad,ped.serie,ped.folio,ped.fecha,alm.cnombrealmacen as almacen,solicitado as unidades,importeSolicitado as importe,recibido,importeRecibido,pendientes,importePendiente,est.id as estatus,adm.nombre as solicitante,IF(adm2.nombre IS NULL,'Sin aprobar',adm2.nombre) as aprobador,ped.observaciones";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;

    $search = array("usuario" => $usuario, "per_page" => $per_page, "offset" => $offset, "prioridad" => $prioridad, "campo" => $campo, "orden" => $orden);
    //consulta principal para recuperar los datos
    $datos = $database->getPedidosFaltantes($campos, $search);
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
    ?>
        <table class="table table-responsive table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>SERIE</th>
                    <th>FOLIO</th>
                    <th>FECHA</th>
                    <th>ALMACEN</th>
                    <th># PENDIENTES</th>
                    <th>$ PENDIENTE</th>
                    <th>% SURT</th>
                    <th>PRIORIDAD</th>
                    <th>APROBADO POR</th>
                    <th>OBSERVACIONES</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $finales = 0;
                foreach ($datos as $key => $row) {

                    switch ($row["estatus"]) {
                        case '1':
                            $estatus = '#FF5252';
                            break;
                        case '2':
                            $estatus = '#E57B23';
                            break;
                        case '3':
                            $estatus = '#03A9F4';
                            break;
                        case '4':
                            $estatus = '#11C15B';
                            break;
                    }
                    switch ($row["prioridad"]) {
                        case '1':
                            $prioridad = '<i class="fa fa-flag-checkered fa-2x" style="color:#E57B23"></i>';
                            break;
                        case '2':
                            $prioridad = '<i class="fa fa-flag-checkered fa-2x" style="color:#FF5252"></i>';
                            break;
                    }
                    $porcentaje = number_format((($row['recibido'] / $row['unidades']) * 100), 2);
                    if ($porcentaje < 40) {
                        $indicador = "<i class='fa fa-circle fa-2x' style='color:red' aria-hidden='true'></i>";
                    } else if ($porcentaje > 40 and $porcentaje < 70) {
                        $indicador = "<i class='fa fa-circle fa-2x' style='color:yellow' aria-hidden='true'></i>";
                    } else if ($porcentaje >= 70) {
                        $indicador = "<i class='fa fa-circle fa-2x' style='color:green' aria-hidden='true'></i>";
                    }


                ?>
                    <tr>
                        <td style="background:<?php echo $estatus ?>;color:white"><?= $row['id']; ?></td>
                        <td style="font-weight:bold;text-align:left"><?= $row['serie']; ?></td>
                        <td style="font-weight:bold;text-align:left"><?= $row['folio'] ?></td>
                        <td><?= $row['fecha'] ?></td>
                        <td><?= $row['almacen'] ?></td>
                        <td><?= $row['pendientes'] ?></td>
                        <td>$ <?= number_format($row['importePendiente'], 2) ?></td>
                        <td><?= $indicador . " " . $porcentaje ?></td>
                        <td><?= $prioridad ?></td>
                        <td><?= $row['aprobador'] ?></td>
                        <td><?= $row['observaciones'] ?></td>
                        <td>
                            <button type="button" class="btn btn-primary" onclick="editarDocumento('2','pedidos','<?= $row['folio'] ?>','faltante','2')"><i class="fa fa-edit"></i></button>

                        </td>
                    </tr>
                <?php
                    $finales++;
                }
                ?>
            </tbody>
        </table>
        <div class="clearfix">
            <?php
            $inicios = $offset + 1;
            $finales += $inicios - 1;
            echo '<div class="hint-text">Mostrando ' . $inicios . ' al ' . $finales . ' de ' . $numrows . ' registros</div>';


            include '../clases/pagination.php'; //include pagination class
            $pagination = new Pagination($page, $total_pages, $adjacents);
            echo $pagination->paginateInventarios($vista);

            ?>
        </div>
    <?php
    }
}
if ($action == 'listaPedidosFaltantesAdmin') {

    include('../clases/dataInventarios.php');
    $database = new dataInventarios();
    //Recibir variables enviadas
    $vista = strip_tags($_REQUEST['vista']);
    $per_page = intval($_REQUEST['per_page']);
    $prioridad = strip_tags($_REQUEST['prioridad']);
    $sucursal = strip_tags($_REQUEST['sucursal']);
    $campo = strip_tags($_REQUEST['campo']);
    $orden = strip_tags($_REQUEST['orden']);
    $campos = "ped.id,ped.prioridad,ped.serie,ped.folio,ped.fecha,alm.cnombrealmacen as almacen,solicitado as unidades,importeSolicitado as importe,recibido,importeRecibido,pendientes,importePendiente,est.id as estatus,adm.nombre as solicitante,IF(adm2.nombre IS NULL,'Sin aprobar',adm2.nombre) as aprobador,ped.observaciones";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;

    $search = array("sucursal" => $sucursal, "per_page" => $per_page, "offset" => $offset, "prioridad" => $prioridad, "campo" => $campo, "orden" => $orden);
    //consulta principal para recuperar los datos
    $datos = $database->getPedidosFaltantesAdmin($campos, $search);
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
    ?>
        <table class="table table-responsive table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>SERIE</th>
                    <th>FOLIO</th>
                    <th>FECHA</th>
                    <th>ALMACEN</th>
                    <th># SOLICITADO</th>
                    <th>$ SOLICITADO</th>
                    <th># PENDIENTES</th>
                    <th>$ PENDIENTE</th>
                    <th>% SURT</th>
                    <th>PRIORIDAD</th>
                    <th>APROBADO POR</th>
                    <th>OBSERVACIONES</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $finales = 0;
                foreach ($datos as $key => $row) {

                    switch ($row["estatus"]) {
                        case '1':
                            $estatus = '#FF5252';
                            break;
                        case '2':
                            $estatus = '#E57B23';
                            break;
                        case '3':
                            $estatus = '#03A9F4';
                            break;
                        case '4':
                            $estatus = '#11C15B';
                            break;
                    }
                    switch ($row["prioridad"]) {
                        case '1':
                            $prioridad = '<i class="fa fa-flag-checkered fa-2x" style="color:#E57B23"></i>';
                            break;
                        case '2':
                            $prioridad = '<i class="fa fa-flag-checkered fa-2x" style="color:#FF5252"></i>';
                            break;
                    }
                    $porcentaje = number_format((($row['recibido'] / $row['unidades']) * 100), 2);
                    if ($porcentaje < 40) {
                        $indicador = "<i class='fa fa-circle fa-2x' style='color:red' aria-hidden='true'></i>";
                    } else if ($porcentaje > 40 and $porcentaje < 70) {
                        $indicador = "<i class='fa fa-circle fa-2x' style='color:yellow' aria-hidden='true'></i>";
                    } else if ($porcentaje >= 70) {
                        $indicador = "<i class='fa fa-circle fa-2x' style='color:green' aria-hidden='true'></i>";
                    }


                ?>
                    <tr>
                        <td style="background:<?php echo $estatus ?>;color:white"><?= $row['id']; ?></td>
                        <td style="font-weight:bold;text-align:left"><?= $row['serie']; ?></td>
                        <td style="font-weight:bold;text-align:left"><?= $row['folio'] ?></td>
                        <td><?= $row['fecha'] ?></td>
                        <td><?= $row['almacen'] ?></td>
                        <td><?= $row['unidades'] ?></td>
                        <td>$ <?= number_format($row['importe'], 2) ?></td>
                        <td><?= $row['pendientes'] ?></td>
                        <td>$ <?= number_format($row['importePendiente'], 2) ?></td>
                        <td><?= $indicador . " " . $porcentaje ?></td>
                        <td><?= $prioridad ?></td>
                        <td><?= $row['aprobador'] ?></td>
                        <td><?= $row['observaciones'] ?></td>
                        <td>
                            <button type="button" class="btn btn-primary" onclick="editarDocumento('2','pedidos','<?= $row['folio'] ?>','faltante','2')"><i class="fa fa-edit"></i></button>

                        </td>
                    </tr>
                <?php
                    $finales++;
                }
                ?>
            </tbody>
        </table>
        <div class="clearfix">
            <?php
            $inicios = $offset + 1;
            $finales += $inicios - 1;
            echo '<div class="hint-text">Mostrando ' . $inicios . ' al ' . $finales . ' de ' . $numrows . ' registros</div>';


            include '../clases/pagination.php'; //include pagination class
            $pagination = new Pagination($page, $total_pages, $adjacents);
            echo $pagination->paginateInventarios($vista);

            ?>
        </div>
<?php
    }
}
?>