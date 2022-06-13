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
    public $usuario;
    public $vista;
    public $folio;
    public $periodo;
    public $ejercicio;
    public $tipoDetalleDocumento;
    public $referencia;
    public $idClienteProveedor;
    public $rfcClienteProveedor;
    public $razonSocialClienteProveedor;
    public $productos;
    public $serie;
    public $tipoUsuario;
    public $idDocumentoDe;
    public $idConcepto;
    public $titulo;
    public $color;
    public $mensaje;
    public $startDate;
    public $endDate;
    public $sucursal;
    public $id;
    public $existencias;
    public $inventario;
    public $diferencia;
    public $existenciasImportes;
    public $inventarioImportes;
    public $diferenciaImportes;
    public $idRealizador;
    public $marca;
    public $serieOrigen;
    public $folioOrigen;
    public $familia;
    public $categoria;
    public $anaquel;
    public $repisa;
    public $proveedor;
    public $habilitado;
    public $folioInventario;

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
            "precioCapturado" => bcdiv($this->costo / $this->valorConversion, '1', 4),
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
            "precioCapturado" => bcdiv($this->costo / $this->valorConversion, '1', 4),
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
            "idAlmacen2" => $this->idAlmacen2,
            "periodo" => $this->periodo

        );

        $respuesta = ModelAdmon::mdlDetalleSalidasProducto($datos);
        echo json_encode($respuesta);
    }
    public  function generarAutorizacionCompra()
    {
        $datos = array(
            "serieDocumento" => $this->serieDocumento,
            "folioDocumento" => $this->folioDocumento,
            "fechaDocumento" => date("Y-m-d"),
            "tipoDocumento" => $this->tipoDocumento,
            "unidades" => $this->unidades,
            "importe" => $this->importe,
            "area" => $_SESSION["id"],
            "nombreArea" => $_SESSION["nombre"]
        );

        $respuesta = ModelAdmon::mdlGenerarAutorizacionCompra($datos);
        echo json_encode($respuesta);
    }
    public  function mostrarProductosAutorizacion()
    {
        $usuario = $this->usuario;
        $sesion = session_id();
        $tipo = $this->tipo;
        $folio = $this->folio;
        $tipoDetalleDocumento = $this->tipoDetalleDocumento;
        $search = array("tipoDetalleDocumento" => $tipoDetalleDocumento, "usuario" => $usuario, "sesion" => $sesion, "folio" => $folio, "tipo" => $tipo);
        //consulta principal para recuperar los datos

        $respuesta = ModelAdmon::mostrarProductosAutorizacion($search);
        echo json_encode($respuesta);
    }
    public  function generarOrdenCompra()
    {
        $importe = $this->importe;
        $observaciones = trim($this->observaciones);
        $datos = array(
            "referencia" => $this->referencia,
            "idClienteProveedor" => $this->idClienteProveedor,
            "rfcClienteProveedor" => $this->rfcClienteProveedor,
            "razonSocialClienteProveedor" => $this->razonSocialClienteProveedor,
            "productos" => $this->productos,
            "unidades" => $this->unidades,
            "unidadesPendientes" => $this->unidades,
            "neto" => floatval($importe),
            "impuesto" => number_format(floatval($importe) * 0.16, 2),
            "total" => number_format(floatval($importe) * 1.16, 2),
            "serie" => $this->serie,
            "folio" => $this->folio,
            "observaciones" => $observaciones
        );
        $respuesta = ModelAdmon::generarOrdenCompra($datos);
        echo json_encode($respuesta);
    }
    public  function listadoRecordatorios()
    {
        $usuario = $this->usuario;
        $tipoUsuario = $this->tipoUsuario;

        $respuesta = ModelAdmon::mdlListadoRecordatorios($usuario, $tipoUsuario);
        echo json_encode($respuesta);
    }
    public function generarRecordatorio()
    {
        $datos = array(
            "titulo" => trim($this->titulo),
            "color" => $this->color,
            "mensaje" => trim($this->mensaje),
            "startDate" => $this->startDate,
            "endDate" => $this->endDate,
            "usuario" => $this->usuario,
            "sucursal" => $this->sucursal
        );

        $respuesta = ModelAdmon::mdlGenerarRecordatorio($datos);
        echo json_encode($respuesta);
    }
    public function detalleRecordatorio()
    {
        $datos = array(
            "id" => $this->id
        );

        $respuesta = ModelAdmon::mdlDetalleRecordatorio($datos);
        echo json_encode($respuesta);
    }
    public function actualizarRecordatorio()
    {
        $datos = array(
            "id" => $this->id,
            "mensaje" => trim($this->mensaje),
            "startDate" => $this->startDate,
            "endDate" => $this->endDate
        );

        $respuesta = ModelAdmon::mdlActualizarRecordatorio($datos);
        echo json_encode($respuesta);
    }
    public function eliminarRecordatorio()
    {
        $datos = array(
            "id" => $this->id
        );

        $respuesta = ModelAdmon::mdlEliminarRecordatorio($datos);
        echo json_encode($respuesta);
    }
    public  function impresionDocumentos()
    {
        $idDocumentoDe = $this->idDocumentoDe;
        $idConcepto = $this->idConcepto;
        $estatus = $this->estatus;

        $respuesta = ModelAdmon::mdlImpresionDocumentos($idDocumentoDe, $idConcepto, $estatus);
        echo json_encode($respuesta);
    }
    public function generarInventario()
    {
        $datos = array(
            "serie" => $this->serie,
            "existencias" => $this->existencias,
            "inventario" => $this->inventario,
            "diferencia" => $this->diferencia,
            "existenciasImportes" => $this->existenciasImportes,
            "inventarioImportes" => $this->inventarioImportes,
            "diferenciaImportes" => $this->diferenciaImportes,
            "idSolicitante" => $this->idSolicitante,
            "idRealizador" => $this->idRealizador,
            "observaciones" => $this->observaciones,
            "idAlmacen" => $this->idAlmacen,
            "periodo" => $this->periodo,
            "marca" => $this->marca,
            "familia" => $this->familia,
            "categoria" => $this->categoria,
            "anaquel" => $this->anaquel,
            "repisa" => $this->repisa,
            "proveedor" => $this->proveedor,
            "productos" => $this->productos,
            "area" => $_SESSION["area"],
            "idArea" => $_SESSION["id"],
            "sesionId" => session_id()
        );

        $respuesta = ModelAdmon::mdlGenerarInventario($datos);
        echo json_encode($respuesta);
    }
    public  function estatusDocumentoInventario()
    {
        $tabla = $this->tabla;

        $folio = $this->folioDocumento;

        $respuesta = ControllerAdmon::ctrEstatusDocumentoInventario($tabla, $folio);
        echo json_encode($respuesta);
    }
    public  function actualizarEstatusDocumentoInventario()
    {
        $tabla = $this->tabla;
        $datos = array(
            "folioDocumento" => $this->folioDocumento,
            "estatus" => $this->estatus,
            "habilitado" => $this->habilitado
        );

        $respuesta = ControllerAdmon::ctrActualizarEstatusDocumentoInventario($tabla, $datos);
        echo json_encode($respuesta);
    }
    public function detalleInventario()
    {
        $folio = $this->folioDocumento;


        $respuesta = ModelAdmon::mdlDetalleInventario($folio);
        echo json_encode($respuesta);
    }
    public function generarMovimientoInventario()
    {


        $importe = $this->importe;
        $observaciones = trim($this->observaciones);

        $datos = array(
            "referencia" => $this->referencia,
            "unidades" => $this->unidades,
            "unidadesPendientes" => $this->unidades,
            "neto" => floatval($importe),
            "total" => floatval($importe),
            "productos" => $this->productos,
            "serie" => $this->serie,
            "serieOrigen" => $this->serieOrigen,
            "folioOrigen" => $this->folioOrigen,
            "observaciones" => $observaciones,
            "idDocumentoDe" => $this->idDocumentoDe,
            "idConcepto" => $this->idConcepto,
            "tipo" => $this->tipo
        );

        $respuesta = ModelAdmon::mdlGenerarMovimientoInventario($datos);
        echo json_encode($respuesta);
    }
    public function actualizarProductoInventario()
    {

        $datos = array(
            "productos" => $this->productos
        );

        $respuesta = ModelAdmon::mdlActualizarProductoInventario($datos);
        echo json_encode($respuesta);
    }
    public function actualizarInventario()
    {

        $datos = array(
            "folioInventario" => $this->folioInventario,
            "inventario" => $this->inventario,
            "diferencia" => $this->diferencia,
            "inventarioImportes" => $this->inventarioImportes,
            "diferenciaImportes" => $this->diferenciaImportes,
        );

        $respuesta = ModelAdmon::mdlActualizarInventario($datos);
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
        $actualizar->costo = $_POST["costo"];
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
        $detalleSalidas->periodo = $_POST["periodo"];
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
    if ($_POST["accion"] === "productosAutorizacion") {
        $listaProductos = new InventariosFunctions();
        $listaProductos->usuario = $_POST["usuario"];
        $listaProductos->folio = $_POST["folio"];
        $listaProductos->periodo = $_POST["periodo"];
        $listaProductos->ejercicio = $_POST["ejercicio"];
        $listaProductos->tipoDetalleDocumento = $_POST["tipoDetalleDocumento"];
        $listaProductos->tipo = $_POST["tipo"];
        $listaProductos->mostrarProductosAutorizacion();
    }
    if ($_POST["accion"] === "generarOrdenCompra") {
        $generarOrden = new InventariosFunctions();
        $generarOrden->referencia = $_POST["referencia"];
        $generarOrden->idClienteProveedor = $_POST["idClienteProveedor"];
        $generarOrden->rfcClienteProveedor = $_POST["rfcClienteProveedor"];
        $generarOrden->razonSocialClienteProveedor = $_POST["razonSocialClienteProveedor"];
        $generarOrden->productos = $_POST["productos"];
        $generarOrden->unidades = $_POST["unidades"];
        $generarOrden->importe = $_POST["importe"];
        $generarOrden->serie = $_POST["serie"];
        $generarOrden->folio = $_POST["folio"];
        $generarOrden->observaciones = $_POST["observaciones"];
        $generarOrden->generarOrdenCompra();
    }
    if ($_POST["accion"] === "listaRecordatorios") {
        $recordatorios = new InventariosFunctions();
        $recordatorios->usuario = $_POST["usuario"];
        $recordatorios->tipoUsuario = $_POST["tipoUsuario"];
        $recordatorios->listadoRecordatorios();
    }
    if ($_POST["accion"] === "generarRecordatorio") {
        $generarRecordatorio = new InventariosFunctions();
        $generarRecordatorio->titulo = $_POST["titulo"];
        $generarRecordatorio->color = $_POST["color"];
        $generarRecordatorio->mensaje = $_POST["mensaje"];
        $generarRecordatorio->startDate = $_POST["startDate"];
        $generarRecordatorio->endDate = $_POST["endDate"];
        $generarRecordatorio->usuario = $_POST["usuario"];
        $generarRecordatorio->sucursal = $_POST["sucursal"];
        $generarRecordatorio->generarRecordatorio();
    }
    if ($_POST["accion"] === "detalleRecordatorio") {
        $detalleRecordatorio = new InventariosFunctions();
        $detalleRecordatorio->id = $_POST["id"];
        $detalleRecordatorio->detalleRecordatorio();
    }
    if ($_POST["accion"] === "actualizarRecordatorio") {
        $actualizarRecordatorio = new InventariosFunctions();
        $actualizarRecordatorio->id = $_POST["id"];
        $actualizarRecordatorio->mensaje = $_POST["mensaje"];
        $actualizarRecordatorio->startDate = $_POST["startDate"];
        $actualizarRecordatorio->endDate = $_POST["endDate"];
        $actualizarRecordatorio->actualizarRecordatorio();
    }
    if ($_POST["accion"] === "eliminarRecordatorio") {
        $eliminarRecordatorio = new InventariosFunctions();
        $eliminarRecordatorio->id = $_POST["id"];
        $eliminarRecordatorio->eliminarRecordatorio();
    }
    if ($_POST["accion"] === "impresionDocumentos") {
        $impresion = new InventariosFunctions();
        $impresion->idDocumentoDe = $_POST["idDocumentoDe"];
        $impresion->idConcepto = $_POST["idConcepto"];
        $impresion->estatus = $_POST["estatus"];
        $impresion->impresionDocumentos();
    }
    if ($_POST["accion"] === "generarInventario") {
        $inventario = new InventariosFunctions();
        $inventario->serie = $_POST["serie"];
        $inventario->existencias = $_POST["existencias"];
        $inventario->inventario = $_POST["inventario"];
        $inventario->diferencia = $_POST["diferencia"];
        $inventario->existenciasImportes = $_POST["existenciasImportes"];
        $inventario->inventarioImportes = $_POST["inventarioImportes"];
        $inventario->diferenciaImportes = $_POST["diferenciaImportes"];
        $inventario->idSolicitante = $_POST["idSolicitante"];
        $inventario->idRealizador = $_POST["idRealizador"];
        $inventario->observaciones = $_POST["observaciones"];
        $inventario->idAlmacen = $_POST["idAlmacen"];
        $inventario->periodo = $_POST["periodo"];
        $inventario->productos = $_POST["productos"];
        $inventario->marca = $_POST["marca"];
        $inventario->familia = $_POST["familia"];
        $inventario->categoria = $_POST["categoria"];
        $inventario->anaquel = $_POST["anaquel"];
        $inventario->repisa = $_POST["repisa"];
        $inventario->proveedor = $_POST["proveedor"];
        $inventario->generarInventario();
    }
    if ($_POST["accion"] === "estatusDocumentoInventario") {
        $estatus = new InventariosFunctions();
        $estatus->folioDocumento = $_POST["folioDocumento"];
        $estatus->tabla = $_POST["tabla"];
        $estatus->estatusDocumentoInventario();
    }
    if ($_POST["accion"] === "updateEstatusDocumentoInventario") {
        $actualizarEstatus = new InventariosFunctions();
        $actualizarEstatus->folioDocumento = $_POST["folioDocumento"];
        $actualizarEstatus->tabla = $_POST["tabla"];
        $actualizarEstatus->estatus = $_POST["estatus"];
        $actualizarEstatus->habilitado = $_POST["habilitado"];
        $actualizarEstatus->actualizarEstatusDocumentoInventario();
    }
    if ($_POST["accion"] === "detalleInventario") {
        $detalleInventario = new InventariosFunctions();
        $detalleInventario->folioDocumento = $_POST["folioDocumento"];
        $detalleInventario->detalleInventario();
    }
    if ($_POST["accion"] === "generarMovimientoInventario") {
        $movimientoInventario = new InventariosFunctions();
        $movimientoInventario->referencia = $_POST["referencia"];
        $movimientoInventario->unidades = $_POST["unidades"];
        $movimientoInventario->importe = $_POST["importe"];
        $movimientoInventario->productos = $_POST["productos"];
        $movimientoInventario->serie = $_POST["serie"];
        $movimientoInventario->serieOrigen = $_POST["serieOrigen"];
        $movimientoInventario->folioOrigen = $_POST["folioOrigen"];
        $movimientoInventario->observaciones = $_POST["observaciones"];
        $movimientoInventario->idDocumentoDe = $_POST["idDocumentoDe"];
        $movimientoInventario->idConcepto = $_POST["idConcepto"];
        $movimientoInventario->tipo = $_POST["tipo"];
        $movimientoInventario->generarMovimientoInventario();
    }
    if ($_POST["accion"] === "actualizarProductoInventario") {
        $actualizarProductoInventario = new InventariosFunctions();
        $actualizarProductoInventario->productos = $_POST["productos"];
        $actualizarProductoInventario->actualizarProductoInventario();
    }
    if ($_POST["accion"] === "actualizarInventario") {
        $actualizarInventario = new InventariosFunctions();
        $actualizarInventario->folioInventario = $_POST["folioInventario"];
        $actualizarInventario->inventario = $_POST["inventario"];
        $actualizarInventario->diferencia = $_POST["diferencia"];
        $actualizarInventario->inventarioImportes = $_POST["inventarioImportes"];
        $actualizarInventario->diferenciaImportes = $_POST["diferenciaImportes"];
        $actualizarInventario->actualizarInventario();
    }
}
