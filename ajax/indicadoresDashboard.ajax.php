<?php
require_once "../models/admon.model.php";
$ventas = new ModelAdmon();
function searchValueForName($name, $array)
{

    foreach ($array as $key => $val) {

        if ($val['name'] === $name) {

            return $val['value'];
        }
    }
    return null;
}
function searchArray($value, $key, $array)
{
    foreach ($array as $k => $val) {
        if ($val[$key] == $value) {
            return $k;
        }
    }
    return null;
}
if (isset($_GET["ventas"])) {
    if ($_GET["ventas"] == "semanal") {
        $year = $_GET["año"];
        $week = $_GET["semana"];
        $day = $_GET["dia"];
        $ventasDiarias = $ventas->mdlTotalVentasDiarias($year, $week, $day);
        $ventasDiariasTiendas = $ventas->mdlTotalVentasDiariasDesglose($year, $week, $day);

        $canales = array();
        $canals = array();
        $tiendas = array();
        $tiends = array();
        $canal = array('CEDIS', 'E-COMMERCE', 'FLOTILLAS',  'RUTAS', 'TIENDAS');
        $tienda = array('PV CAPU', 'PV REFORMA', 'MOSTRADOR SAN MANUEL', 'ALBERTO YIZARK GONZALEZ AVILES', 'IVAN HERRERA PEREZ', 'MOSTRADOR SANTIAGO', 'PV TORRES','PV ACATEPEC','GABRIEL GARDUÑO GARCIA');
        foreach ($ventasDiarias as $key => $value) {

            array_push($canals, array("name" => $value["canalComercial"], "value" => (float)$value["Totales"]));
        }

        for ($i = 0; $i < count($canal); $i++) {
            $valor = searchValueForName($canal[$i], $canals);

            if ($valor != NULL) {
                array_push($canales, array("name" => $canal[$i], "value" => (float)$valor));
            } else {
                array_push($canales, array("name" => $canal[$i], "value" => (float)0));
            }
        }

        foreach ($ventasDiariasTiendas as $key => $value2) {


            array_push($tiends, array("name" => $value2["Agente"], "value" => (float)$value2["Totales"]));
        }
        for ($i = 0; $i < count($tienda); $i++) {
            $valor = searchValueForName($tienda[$i], $tiends);
            $sanManuel = searchValueForName('MOSTRADOR SAN MANUEL', $tiends) + searchValueForName('ALBERTO YIZARK GONZALEZ AVILES', $tiends) + searchValueForName('IVAN HERRERA PEREZ', $tiends) ;
            $santiago = searchValueForName('MOSTRADOR SANTIAGO', $tiends) + searchValueForName('GABRIEL GARDUÑO GARCIA', $tiends);

            if ($valor != NULL) {
                if ($tienda[$i] === "MOSTRADOR SAN MANUEL") {

                    array_push($tiendas, array("name" => "MOSTRADOR SAN MANUEL", "value" => (float)$sanManuel));
                }else if ($tienda[$i] === "MOSTRADOR SANTIAGO") {

                    array_push($tiendas, array("name" => "MOSTRADOR SANTIAGO", "value" => (float)$santiago));
                }else if ($tienda[$i] === "ALBERTO YIZARK GONZALEZ AVILES") {
                }else if ($tienda[$i] === "IVAN HERRERA PEREZ") {
                }else if ($tienda[$i] === "GABRIEL GARDUÑO GARCIA") {
                } else {
                    array_push($tiendas, array("name" => $tienda[$i], "value" => (float)$valor));
                }
            } else {
                if ($tienda[$i] === "ALBERTO YIZARK GONZALEZ AVILES") {
                } else if ($tienda[$i] === "IVAN HERRERA PEREZ") {
                }else if ($tienda[$i] === "GABRIEL GARDUÑO GARCIA") {
                } else {
                    array_push($tiendas, array("name" => $tienda[$i], "value" => (float)0));
                }
            }
           
        }
        sort($canales);
        sort($tiendas);
        $respuesta = [
            "canales" => $canales,
            "tiendas" => $tiendas,

        ];
        echo json_encode($respuesta);
    }
    if ($_GET["ventas"] == "semanalConceptos") {
        $year = $_GET["año"];
        $week = $_GET["semana"];
        $day = $_GET["dia"];
        $concepts = array();
        $concepto = array();
        $ventasConceptos = $ventas->mdlTotalVentasDiariasConceptos($year, $week, $day);
        $conceptos = array('cargo', 'credito', 'devolucion', 'facturas', 'documentosPrueba');
        foreach ($ventasConceptos as $key => $value) {

            array_push($concepts, array("name" => $value["Concepto"], "value" => (float)$value["Totales"]));
        }
        for ($i = 0; $i < 5; $i++) {

            $results = searcharray($conceptos[$i], 'name', $concepts);
            if ($results === NULL) {
                array_push($concepts, array("name" => $conceptos[$i], "value" => (float)0));
            } else {
            }
        }

        sort($concepts);
        $respuesta = [
            "conceptos" => $concepts,

        ];
        echo json_encode($respuesta);
    }
}
