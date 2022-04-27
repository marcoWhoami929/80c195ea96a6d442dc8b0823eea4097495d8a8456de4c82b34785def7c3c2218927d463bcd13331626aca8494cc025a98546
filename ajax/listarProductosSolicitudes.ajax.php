<?php
session_start();
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
    $campos = "prod.*";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;

    $search = array("usuario" => $usuario, "sesion" => $sesion, "folio" => $folio, "tipo" => $tipo, "per_page" => $per_page, "offset" => $offset);
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
                <td><button type="button" class="btn btn-secondary btnEliminarProducto" onclick="eliminarProducto('<?php echo $row['id'] ?>','1');"><i class="fa fa-trash fa-2x" style="color:#00BCD4"></i></button></td>
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
                <td style="font-weight:bold;width:200px;"><input class="form-control unidadesAprobadas" cantidadConv="<?= $row['unidadesRecibidas'] ?>" type="number" value="<?= number_format($row['unidadesRecibidas'] * $row['valorConversion'], 2) ?>" onchange="updateCartAprobado(this);updateCartPendiente(this);"></td>
                <td style="font-weight:bold;width:200px;"><input style="color:red;font-weight:bold" class="form-control unidadesPendientes" cantidadConv="<?= $row['pendientes'] ?>" type="number" value="<?= number_format($row['pendientes'] * $row['valorConversion'], 2) ?>" readonly></td>
                <td style="font-weight:bold;text-align:left;width:100px" class="importeProducto">$ <?= number_format($row['importe'], 2) ?></td>
                <td style="font-weight:bold;width:200px;"><input class="form-control importeAprobado" type="text" value="$<?= number_format($row['importeRecibido'], 2) ?>" readonly></td>
                <td style="font-weight:bold;width:200px;"><input style="color:red;font-weight:bold" class="form-control importePendiente" type="text" value="$<?= number_format($row['importePendiente'], 2) ?>" readonly></td>
                <td><button type="button" class="btn btn-secondary btnGenerarContratipo" onclick="generarContratipo(this);"><i class="fa fa-retweet fa-2x" style="color:#00BCD4"></i></button></td>
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