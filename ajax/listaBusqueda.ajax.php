<?php
error_reporting(E_ALL);
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if ($action == 'busquedaClientes') {

    include('../clases/busquedaDatos.php');
    $database = new busquedaDatos();
    //Recibir variables enviadas
    $cliente = strip_tags($_REQUEST['nombreClienteSearch']);
    $vista = strip_tags($_REQUEST['vista']);
    $vista2 = strip_tags($_REQUEST['vista2']);
    $per_page = intval($_REQUEST['per_page']);

    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;
    $search = array("cliente" => $cliente, "per_page" => $per_page, "offset" => $offset);

    $aColumns = array("CCODIGOCLIENTE", "CRAZONSOCIAL"); //Columnas de busqueda
    //consulta principal para recuperar los datos
    $datos = $database->getClientes($search, $aColumns);

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
            <table class="table table-responsive table-striped table-hover " id="tableListaClientes">
                <thead>
                    <tr>
                        <th>CODIGO</th>
                        <th>RFC</th>
                        <th>RAZON SOCIAL</th>
                        <th>FECHA ALTA</th>
                        <th></th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    foreach ($datos as $key => $row) {

                    ?>
                        <tr>
                            <th><?= $row['CCODIGOCLIENTE'] ?></th>
                            <td style="font-weight:bold"><?= $row['CRFC'] ?></td>
                            <td style="font-weight:bold"><?= $row['CRAZONSOCIAL'] ?></td>
                            <td style="font-weight:bold"><?= $row['CFECHAALTA'] ?></td>
                            <td><button type="button" class="btn btn-secondary" onclick="agregarDatosBusqueda('<?php echo $row['CRAZONSOCIAL'] ?>','arrayClientes')"><i class="fa fa-plus" style="color:white"></i></button></td>
                        </tr>
                    <?php
                        $finales++;
                    }

                    ?>

                </tbody>

            </table>

        </div>
        <div class="clearfix">
            <?php
            $inicios = $offset + 1;
            $finales += $inicios - 1;
            echo '<div class="hint-text">Mostrando ' . $inicios . ' al ' . $finales . ' de ' . $numrows . ' registros</div>';


            include '../clases/pagination.php'; //include pagination class
            $pagination = new Pagination($page, $total_pages, $adjacents);
            echo $pagination->paginateListaClientes($vista);

            ?>
        </div>
    <?php
    }
}
if ($action == 'busquedaProductosVenta') {

    include('../clases/busquedaDatos.php');
    $database = new busquedaDatos();
    //Recibir variables enviadas
    $producto = strip_tags($_REQUEST['producto']);
    $vista = strip_tags($_REQUEST['vista']);
    $vista2 = strip_tags($_REQUEST['vista2']);
    $per_page = intval($_REQUEST['per_page']);
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;
    $search = array("producto" => $producto, "per_page" => $per_page, "offset" => $offset);

    $aColumns = array("CCODIGOPRODUCTO", "CNOMBREPRODUCTO"); //Columnas de busqueda
    //consulta principal para recuperar los datos
    $datos = $database->getProductos($search, $aColumns);

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
            <table class="table table-responsive table-striped table-hover " id="tableListaClientes">
                <thead>
                    <tr>
                        <th>CODIGO PRODUCTO</th>
                        <th>NOMBRE PRODUCTO</th>
                        <th></th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    foreach ($datos as $key => $row) {
                        if ($vista === "ultimosCostos") {
                            $nombreArreglo = 'arrayProductosCostos';
                        } else {
                            $nombreArreglo = 'arrayProductos';
                        }
                    ?>
                        <tr>
                            <th><?= $row['CCODIGOPRODUCTO'] ?></th>
                            <td style="font-weight:bold"><?= $row['CNOMBREPRODUCTO'] ?></td>
                            <td><button type="button" class="btn btn-secondary" onclick="agregarDatosBusqueda('<?php echo $row['CCODIGOPRODUCTO'] ?>','<?php echo $nombreArreglo ?>')"><i class="fa fa-plus" style="color:white"></i></button></td>
                        </tr>
                    <?php
                        $finales++;
                    }

                    ?>

                </tbody>

            </table>

        </div>
        <div class="clearfix">
            <?php
            $inicios = $offset + 1;
            $finales += $inicios - 1;
            echo '<div class="hint-text">Mostrando ' . $inicios . ' al ' . $finales . ' de ' . $numrows . ' registros</div>';


            include '../clases/pagination.php'; //include pagination class
            $pagination = new Pagination($page, $total_pages, $adjacents);
            echo $pagination->paginateListaProductosVenta();

            ?>
        </div>
    <?php
    }
}
if ($action == 'busquedaProductosSolicitudes') {

    include('../clases/busquedaDatos.php');
    $database = new busquedaDatos();
    //Recibir variables enviadas
    $producto = strip_tags($_REQUEST['producto']);
    $vista = strip_tags($_REQUEST['vista']);
    $per_page = intval($_REQUEST['per_page']);
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;
    $search = array("producto" => $producto, "per_page" => $per_page, "offset" => $offset);

    $aColumns = array("CCODIGOPRODUCTO", "CNOMBREPRODUCTO"); //Columnas de busqueda
    //consulta principal para recuperar los datos
    $datos = $database->getProductosSolicitudes($search, $aColumns);

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
            <table class="table table-responsive table-striped table-hover " id="tableListaBusquedaProductos">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>CODIGO</th>
                        <th>DESCRIPCION</th>
                        <th>UNIDADES</th>
                        <th>UNIDAD</th>
                        <th>COSTO</th>
                        <th>IMPORTE</th>
                        <th></th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    foreach ($datos as $key => $row) {
                        $codigoProducto = $row["CCODIGOPRODUCTO"];
                        $idUnidad = $row["CIDUNIDADBASE"];
                        $unidades = $database->getUnidadesMedidaProducto($codigoProducto, $idUnidad);


                    ?>
                        <tr>
                            <th class="idProducto"><?= $row['CIDPRODUCTO'] ?></th>
                            <th class="codigoProducto"><?= $row['CCODIGOPRODUCTO'] ?></th>
                            <td class="nombreProducto" style="font-weight:bold"><?= $row['CNOMBREPRODUCTO'] ?></td>
                            <td style="width:120px"><input class="form-control cantidadProducto" type="number" value="1" onchange="updateCart(this);" cantidadConv="1"></td>
                            <td style="width:120px"><select class="form-control unidadProducto" onchange="updateCart(this);">
                                    <option value="<?= $row['CIDUNIDADBASE'] ?>" valorConversion="1"><?= $row['CDESPLIEGUE'] ?></option>
                                    <?php

                                    foreach ($unidades as $key => $value) {
                                        if ($value["UnidadConversion"] === NULL) {
                                        } else {
                                            echo '<option value="' . $value["UnidadConversion"] . '" valorConversion="' . $value["CFACTORCONVERSION"] . '">' . $value["CABREVIATURA"] . '</option>';
                                        }
                                    }


                                    ?>
                                </select></td>
                            <td style="font-weight:bold"><input class="form-control costoProducto" type="text" value="$<?= number_format($row['COSTO'], 2) ?>" readonly></td>
                            <td><input class="form-control importeProducto" type="text" value="$<?= number_format($row['COSTO'] * 1, 2) ?>" readonly></td>
                            <td><button type="button" class="btn btn-info" onclick="loadCart(this)"><i class="fa fa-plus" style="color:white"></i></button></td>
                        </tr>
                    <?php
                        $finales++;
                    }

                    ?>

                </tbody>

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