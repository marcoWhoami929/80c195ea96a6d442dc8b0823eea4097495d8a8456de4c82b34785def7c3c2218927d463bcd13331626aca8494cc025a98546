<?php
session_start();
error_reporting(E_ALL);
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if ($action == 'listarProductosRequisicion') {

    include_once('../clases/dataInventarios.php');
    $database = new dataInventarios();
    //Recibir variables enviadas
    $usuario = strip_tags($_REQUEST['usuario']);
    $sesion = session_id();
    $tipo = strip_tags($_REQUEST['tipo']);
    $vista = strip_tags($_REQUEST['vista']);
    $per_page = intval($_REQUEST['per_page']);
    $folio = strip_tags($_REQUEST['folio']);
    $tipoDetalleDocumento = strip_tags($_REQUEST['tipoDetalleDocumento']);
    $campos = "prod.*";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;

    $search = array("usuario" => $usuario, "sesion" => $sesion, "folio" => $folio, "tipo" => $tipo, "tipoDetalleDocumento" => $tipoDetalleDocumento, "per_page" => $per_page, "offset" => $offset);
    //consulta principal para recuperar los datos
    $datos = $database->getListaProductosRequisiciones($campos, $search);
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

        <?php
        $finales = 0;
        $num = 1;
        $arreglo = array();
        foreach ($datos as $key => $row) {

            $codigoProducto = $row["codigo"];
            $idUnidad = $row["idUnidad"];
            $unidades = $database->getUnidadesMedidaProducto($codigoProducto, $idUnidad);
        ?>
            <tr id="contenedorProductos">
                <td class="idProducto" idTemp="<?= $row["id"]; ?>"><?= $num; ?></td>
                <td style="font-weight:bold;text-align:left;width:140px" class="codigoProducto"><?= $row['codigo']; ?></td>
                <td style="font-weight:bold;text-align:left;width:200px" class="nombreProducto"><?= $row['descripcion'] ?></td>
                <td>
                    <select class="form-control almacenProducto" name="almacenOrigen" id="almacenOrigen" onchange="updateCart(this);updateProductCart(this);">
                        <?php
                        $idGrupo = $_SESSION["idGrupo"];
                        $listaAlmacenes = $database->getListaAlmacenes($idGrupo);
                        foreach ($listaAlmacenes as $key => $value) {
                            if ($value["cidalmacen"] === $row["idAlmacenOrigen"]) {
                                $class = "selected";
                            } else {
                                $class = "";
                            }
                            echo '<option value="' . $value["cidalmacen"] . '" ' . $class . '>' . $value["cnombrealmacen"] . '</option>';
                        }
                        ?>
                    </select>
                </td>
                <td style="width:140px">
                    <input type="number" class="form-control cantidadProducto" style="width:100px" value="<?= number_format($row['unidades'] * $row['valorConversion'], 2) ?>" onchange="updateCart(this);updateProductCart(this);">
                </td>
                <td style="width:120px"><select class="form-control unidadProducto" onchange="updateCart(this);updateProductCart(this);">

                        <?php

                        foreach ($unidades as $key => $value) {
                            if ($value["UnidadConversion"] === $row["idUnidad"]) {
                                $class = "selected";
                            } else {
                                $class = "";
                            }
                            echo '<option value="' . $value["UnidadConversion"] . '" valorConversion="' . $value["CFACTORCONVERSION"] . '" ' . $class . '>' . $value["CABREVIATURA"] . '</option>';
                        }


                        ?>
                    </select></td>
                <td style="font-weight:bold"><input class="form-control costoProducto" type="text" value="$<?= number_format($row['costo'], 2) ?>" readonly></td>
                <td><input class="form-control importeProducto" type="text" value="$<?= number_format($row['importe'], 2) ?>" readonly></td>
                <td><button type="button" class="btn btn-secondary btnEliminarProducto" onclick="eliminarProducto('<?php echo $row['id'] ?>','<?php echo $tipo ?>');"><i class="fa fa-trash fa-2x" style="color:#00BCD4"></i></button></td>
            </tr>
        <?php
            $finales++;
            $num++;
        }

        ?>

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
    } else {
        echo "fail";
    }
}
if ($action == 'listarProductosRequisicionAdmin') {

    include_once('../clases/dataInventarios.php');
    $database = new dataInventarios();
    //Recibir variables enviadas
    $usuario = strip_tags($_REQUEST['usuario']);
    $sesion = session_id();
    $tipo = strip_tags($_REQUEST['tipo']);
    $vista = strip_tags($_REQUEST['vista']);
    $per_page = intval($_REQUEST['per_page']);
    $folio = strip_tags($_REQUEST['folio']);
    $tipoDetalleDocumento = strip_tags($_REQUEST['tipoDetalleDocumento']);
    $campos = "prod.*,alm.cnombrealmacen,med.cabreviatura,alm.cidalmacen";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;

    $search = array("tipoDetalleDocumento" => $tipoDetalleDocumento, "usuario" => $usuario, "sesion" => $sesion, "folio" => $folio, "tipo" => $tipo, "per_page" => $per_page, "offset" => $offset);
    //consulta principal para recuperar los datos
    $datos = $database->getListaProductosRequisicionesAdmin($campos, $search);
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

        <?php
        $finales = 0;
        $num = 1;
        $arreglo = array();
        foreach ($datos as $key => $row) {

            array_push($arreglo, $row["id"]);

            $codigoProducto = $row["codigo"];
            $idUnidad = $row["idUnidad"];
            $unidades = $database->getUnidadesMedidaProducto($codigoProducto, $idUnidad);

            $idProducto = $row["idProducto"];
            $periodo = strip_tags($_REQUEST['periodo']);
            $ejercicio = strip_tags($_REQUEST['ejercicio']);
            $idAlmacen = $row["cidalmacen"];

            $existencias = $database->getExistenciasProducto($idProducto, $periodo, $ejercicio, $idAlmacen);
            $unidadBase = $database->getUnidadMedidaProducto($codigoProducto);

            if ($existencias == NULL) {
                $existencia = 0;
            } else {
                $existencia = $existencias[0]["EXISTENCIAS"];
            }
            $unidad = $unidadBase[0]["UNIDAD"];
            if ($_REQUEST["vista"] === 'cargarListaProductosAutorizacion') {
                $boton = "";
                $estatus = "readonly";
            } else {
                $boton = '<button type="button" class="btn btn-secondary btnGenerarContratipo" onclick="generarContratipo(this);"><i class="fa fa-retweet fa-2x" style="color:#00BCD4"></i></button>';
                $estatus = "";
            }

        ?>
            <tr id="contenedorProductos">
                <td class="idProducto" idTemp="<?= $row['id']; ?>" idProducto="<?= $row['idProducto']; ?>"><?= $num; ?></td>
                <td style="font-weight:bold;text-align:left;width:140px" class="codigoProducto"><?= $row['codigo']; ?></td>
                <td style="font-weight:bold;text-align:left;width:200px" class="nombreProducto"><?= $row['descripcion'] ?></td>
                <td style="font-weight:bold;text-align:left;width:130px" class="almacenOrigen"><?= $row['cnombrealmacen'] ?></td>
                <td style="font-weight:bold;text-align:left;width:100px" class="costoProducto">$ <?= number_format($row['costo'], 2) ?></td>
                <td style="font-weight:bold;text-align:left;width:100px;color:#00BCD4" class="existenciasProducto"><?= number_format($existencia, 3) . " " . $unidad ?></td>
                <td style="font-weight:bold;text-align:left;width:100px" class="cantidadProducto" cantidadConv="<?= $row['unidades'] ?>"><?= number_format($row['unidades'] * $row['valorConversion'], 2) ?></td>
                <td style="font-weight:bold;text-align:left;width:100px" class="unidadProducto" valorConversion="<?= $row['valorConversion'] ?>"><?= $row['cabreviatura'] ?></td>
                <td style="font-weight:bold;width:200px;"><input class="form-control unidadesAprobadas" cantidadConv="<?= $row['unidadesRecibidas'] ?>" type="number" value="<?= number_format($row['unidadesRecibidas'] * $row['valorConversion'], 2) ?>" onchange="updateCartAprobado(this);updateCartPendiente(this);" <?= $estatus ?>></td>
                <td style="font-weight:bold;width:200px;"><input style="color:red;font-weight:bold" class="form-control unidadesPendientes" cantidadConv="<?= $row['pendientes'] ?>" type="number" value="<?= number_format($row['pendientes'] * $row['valorConversion'], 2) ?>" readonly></td>
                <td style="font-weight:bold;text-align:left;width:100px" class="importeProducto">$ <?= number_format($row['importe'], 2) ?></td>
                <td style="font-weight:bold;width:200px;"><input class="form-control importeAprobado" type="text" value="$<?= number_format($row['importeRecibido'], 2) ?>" readonly></td>
                <td style="font-weight:bold;width:200px;"><input style="color:red;font-weight:bold" class="form-control importePendiente" type="text" value="$<?= number_format($row['importePendiente'], 2) ?>" readonly></td>
                <td><?= $boton ?></td>
            </tr>
        <?php
            $finales++;
            $num++;
        }

        ?>

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
    } else {
        echo "fail";
    }
}
if ($action == 'listarProductosPedidos') {

    include_once('../clases/dataInventarios.php');
    $database = new dataInventarios();
    //Recibir variables enviadas
    $usuario = strip_tags($_REQUEST['usuario']);
    $sesion = session_id();
    $tipo = strip_tags($_REQUEST['tipo']);
    $vista = strip_tags($_REQUEST['vista']);
    $per_page = intval($_REQUEST['per_page']);
    $folio = strip_tags($_REQUEST['folio']);
    $tipoDetalleDocumento = strip_tags($_REQUEST['tipoDetalleDocumento']);
    $campos = "prod.*";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;

    $search = array("usuario" => $usuario, "sesion" => $sesion, "folio" => $folio, "tipo" => $tipo, "tipoDetalleDocumento" => $tipoDetalleDocumento, "per_page" => $per_page, "offset" => $offset);
    //consulta principal para recuperar los datos
    $datos = $database->getListaProductosPedidos($campos, $search);
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

        <?php
        $finales = 0;
        $num = 1;
        $arreglo = array();
        foreach ($datos as $key => $row) {

            $codigoProducto = $row["codigo"];
            $idUnidad = $row["idUnidad"];
            $unidades = $database->getUnidadesMedidaProducto($codigoProducto, $idUnidad);
        ?>
            <tr id="contenedorProductos">
                <td class="idProducto" idTemp="<?= $row["id"]; ?>"><?= $num; ?></td>
                <td style="font-weight:bold;text-align:left;width:140px" class="codigoProducto"><?= $row['codigo']; ?></td>
                <td style="font-weight:bold;text-align:left;width:200px" class="nombreProducto"><?= $row['descripcion'] ?></td>
                <td>
                    <select class="form-control almacenProducto" name="almacenOrigen" id="almacenOrigen" onchange="updateCart(this);updateProductCart(this);">
                        <?php
                        $idGrupo = $_SESSION["idGrupo"];
                        $listaAlmacenes = $database->getListaAlmacenes($idGrupo);
                        foreach ($listaAlmacenes as $key => $value) {
                            if ($value["cidalmacen"] === $row["idAlmacenOrigen"]) {
                                $class = "selected";
                            } else {
                                $class = "";
                            }
                            echo '<option value="' . $value["cidalmacen"] . '" ' . $class . '>' . $value["cnombrealmacen"] . '</option>';
                        }
                        ?>
                    </select>
                </td>
                <td style="width:140px">
                    <input type="number" class="form-control cantidadProducto" style="width:100px" value="<?= number_format($row['unidades'] * $row['valorConversion'], 2) ?>" onchange="updateCart(this);updateProductCart(this);">
                </td>
                <td style="width:120px"><select class="form-control unidadProducto" onchange="updateCart(this);updateProductCart(this);">

                        <?php

                        foreach ($unidades as $key => $value) {
                            if ($value["UnidadConversion"] === $row["idUnidad"]) {
                                $class = "selected";
                            } else {
                                $class = "";
                            }
                            echo '<option value="' . $value["UnidadConversion"] . '" valorConversion="' . $value["CFACTORCONVERSION"] . '" ' . $class . '>' . $value["CABREVIATURA"] . '</option>';
                        }


                        ?>
                    </select></td>
                <td style="font-weight:bold"><input class="form-control costoProducto" type="text" value="$<?= number_format($row['costo'], 2) ?>" readonly></td>
                <td><input class="form-control importeProducto" type="text" value="$<?= number_format($row['importe'], 2) ?>" readonly></td>
                <td><button type="button" class="btn btn-secondary btnEliminarProducto" onclick="eliminarProducto('<?php echo $row['id'] ?>','2');"><i class="fa fa-trash fa-2x" style="color:#00BCD4"></i></button></td>
            </tr>
        <?php
            $finales++;
            $num++;
        }

        ?>

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
    } else {
        echo "fail";
    }
}
if ($action == 'listarProductosPedidosAdmin') {

    include_once('../clases/dataInventarios.php');
    $database = new dataInventarios();
    //Recibir variables enviadas
    $usuario = strip_tags($_REQUEST['usuario']);
    $sesion = session_id();
    $tipo = strip_tags($_REQUEST['tipo']);
    $vista = strip_tags($_REQUEST['vista']);
    $per_page = intval($_REQUEST['per_page']);
    $folio = strip_tags($_REQUEST['folio']);
    $tipoDetalleDocumento = strip_tags($_REQUEST['tipoDetalleDocumento']);
    $campos = "prod.*,alm.cnombrealmacen,med.cabreviatura,alm.cidalmacen";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;

    $search = array("tipoDetalleDocumento" => $tipoDetalleDocumento, "usuario" => $usuario, "sesion" => $sesion, "folio" => $folio, "tipo" => $tipo, "per_page" => $per_page, "offset" => $offset);
    //consulta principal para recuperar los datos
    $datos = $database->getListaProductosPedidosAdmin($campos, $search);
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

        <?php
        $finales = 0;
        $num = 1;
        $arreglo = array();
        foreach ($datos as $key => $row) {

            array_push($arreglo, $row["id"]);


            $idProducto = $row["idProducto"];
            $codigoProducto = $row["codigo"];
            $periodo = strip_tags($_REQUEST['periodo']);
            $ejercicio = strip_tags($_REQUEST['ejercicio']);
            $idAlmacen = $row["cidalmacen"];

            $existencias = $database->getExistenciasProducto($idProducto, $periodo, $ejercicio, $idAlmacen);
            $unidadBase = $database->getUnidadMedidaProducto($codigoProducto);

            if ($existencias == NULL) {
                $existencia = 0;
            } else {
                $existencia = $existencias[0]["EXISTENCIAS"];
            }
            $unidad = $unidadBase[0]["UNIDAD"];
            if ($_REQUEST["vista"] === 'cargarListaProductosAutorizacion') {
                $boton = "";
                $estatus = "readonly";
            } else {
                $boton = '<button type="button" class="btn btn-secondary btnGenerarContratipo" onclick="generarContratipo(this);"><i class="fa fa-retweet fa-2x" style="color:#00BCD4"></i></button>';
                $estatus = "";
            }

        ?>
            <tr id="contenedorProductos">
                <td class="idProducto" idTemp="<?= $row['id']; ?>" idProducto="<?= $row['idProducto']; ?>"><?= $num; ?></td>
                <td style="font-weight:bold;text-align:left;width:140px" class="codigoProducto"><?= $row['codigo']; ?></td>
                <td style="font-weight:bold;text-align:left;width:200px" class="nombreProducto"><?= $row['descripcion'] ?></td>
                <td style="font-weight:bold;text-align:left;width:130px" class="almacenOrigen"><?= $row['cnombrealmacen'] ?></td>
                <td style="font-weight:bold;text-align:left;width:100px" class="costoProducto">$ <?= number_format($row['costo'], 2) ?></td>
                <td style="font-weight:bold;text-align:left;width:100px;color:#00BCD4" class="existenciasProducto"><?= number_format($existencia, 3) . " " . $unidad ?></td>
                <td style="font-weight:bold;text-align:left;width:100px" class="cantidadProducto" cantidadConv="<?= $row['unidades'] ?>"><?= number_format($row['unidades'] * $row['valorConversion'], 2) ?></td>
                <td style="font-weight:bold;text-align:left;width:100px" class="unidadProducto" valorConversion="<?= $row['valorConversion'] ?>"><?= $row['cabreviatura'] ?></td>
                <td style="font-weight:bold;width:200px;"><input class="form-control unidadesAprobadas" cantidadConv="<?= $row['unidadesRecibidas'] ?>" type="number" value="<?= number_format($row['unidadesRecibidas'] * $row['valorConversion'], 2) ?>" onchange="updateCartAprobado(this);updateCartPendiente(this);" <?= $estatus ?>></td>
                <td style="font-weight:bold;width:200px;"><input style="color:red;font-weight:bold" class="form-control unidadesPendientes" cantidadConv="<?= $row['pendientes'] ?>" type="number" value="<?= number_format($row['pendientes'] * $row['valorConversion'], 2) ?>" readonly></td>
                <td style="font-weight:bold;text-align:left;width:100px" class="importeProducto">$ <?= number_format($row['importe'], 2) ?></td>
                <td style="font-weight:bold;width:200px;"><input class="form-control importeAprobado" type="text" value="$<?= number_format($row['importeRecibido'], 2) ?>" readonly></td>
                <td style="font-weight:bold;width:200px;"><input style="color:red;font-weight:bold" class="form-control importePendiente" type="text" value="$<?= number_format($row['importePendiente'], 2) ?>" readonly></td>
                <td><?= $boton ?></td>
            </tr>
        <?php
            $finales++;
            $num++;
        }

        ?>

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
    } else {
        echo "fail";
    }
}
if ($action == 'listarProductosInventario') {

    include_once('../clases/dataInventarios.php');
    $database = new dataInventarios();
    //Recibir variables enviadas
    $usuario = strip_tags($_REQUEST['usuario']);
    $vista = strip_tags($_REQUEST['vista']);
    $per_page = intval($_REQUEST['per_page']);
    $marca = strip_tags($_REQUEST['marca']);
    $familia = strip_tags($_REQUEST['familia']);
    $categoria = strip_tags($_REQUEST['categoria']);
    $anaquel = strip_tags($_REQUEST['anaquel']);
    $repisa = strip_tags($_REQUEST['repisa']);
    $proveedor = strip_tags($_REQUEST['proveedor']);
    $periodo = strip_tags($_REQUEST['periodo']);
    $almacen = strip_tags($_REQUEST['almacen']);
    $campoOrden = strip_tags($_REQUEST['campoOrden']);
    $orden = strip_tags($_REQUEST['orden']);

    $campos = "*";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;

    $search = array("almacen" => $almacen, "marca" => $marca, "familia" => $familia, "categoria" => $categoria, "anaquel" => $anaquel, "repisa" => $repisa, "proveedor" => $proveedor, "periodo" => $periodo, "usuario" => $usuario, "per_page" => $per_page, "offset" => $offset, "campoOrden" => $campoOrden, "orden" => $orden);
    //consulta principal para recuperar los datos
    $datos = $database->getListaProductosInventario($search);
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

        <?php
        $finales = 0;
        $num = 1;

        foreach ($datos as $key => $row) {

            $codigoProducto = $row["CCODIGOPRODUCTO"];
            $idUnidad = $row["CIDUNIDADBASE"];
            $unidades = $database->getUnidadesMedidaProducto($codigoProducto, $idUnidad);
            $costo = bcdiv($row["COSTO"], '1', 5);

            if ($almacen == '3' || $almacen == '5' || $almacen == '7' || $almacen == '9' || $almacen == '11' || $almacen == '13') {
                $conversionProducto = bcdiv(number_format($row["EXISTENCIAS"], 3) * $row["VALORCONVERSION"], '1', 5);
            } else {
                $conversionProducto = bcdiv(number_format($row["EXISTENCIAS"], 3), '1', 5);
            }
        ?>
            <tr id="contenedorProductos">
                <td class="idProducto" idProducto="<?= $row['CIDPRODUCTO']; ?>"><?= $num; ?></td>
                <th style="font-weight:bold;text-align:left;width:140px" class="codigoProducto"><?= $row['CCODIGOPRODUCTO']; ?></th>
                <th style="font-weight:bold;text-align:left;width:200px" class="nombreProducto"><?= $row['CNOMBREPRODUCTO'] ?></th>
                <td style="font-weight:bold;text-align:left;width:130px" class="almacenProducto" idAlmacen="<?= $row['CIDALMACEN']; ?>"><?= $row['CCODIGOALMACEN'] ?></td>
                <td style="font-weight:bold;text-align:left;width:140px" class="unidadProductoBase" valorConversion="<?= $row['VALORCONVERSION'] ?>" idUnidad="<?= $row['CIDUNIDADBASE'] ?>" despliegue="<?= $row['CDESPLIEGUE'] ?>" nombreUnidad="<?= $row['CNOMBREUNIDAD'] ?>"><?= $row['CDESPLIEGUE'] . "/" . $row['CNOMBREUNIDAD'] . "/" . $row["VALORCONVERSION"] ?></td>
                <td style="font-weight:bold;text-align:left;width:100px;color:#00BCD4" class="existenciasProducto" cantidadConv="<?= $conversionProducto ?>"><?= bcdiv(number_format($row["EXISTENCIAS"], 3), '1', 3) ?></td>
                <td style="font-weight:bold;text-align:left;width:100px;color:#00BCD4" class="existenciasConversion"><?= $conversionProducto ?></td>
                <td style="font-weight:bold;text-align:left;width:100px"><select class="form-control unidadProducto" onchange="updateInventario(this);" style="width:80px">

                        <?php
                        if ($almacen == '3' || $almacen == '5' || $almacen == '7' || $almacen == '9' || $almacen == '11' || $almacen == '13') {
                            foreach ($unidades as $key => $value) {
                                if ($value["UnidadConversion"] === NULL) {
                                } else {
                                    echo '<option value="' . $value["UnidadConversion"] . '" valorConversion="' . $value["CFACTORCONVERSION"] . '">' . $value["CABREVIATURA"] . '</option>';
                                }
                            }
                        } else {
                            echo '<option value="' . $row["CIDUNIDADBASE"] . '" valorConversion="1">' . $row['CDESPLIEGUE'] . '</option>';
                        }

                        $diferencia = $conversionProducto;
                        if ($diferencia > 0) {
                            $estado = "Entrada";
                        } else if ($diferencia == 0.00000) {
                            $estado = "Sin Accion";
                        }

                        ?>
                    </select><input class="form-control inventarioProducto" type="number" value="0" cantidadConv="0.00" onchange="updateInventario(this);" style="width:150px;font-size:18px"></td>
                <td style="font-weight:bold;text-align:left;width:100px;" class="diferenciasProducto" cantidadConv="<?= $conversionProducto ?>"><?= bcdiv(number_format($row["EXISTENCIAS"], 3), '1', 5) ?></td>
                <td style="font-weight:bold;text-align:left;width:100px" class="costoProducto">$ <?= $costo  ?></td>
                <td style="font-weight:bold;text-align:left;width:100px;color:#00BCD4" class="existenciasImporteProducto">$<?= bcdiv(number_format(number_format($row["EXISTENCIAS"], 3), 5) * $costo, '1', 5) ?></td>
                <td style="font-weight:bold;text-align:left;width:100px;color:#00BCD4" class="inventarioImporteProducto">$<?= bcdiv(0, '1', 5) ?></td>
                <td style="font-weight:bold;text-align:left;width:100px;color:#00BCD4" class="diferenciasImporteProducto">$<?= bcdiv(number_format(number_format($row["EXISTENCIAS"], 3), 5) * $costo, '1', 5) ?></td>
                <td style="font-weight:bold;text-align:left;" class="estadoProducto"><?= $estado ?></td>
            </tr>
        <?php
            $finales++;
            $num++;
        }

        ?>

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
    } else {
        echo "fail";
    }
}
if ($action == 'listadoProductosInventario') {

    include_once('../clases/dataInventarios.php');
    $database = new dataInventarios();
    //Recibir variables enviadas

    $vista = strip_tags($_REQUEST['vista']);
    $folio = strip_tags($_REQUEST['folio']);
    $per_page = intval($_REQUEST['per_page']);
    $almacen = strip_tags($_REQUEST['almacen']);
    $campos = "prod.*,alm.ccodigoalmacen,med.cdespliegue as 'despliegue',med.cnombreunidad as 'nombreUnidad',med2.cnombreunidad as 'unidad'";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;
    $accionMovimiento = strip_tags($_REQUEST['accionMovimiento']);
    $filtroDiferencias = strip_tags($_REQUEST['filtroDiferencias']);
    $idEstatus = strip_tags($_REQUEST['idEstatus']);
    $habilitado = strip_tags($_REQUEST['habilitado']);
    $search = array("accionMovimiento" => $accionMovimiento, "filtroDiferencias" => $filtroDiferencias, "folio" => $folio, "per_page" => $per_page, "offset" => $offset);
    //consulta principal para recuperar los datos
    $datos = $database->getListadoProductosInventario($campos, $search);
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

        <?php
        $finales = 0;
        $num = 1;

        foreach ($datos as $key => $row) {

            $codigoProducto = $row["codigo"];
            $idUnidad = $row["idUnidadBase"];
            $unidades = $database->getUnidadesMedidaProducto($codigoProducto, $idUnidad);


            if ($almacen == '3' || $almacen == '5' || $almacen == '7' || $almacen == '9' || $almacen == '11' || $almacen == '13') {
                $conversionProducto = bcdiv(number_format($row["existencia"], 5) * $row["valorConversion"], '1', 5);
            } else {
                $conversionProducto = bcdiv(number_format($row["existencia"], 5), '1', 5);
            }
            if ($row["generado"] == "1") {
                $color = "#ADF7A6";
            } else {
                $color = "transparent";
            }

            if ($_SESSION["grupo"] == "Administracion") {
                $estado = "disabled";
                $estado2 = "readonly";
            } else {
                if ($idEstatus == "2") {
                    $estado = "disabled";
                    $estado2 = "readonly";
                } else if ($idEstatus == "3") {
                    $estado = "disabled";
                    $estado2 = "readonly";
                } else if ($idEstatus == "1" and $habilitado == "0") {
                    $estado = "disabled";
                    $estado2 = "readonly";
                } else {
                    $estado = "";
                    $estado2 = "";
                }
            }


        ?>
            <tr id="contenedorProductos" style="background:<?= $color ?>">
                <td class="idProducto" idProducto="<?= $row['idProducto']; ?>" idInventario="<?= $row['idInventario'] ?>" idProdInv="<?= $row['id'] ?>"><?= $num; ?></td>
                <th style="font-weight:bold;text-align:left;width:140px" class="codigoProducto"><?= $row['codigo']; ?></th>
                <th style="font-weight:bold;text-align:left;width:200px" class="nombreProducto"><?= $row['descripcion'] ?></th>
                <td style="font-weight:bold;text-align:left;width:130px" class="almacenProducto" idAlmacen="<?= $row['idAlmacen']; ?>"><?= $row['ccodigoalmacen'] ?></td>
                <td style="font-weight:bold;text-align:left;width:140px" class="unidadProductoBase" valorConversion="<?= $row['valorConversion'] ?>" idUnidad="<?= $row['idUnidadBase'] ?>"><?= $row['despliegue'] . "/" . $row['nombreUnidad'] ?></td>
                <td style="font-weight:bold;text-align:left;width:100px;color:#00BCD4" class="existenciasProducto" cantidadConv="<?= bcdiv($row["existenciaConversion"], '1', 5) ?>"><?= bcdiv($row["existencia"], '1', 5) ?></td>
                <td style="font-weight:bold;text-align:left;width:100px;color:#00BCD4" class="existenciasConversion"><?= bcdiv($row["existenciaConversion"], '1', 5) ?></td>
                <td style="font-weight:bold;text-align:left;width:100px"><select class="form-control unidadProducto" style="width:80px" <?= $estado ?>>

                        <?php
                        if ($almacen == '3' || $almacen == '5' || $almacen == '7' || $almacen == '9' || $almacen == '11' || $almacen == '13') {
                            foreach ($unidades as $key => $value) {
                                if ($value["UnidadConversion"] === NULL) {
                                } else {
                                    if ($row["idUnidad"] ==  $value["UnidadConversion"]) {
                                        $estatus = "selected";
                                        echo '<option value="' . $value["UnidadConversion"] . '" valorConversion="' . $value["CFACTORCONVERSION"] . '" ' . $estatus . '>' . $value["CABREVIATURA"] . '</option>';
                                    }
                                }
                            }
                        } else {

                            echo '<option value="' . $row["idUnidadBase"] . '" valorConversion="1">' . $row['despliegue'] . '</option>';
                        }


                        if ($almacen == '3' || $almacen == '5' || $almacen == '7' || $almacen == '9' || $almacen == '11' || $almacen == '13') {
                            $costoDefinido = $row["precioCapturado"];
                        } else {
                            $costoDefinido = $row["costo"];
                        }


                        ?>
                    </select><input class="form-control inventarioProducto" <?= $estado2 ?> type="text" value="<?= bcdiv($row["inventario"], '1', 5) ?>" cantidadConv="<?= bcdiv($row["inventarioConversion"], '1', 5) ?>" onchange="updateInventario(this);updateProductoInventario(this);" style="width:150px;font-size:18px"></td>

                <td style="font-weight:bold;text-align:left;width:100px;" class="diferenciasProducto" cantidadConv="<?= bcdiv($row["diferenciaConversion"], '1', 5) ?>"><?= bcdiv($row["diferencia"], '1', 5) ?></td>
                <td style="font-weight:bold;text-align:left;width:100px" class="costoProducto" costoCapturado="<?= $costoDefinido ?>">$ <?= bcdiv($row["costo"], '1', 5)  ?></td>
                <td style="font-weight:bold;text-align:left;width:100px;color:#00BCD4" class="existenciasImporteProducto">$<?= bcdiv($row["existenciaImporte"], '1', 5) ?></td>
                <td style="font-weight:bold;text-align:left;width:100px;color:#00BCD4" class="inventarioImporteProducto">$<?= bcdiv($row["inventarioImporte"], '1', 5) ?></td>
                <td style="font-weight:bold;text-align:left;width:100px;color:#00BCD4" class="diferenciasImporteProducto">$<?= bcdiv($row["diferenciaImporte"], '1', 5) ?></td>
                <td style="font-weight:bold;text-align:left;" class="estadoProducto"><?= $row["estado"] ?></td>
            </tr>
        <?php
            $finales++;
            $num++;
        }

        ?>

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
    } else {
        echo "fail";
    }
}
?>