<?php
error_reporting(E_ALL);
session_start();
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if ($action == 'listaRequisiciones') {

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
    $campos = "req.id,req.prioridad,req.serie,req.folio,req.fecha,alm.cnombrealmacen as almacen,solicitado as unidades,importeSolicitado as importe,recibido,importeRecibido,est.id as estatus,adm.nombre as solicitante,IF(adm2.nombre IS NULL,'Sin aprobar',adm2.nombre) as aprobador,req.observaciones";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;

    $search = array("usuario" => $usuario, "per_page" => $per_page, "offset" => $offset, "estatus" => $estatus, "prioridad" => $prioridad, "campo" => $campo, "orden" => $orden);
    //consulta principal para recuperar los datos
    $datos = $database->getRequisiciones($campos, $search);
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
                            <button type="button" class="btn btn-primary" onclick="editarDocumento('1','requisiciones','<?= $row['folio'] ?>','completo','1')"><i class="fa fa-edit"></i></button>
                            &nbsp;
                            <button type="button" style="display:<?= $estado ?>" class="btn btn-primary" onclick="eliminarDocumento('requisicion','<?= $row['folio'] ?>')"><i class="fa fa-trash"></i></button>
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
if ($action == 'listaRequisicionesAdmin') {

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
    $campos = "adm.nombre as 'Sucursal',req.id,req.prioridad,req.serie,req.folio,req.fecha,alm.cnombrealmacen as almacen,req.solicitado as unidades,req.importeSolicitado as importe,req.recibido,req.importeRecibido,req.pendientes,req.importePendiente,est.id as estatus,adm.nombre as solicitante,IF(adm2.nombre IS NULL,'Sin aprobar',adm2.nombre) as aprobador,req.observaciones";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;

    $search = array("sucursal" => $sucursal, "per_page" => $per_page, "offset" => $offset, "estatus" => $estatus, "prioridad" => $prioridad, "campo" => $campo, "orden" => $orden);
    //consulta principal para recuperar los datos
    $datos = $database->getRequisicionesAdmin($campos, $search);
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
                            <button type="button" class="btn btn-primary" onclick="actualizarEstatusAprobacion('1','requisiciones','<?= $row['folio'] ?>',2,'completo')"><i class="fa fa-edit"></i></button>

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
if ($action == 'listaRequisicionesFaltantes') {

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
    $campos = "req.id,req.prioridad,req.serie,req.folio,req.fecha,alm.cnombrealmacen as almacen,solicitado as unidades,importeSolicitado as importe,recibido,importeRecibido,pendientes,importePendiente,est.id as estatus,adm.nombre as solicitante,IF(adm2.nombre IS NULL,'Sin aprobar',adm2.nombre) as aprobador,req.observaciones";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;

    $search = array("usuario" => $usuario, "per_page" => $per_page, "offset" => $offset, "estatus" => $estatus, "prioridad" => $prioridad, "campo" => $campo, "orden" => $orden);
    //consulta principal para recuperar los datos
    $datos = $database->getRequisicionesFaltantes($campos, $search);
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
                            <button type="button" class="btn btn-primary" onclick="editarDocumento('1','requisiciones','<?= $row['folio'] ?>','faltante','1')"><i class="fa fa-edit"></i></button>

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
if ($action == 'listaRequisicionesFaltantesAdmin') {

    include('../clases/dataInventarios.php');
    $database = new dataInventarios();
    //Recibir variables enviadas
    $vista = strip_tags($_REQUEST['vista']);
    $per_page = intval($_REQUEST['per_page']);
    $estatus = strip_tags($_REQUEST['estatus']);
    $prioridad = strip_tags($_REQUEST['prioridad']);
    $sucursal = strip_tags($_REQUEST['sucursal']);
    $campo = strip_tags($_REQUEST['campo']);
    $orden = strip_tags($_REQUEST['orden']);
    $campos = "req.id,req.prioridad,req.serie,req.folio,req.fecha,alm.cnombrealmacen as almacen,solicitado as unidades,importeSolicitado as importe,recibido,importeRecibido,pendientes,importePendiente,est.id as estatus,adm.nombre as solicitante,IF(adm2.nombre IS NULL,'Sin aprobar',adm2.nombre) as aprobador,req.observaciones";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;

    $search = array("sucursal" => $sucursal, "per_page" => $per_page, "offset" => $offset, "estatus" => $estatus, "prioridad" => $prioridad, "campo" => $campo, "orden" => $orden);
    //consulta principal para recuperar los datos
    $datos = $database->getRequisicionesFaltantesAdmin($campos, $search);
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
                            <button type="button" class="btn btn-primary" onclick="editarDocumento('1','requisiciones','<?= $row['folio'] ?>','faltante','1')"><i class="fa fa-edit"></i></button>

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
if ($action == 'listaAutorizaciones') {

    include('../clases/dataInventarios.php');
    $database = new dataInventarios();
    //Recibir variables enviadas
    $usuario = strip_tags($_REQUEST['usuario']);
    $vista = strip_tags($_REQUEST['vista']);
    $per_page = intval($_REQUEST['per_page']);
    $estatus = strip_tags($_REQUEST['estatus']);
    $campo = strip_tags($_REQUEST['campo']);
    $orden = strip_tags($_REQUEST['orden']);
    $campos = "aut.idEstatus,adm.nombre as 'SUCURSAL',aut.serie,aut.folio,aut.fecha,aut.serieOrigen,aut.folioOrigen,aut.tipoDocumento,doc.pendientes as 'SOLICITADAS',doc.importePendiente as 'SOLICITADO',aut.unidadesAprobadas as 'APROBADAS',aut.montoAprobado as 'APROBADO',sol.nombre 'SOLICITANTE',aut.aprobada,aut.observaciones,doc.areaSolicitante";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;

    $search = array("usuario" => $usuario, "per_page" => $per_page, "offset" => $offset, "estatus" => $estatus, "campo" => $campo, "orden" => $orden);
    //consulta principal para recuperar los datos
    $datos = $database->getAutorizaciones($campos, $search);
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
                    <th>SERIE ORIGEN</th>
                    <th>FOLIO ORIGEN</th>
                    <th># SOLICITADAS</th>
                    <th>$ SOLICITADO</th>
                    <th># AUTORIZADAS</th>
                    <th>$ AUTORIZADO</th>
                    <th>SOLICITANTE</th>
                    <th>OBSERVACIONES</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $finales = 0;
                $num = 1;
                foreach ($datos as $key => $row) {
                    switch ($row["idEstatus"]) {
                        case '1':
                            $estatus = '#FF5252';
                            break;
                        case '2':
                            $estatus = '#11C15B';
                            break;
                    }
                ?>
                    <tr>
                        <td style="background:<?= $estatus ?>;color:white"><?= $num ?></td>
                        <td style="font-weight:bold;text-align:left"><?= $row['SUCURSAL']; ?></td>
                        <td style="font-weight:bold;text-align:left"><?= $row['serie']; ?></td>
                        <td style="font-weight:bold;text-align:left"><?= $row['folio'] ?></td>
                        <td><?= $row['fecha'] ?></td>
                        <td style="font-weight:bold;text-align:left"><?= $row['serieOrigen']; ?></td>
                        <td style="font-weight:bold;text-align:left"><?= $row['folioOrigen'] ?></td>
                        <td style="color:#00BAD3;font-weight:bold"><?= $row['SOLICITADAS'] ?></td>
                        <td style="color:#00BAD3;font-weight:bold">$ <?= number_format($row['SOLICITADO'], 2) ?></td>
                        <td style="color:green;font-weight:bold"><?= $row['APROBADAS'] ?></td>
                        <td style="color:green;font-weight:bold">$ <?= number_format($row['APROBADO'], 2) ?></td>

                        <td><?= $row['SOLICITANTE'] ?></td>
                        <td><?= $row['observaciones'] ?></td>
                        <td>
                            <button type="button" class="btn btn-primary" onclick="editarDocumento('3','autorizacionescompra','<?= $row['folio'] ?>','autorizacion','<?= $row['tipoDocumento'] ?>')"><i class="fa fa-edit"></i></button>
                        </td>
                    </tr>
                <?php
                    $finales++;
                    $num++;
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
if ($action == 'listaAutorizacionesAdmin') {

    include('../clases/dataInventarios.php');
    $database = new dataInventarios();
    //Recibir variables enviadas
    $vista = strip_tags($_REQUEST['vista']);
    $per_page = intval($_REQUEST['per_page']);
    $estatus = strip_tags($_REQUEST['estatus']);
    $sucursal = strip_tags($_REQUEST['sucursal']);
    $campo = strip_tags($_REQUEST['campo']);
    $orden = strip_tags($_REQUEST['orden']);
    $campos = "aut.idEstatus,adm.nombre as 'SUCURSAL',aut.serie,aut.folio,aut.fecha,aut.serieOrigen,aut.folioOrigen,aut.tipoDocumento,doc.pendientes as 'SOLICITADAS',doc.importePendiente as 'SOLICITADO',aut.unidadesAprobadas as 'APROBADAS',aut.montoAprobado as 'APROBADO',sol.nombre 'SOLICITANTE',aut.aprobada,aut.observaciones,doc.areaSolicitante";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;

    $search = array("sucursal" => $sucursal, "per_page" => $per_page, "offset" => $offset, "estatus" => $estatus, "campo" => $campo, "orden" => $orden);
    //consulta principal para recuperar los datos
    $datos = $database->getAutorizacionesAdmin($campos, $search);
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
                    <th>SERIE ORIGEN</th>
                    <th>FOLIO ORIGEN</th>
                    <th># SOLICITADAS</th>
                    <th>$ SOLICITADO</th>
                    <th># AUTORIZADAS</th>
                    <th>$ AUTORIZADO</th>
                    <th>SOLICITANTE</th>
                    <th>OBSERVACIONES</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $finales = 0;
                $num = 1;
                foreach ($datos as $key => $row) {
                    switch ($row["idEstatus"]) {
                        case '1':
                            $estatus = '#FF5252';
                            break;
                        case '2':
                            $estatus = '#11C15B';
                            break;
                    }
                ?>
                    <tr>
                        <td style="background:<?= $estatus; ?>;color:white"><?= $num ?></td>
                        <td style="font-weight:bold;text-align:left"><?= $row['SUCURSAL']; ?></td>
                        <td style="font-weight:bold;text-align:left"><?= $row['serie']; ?></td>
                        <td style="font-weight:bold;text-align:left"><?= $row['folio'] ?></td>
                        <td><?= $row['fecha'] ?></td>
                        <td style="font-weight:bold;text-align:left"><?= $row['serieOrigen']; ?></td>
                        <td style="font-weight:bold;text-align:left"><?= $row['folioOrigen'] ?></td>
                        <td style="color:#00BAD3;font-weight:bold"><?= $row['SOLICITADAS'] ?></td>
                        <td style="color:#00BAD3;font-weight:bold">$ <?= number_format($row['SOLICITADO'], 2) ?></td>
                        <td style="color:green;font-weight:bold"><?= $row['APROBADAS'] ?></td>
                        <td style="color:green;font-weight:bold">$ <?= number_format($row['APROBADO'], 2) ?></td>

                        <td><?= $row['SOLICITANTE'] ?></td>
                        <td><?= $row['observaciones'] ?></td>
                        <td>
                            <button type="button" class="btn btn-primary" onclick="editarDocumento('3','autorizacionescompra','<?= $row['folio'] ?>','autorizacion','<?= $row['tipoDocumento'] ?>')"><i class="fa fa-edit"></i></button>
                            &nbsp;
                            <button type="button" style="display:<?= $estado ?>" class="btn btn-primary" onclick="eliminarDocumento('autorizacion','<?= $row['folio'] ?>')"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                <?php
                    $finales++;
                    $num++;
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