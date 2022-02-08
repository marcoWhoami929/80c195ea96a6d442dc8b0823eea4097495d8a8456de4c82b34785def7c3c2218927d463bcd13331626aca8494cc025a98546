<?php
require_once "controllers/template.controller.php";
require_once "controllers/admon.controller.php";
require_once "controllers/reporteador.controller.php";


require_once "models/admon.model.php";
require_once "models/db_conexion.php";


require_once "clases/ultimosCostosPinturas.php";
require_once "clases/ultimosCostosFlex.php";
require_once "clases/ultimosCostosTorres.php";

$template = new ControllerTemplate();
$template->template();
