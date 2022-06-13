<?php
session_start();
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if ($action == 'listaPedidos') {

    include('../clases/dataInventarios.php');
    $database = new dataInventarios();
    //Recibir variables enviadas
    $usuario = strip_tags($_REQUEST['usuario']);
    $vista = strip_tags($_REQUEST['vista']);
    $per_page = intval($_REQUEST['per_page']);
    $estatus = strip_tags($_REQUEST['estatus']);
    $prioridad = strip_tags($_REQUEST['prioridad']);
    $campo = strip_tags($_REQUEST['campo']);
    $orden = strip_tags($_REQUEST['orden']);
    $campos = "ped.id,ped.prioridad,ped.serie,ped.folio,ped.fecha,alm.cnombrealmacen as almacen,solicitado as unidades,importeSolicitado as importe,recibido,importeRecibido,est.id as estatus,adm.nombre as solicitante,IF(adm2.nombre IS NULL,'Sin aprobar',adm2.nombre) as aprobador,ped.observaciones";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;

    $search = array("usuario" => $usuario, "per_page" => $per_page, "offset" => $offset, "estatus" => $estatus, "prioridad" => $prioridad, "campo" => $campo, "orden" => $orden);
    //consulta principal para recuperar los datos
    $datos = $database->getPedidos($campos, $search);
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
                    <th># RECIBIDO</th>
                    <th>$ RECIBIDO</th>
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
                            $estado = "";
                            break;
                        case '2':
                            $estatus = '#E57B23';
                            $estado = "";
                            break;
                        case '3':
                            $estatus = '#03A9F4';
                            $estado = "none";
                            break;
                        case '4':
                            $estatus = '#11C15B';
                            $estado = "none";
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
                        <td><?= $row['recibido'] ?></td>
                        <td>$ <?= number_format($row['importeRecibido'], 2) ?></td>
                        <td><?= $indicador . " " . $porcentaje ?></td>
                        <td><?= $prioridad ?></td>
                        <td><?= $row['aprobador'] ?></td>
                        <td><?= $row['observaciones'] ?></td>
                        <td>
                            <button type="button" class="btn btn-primary" onclick="editarDocumento('2','pedidos','<?= $row['folio'] ?>','completo','2')"><i class="fa fa-edit"></i></button>
                            &nbsp;
                            <button type="button" style="display:<?= $estado ?>" class="btn btn-primary" onclick="eliminarDocumento('pedido','<?= $row['folio'] ?>')"><i class="fa fa-trash"></i></button>
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
if ($action == 'listaPedidosAdmin') {

    include('../clases/dataInventarios.php');
    $database = new dataInventarios();
    //Recibir variables enviadas
    $vista = strip_tags($_REQUEST['vista']);
    $per_page = intval($_REQUEST['per_page']);
    $estatus = strip_tags($_REQUEST['estatus']);
    $sucursal = strip_tags($_REQUEST['sucursal']);
    $prioridad = strip_tags($_REQUEST['prioridad']);
    $campo = strip_tags($_REQUEST['campo']);
    $orden = strip_tags($_REQUEST['orden']);
    $campos = "adm.nombre as 'Sucursal',ped.id,ped.prioridad,ped.serie,ped.folio,ped.fecha,alm.cnombrealmacen as almacen,ped.solicitado as unidades,ped.importeSolicitado as importe,ped.recibido,ped.importeRecibido,ped.pendientes,ped.importePendiente,est.id as estatus,adm.nombre as solicitante,IF(adm2.nombre IS NULL,'Sin aprobar',adm2.nombre) as aprobador,ped.observaciones";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;

    $search = array("sucursal" => $sucursal, "per_page" => $per_page, "offset" => $offset, "estatus" => $estatus, "prioridad" => $prioridad, "campo" => $campo, "orden" => $orden);
    //consulta principal para recuperar los datos
    $datos = $database->getPedidosAdmin($campos, $search);
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
                    <th>SUCURSAL</th>
                    <th>SERIE</th>
                    <th>FOLIO</th>
                    <th>FECHA</th>
                    <th>ALMACEN</th>
                    <th># SOLICITADO</th>
                    <th>$ SOLICITADO</th>
                    <th># APROBADO</th>
                    <th>$ APROBADO</th>
                    <th># PENDIENTE</th>
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
                        <td style="font-weight:bold;text-align:left"><?= $row['Sucursal']; ?></td>
                        <td style="font-weight:bold;text-align:left"><?= $row['serie']; ?></td>
                        <td style="font-weight:bold;text-align:left"><?= $row['folio'] ?></td>
                        <td><?= $row['fecha'] ?></td>
                        <td><?= $row['almacen'] ?></td>
                        <td><?= $row['unidades'] ?></td>
                        <td>$ <?= number_format($row['importe'], 2) ?></td>
                        <td style="color:#00BAD3;font-weight:bold"><?= $row['recibido'] ?></td>
                        <td style="color:#00BAD3;font-weight:bold">$ <?= number_format($row['importeRecibido'], 2) ?></td>
                        <td style="color:red;font-weight:bold"><?= $row['pendientes'] ?></td>
                        <td style="color:red;font-weight:bold">$ <?= number_format($row['importePendiente'], 2) ?></td>
                        <td><?= $indicador . " " . $porcentaje ?></td>
                        <td><?= $prioridad ?></td>
                        <td><?= $row['aprobador'] ?></td>
                        <td><?= $row['observaciones'] ?></td>
                        <td>
                            <button type="button" class="btn btn-primary" onclick="actualizarEstatusAprobacion('2','pedidos','<?= $row['folio'] ?>',2,'completo')"><i class="fa fa-edit"></i></button>

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