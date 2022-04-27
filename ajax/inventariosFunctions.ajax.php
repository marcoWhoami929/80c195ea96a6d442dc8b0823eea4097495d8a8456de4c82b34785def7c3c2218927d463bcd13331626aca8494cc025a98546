<?php
session_start();
require_once "../controllers/admon.controller.php";
require_once "../models/admon.model.php";
class InventariosFunctions
{
    public $accion;
    public $idUsuario;
    public $idProducto;
    public $codigo;
    public $descripcion;
    public $unidades;
    public $idAlmacen;
    public $idUnidad;
    public $valorConversion;
    public $unidadesConversion;
    public $costo;
    public $importe;
    public $tipo;
    public $solicitado;
    public $importeSolicitado;
    public $idSolicitante;
    public $prioridad;
    public $observaciones;
    public $serieDocumento;
    public $folioDocumento;
    public $tabla;
    public $documento;
    public $tipoDocumento;
    public $fecha;
    public $estatus;
    public $aprobado;
    public $importeAprobado;
    public $aprobador;
    public $pendiente;
    public $importePendiente;
    public $empresa;
    public $idAlmacen2;
    public $tipoDocumentoUnion;
    public  function insertarProductosTemporales()
    {
        $tabla = "productostempsolicitudes";

        $datos = array(
            "idUsuario" => $this->idUsuario,
            "idProducto" => $this->idProducto,
            "codigo" => $this->codigo,
            "descripcion" => $this->descripcion,
            "unidades" => $this->unidades,
            "idUnidad" => $this->idUnidad,
            "valorConversion" => $this->valorConversion,
            "unidadesConversion" => $this->unidadesConversion,
            "costo" => $this->costo,
            "importe" => $this->importe,
            "tipo" => $this->tipo,
            "folioDocumento" => $this->folioDocumento,
            "sesion" => session_id()
        );

        $respuesta = ControllerAdmon::ctrInsertarProductosTemporales($tabla, $datos);
        echo json_encode($respuesta);
    }
    public  function actualizarProductosTemporales()
    {
        $tabla = "productostempsolicitudes";

        $datos = array(
            "idUsuario" => $this->idUsuario,
            "idProducto" => $this->idProducto,
            "unidades" => $this->unidades,
            "unidadesConversion" => $this->unidadesConversion,
            "idUnidad" => $this->idUnidad,
            "idAlmacen" => $this->idAlmacen,
            "valorConversion" => $this->valorConversion,
            "importe" => $this->importe,
            "tipoDocumento" => $this->tipoDocumento,
            "folioDocumento" => $this->folioDocumento,
            "sesion" => session_id()
        );

        $respuesta = ControllerAdmon::ctrActualizarProductosTemporales($tabla, $datos);
        echo json_encode($respuesta);
    }
    public  function buscarProductosTemporales()
    {
        $tabla = "productostempsolicitudes";

        $datos = array(

            "idProducto" => $this->idProducto,
            "idUsuario" => $this->idUsuario,
            "folioDocumento" => $this->folioDocumento,
            "sesion" => session_id()
        );

        $respuesta = ControllerAdmon::ctrBuscarProductosTemporales($tabla, $datos);
        echo json_encode($respuesta);
    }
    public  function eliminarProductosTemporales()
    {
        $tabla = "productostempsolicitudes";

        $datos = array(

            "idProducto" => $this->idProducto,
            "idUsuario" => $this->idUsuario,
            "tipoDocumento" => $this->tipoDocumento,
            "folioDocumento" => $this->folioDocumento,
            "sesion" => session_id()
        );

        $respuesta = ControllerAdmon::ctrEliminarProductosTemporales($tabla, $datos);
        echo json_encode($respuesta);
    }
    public  function detalleProductosTemporales()
    {
        $tabla = "productostempsolicitudes";

        $datos = array(
            "idUsuario" => $this->idUsuario,
            "sesion" => session_id()
        );

        $respuesta = ControllerAdmon::ctrDetalleProductosTemporales($tabla, $datos);
        echo json_encode($respuesta);
    }
    public  function generarDocumento()
    {
        $tabla = $this->documento;

        switch ($this->tipoDocumento) {
            case '1':
                $serie = 'REMA';
                break;
            case '2':
                $serie = 'PDMA';
                break;
        }
        $date = $this->fecha;
        $fecha = date("Y-m-d", strtotime($date));
        $datos = array(
            "areaSolicitante" => $_SESSION["id"],
            "idAlmacen" => $this->idAlmacen,
            "solicitado" => $this->solicitado,
            "importeSolicitado" => $this->importeSolicitado,
            "idSolicitante" => $this->idSolicitante,
            "prioridad" => $this->prioridad,
            "observaciones" => $this->observaciones,
            "fecha" => $fecha,
            "serie" => $serie
        );

        $respuesta = ControllerAdmon::ctrGenerarDocumento($tabla, $datos);
        echo json_encode($respuesta);
    }
    public  function updateFolioDocumento()
    {
        $tabla = "productostempsolicitudes";

        $datos = array(
            "idUsuario" => $this->idUsuario,
            "folioDocumento" => $this->folioDocumento,
            "sesion" => session_id()
        );

        $respuesta = ControllerAdmon::ctrUpdateFolioDocumento($tabla, $datos);
        echo json_encode($respuesta);
    }
    public  function estatusDocumento()
    {
        $tabla = $this->tabla;

        $folio = $this->folioDocumento;

        $respuesta = ControllerAdmon::ctrEstatusDocumento($tabla, $folio);
        echo json_encode($respuesta);
    }
    public  function eliminarDocumento()
    {
        $tabla = $this->tabla;
        $datos = array(
            "tipoDocumento" => $this->tipoDocumento,
            "folioDocumento" => $this->folioDocumento
        );

        $respuesta = ControllerAdmon::ctrEliminarDocumento($tabla, $datos);
        echo json_encode($respuesta);
    }
    public  function detalleDocumento()
    {
        $tabla = $this->tabla;
        $serie = $this->serieDocumento;
        $folio = $this->folioDocumento;
        $tipoDocumentoUnion = $this->tipoDocumentoUnion;


        if ($serie === 'AUMA') {
            $respuesta = ControllerAdmon::ctrDetalleDocumentoAutorizacion($tabla, $serie, $folio, $tipoDocumentoUnion);
        } else {
            $respuesta = ControllerAdmon::ctrDetalleDocumento($tabla, $serie, $folio);
        }

        echo json_encode($respuesta);
    }
    public  function actualizarDocumento()
    {
        $tabla = $this->documento;

        $datos = array(
            "areaSolicitante" => $_SESSION["id"],
            "idAlmacen" => $this->idAlmacen,
            "solicitado" => $this->solicitado,
            "importeSolicitado" => $this->importeSolicitado,
            "idSolicitante" => $this->idSolicitante,
            "prioridad" => $this->prioridad,
            "observaciones" => $this->observaciones,
            "folioDocumento" => $this->folioDocumento

        );

        $respuesta = ControllerAdmon::ctrActualizarDocumento($tabla, $datos);
        echo json_encode($respuesta);
    }
    public  function actualizarEstatusDocumento()
    {
        $tabla = $this->tabla;
        $datos = array(
            "folioDocumento" => $this->folioDocumento,
            "estatus" => $this->estatus
        );

        $respuesta = ControllerAdmon::ctrActualizarEstatusDocumento($tabla, $datos);
        echo json_encode($respuesta);
    }
    public  function actualizarProductosAprobados()
    {
        $tabla = "productostempsolicitudes";

        $datos = array(
            "idProducto" => $this->idProducto,
            "unidades" => $this->unidades,
            "unidadesConversion" => $this->unidadesConversion,
            "importe" => $this->importe,
            "tipoDocumento" => $this->tipoDocumento,
            "folioDocumento" => $this->folioDocumento,
        );

        $respuesta = ControllerAdmon::ctrActualizarProductosAprobados($tabla, $datos);
        echo json_encode($respuesta);
    }
    public  function actualizarProductosPendientes()
    {
        $tabla = "productostempsolicitudes";

        $datos = array(
            "idProducto" => $this->idProducto,
            "unidades" => $this->unidades,
            "unidadesConversion" => $this->unidadesConversion,
            "importe" => $this->importe,
            "tipoDocumento" => $this->tipoDocumento,
            "folioDocumento" => $this->folioDocumento,
        );

        $respuesta = ControllerAdmon::ctrActualizarProductosPendientes($tabla, $datos);
        echo json_encode($respuesta);
    }
    public  function actualizarDocumentoAprobado()
    {
        $tabla = $this->documento;

        $datos = array(

            "aprobado" => $this->aprobado,
            "importeAprobado" => $this->importeAprobado,
            "pendiente" => $this->pendiente,
            "importePendiente" => $this->importePendiente,
            "observaciones" => $this->observaciones,
            "folioDocumento" => $this->folioDocumento,
            "aprobador" => $this->aprobador

        );

        $respuesta = ControllerAdmon::ctrActualizarDocumentoAprobado($tabla, $datos);
        echo json_encode($respuesta);
    }
    public  function detalleSalidasProducto()
    {

        $datos = array(

            "codigo" => $this->codigo,
            "empresa" => $this->empresa,
            "idAlmacen" => $this->idAlmacen,
            "idAlmacen2" => $this->idAlmacen2

        );

        $respuesta = ModelAdmon::mdlDetalleSalidasProducto($datos);
        echo json_encode($respuesta);
    }
    public  function generarAutorizacionCompra()
    {
        $datos = array(
            "serieDocumento" => $this->serieDocumento,
            "folioDocumento" => $this->folioDocumento,
            "tipoDocumento" => $this->tipoDocumento,
            "unidades" => $this->unidades,
            "importe" => $this->importe
        );

        $respuesta = ModelAdmon::mdlGenerarAutorizacionCompra($datos);
        echo json_encode($respuesta);
    }
}
if (isset($_POST["accion"])) {
    if ($_POST["accion"] === "insertProductos") {
        $insertar = new InventariosFunctions();
        $insertar->idUsuario = $_POST["idUsuario"];
        $insertar->idProducto = $_POST["idProducto"];
        $insertar->codigo = $_POST["codigo"];
        $insertar->descripcion = $_POST["descripcion"];
        $insertar->unidades = $_POST["unidades"];
        $insertar->idUnidad = $_POST["idUnidad"];
        $insertar->valorConversion = $_POST["valorConversion"];
        $insertar->unidadesConversion = $_POST["unidadesConversion"];
        $insertar->costo = $_POST["costo"];
        $insertar->importe = $_POST["importe"];
        $insertar->tipo = $_POST["tipo"];
        $insertar->folioDocumento = $_POST["folioDocumento"];
        $insertar->insertarProductosTemporales();
    }
    if ($_POST["accion"] === "updateProductos") {
        $actualizar = new InventariosFunctions();
        $actualizar->idUsuario = $_POST["idUsuario"];
        $actualizar->idProducto = $_POST["idProducto"];
        $actualizar->unidades = $_POST["unidades"];
        $actualizar->unidadesConversion = $_POST["unidadesConversion"];
        $actualizar->idUnidad = $_POST["idUnidad"];
        $actualizar->idAlmacen = $_POST["idAlmacen"];
        $actualizar->valorConversion = $_POST["valorConversion"];
        $actualizar->importe = $_POST["importe"];
        $actualizar->tipoDocumento = $_POST["tipoDocumento"];
        $actualizar->folioDocumento = $_POST["folioDocumento"];
        $actualizar->actualizarProductosTemporales();
    }
    if ($_POST["accion"] === "updateProductosAprobados") {
        $aprobados = new InventariosFunctions();
        $aprobados->idProducto = $_POST["idProducto"];
        $aprobados->unidades = $_POST["unidades"];
        $aprobados->unidadesConversion = $_POST["unidadesConversion"];
        $aprobados->importe = $_POST["importe"];
        $aprobados->tipoDocumento = $_POST["tipoDocumento"];
        $aprobados->folioDocumento = $_POST["folioDocumento"];
        $aprobados->actualizarProductosAprobados();
    }
    if ($_POST["accion"] === "updateProductosPendientes") {
        $aprobados = new InventariosFunctions();
        $aprobados->idProducto = $_POST["idProducto"];
        $aprobados->unidades = $_POST["unidades"];
        $aprobados->unidadesConversion = $_POST["unidadesConversion"];
        $aprobados->importe = $_POST["importe"];
        $aprobados->tipoDocumento = $_POST["tipoDocumento"];
        $aprobados->folioDocumento = $_POST["folioDocumento"];
        $aprobados->actualizarProductosPendientes();
    }
    if ($_POST["accion"] === "searchProductos") {
        $buscar = new InventariosFunctions();
        $buscar->idProducto = $_POST["idProducto"];
        $buscar->idUsuario = $_POST["idUsuario"];
        $buscar->folioDocumento = $_POST["folioDocumento"];
        $buscar->buscarProductosTemporales();
    }
    if ($_POST["accion"] === "deleteProductos") {
        $eliminar = new InventariosFunctions();
        $eliminar->idProducto = $_POST["idProducto"];
        $eliminar->idUsuario = $_POST["idUsuario"];
        $eliminar->tipoDocumento = $_POST["tipoDocumento"];
        $eliminar->folioDocumento = $_POST["folioDocumento"];
        $eliminar->eliminarProductosTemporales();
    }
    if ($_POST["accion"] === "detailProductos") {
        $detalle = new InventariosFunctions();
        $detalle->idUsuario = $_POST["idUsuario"];
        $detalle->detalleProductosTemporales();
    }
    if ($_POST["accion"] === "generarDocumento") {
        $generate = new InventariosFunctions();
        $generate->idAlmacen = $_POST["idAlmacen"];
        $generate->solicitado = $_POST["solicitado"];
        $generate->importeSolicitado = $_POST["importeSolicitado"];
        $generate->idSolicitante = $_POST["idSolicitante"];
        $generate->prioridad = $_POST["prioridad"];
        $generate->documento = $_POST["documento"];
        $generate->observaciones = $_POST["observaciones"];
        $generate->tipoDocumento = $_POST["tipoDocumento"];
        $generate->fecha = $_POST["fecha"];
        $generate->generarDocumento();
    }
    if ($_POST["accion"] === "updateFolioDocumento") {
        $update = new InventariosFunctions();
        $update->idUsuario = $_POST["idUsuario"];
        $update->folioDocumento = $_POST["folioDocumento"];
        $update->updateFolioDocumento();
    }
    if ($_POST["accion"] === "estatusDocumento") {
        $estatus = new InventariosFunctions();
        $estatus->folioDocumento = $_POST["folioDocumento"];
        $estatus->tabla = $_POST["tabla"];
        $estatus->estatusDocumento();
    }
    if ($_POST["accion"] === "detalleDocumento") {
        $detalle = new InventariosFunctions();
        $detalle->serieDocumento = $_POST["serieDocumento"];
        $detalle->folioDocumento = $_POST["folioDocumento"];
        $detalle->tabla = $_POST["tabla"];
        $detalle->tipoDocumentoUnion = $_POST["tipoDocumentoUnion"];
        $detalle->detalleDocumento();
    }
    if ($_POST["accion"] === "eliminarDocumento") {
        $eliminar = new InventariosFunctions();
        $eliminar->folioDocumento = $_POST["folioDocumento"];
        $eliminar->tabla = $_POST["tabla"];
        $eliminar->tipoDocumento = $_POST["tipoDocumento"];
        $eliminar->eliminarDocumento();
    }
    if ($_POST["accion"] === "actualizarDocumento") {
        $update = new InventariosFunctions();
        $update->idAlmacen = $_POST["idAlmacen"];
        $update->solicitado = $_POST["solicitado"];
        $update->importeSolicitado = $_POST["importeSolicitado"];
        $update->idSolicitante = $_POST["idSolicitante"];
        $update->prioridad = $_POST["prioridad"];
        $update->documento = $_POST["documento"];
        $update->observaciones = $_POST["observaciones"];
        $update->folioDocumento = $_POST["folioDocumento"];
        $update->actualizarDocumento();
    }
    if ($_POST["accion"] === "actualizarDocumentoAprobado") {
        $updateAprobado = new InventariosFunctions();
        $updateAprobado->aprobado = $_POST["aprobado"];
        $updateAprobado->importeAprobado = $_POST["importeAprobado"];
        $updateAprobado->pendiente = $_POST["pendiente"];
        $updateAprobado->importePendiente = $_POST["importePendiente"];
        $updateAprobado->documento = $_POST["documento"];
        $updateAprobado->observaciones = $_POST["observaciones"];
        $updateAprobado->folioDocumento = $_POST["folioDocumento"];
        $updateAprobado->aprobador = $_POST["aprobador"];
        $updateAprobado->actualizarDocumentoAprobado();
    }
    if ($_POST["accion"] === "updateEstatusDocumento") {
        $actualizarEstatus = new InventariosFunctions();
        $actualizarEstatus->folioDocumento = $_POST["folioDocumento"];
        $actualizarEstatus->tabla = $_POST["tabla"];
        $actualizarEstatus->estatus = $_POST["estatus"];
        $actualizarEstatus->actualizarEstatusDocumento();
    }
    if ($_POST["accion"] === "detalleSalidasProducto") {
        $detalleSalidas = new InventariosFunctions();
        $detalleSalidas->empresa = $_POST["empresa"];
        $detalleSalidas->codigo = $_POST["codigo"];
        $detalleSalidas->idAlmacen = $_POST["idAlmacen"];
        $detalleSalidas->idAlmacen2 = $_POST["idAlmacen2"];
        $detalleSalidas->detalleSalidasProducto();
    }
    if ($_POST["accion"] === "generarAutorizacionCompra") {
        $solicitud = new InventariosFunctions();
        $solicitud->serieDocumento = $_POST["serieDocumento"];
        $solicitud->folioDocumento = $_POST["folioDocumento"];
        $solicitud->tipoDocumento = $_POST["tipoDocumento"];
        $solicitud->unidades = $_POST["unidades"];
        $solicitud->importe = $_POST["importe"];
        $solicitud->generarAutorizacionCompra();
    }
}
