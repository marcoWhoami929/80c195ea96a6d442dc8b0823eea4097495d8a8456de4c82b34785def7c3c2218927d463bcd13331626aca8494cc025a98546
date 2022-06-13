<?php

require_once "../../controllers/reporteador.controller.php";
require_once "../../models/db_conexion.php";

require_once "../../clases/ultimosCostosPinturas.php";
require_once "../../clases/ultimosCostosFlex.php";
require_once "../../clases/ultimosCostosTorres.php";
require_once "../../clases/ultimosCostosDekkerlab.php";
require_once "../../clases/detalleVentasDiario.php";
require_once "../../clases/detalleVentas.php";
require_once "../../clases/detalleVentasAnual.php";
include_once('../../clases/dataInventarios.php');
require_once "../../clases/PHPExcel.php";
class loadReports
{

    public $empresa;
    public $query;
    public $año;

    public $estatus;
    public $semana;
    public $agente;
    public $canal;
    public $centro;
    public $per_page;
    public $page;
    public $campo;
    public $orden;
    public $mes;
    public $abonado;
    public $productos;
    public $clientes;
    public $vista;
    public $tipo;
    public $fechaInicio;
    public $fechaFin;
    public $ejercicio;
    public $usuario;
    public $marca;
    public $familia;
    public $categoria;
    public $anaquel;
    public $repisa;
    public $proveedor;
    public $campoOrden;
    public $periodo;
    public $almacen;
    public $nombreAlmacen;
    public $folio;
    public $idEstatus;
    public $habilitado;
    public $accionMovimiento;
    public $filtroDiferencias;
    public $documento;
    public function reportUltimosCostos()
    {
        $empresa = $this->empresa;
        $query = $this->query;
        $año = $this->año;

        $obtenerReporte = new ControllerReports();
        $obtenerReporte->ctrDescargarReporteUltimosCostos($empresa, $query, $año);
    }

    public function reporteVentasDiarias()
    {
        $semana = $this->semana;
        if ($semana == "") {
            $week = date("W");
        } else {
            $week = $semana;
        }

        $query = $this->clientes;
        $año = $this->año;
        $estatus = $this->estatus;
        $agente = $this->agente;
        $per_page = $this->per_page;
        $page = $this->page;
        $productos = $this->productos;
        $canal = $this->canal;
        $centro = $this->centro;
        $marca = $this->marca;
        $tables = "dbo.admDocumentos";
        $campos = "*";
        $campo = $this->campo;
        $orden = $this->orden;
        $vista = $this->vista;
        //Variables de paginación
        $page = (isset($page) && !empty($page)) ? $page : 1;
        $offset = ($page - 1) * $per_page;
        $search = array("query" => $query, "producto" => $productos, "año" => $año, "estatus" => $estatus, "agente" => $agente, "canal" => $canal, "centro" => $centro, "marca" => $marca, "semana" => $week, "per_page" => $per_page, "offset" => $offset, "campo" => $campo, "orden" => $orden, "vista" => $vista);
        //consulta principal para recuperar los datos
        $obtenerReporteVentas = new ControllerReports();
        $obtenerReporteVentas->ctrDescargarReporteVentasDiario($tables, $campos, $search);
    }

    public function reporteVentasMensuales()
    {

        //Recibir variables enviadas
        $query = $this->clientes;
        $año = $this->año;
        $estatus = $this->estatus;
        $agente = $this->agente;
        $per_page = $this->per_page;
        $page = $this->page;
        $productos = $this->productos;
        $canal = $this->canal;
        $centro = $this->centro;
        $marca = $this->marca;
        $tables = "dbo.admDocumentos";
        $campos = "*";
        $campo = $this->campo;
        $orden = $this->orden;
        $vista = $this->vista;
        //Variables de paginación
        $page = (isset($page) && !empty($page)) ? $page : 1;
        $offset = ($page - 1) * $per_page;
        $search = array("query" => $query, "producto" => $productos, "año" => $año, "estatus" => $estatus, "agente" => $agente, "canal" => $canal, "centro" => $centro, "marca" => $marca, "per_page" => $per_page, "offset" => $offset, "campo" => $campo, "orden" => $orden, "vista" => $vista);
        //consulta principal para recuperar los datos
        $obtenerReporteVentas = new ControllerReports();
        $obtenerReporteVentas->ctrDescargarReporteVentasMensual($tables, $campos, $search);
    }
    public function reporteVentasAnuales()
    {

        //Recibir variables enviadas
        $query = $this->clientes;
        $estatus = $this->estatus;
        $agente = $this->agente;
        $per_page = $this->per_page;
        $page = $this->page;
        $productos = $this->productos;
        $canal = $this->canal;
        $centro = $this->centro;
        $marca = $this->marca;
        $tables = "dbo.admDocumentos";
        $campos = "*";
        $campo = $this->campo;
        $orden = $this->orden;
        $vista = $this->vista;
        //Variables de paginación
        $page = (isset($page) && !empty($page)) ? $page : 1;
        $offset = ($page - 1) * $per_page;
        $search = array("query" => $query, "producto" => $productos, "estatus" => $estatus, "agente" => $agente, "canal" => $canal, "centro" => $centro, "marca" => $marca, "per_page" => $per_page, "offset" => $offset, "campo" => $campo, "orden" => $orden, "vista" => $vista);
        //consulta principal para recuperar los datos
        $obtenerReporteVentas = new ControllerReports();
        $obtenerReporteVentas->ctrDescargarReporteVentasAnual($tables, $campos, $search);
    }


    public function reporteVentasDetalle()
    {

        //Recibir variables enviadas
        $query = $this->clientes;
        $estatus = $this->estatus;
        $año = $this->año;
        $agente = $this->agente;
        $canal = $this->canal;
        $centro = $this->centro;
        $per_page = $this->per_page;
        $page = $this->page;
        $campo = $this->campo;
        $orden = $this->orden;
        $mes = $this->mes;
        $abonado = $this->abonado;
        $tipo = $this->tipo;
        $fechaInicio = $this->fechaInicio;
        $fechaFin = $this->fechaFin;

        $tables = "dbo.admDocumentos";
        $campos = "*";
        $vista = $this->vista;
        //Variables de paginación
        $page = (isset($page) && !empty($page)) ? $page : 1;
        $offset = ($page - 1) * $per_page;
        $search = array("query" => $query, "año" => $año, "mes" => $mes, "abonado" => $abonado, "estatus" => $estatus, "canal" => $canal, "centro" => $centro, "agente" => $agente, "per_page" => $per_page, "offset" => $offset, "campo" => $campo, "orden" => $orden, "vista" => $vista, "tipo" => $tipo, "fechaInicio" => $fechaInicio, "fechaFin" => $fechaFin);
        //consulta principal para recuperar los datos
        $obtenerReporteVentas = new ControllerReports();
        $obtenerReporteVentas->ctrDescargarReporteVentasDetalle($tables, $campos, $search);
    }
    public function reporteMargenesUtilidad()
    {
        //Recibir variables enviadas
        $estatus = $this->estatus;
        $año = $this->año;
        $canal = $this->canal;
        $per_page = $this->per_page;
        $page = $this->page;
        $campo = $this->campo;
        $orden = $this->orden;
        $mes = $this->mes;
        $query = $this->clientes;


        $vista = $this->vista;
        //Variables de paginación
        $page = (isset($page) && !empty($page)) ? $page : 1;
        $offset = ($page - 1) * $per_page;
        $search = array("año" => $año, "query" => $query, "mes" => $mes, "estatus" => $estatus, "canal" => $canal, "per_page" => $per_page, "offset" => $offset, "campo" => $campo, "orden" => $orden, "vista" => $vista);
        //consulta principal para recuperar los datos
        $obtenerReporteVentas = new ControllerReports();
        $obtenerReporteVentas->ctrDescargarReporteMargenesUtilidad($search);
    }
    public function reporteIndicadoresMensual()
    {

        //Recibir variables enviadas
        $estatus = $this->estatus;
        $año = $this->año;
        $per_page = $this->per_page;
        $page = $this->page;
        $campo = $this->campo;
        $orden = $this->orden;
        $vista = $this->vista;
        //Variables de paginación
        $page = (isset($page) && !empty($page)) ? $page : 1;
        $offset = ($page - 1) * $per_page;
        $search = array("año" => $año, "estatus" => $estatus, "per_page" => $per_page, "offset" => $offset, "campo" => $campo, "orden" => $orden, "vista" => $vista);
        //consulta principal para recuperar los datos
        $obtenerReporteIndicadores = new ControllerReports();
        $obtenerReporteIndicadores->ctrDescargarReporteIndicadoresMensual($search);
    }
    public function reporteDetalladoIndicadoresMensual()
    {

        //Recibir variables enviadas
        $estatus = $this->estatus;
        $año = $this->año;
        $per_page = $this->per_page;
        $page = $this->page;
        $campo = $this->campo;
        $orden = $this->orden;
        $vista = $this->vista;
        //Variables de paginación
        $page = (isset($page) && !empty($page)) ? $page : 1;
        $offset = ($page - 1) * $per_page;
        $search = array("año" => $año, "estatus" => $estatus, "per_page" => $per_page, "offset" => $offset, "campo" => $campo, "orden" => $orden, "vista" => $vista);
        //consulta principal para recuperar los datos
        $obtenerReporteIndicadores = new ControllerReports();
        $obtenerReporteIndicadores->ctrDescargarReporteDetalladoIndicadoresMensual($search);
    }
    public function reporteInventarioActual()
    {

        $empresa = $this->empresa;
        $ejercicio = $this->ejercicio;
        $vista = $this->vista;
        $search = array("empresa" => $empresa, "ejercicio" => $ejercicio, "vista" => $vista);
        $inventarioActual = new ControllerReports();
        $inventarioActual->ctrDescargarReporteInventarioActual($search);
    }
    public function reporteRealizarInventario()
    {

        $usuario = $this->usuario;
        $per_page = $this->per_page;
        $marca = $this->marca;
        $familia = $this->familia;
        $categoria = $this->categoria;
        $anaquel = $this->anaquel;
        $repisa = $this->repisa;
        $proveedor = $this->proveedor;
        $periodo = $this->periodo;
        $almacen = $this->almacen;
        $campoOrden = $this->campoOrden;
        $orden = $this->orden;
        $nombreAlmacen = $this->nombreAlmacen;
        $page = $this->page;

        //Variables de paginación
        $page = (isset($page) && !empty($page)) ? $page : 1;
        $adjacents  = 4; //espacio entre páginas después del número de adyacentes
        $offset = ($page - 1) * $per_page;

        $search = array("nombreAlmacen" => $nombreAlmacen, "almacen" => $almacen, "marca" => $marca, "familia" => $familia, "categoria" => $categoria, "anaquel" => $anaquel, "repisa" => $repisa, "proveedor" => $proveedor, "periodo" => $periodo, "usuario" => $usuario, "per_page" => $per_page, "offset" => $offset, "campoOrden" => $campoOrden, "orden" => $orden);

        //consulta principal para recuperar los datos
        $obtenerReporteIndicadores = new ControllerReports();
        $obtenerReporteIndicadores->ctrDescargarReporteRealizarInventario($search);
    }
    public function reporteEditarInventario()
    {
        $folio = $this->folio;
        $per_page = $this->per_page;
        $almacen = $this->almacen;
        $page = $this->page;
        $campos = "prod.*,alm.ccodigoalmacen,med.cdespliegue as 'despliegue',med.cnombreunidad as 'nombreUnidad',med2.cnombreunidad as 'unidad'";
        //Variables de paginación
        $page = (isset($page) && !empty($page)) ? $page : 1;
        $adjacents  = 4; //espacio entre páginas después del número de adyacentes
        $offset = ($page - 1) * $per_page;
        $accionMovimiento = $this->accionMovimiento;
        $filtroDiferencias = $this->filtroDiferencias;
        $idEstatus = $this->idEstatus;
        $habilitado = $this->habilitado;
        $nombreAlmacen = $this->nombreAlmacen;
        $documento = $this->documento;
        $search = array("nombreAlmacen" => $nombreAlmacen, "documento" => $documento, "almacen" => $almacen, "idEstatus" => $idEstatus, "habilitado" => $habilitado, "accionMovimiento" => $accionMovimiento, "filtroDiferencias" => $filtroDiferencias, "folio" => $folio, "per_page" => $per_page, "offset" => $offset);

        //consulta principal para recuperar los datos
        $obtenerReporteIndicadores = new ControllerReports();
        $obtenerReporteIndicadores->ctrDescargarReporteEditarInventario($campos, $search);
    }
}

if (isset($_GET["reporteUltimosCostos"])) {
    $reporte = new loadReports();
    $reporte->empresa = $_GET["reporteUltimosCostos"];
    $reporte->query = $_GET["query"];
    $reporte->año = $_GET["año"];
    $reporte->reportUltimosCostos();
}
if (isset($_GET["reporteVentasDiarias"])) {
    $reporteVentas = new loadReports();
    $reporteVentas->estatus = $_GET["estatus"];
    $reporteVentas->año = $_GET["año"];
    $reporteVentas->semana = $_GET["semana"];
    $reporteVentas->agente = $_GET["agente"];
    $reporteVentas->canal = $_GET["canal"];
    $reporteVentas->centro = $_GET["centro"];
    $reporteVentas->per_page = $_GET["per_page"];
    $reporteVentas->page = $_GET["page"];
    $reporteVentas->campo = $_GET["campo"];
    $reporteVentas->orden = $_GET["orden"];
    $reporteVentas->productos = $_GET["productos"];
    $reporteVentas->clientes = $_GET["clientes"];
    $reporteVentas->marca = $_GET["marca"];
    $reporteVentas->vista = $_GET["vista"];
    $reporteVentas->reporteVentasDiarias();
}
if (isset($_GET["reporteVentasMensuales"])) {
    $reporteVentasMensual = new loadReports();
    $reporteVentasMensual->estatus = $_GET["estatus"];
    $reporteVentasMensual->año = $_GET["año"];
    $reporteVentasMensual->agente = $_GET["agente"];
    $reporteVentasMensual->canal = $_GET["canal"];
    $reporteVentasMensual->centro = $_GET["centro"];
    $reporteVentasMensual->per_page = $_GET["per_page"];
    $reporteVentasMensual->page = $_GET["page"];
    $reporteVentasMensual->campo = $_GET["campo"];
    $reporteVentasMensual->orden = $_GET["orden"];
    $reporteVentasMensual->productos = $_GET["productos"];
    $reporteVentasMensual->clientes = $_GET["clientes"];
    $reporteVentasMensual->marca = $_GET["marca"];
    $reporteVentasMensual->vista = $_GET["vista"];
    $reporteVentasMensual->reporteVentasMensuales();
}
if (isset($_GET["reporteVentasAnuales"])) {
    $reporteVentasAnual = new loadReports();
    $reporteVentasAnual->estatus = $_GET["estatus"];
    $reporteVentasAnual->agente = $_GET["agente"];
    $reporteVentasAnual->canal = $_GET["canal"];
    $reporteVentasAnual->centro = $_GET["centro"];
    $reporteVentasAnual->per_page = $_GET["per_page"];
    $reporteVentasAnual->page = $_GET["page"];
    $reporteVentasAnual->campo = $_GET["campo"];
    $reporteVentasAnual->orden = $_GET["orden"];
    $reporteVentasAnual->productos = $_GET["productos"];
    $reporteVentasAnual->clientes = $_GET["clientes"];
    $reporteVentasAnual->marca = $_GET["marca"];
    $reporteVentasAnual->vista = $_GET["vista"];
    $reporteVentasAnual->reporteVentasAnuales();
}
if (isset($_GET["reporteVentasDetalle"])) {
    $reporteVentasDetalle = new loadReports();
    $reporteVentasDetalle->estatus = $_GET["estatus"];
    $reporteVentasDetalle->año = $_GET["año"];
    $reporteVentasDetalle->agente = $_GET["agente"];
    $reporteVentasDetalle->canal = $_GET["canal"];
    $reporteVentasDetalle->centro = $_GET["centro"];
    $reporteVentasDetalle->per_page = $_GET["per_page"];
    $reporteVentasDetalle->page = $_GET["page"];
    $reporteVentasDetalle->campo = $_GET["campo"];
    $reporteVentasDetalle->orden = $_GET["orden"];
    $reporteVentasDetalle->mes = $_GET["mes"];
    $reporteVentasDetalle->abonado = $_GET["abonado"];
    $reporteVentasDetalle->clientes = $_GET["clientes"];
    $reporteVentasDetalle->tipo = $_GET["tipo"];
    $reporteVentasDetalle->fechaInicio = $_GET["fechaInicio"];
    $reporteVentasDetalle->fechaFin = $_GET["fechaFin"];
    $reporteVentasDetalle->vista = $_GET["vista"];
    $reporteVentasDetalle->reporteVentasDetalle();
}
if (isset($_GET["reporteMargenesUtilidad"])) {
    $reporteMargenesUtilidad = new loadReports();
    $reporteMargenesUtilidad->estatus = $_GET["estatus"];
    $reporteMargenesUtilidad->año = $_GET["año"];
    $reporteMargenesUtilidad->canal = $_GET["canal"];
    $reporteMargenesUtilidad->per_page = $_GET["per_page"];
    $reporteMargenesUtilidad->page = $_GET["page"];
    $reporteMargenesUtilidad->campo = $_GET["campo"];
    $reporteMargenesUtilidad->orden = $_GET["orden"];
    $reporteMargenesUtilidad->mes = $_GET["mes"];
    $reporteMargenesUtilidad->vista = $_GET["vista"];
    $reporteMargenesUtilidad->clientes = $_GET["clientes"];
    $reporteMargenesUtilidad->reporteMargenesUtilidad();
}
if (isset($_GET["reporteIndicadoresMensual"])) {
    $reporteIndicadoresMensual = new loadReports();
    $reporteIndicadoresMensual->estatus = $_GET["estatus"];
    $reporteIndicadoresMensual->año = $_GET["año"];
    $reporteIndicadoresMensual->per_page = $_GET["per_page"];
    $reporteIndicadoresMensual->page = $_GET["page"];
    $reporteIndicadoresMensual->campo = $_GET["campo"];
    $reporteIndicadoresMensual->orden = $_GET["orden"];
    $reporteIndicadoresMensual->vista = $_GET["vista"];
    $reporteIndicadoresMensual->reporteIndicadoresMensual();
}
if (isset($_GET["reporteDetalladoIndicadoresMensual"])) {
    $reporteDetalladoIndicadoresMensual = new loadReports();
    $reporteDetalladoIndicadoresMensual->estatus = $_GET["estatus"];
    $reporteDetalladoIndicadoresMensual->año = $_GET["año"];
    $reporteDetalladoIndicadoresMensual->per_page = $_GET["per_page"];
    $reporteDetalladoIndicadoresMensual->page = $_GET["page"];
    $reporteDetalladoIndicadoresMensual->campo = $_GET["campo"];
    $reporteDetalladoIndicadoresMensual->orden = $_GET["orden"];
    $reporteDetalladoIndicadoresMensual->vista = $_GET["vista"];
    $reporteDetalladoIndicadoresMensual->reporteDetalladoIndicadoresMensual();
}
if (isset($_GET["reporteInventarioActual"])) {
    $reporteInventarioActual = new loadReports();
    $reporteInventarioActual->empresa = $_GET["empresa"];
    $reporteInventarioActual->ejercicio = $_GET["ejercicio"];
    $reporteInventarioActual->vista = $_GET["vista"];
    $reporteInventarioActual->reporteInventarioActual();
}
if (isset($_GET["reporteRealizarInventario"])) {
    $reporteRealizarInventario = new loadReports();
    $reporteRealizarInventario->usuario = $_GET["idUsuario"];
    $reporteRealizarInventario->per_page = $_GET["per_page"];
    $reporteRealizarInventario->marca = $_GET["marca"];
    $reporteRealizarInventario->familia = $_GET["familia"];
    $reporteRealizarInventario->categoria = $_GET["categoria"];
    $reporteRealizarInventario->anaquel = $_GET["anaquel"];
    $reporteRealizarInventario->repisa = $_GET["repisa"];
    $reporteRealizarInventario->proveedor = $_GET["proveedor"];
    $reporteRealizarInventario->campoOrden = $_GET["campoOrden"];
    $reporteRealizarInventario->orden = $_GET["orden"];
    $reporteRealizarInventario->periodo = $_GET["periodo"];
    $reporteRealizarInventario->almacen = $_GET["almacen"];
    $reporteRealizarInventario->nombreAlmacen = $_GET["nombreAlmacen"];
    $reporteRealizarInventario->reporteRealizarInventario();
}
if (isset($_GET["reporteEditarInventario"])) {
    $reporteEditarInventario = new loadReports();
    $reporteEditarInventario->usuario = $_GET["idUsuario"];
    $reporteEditarInventario->page = $_GET["page"];
    $reporteEditarInventario->per_page = $_GET["per_page"];
    $reporteEditarInventario->folio = $_GET["folio"];
    $reporteEditarInventario->almacen = $_GET["almacen"];
    $reporteEditarInventario->idEstatus = $_GET["idEstatus"];
    $reporteEditarInventario->habilitado = $_GET["habilitado"];
    $reporteEditarInventario->accionMovimiento = $_GET["accionMovimiento"];
    $reporteEditarInventario->filtroDiferencias = $_GET["filtroDiferencias"];
    $reporteEditarInventario->documento = $_GET["documento"];
    $reporteEditarInventario->nombreAlmacen = $_GET["nombreAlmacen"];
    $reporteEditarInventario->reporteEditarInventario();
}
