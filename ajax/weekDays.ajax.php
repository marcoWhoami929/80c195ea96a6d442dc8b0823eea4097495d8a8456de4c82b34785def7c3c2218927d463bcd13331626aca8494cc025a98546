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
if ($action == "ejercicios") {
    if ($_REQUEST["empresa"] == "DEKKERLAB") {
        $arreglo = array("1" => "2021", "2" => "2022");
    } else {
        $arreglo = array("1" => "2013", "2" => "2014", "3" => "2015", "4" => "2016", "5" => "2017", "6" => "2018", "7" => "2019", "8" => "2020", "9" => "2021");
    }
    echo json_encode($arreglo);
}
