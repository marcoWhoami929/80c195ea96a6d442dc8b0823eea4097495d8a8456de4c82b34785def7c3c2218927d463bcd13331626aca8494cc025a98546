<?php
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if ($action == 'listadoDocumentosNoImpresos') {

    include('../clases/dataInventarios.php');
    $database = new dataInventarios();
    //Recibir variables enviadas
    $vista = strip_tags($_REQUEST['vista']);
    $per_page = intval($_REQUEST['per_page']);
    $estatus = strip_tags($_REQUEST['estatus']);
    $idDocumentoDe = strip_tags($_REQUEST['idDocumentoDe']);
    $idConcepto = strip_tags($_REQUEST['idConcepto']);
    $campo = strip_tags($_REQUEST['campo']);
    $orden = strip_tags($_REQUEST['orden']);
    $campos = "CSERIEDOCUMENTO,CFOLIO,CFECHA,CREFERENCIA,COBSERVACIONES,CTOTALUNIDADES,CTOTAL";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;

    $search = array("per_page" => $per_page, "offset" => $offset, "estatus" => $estatus, "idDocumentoDe" => $idDocumentoDe, "idConcepto" => $idConcepto, "campo" => $campo, "orden" => $orden);
    //consulta principal para recuperar los datos
    $datos = $database->getDocumentosNoImpresos($campos, $search);
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

                    <th>SERIE</th>
                    <th>FOLIO</th>
                    <th>FECHA</th>
                    <th>REFERENCIA</th>
                    <th>OBSERVACIONES</th>
                    <th>UNIDADES</th>
                    <th>TOTAL</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $finales = 0;
                foreach ($datos as $key => $row) {



                ?>
                    <tr>
                        <td style="font-weight:bold;text-align:left"><?= $row['CSERIEDOCUMENTO']; ?></td>
                        <td style="font-weight:bold;text-align:left"><?= intval($row['CFOLIO']) ?></td>
                        <td><?= $row['CFECHA'] ?></td>
                        <td><?= $row['CREFERENCIA'] ?></td>
                        <td><?= $row['COBSERVACIONES'] ?></td>
                        <td><?= $row['CTOTALUNIDADES'] ?></td>
                        <td>$ <?= number_format($row['CTOTAL'], 2) ?></td>

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