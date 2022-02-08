<?php
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if ($action == 'margenesUtilidad') {

    include('../clases/detalleVentas.php');
    $database = new detalleVentas();
    //Recibir variables enviadas
    $query = strip_tags($_REQUEST['query']);
    $vista = strip_tags($_REQUEST['vista']);
    $año = strip_tags($_REQUEST['año']);
    $estatus = strip_tags($_REQUEST['estatus']);
    $canal = strip_tags($_REQUEST['canal']);
    $per_page = intval($_REQUEST['per_page']);
    $campo = strip_tags($_REQUEST['campo']);
    $orden = strip_tags($_REQUEST['orden']);
    $mes = strip_tags($_REQUEST['mes']);

    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;
    $search = array("query" => $query, "año" => $año, "mes" => $mes, "estatus" => $estatus, "canal" => $canal,  "per_page" => $per_page, "offset" => $offset, "campo" => $campo, "orden" => $orden);
    //consulta principal para recuperar los datos
    $datos = $database->getMargenesUtilidad($search);

    $countAll = $database->getCounter();
    $row = $countAll;

    if ($row > 0) {
        $numrows = $countAll;;
    } else {
        $numrows = 0;
    }
    $total_pages = ceil($numrows / $per_page);

    //Recorrer los datos recuperados

    if ($numrows > 0) {
?> <div class="fixedColumns">
            <table class="table table-responsive table-striped table-hover productosUtilidad" id="productosUtilidad">
                <thead>
                    <tr>
                        <th>CLIENTE</th>
                        <th>CANAL</th>
                        <th>VENTAS</th>
                        <th>COSTO</th>
                        <th>INGRESO</th>
                        <th>UTILIDAD</th>
                    </tr>
                </thead>
                <tbody id="productosUtilidadBody">
                    <?php
                    $finales = 0;
                    $totalesVentas = 0;
                    $totalesCosto = 0;
                    $totalesIngreso = 0;
                    $totalesUtilidad = 0;

                    foreach ($datos as $key => $row) {

                        $totalesVentas += $row['Ventas'];
                        $totalesCosto += $row['Costos'];
                        $totalesIngreso += $row['Ingresos'];
                        $utilidad = number_format($row['Utilidad'], 2);
                        if ($utilidad > 25) {
                            $color = "#3FFF68";
                            $colorLetra = "#474747";
                        } else {
                            $color = "#FF563F";
                            $colorLetra = "white";
                        }

                    ?>
                        <tr class="parent">

                            <td><?= $row['Cliente']  ?></td>
                            <td><?= $row['canalComercial']  ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['Ventas'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['Costos'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['Ingresos'], 2) ?></td>
                            <td style="background:<?= $color ?>;color:<?= $colorLetra ?>;font-weight:bold;text-align:right"><?= number_format($row['Utilidad'], 2) ?> % </td>

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
                        <th style="font-weight:bold;text-align:right">$<?= number_format($totalesVentas, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($totalesCosto, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($totalesIngreso, 2) ?></th>
                        <th style="font-weight:bold;text-align:right"><?= number_format(($totalesIngreso / $totalesVentas) * 100, 2) ?>%</th>


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
            echo $pagination->paginateVentasCliente($vista);

            ?>
        </div>
<?php
    }
}

?>
<script type="text/javascript">
    $('#productosUtilidad').on("click", "button", function() {
        var cliente = $(this).attr("cliente");
        var clasificacion = $(this).attr("clasificacion");
        var canal = $(this).attr("canal");
        var parentClasificaciones = $(this).parent().parent();
        var vista = "cargarMargenesUtilidad";


        var estatus = $("#estatus").val();
        var año = $("#anio").val();

        var per_page = $("#per_page").val();
        var campo = $("#campoOrden").val();
        var orden = $("#orden").val();
        var mes = $("#mesDetalle").val();
        var parametros = {
            action: "margenesUtilidadProductos",
            page: 1,
            query: cliente,
            clasificacion: clasificacion,
            año: año,
            canal: canal,
            estatus: estatus,
            vista: vista,
            per_page: per_page,
            campo: campo,
            orden: orden,
            mes: mes,

        };
        var tableBody = document.getElementById("productosUtilidadBody");
        var numElementos = parentClasificaciones.closest("tr").nextUntil(".parentClasificacion").length;

        if (numElementos == 0) {

            $.ajax({
                url: "ajax/margenesUtilidadData.ajax.php",
                data: parametros,
                success: function(data) {
                    var productos = JSON.parse(data);
                    for (var i = 0; i < productos.length; i++) {

                        var tr = document.createElement('tr');
                        tr.setAttribute("class", "parentProductos");
                        tableBody.appendChild(tr);

                        for (var j = 0; j < 6; j++) {
                            var td = document.createElement('td');
                            if (j == 0) {
                                td.setAttribute("style", "background:#F7FAC4");
                                td.appendChild(document.createTextNode(productos[i]["CCODIGOPRODUCTO"]));
                            } else
                            if (j == 1) {
                                td.setAttribute("style", "background:#F7FAC4");
                                td.appendChild(document.createTextNode(productos[i]["CNOMBREPRODUCTO"]));
                            } else
                            if (j == 2) {
                                td.setAttribute("style", "background:#F7FAC4");
                                var venta = parseFloat(productos[i]["Ventas"]);
                                td.appendChild(document.createTextNode("$ " + Intl.NumberFormat('en-US').format(venta.toFixed(2))));
                            } else if (j == 3) {
                                td.setAttribute("style", "background:#F7FAC4");
                                var venta = parseFloat(productos[i]["Costos"]);
                                td.appendChild(document.createTextNode("$ " + Intl.NumberFormat('en-US').format(venta.toFixed(2))));
                            } else if (j == 4) {
                                td.setAttribute("style", "background:#F7FAC4");
                                var venta = parseFloat(productos[i]["Ingresos"]);
                                td.appendChild(document.createTextNode("$ " + Intl.NumberFormat('en-US').format(venta.toFixed(2))));
                            } else if (j == 5) {

                                var venta = parseFloat(productos[i]["Utilidad"]);
                                td.appendChild(document.createTextNode(venta.toFixed(2) + " %"));
                                if (venta > 25) {
                                    td.setAttribute("style", "background:#3FFF68");
                                } else {
                                    td.setAttribute("style", "background:#FF563F;color:white");
                                }
                            } else {
                                td.setAttribute("style", "background:#F7FAC4");
                            }
                            tr.appendChild(td);
                        }

                        var numElementos = $(this).closest("tr").nextUntil(".parentClasificacion").length;

                        if (numElementos == 0) {

                            parentClasificaciones.after(tr);
                        } else {

                            parentClasificaciones.closest("tr").nextUntil(".parentClasificacion").after(tr);
                        }

                    }

                    parentClasificaciones.closest("tr").nextUntil(".parentClasificacion").toggleClass("open2");

                },
            });



        } else {
            parentClasificaciones.closest("tr").nextUntil(".parentClasificacion").remove();

            parentClasificaciones.closest("tr").nextUntil(".parentClasificacion").toggleClass("open2");
        }

    });
    $('#productosUtilidad').find('.parent').click(function() {

        var cliente = $(this).find("td:eq(0)").text();
        var canal = $(this).find("td:eq(1)").text();

        var vista = "cargarMargenesUtilidad";

        var estatus = $("#estatus").val();
        var año = $("#anio").val();

        var per_page = $("#per_page").val();
        var campo = $("#campoOrden").val();
        var orden = $("#orden").val();
        var mes = $("#mesDetalle").val();
        var parametros = {
            action: "margenesUtilidadClasificacion",
            page: 1,
            query: cliente,
            año: año,
            canal: canal,
            estatus: estatus,
            vista: vista,
            per_page: per_page,
            campo: campo,
            orden: orden,
            mes: mes,

        };
        var tableBody = document.getElementById("productosUtilidadBody");
        var numElementos = $(this).closest("tr").nextUntil(".parent").length;
        var elemento = this;
        var elementoThis = $(this);
        if (numElementos == 0) {

            $.ajax({
                url: "ajax/margenesUtilidadData.ajax.php",
                data: parametros,
                success: function(data) {
                    var clasificaciones = JSON.parse(data);
                    for (var i = 0; i < clasificaciones.length; i++) {

                        var tr = document.createElement('tr');
                        tr.setAttribute("class", "parentClasificacion");
                        tableBody.appendChild(tr);

                        for (var j = 0; j < 6; j++) {
                            var td = document.createElement('td');
                            if (j == 0) {
                                td.setAttribute("style", "background:transparent");
                            } else if (j == 1) {
                                const button = document.createElement('button');
                                button.type = "button";
                                button.innerHTML = "+";
                                button.setAttribute("cliente", clasificaciones[i]["Cliente"]);
                                button.setAttribute("clasificacion", clasificaciones[i]["Clasificacion"]);
                                button.setAttribute("canal", canal);
                                td.appendChild(button);
                                td.setAttribute("style", "background:#A2CEFF");
                                td.appendChild(document.createTextNode(clasificaciones[i]["Clasificacion"]));

                            } else if (j == 2) {
                                var venta = parseFloat(clasificaciones[i]["Ventas"]);

                                td.appendChild(document.createTextNode("$ " + Intl.NumberFormat('en-US').format(venta.toFixed(2))));
                                td.setAttribute("style", "background:#A2CEFF");
                            } else if (j == 3) {
                                var venta = parseFloat(clasificaciones[i]["Costos"]);
                                td.appendChild(document.createTextNode("$ " + Intl.NumberFormat('en-US').format(venta.toFixed(2))));
                                td.setAttribute("style", "background:#A2CEFF");
                            } else if (j == 4) {
                                var venta = parseFloat(clasificaciones[i]["Ingresos"]);
                                td.appendChild(document.createTextNode("$ " + Intl.NumberFormat('en-US').format(venta.toFixed(2))));
                                td.setAttribute("style", "background:#A2CEFF");
                            } else if (j == 5) {
                                var venta = parseFloat(clasificaciones[i]["Utilidad"]);
                                td.appendChild(document.createTextNode(venta.toFixed(2) + " %"));
                                if (venta > 25) {
                                    td.setAttribute("style", "background:#3FFF68");
                                } else {
                                    td.setAttribute("style", "background:#FF563F;color:white");
                                }
                            } else {
                                td.setAttribute("style", "background:#A2CEFF");
                            }
                            tr.appendChild(td);
                        }

                        var numElementos = $(this).closest("tr").nextUntil(".parent").length;

                        if (numElementos == 0) {

                            elemento.after(tr);
                        } else {

                            elementoThis.closest("tr").nextUntil(".parent").after(tr);
                        }

                    }

                    elementoThis.closest("tr").nextUntil(".parent").toggleClass("open");

                },
            });



        } else {

            $(this).closest("tr").nextUntil(".parent").remove();
            $(this).closest("tr").nextUntil(".parent").toggleClass("open");
        }
    });
</script>