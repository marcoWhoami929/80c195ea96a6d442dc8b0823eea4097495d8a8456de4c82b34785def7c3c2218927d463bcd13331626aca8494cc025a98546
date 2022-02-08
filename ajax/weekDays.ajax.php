<?php
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if ($action == "diasSemana") {

    $arreglo = array();
    for ($i = 1; $i < 7; $i++) {

        $dia = date('Y-m-d', strtotime(strip_tags($_REQUEST['anio']) . "W" . str_pad($_REQUEST['semana'], 2, '0', STR_PAD_LEFT) . $i));
        array_push($arreglo, $dia);
    }
    echo json_encode($arreglo);
}
