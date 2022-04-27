<?php
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if ($action == 'listadoProductosEcommerce') {

    include_once('../clases/dataInventarios.php');
    $database = new dataInventarios();
    //Recibir variables enviadas
    $estatusFacebook = strip_tags($_REQUEST['estatusFacebook']);
    $categoria = strip_tags($_REQUEST['categoria']);
    $clasificacion = strip_tags($_REQUEST['clasificacion']);
    $almacen = strip_tags($_REQUEST['almacen']);
    $almacen2 = strip_tags($_REQUEST['almacen2']);
    $producto = strip_tags($_REQUEST['producto']);
    $marca = strip_tags($_REQUEST['marca']);
    $campoOrden = strip_tags($_REQUEST['campoOrden']);
    $orden = strip_tags($_REQUEST['orden']);
    $utilidad = strip_tags($_REQUEST['utilidad']);
    $utilidadMl = strip_tags($_REQUEST['utilidadMl']);
    $periodo = strip_tags($_REQUEST['periodo']);
    $vista = strip_tags($_REQUEST['vista']);
    $per_page = intval($_REQUEST['per_page']);

    $campos = "*";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;

    $search = array("periodo" => $periodo, "utilidad" => $utilidad, "utilidadMl" => $utilidadMl, "estatusFacebook" => $estatusFacebook, "categoria" => $categoria, "clasificacion" => $clasificacion, "almacen" => $almacen, "almacen2" => $almacen2, "producto" => $producto, "marca" => $marca, "per_page" => $per_page, "offset" => $offset, "campoOrden" => $campoOrden, "orden" => $orden);
    //consulta principal para recuperar los datos
    $datos = $database->getListaProductosEcommerce($campos, $search);
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
?><div class="fixedColumns">
            <table class="table table-responsive table-striped table-hover ">
                <thead id="fixedHead">
                    <tr>
                        <th>#</th>
                        <th>MARCA</th>
                        <th>CODIGO</th>
                        <th>PRODUCTO</th>
                        <th>UNID/MED</th>
                        <th>UNIDADES</th>
                        <th>CLASIF</th>
                        <th style="width:150px">EXISTENCIA</th>
                        <th style="background:#33FF96">PRECIO PUBLICO</th>
                        <th style="background:#33FF96">COSTO</th>
                        <th style="background:#33FF96">UTILIDAD</th>
                        <th style="background:#FF7D33">CARGO CATEGORIA</th>
                        <th style="background:#FF7D33">CARGO ENVIO</th>
                        <th style="background:#FF7D33">VENTA ML</th>
                        <th style="background:#FF7D33">%UTILIDAD ML</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    $num = 0;

                    foreach ($datos as $key => $row) {
                        $precio = $row['PRECIO'];
                        $costo = $row['COSTOIVA'];
                        $utilidad = $row['UTILIDAD'];
                        $comision = $row['COMISION'];;
                        $envio = $row['ENVIO'];
                        $ventaMl = $row['VENTAML'];
                        $utilidadMl = $row['UTILIDADML'];

                        if ($row["ESTATUS"] == 'Activo') {
                            $background = "";
                            $color = "";
                            $color2 = "#00BCD4";
                        } else {
                            $background = "#FF3A3A";
                            $color = "#FFFFFF";
                            $color2 = "#FFFFFF";
                        }
                    ?>
                        <tr>
                            <td style="background:<?php echo $background ?>;color:<?php echo $color ?>;font-weight:bold;text-align:left;width:140px"><?= $row['CIDPRODUCTO'] ?></td>
                            <td style="background:<?php echo $background ?>;color:<?php echo $color ?>;font-weight:bold;text-align:left;width:140px"><?= $row['MARCA'] ?></td>
                            <td style="background:<?php echo $background ?>;color:<?php echo $color ?>;font-weight:bold;text-align:left;width:140px"><?= $row['CCODIGOPRODUCTO']; ?></td>
                            <td style="background:<?php echo $background ?>;color:<?php echo $color ?>;font-weight:bold;text-align:left;width:200px"><?= $row['CNOMBREPRODUCTO'] ?></td>
                            <td style="background:<?php echo $background ?>;color:<?php echo $color ?>;font-weight:lighter;text-align:left;width:200px"><?= $row['CNOMBREUNIDAD'] ?></td>
                            <td style="background:<?php echo $background ?>;color:<?php echo $color ?>;font-weight:bold;text-align:left;width:200px">1</td>
                            <td style="background:<?php echo $background ?>;color:<?php echo $color ?>;font-weight:bold;text-align:left;width:200px"><?= $row['CLASIFICACION'] ?></td>
                            <td style="background:<?php echo $background ?>;color:<?php echo $color ?>;font-weight:lighter;text-align:left;width:150px"><?= $row['EXISTENCIA'] ?></td>
                            <td style="background:<?php echo $background ?>;color:<?php echo $color ?>;font-weight:lighter;text-align:left;width:200px">$ <?= number_format($row['PRECIO'], 2) ?></td>
                            <td style="background:<?php echo $background ?>;color:<?php echo $color ?>;font-weight:lighter;text-align:left;width:200px">$ <?= $costo ?></td>
                            <td style="background:<?php echo $background ?>;color:<?php echo $color ?>;font-weight:bold;text-align:left;width:200px;color:<?php echo $color2 ?>">% <?= bcdiv($utilidad, '1', 2) ?></td>
                            <td style="background:<?php echo $background ?>;color:<?php echo $color ?>;font-weight:bold;text-align:left;width:200px;color:<?php echo $color2 ?>">$ <?= number_format($comision, 2) ?></td>
                            <td style="background:<?php echo $background ?>;color:<?php echo $color ?>;font-weight:bold;text-align:left;width:200px;color:<?php echo $color2 ?>">$ <?= number_format($envio, 2) ?></td>
                            <td style="background:<?php echo $background ?>;color:<?php echo $color ?>;font-weight:bold;text-align:left;width:200px;color:<?php echo $color2 ?>">$ <?= number_format($ventaMl, 2) ?></td>
                            <td style="background:<?php echo $background ?>;color:<?php echo $color ?>;font-weight:bold;text-align:left;width:200px;color:<?php echo $color2 ?>">% <?= bcdiv($utilidadMl, '1', 2) ?></td>
                        </tr>
                    <?php
                        $finales++;
                    }

                    ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
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
            echo $pagination->paginateInventarios($vista);

            ?>
        </div>
    <?php
    }
}
if ($action == 'listadoProductosAlmacenes') {

    include_once('../clases/dataInventarios.php');
    $database = new dataInventarios();
    //Recibir variables enviadas

    $categoria = strip_tags($_REQUEST['categoria']);
    $clasificacion = strip_tags($_REQUEST['clasificacion']);
    $almacen = strip_tags($_REQUEST['almacen']);
    $almacen2 = strip_tags($_REQUEST['almacen2']);
    $producto = strip_tags($_REQUEST['producto']);
    $marca = strip_tags($_REQUEST['marca']);
    $campoOrden = strip_tags($_REQUEST['campoOrden']);
    $orden = strip_tags($_REQUEST['orden']);
    $periodo = strip_tags($_REQUEST['periodo']);
    $vista = strip_tags($_REQUEST['vista']);
    $per_page = intval($_REQUEST['per_page']);

    $campos = "*";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;

    $search = array("periodo" => $periodo, "categoria" => $categoria, "clasificacion" => $clasificacion, "almacen" => $almacen, "almacen2" => $almacen2, "producto" => $producto, "marca" => $marca, "per_page" => $per_page, "offset" => $offset, "campoOrden" => $campoOrden, "orden" => $orden);
    //consulta principal para recuperar los datos
    $datos = $database->getListaProductosAlmacenes($campos, $search);
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
    ?><div class="fixedColumns">
            <table class="table table-responsive table-striped table-hover">
                <thead id="fixedHead">
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th style="background:#33FF96">
                            <h5 id="totalExistenciasTh"></h5>
                        </th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th style="background:#FF7D33">
                            <h5 id="montoExistenciasTh"></h5>
                        </th>
                        <th></th>
                        <th></th>
                        <th></th>

                    </tr>
                </thead>
                <thead id="fixedHead">
                    <tr>
                        <th>#</th>
                        <th>CODIGO</th>
                        <th>PRODUCTO</th>
                        <th>UNID/MED</th>
                        <th>MARCA</th>
                        <th>COSTO</th>
                        <th style="background:#33FF96">ENT</th>
                        <th style="background:#33FF96">SAL</th>
                        <th style="background:#33FF96">EXIS</th>
                        <th>MIN</th>
                        <th>SEG</th>
                        <th>MAX</th>
                        <th style="background:#FF7D33">$ ENT</th>
                        <th style="background:#FF7D33">$ SAL</th>
                        <th style="background:#FF7D33">$ EXIS</th>
                        <th>%</th>
                        <th>ROT</th>
                        <th>CLASIF</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    $num = 0;

                    foreach ($datos as $key => $row) {

                        if ($search["almacen"] == 21 || $search["almacen"] == 22) {
                            $empresa = '"TORRES"';
                        } else {
                            $empresa  = '"PINTURAS"';
                        }
                        $codigo = '"' . $row['CCODIGOPRODUCTO'] . '"';

                        if ($row["ROTACION"] > 75) {
                            $rotacion = "<button type='button' onclick='obtenerSalidasProducto($empresa,$codigo,$almacen,$almacen2,$periodo)' class='btn btn-success'>Alta</button>";
                        } else if ($row["ROTACION"] < 74.99 and $row["ROTACION"] > 50) {
                            $rotacion = "<button type='button' onclick='obtenerSalidasProducto($empresa,$codigo,$almacen,$almacen2,$periodo)' class='btn btn-warning'>Media</button>";
                        } else if ($row["ROTACION"] < 49.99 and $row["ROTACION"] > 25) {
                            $rotacion = "<button type='button' onclick='obtenerSalidasProducto($empresa,$codigo,$almacen,$almacen2,$periodo)' class='btn btn-danger'>Baja</button>";
                        } else {
                            $rotacion = "<span class='badge badge-info'>SIN ROTACION</span>";
                        }

                        if ($row["ROTACION"] > 74.99) {
                            $clasificacion = "<span class='badge badge-success'>A</span>";
                        } else if ($row["ROTACION"] < 75 and $row["ROTACION"] > 49.99) {
                            $clasificacion = "<span class='badge badge-info'>B</span>";
                        } else if ($row["ROTACION"] < 50 and $row["ROTACION"] > 24.99) {
                            $clasificacion = "<span class='badge badge-warning'>C</span>";
                        } else {
                            $clasificacion = "<span class='badge badge-danger'>D</span>";
                        }

                    ?>
                        <tr>
                            <td style="font-weight:bold;text-align:left;"><?= $row['CIDPRODUCTO'] ?></td>
                            <td style="font-weight:bold;text-align:left;"><?= $row['CCODIGOPRODUCTO'] ?></td>
                            <td style="font-weight:bold;text-align:left;"><?= $row['CNOMBREPRODUCTO'] ?></td>
                            <td style="font-weight:lighter;text-align:left;"><?= $row['UNIDAD'] ?></td>
                            <td style="font-weight:lighter;text-align:left;"><?= $row['MARCA'] ?></td>
                            <td style="font-weight:lighter;text-align:left;">$ <?= number_format(bcdiv($row["COSTO"], '1', 2), 2) ?></td>
                            <td style="font-weight:lighter;text-align:left;"><?= bcdiv($row["ENTRADAS"], '1', 2) ?></td>
                            <td style="font-weight:lighter;text-align:left;"><?= bcdiv($row["SALIDAS"], '1', 2) ?></td>
                            <td style="font-weight:lighter;text-align:left;background:#33FF96;font-weight:bold;color:white" class="totalExistencias"><?= bcdiv($row["EXISTENCIAS"], '1', 2) ?></td>
                            <td style="font-weight:lighter;text-align:left;"><?= bcdiv($row["MINIMO"], '1', 2) ?></td>
                            <td style="font-weight:lighter;text-align:left;"><?= bcdiv($row["MEDIA"], '1', 2) ?></td>
                            <td style="font-weight:lighter;text-align:left;"><?= bcdiv($row["MAXIMO"], '1', 2) ?></td>
                            <td style="font-weight:lighter;text-align:left;">$ <?= number_format(bcdiv($row["MONTOENTRADAS"], '1', 2), 2) ?></td>
                            <td style="font-weight:lighter;text-align:left;">$ <?= number_format(bcdiv($row["MONTOSALIDAS"], '1', 2), 2) ?></td>
                            <td style="font-weight:lighter;text-align:left;background:#FF7D33;font-weight:bold;color:white" class="montoExistencias">$ <?= number_format(bcdiv($row["MONTOEXISTENCIAS"], '1', 2), 2) ?></td>
                            <td style="font-weight:bold;text-align:left;">% <?= number_format($row["ROTACION"], 2) ?></td>
                            <td style="font-weight:bold;text-align:left;"><?= $rotacion ?></td>
                            <td style="font-weight:bold;text-align:left;"><?= $clasificacion ?></td>
                        </tr>
                    <?php
                        $finales++;
                    }

                    ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
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
            echo $pagination->paginateInventarios($vista);

            ?>
        </div>
    <?php
    }
}
if ($action == 'listadoProductosAgotarse') {

    include_once('../clases/dataInventarios.php');
    $database = new dataInventarios();
    //Recibir variables enviadas

    $categoria = strip_tags($_REQUEST['categoria']);
    $clasificacion = strip_tags($_REQUEST['clasificacion']);
    $almacen = strip_tags($_REQUEST['almacen']);
    $almacen2 = strip_tags($_REQUEST['almacen2']);
    $producto = strip_tags($_REQUEST['producto']);
    $marca = strip_tags($_REQUEST['marca']);
    $campoOrden = strip_tags($_REQUEST['campoOrden']);
    $orden = strip_tags($_REQUEST['orden']);
    $periodo = strip_tags($_REQUEST['periodo']);
    $estatus = strip_tags($_REQUEST['estatus']);
    $vista = strip_tags($_REQUEST['vista']);
    $per_page = intval($_REQUEST['per_page']);

    $campos = "*";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;

    $search = array("periodo" => $periodo, "estatus" => $estatus, "categoria" => $categoria, "clasificacion" => $clasificacion, "almacen" => $almacen, "almacen2" => $almacen2, "producto" => $producto, "marca" => $marca, "per_page" => $per_page, "offset" => $offset, "campoOrden" => $campoOrden, "orden" => $orden);
    //consulta principal para recuperar los datos
    $datos = $database->getListaProductosAgotarse($campos, $search);
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
    ?><div class="fixedColumns">
            <table class="table table-responsive table-striped table-hover ">
                <thead id="fixedHead">
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th style="background:#33FF96">
                            <h5 id="totalExistenciasTh"></h5>
                        </th>
                        <th style="background:#F83626">
                            <h5 id="totalDiferenciaTh"></h5>
                        </th>
                        <th>
                            <h5 id="totalMinimoTh"></h5>
                        </th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th style="background:#FF7D33">
                            <h5 id="montoExistenciasTh"></h5>
                        </th>
                        <th style="background:#F83626">
                            <h5 id="montoDiferenciaTh"></h5>
                        </th>
                        <th></th>
                        <th></th>
                        <th></th>

                    </tr>
                </thead>
                <thead id="fixedHead">
                    <tr>
                        <th>#</th>
                        <th>CODIGO</th>
                        <th>PRODUCTO</th>
                        <th>UNID/MED</th>
                        <th>MARCA</th>
                        <th>COSTO</th>
                        <th style="background:#33FF96">ENT</th>
                        <th style="background:#33FF96">SAL</th>
                        <th style="background:#33FF96">EXIS</th>
                        <th style="background:#F83626">DIF</th>
                        <th>MIN</th>
                        <th>SEG</th>
                        <th>MAX</th>
                        <th style="background:#FF7D33">$ ENT</th>
                        <th style="background:#FF7D33">$ SAL</th>
                        <th style="background:#FF7D33">$ EXIS</th>
                        <th style="background:#F83626">$ DIF</th>
                        <th>%</th>
                        <th>ROT</th>
                        <th>CLASIF</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    $num = 0;


                    foreach ($datos as $key => $row) {

                        if ($search["almacen"] == 21 || $search["almacen"] == 22) {
                            $empresa = '"TORRES"';
                        } else {
                            $empresa  = '"PINTURAS"';
                        }
                        $codigo = '"' . $row['CCODIGOPRODUCTO'] . '"';

                        if ($row["ROTACION"] > 75) {
                            $rotacion = "<button type='button' onclick='obtenerSalidasProducto($empresa,$codigo,$almacen,$almacen2,$periodo)' class='btn btn-success'>Alta</button>";
                        } else if ($row["ROTACION"] < 74.99 and $row["ROTACION"] > 50) {
                            $rotacion = "<button type='button' onclick='obtenerSalidasProducto($empresa,$codigo,$almacen,$almacen2,$periodo)' class='btn btn-warning'>Media</button>";
                        } else if ($row["ROTACION"] < 49.99 and $row["ROTACION"] > 25) {
                            $rotacion = "<button type='button' onclick='obtenerSalidasProducto($empresa,$codigo,$almacen,$almacen2,$periodo)' class='btn btn-danger'>Baja</button>";
                        } else {
                            $rotacion = "<span class='badge badge-info'>SIN ROTACION</span>";
                        }

                        if ($row["ROTACION"] > 74.99) {
                            $clasificacion = "<span class='badge badge-success'>A</span>";
                        } else if ($row["ROTACION"] < 75 and $row["ROTACION"] > 49.99) {
                            $clasificacion = "<span class='badge badge-info'>B</span>";
                        } else if ($row["ROTACION"] < 50 and $row["ROTACION"] > 24.99) {
                            $clasificacion = "<span class='badge badge-warning'>C</span>";
                        } else {
                            $clasificacion = "<span class='badge badge-danger'>D</span>";
                        }

                    ?>
                        <tr>
                            <td style="font-weight:bold;text-align:left;"><?= $row['CIDPRODUCTO'] ?></td>
                            <td style="font-weight:bold;text-align:left;"><?= $row['CCODIGOPRODUCTO'] ?></td>
                            <td style="font-weight:bold;text-align:left;"><?= $row['CNOMBREPRODUCTO'] ?></td>
                            <td style="font-weight:lighter;text-align:left;"><?= $row['UNIDAD'] ?></td>
                            <td style="font-weight:lighter;text-align:left;"><?= $row['MARCA'] ?></td>
                            <td style="font-weight:lighter;text-align:left;" class="totalCosto">$ <?= number_format(bcdiv($row["COSTO"], '1', 2), 2) ?></td>
                            <td style="font-weight:lighter;text-align:left;"><?= bcdiv($row["ENTRADAS"], '1', 2) ?></td>
                            <td style="font-weight:lighter;text-align:left;"><?= bcdiv($row["SALIDAS"], '1', 2) ?></td>
                            <td style="font-weight:lighter;text-align:left;background:#33FF96;font-weight:bold;color:white" class="totalExistencias"><?= bcdiv($row["EXISTENCIAS"], '1', 2) ?></td>
                            <td style="font-weight:lighter;text-align:left;background:#F83626;color:white" class=" totalDiferencia"><?= number_format(bcdiv($row["MINIMO"], '1', 2) - bcdiv($row["EXISTENCIAS"], '1', 2), 2) ?></td>
                            <td style="font-weight:lighter;text-align:left;" class="totalMinimo"><?= bcdiv($row["MINIMO"], '1', 2) ?></td>
                            <td style="font-weight:lighter;text-align:left;"><?= bcdiv($row["MEDIA"], '1', 2) ?></td>
                            <td style="font-weight:lighter;text-align:left;"><?= bcdiv($row["MAXIMO"], '1', 2) ?></td>
                            <td style="font-weight:lighter;text-align:left;">$ <?= number_format(bcdiv($row["MONTOENTRADAS"], '1', 2), 2) ?></td>
                            <td style="font-weight:lighter;text-align:left;">$ <?= number_format(bcdiv($row["MONTOSALIDAS"], '1', 2), 2) ?></td>
                            <td style="font-weight:lighter;text-align:left;background:#FF7D33;font-weight:bold;color:white" class="montoExistencias">$ <?= number_format(bcdiv($row["MONTOEXISTENCIAS"], '1', 2), 2) ?></td>
                            <td style="font-weight:lighter;text-align:left;background:#F83626;font-weight:bold;color:white" class="montoDiferencia">$ <?= number_format((bcdiv($row["MINIMO"], '1', 2) - bcdiv($row["EXISTENCIAS"], '1', 2)) * bcdiv($row["COSTO"], '1', 2), 2) ?></td>
                            <td style="font-weight:bold;text-align:left;">% <?= number_format($row["ROTACION"], 2) ?></td>
                            <td style="font-weight:bold;text-align:left;"><?= $rotacion ?></td>
                            <td style="font-weight:bold;text-align:left;"><?= $clasificacion ?></td>
                        </tr>
                    <?php
                        $finales++;
                    }

                    ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
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
            echo $pagination->paginateInventarios($vista);

            ?>
        </div>
<?php
    }
}

?>