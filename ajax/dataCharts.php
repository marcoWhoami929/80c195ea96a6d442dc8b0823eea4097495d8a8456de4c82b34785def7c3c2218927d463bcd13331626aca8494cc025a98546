<?php
require_once "../models/admon.model.php";
$ventas = new ModelAdmon();
if (isset($_GET["grafico"])) {
    if ($_GET["grafico"] == "grafico1") {
        $year = $_GET["año"];
        $week = $_GET["semana"];
        $day = $_GET["dia"];
        $ventasDiarias = $ventas->mdlTotalVentasDiarias($year, $week, $day);
        $ventasDiariasTiendas = $ventas->mdlTotalVentasDiariasDesglose($year, $week, $day);

        $etiquetas = array();
        $series = array();
        foreach ($ventasDiarias as $key => $value) {

            array_push($etiquetas, array("name" => $value["canalComercial"], "y" => (float)$value["Totales"], "drilldown" => $value["canalComercial"]));
        }
        $totalSanManuel = 0;
        $totalSantiago = 0;
        foreach ($ventasDiariasTiendas as $key => $value) {

            if ($value["Agente"] == "ALBERTO YIZARK GONZALEZ AVILES") {
                $totalSanManuel = $totalSanManuel + $value["Totales"];
            } else if ($value["Agente"] == "IVAN HERRERA PEREZ") {
                $totalSanManuel = $totalSanManuel + $value["Totales"];
            } else if ($value["Agente"] == "MOSTRADOR SAN MANUEL") {
                $total = $totalSanManuel + $value["Totales"];
                array_push($series, array('PV SAN MANUEL', (float)$total));
            } else if ($value["Agente"] == "GABRIEL GARDUÑO GARCIA") {
                $totalSantiago = $totalSantiago + $value["Totales"];
            } else if ($value["Agente"] == "MOSTRADOR SANTIAGO") {
                $totals = $totalSantiago + $value["Totales"];
                array_push($series, array('PV SANTIAGO', (float)$totals));
            } else {
                array_push($series, array($value["Agente"], (float)$value["Totales"]));
            }
        }

        $respuesta = [
            "etiquetas" => $etiquetas,
            "series" => $series,

        ];
        echo json_encode($respuesta);
    }
    if ($_GET["grafico"] == "grafico2") {
        $ventasYearToDay = $ventas->mdlVentasYearToDay();
        $series2021 = array();
        $series2022 = array();
        foreach ($ventasYearToDay as $key => $value) {
            array_push($series2021, array($value["canalComercial"], (float)$value["2021"]));
            array_push($series2022, array($value["canalComercial"], (float)$value["2022"]));
        }
        $respuesta = [
            "ventas1" => $series2022,
            "ventas2" => $series2021,


        ];
        echo json_encode($respuesta);
    }
    if ($_GET["grafico"] == "grafico3") {
        $ventasYearToWeek = $ventas->mdlVentasYearToWeek();
        $series1 = array();
        $series2 = array();
        $ventas1 = array();
        $week = date('W');
        $year = 2021;
        $year2 = 2022;

        for ($day = 1; $day < 7; $day++) {

            $dia = date('d', strtotime($year . "W" . str_pad($week, 2, '0', STR_PAD_LEFT) . $day));
            $mes = date('m', strtotime($year . "W" . str_pad($week, 2, '0', STR_PAD_LEFT) . $day));
            $año = date('Y', strtotime($year . "W" . str_pad($week, 2, '0', STR_PAD_LEFT) . $day));
            $fecha = $año . "-" . (int)$mes . "-" . (int)$dia;
            array_push($series1, $fecha);
        }

        for ($i = 1; $i < 7; $i++) {

            $dia2 = date('d', strtotime($year2 . "W" . str_pad($week, 2, '0', STR_PAD_LEFT) . $i));
            $mes2 = date('m', strtotime($year2 . "W" . str_pad($week, 2, '0', STR_PAD_LEFT) . $i));
            $año2 = date('Y', strtotime($year2 . "W" . str_pad($week, 2, '0', STR_PAD_LEFT) . $i));
            $fecha2 = $año2 . "-" . (int)$mes2 . "-" . (int)$dia2;
            array_push($series2, $fecha2);
        }

        $fechas = [$series1[0], $series2[0], $series1[1], $series2[1], $series1[2], $series2[2], $series1[3], $series2[3], $series1[4], $series2[4], $series1[5], $series2[5]];
        foreach ($ventasYearToWeek as $key => $value) {
            array_push($ventas1, array("name" => $value["canalComercial"], "data" => array((float)$value[$series1[0]], (float)$value[$series2[0]], (float)$value[$series1[1]], (float)$value[$series2[1]], (float)$value[$series1[2]], (float)$value[$series2[2]], (float)$value[$series1[3]], (float)$value[$series2[3]], (float)$value[$series1[4]], (float)$value[$series2[4]], (float)$value[$series1[5]], (float)$value[$series2[5]])));
        }

        $respuesta = [
            "fechas" => $fechas,
            "ventas" => $ventas1,



        ];
        echo json_encode($respuesta);
    }
    if ($_GET["grafico"] == "grafico4") {
        $ventasYearToWeek = $ventas->mdlVentasYearToMonth();

        $ventas1 = array();
        foreach ($ventasYearToWeek as $key => $value) {
            array_push($ventas1, array("name" => $value["canalComercial"], "data" => array((float)$value['2021-1'], (float)$value['2022-1'], (float)$value['2021-2'], (float)$value['2022-2'], (float)$value['2021-3'], (float)$value['2022-3'], (float)$value['2021-4'], (float)$value['2022-4'], (float)$value['2021-5'], (float)$value['2022-5'], (float)$value['2021-6'], (float)$value['2022-6'], (float)$value['2021-7'], (float)$value['2022-7'], (float)$value['2021-8'], (float)$value['2022-8'], (float)$value['2021-9'], (float)$value['2022-9'], (float)$value['2021-10'], (float)$value['2022-10'], (float)$value['2021-11'], (float)$value['2022-11'], (float)$value['2021-12'], (float)$value['2022-12'])));
        }

        $respuesta = [
            "ventas" => $ventas1,
        ];
        echo json_encode($respuesta);
    }
}
