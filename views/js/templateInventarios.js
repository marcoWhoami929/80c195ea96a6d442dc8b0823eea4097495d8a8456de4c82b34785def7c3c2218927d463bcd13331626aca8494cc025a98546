const formatNumber = (num) => {
  const n = String(num),
    p = n.indexOf(".");
  return n.replace(/\d(?=(?:\d{3})+(?:\.|$))/g, (m, i) =>
    p < 0 || i < p ? `${m},` : m
  );
};
const formatIsoToDate = (dateIso) => {
  date = new Date(dateIso);
  year = date.getFullYear();
  month = date.getMonth() + 1;
  day = date.getDate();
  hour = date.getHours();
  minutes = date.getMinutes();
  dt = date.getDate();

  if (day < 10) {
    day = "0" + day;
  }
  if (month < 10) {
    month = "0" + month;
  }

  return (finalDate = `${year}-${month}-${day} ${hour}:${minutes}:00`);
};
const convertPositive = (number) => {
  if (number < 0) {
    number = number * -1;
  }
  return number;
};
const cargarRecordatorios = (evt) => {
  var recordatorios = evt;

  calendar.removeAllEvents();
  for (let i = 0; i < recordatorios.length; i++) {
    var id = recordatorios[i]["id"];
    var title = recordatorios[i]["titulo"];
    var start = recordatorios[i]["start"];
    var end = recordatorios[i]["end"];
    var color = recordatorios[i]["color"];
    calendar.addEvent({
      id: id,
      title: title,
      start: start,
      end: end,
      color: color,
      backgroundColor: color,
    });
  }
};
const idUsuario = localStorage.idUsuarioInventarios;
ejercicio = 0;
/****Obtener dia actual */
var today = new Date();
var dd = today.getDate();
mm = today.getMonth() + 1; //January is 0!
var yyyy = today.getFullYear();
switch (yyyy) {
  case 2022:
    ejercicio = 2;
    break;
  case 2023:
    ejercicio = 3;
    break;
  case 2024:
    ejercicio = 4;
    break;
  case 2025:
    ejercicio = 5;
    break;
}

if (dd < 10) {
  dd = "0" + dd;
}

if (mm < 10) {
  mm = "0" + mm;
}
today = yyyy + "-" + mm + "-" + dd;
/****Obtener dia actual */

$(function () {
  $(".modal").on("shown.bs.modal", function () {
    $(this).find("input:first").focus();
  });
  url = window.location.pathname;
  ruta = url.split("/");
  if (ruta[2] == "" && localStorage.tipoModulo == "Inventarios") {
    var surt = $("#surtimientoCerrado").text();
    if (surt.replace(/[%]/g, "") > 25 && surt.replace(/[%]/g, "") <= 50) {
      $("#semaforoAlmacen").addClass("rojo");
    } else if (
      surt.replace(/[%]/g, "") > 50 &&
      surt.replace(/[%]/g, "") <= 80
    ) {
      $("#semaforoAlmacen").addClass("naranja");
    } else if (surt.replace(/[%]/g, "") > 80) {
      $("#semaforoAlmacen").addClass("verde");
    }
  } else {
    switch (ruta[2]) {
      case "requisiciones":
        listaRequisiciones();
        localStorage.removeItem("folioDocumento");
        localStorage.removeItem("estatusDocumento");
        localStorage.removeItem("tipoDetalleDocumento");
        localStorage.setItem("tipoDocumento", "1");
        break;
      case "realizarRequisicion":
        $("#fecha").val(today);
        document.getElementById("fecha").disabled = true;
        elegirSolicitante();
        cargarListaProductosRequisicion(1, 0);
        localStorage.setItem("tipoDocumento", "1");
        loadProductosSolicitudes(1);

        break;
      case "editarRequisicion":
        $("#periodo").val(mm.replace("0", ""));
        if (localStorage.folioDocumento === undefined) {
          window.location.href = "requisiciones";
        } else {
          var folioDocumento = localStorage.folioDocumento;
          var tablaDocumento = localStorage.tablaDocumento;
          detalleDocumento(folioDocumento, tablaDocumento);
          loadProductosSolicitudes(1);
        }
        break;
      case "ecommerce":
        $("#periodo").val(mm.replace("0", ""));
        $(".selectorCategoria").select2();
        cargarListaProductosEcommerce(1);
        //loadProductosVenta(1);

        break;
      case "miAlmacen":
        $("#periodo").val(mm.replace("0", ""));
        productosAlmacenes();
        //loadProductosVenta(1);
        break;
      case "agotarse":
        $("#periodo").val(mm.replace("0", ""));
        productosPorAgotarse();
        //loadProductosVenta(1);
        break;
      case "faltantesRequisiciones":
        localStorage.removeItem("folioDocumento");
        localStorage.removeItem("estatusDocumento");
        localStorage.removeItem("tipoDetalleDocumento");
        listaRequisicionesFaltantes();
        break;
      case "autorizacionesCompra":
        listaAutorizaciones();
        localStorage.removeItem("folioDocumento");
        localStorage.removeItem("estatusDocumento");
        localStorage.removeItem("tipoDetalleDocumento");
        localStorage.setItem("tipoDocumento", "1");
        break;
      case "editarAutorizacion":
        $("#periodo").val(mm.replace("0", ""));
        if (localStorage.folioDocumento === undefined) {
          window.location.href = "autorizacionesCompra";
        } else {
          var folioDocumento = localStorage.folioDocumento;
          var tablaDocumento = localStorage.tablaDocumento;
          detalleDocumentoAutorizacion(folioDocumento, tablaDocumento);
          loadClientesProveedores(1);
          //loadProductosAutorizaciones(1);
        }
        break;
      case "ordenesCompra":
        listaOrdenesCompra();
        break;
      case "compras":
        listaCompras();
        break;
      case "recordatorios":
        listaRecordatorios();
        break;
      case "indicadores":
        cargarIndicadoresUtilidad(1);
        break;
      case "inventarioActual":
        cargarInventarioActual();
        setEjercicios();
        setEjercicios2();
        break;
      case "impresionDocumentos":
        listarDocumentosNoImpresos(1);
        break;
      case "pedidos":
        listaPedidos();
        localStorage.removeItem("folioDocumento");
        localStorage.removeItem("estatusDocumento");
        localStorage.removeItem("tipoDetalleDocumento");
        localStorage.setItem("tipoDocumento", "2");
        break;
      case "realizarPedido":
        $("#fecha").val(today);
        document.getElementById("fecha").disabled = true;
        elegirSolicitante();
        cargarListaProductosRequisicion(1, 0);
        localStorage.setItem("tipoDocumento", "2");
        loadProductosSolicitudes(1);

        break;
      case "editarPedido":
        $("#periodo").val(mm.replace("0", ""));
        if (localStorage.folioDocumento === undefined) {
          window.location.href = "pedidos";
        } else {
          var folioDocumento = localStorage.folioDocumento;
          var tablaDocumento = localStorage.tablaDocumento;
          detalleDocumento(folioDocumento, tablaDocumento);
          loadProductosSolicitudes(1);
        }
        break;
      case "backorder":
        localStorage.removeItem("folioDocumento");
        localStorage.removeItem("estatusDocumento");
        localStorage.removeItem("tipoDetalleDocumento");
        listaPedidosFaltantes();
        break;
      case "inventarios":
        $("#periodo").val(mm.replace("0", ""));
        localStorage.setItem("arrayMarca", "[]");
        localStorage.setItem("arrayFamilia", "[]");
        localStorage.setItem("arrayCategoria", "[]");
        localStorage.setItem("arrayAnaquel", "[]");
        localStorage.setItem("arrayRepisa", "[]");
        localStorage.setItem("arrayProveedor", "[]");
        localStorage.removeItem("folioInventario");
        listaInventarios();
        break;
      case "realizarInventario":
        $("#fecha").val(today);
        $("#periodo").val(mm.replace("0", ""));
        $(".selectorCategoria").select2();
        $(".selectorFamilia").select2();
        document.getElementById("fecha").disabled = true;
        elegirRealizador();
        cargarListaProductosInventarios(1);
        break;
      case "editarInventario":
        if (localStorage.folioInventario === undefined) {
          window.location.href = "inventarios";
        } else {
          var folioInventario = localStorage.folioInventario;
          detalleInventario(folioInventario);
        }
        break;
    }
  }
  /***CATEGORIA */
  $(".selectorCategoria").select2();
  var categorias = JSON.parse(localStorage.getItem("arrayCategoria"));
  $(".selectorCategoria").val(categorias).trigger("change");
  $(".selectorCategoria").on("select2:select", function (e) {
    var categoria = e.params.data.id;
    agregarDatosBusqueda(categoria, "arrayCategoria");
  });
  //detectamos se opcion se quito funciona con select multiple
  $(".selectorCategoria").on("select2:unselect", function (e) {
    var categoria = e.params.data.id;
    var arreglo = localStorage.getItem("arrayCategoria");
    removeItemFromArregloBusqueda(arreglo, categoria, "arrayCategoria");
  });
  /***FAMILIA */
  $(".selectorFamilia").select2();
  var familias = JSON.parse(localStorage.getItem("arrayFamilia"));
  $(".selectorFamilia").val(familias).trigger("change");
  $(".selectorFamilia").on("select2:select", function (e) {
    var familia = e.params.data.id;
    agregarDatosBusqueda(familia, "arrayFamilia");
  });
  //detectamos se opcion se quito funciona con select multiple
  $(".selectorFamilia").on("select2:unselect", function (e) {
    var familia = e.params.data.id;
    var arreglo = localStorage.getItem("arrayFamilia");
    removeItemFromArregloBusqueda(arreglo, familia, "arrayFamilia");
  });
  /***ANAQUEL */
  $(".selectorAnaquel").select2();
  var anaqueles = JSON.parse(localStorage.getItem("arrayAnaquel"));
  $(".selectorAnaquel").val(anaqueles).trigger("change");
  $(".selectorAnaquel").on("select2:select", function (e) {
    var anaquel = e.params.data.id;
    agregarDatosBusqueda(anaquel, "arrayAnaquel");
  });
  //detectamos se opcion se quito funciona con select multiple
  $(".selectorAnaquel").on("select2:unselect", function (e) {
    var anaquel = e.params.data.id;
    var arreglo = localStorage.getItem("arrayAnaquel");
    removeItemFromArregloBusqueda(arreglo, anaquel, "arrayAnaquel");
  });
  /***REPISA */
  $(".selectorRepisa").select2();
  var repisas = JSON.parse(localStorage.getItem("arrayRepisa"));
  $(".selectorRepisa").val(repisas).trigger("change");
  $(".selectorRepisa").on("select2:select", function (e) {
    var repisa = e.params.data.id;
    agregarDatosBusqueda(repisa, "arrayRepisa");
  });
  //detectamos se opcion se quito funciona con select multiple
  $(".selectorRepisa").on("select2:unselect", function (e) {
    var repisa = e.params.data.id;
    var arreglo = localStorage.getItem("arrayRepisa");
    removeItemFromArregloBusqueda(arreglo, repisa, "arrayRepisa");
  });
  /***PROVEEDOR */
  $(".selectorProveedor").select2();
  var proveedores = JSON.parse(localStorage.getItem("arrayProveedor"));
  $(".selectorProveedor").val(proveedores).trigger("change");
  $(".selectorProveedor").on("select2:select", function (e) {
    var proveedor = e.params.data.id;
    agregarDatosBusqueda(proveedor, "arrayProveedor");
  });
  //detectamos se opcion se quito funciona con select multiple
  $(".selectorProveedor").on("select2:unselect", function (e) {
    var proveedor = e.params.data.id;
    var arreglo = localStorage.getItem("arrayProveedor");
    removeItemFromArregloBusqueda(arreglo, proveedor, "arrayProveedor");
  });
});
function cargarIndicadoresInventarios(page) {
  var vista = "cargarIndicadoresInventarios";

  var query = "";
  var agente = "";
  var centro = "";

  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "indicadoresInventarios",
    page: page,
    query: query,
    anio: anio,
    agente: agente,
    centro: centro,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
  };
  $("#loaderView2").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasCanal.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loaderView2").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".indicadores").html(data).fadeIn("slow");
      $("#loaderView2").html("");
    },
  });
}
function cargarIndicadoresDetalladoInventarios(page) {
  var vista = "cargarIndicadoresDetalladoInventarios";

  var query = "";
  var agente = "";
  var centro = "";

  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "indicadoresDetalladoInventarios",
    page: page,
    query: query,
    anio: anio,
    agente: agente,
    centro: centro,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
  };
  $("#loaderView3").fadeIn("slow");
  $("#loaderView3").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasCanal.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loaderView3").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".indicadoresDetallado").html(data).fadeIn("slow");
      $("#loaderView3").html("");
    },
  });
}
function cargarIndicadoresUtilidad(page) {
  var vista = "cargarIndicadoresUtilidad";

  var query = "";
  var agente = "";
  var centro = "";

  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "indicadoresUtilidad",
    page: page,
    query: query,
    anio: anio,
    agente: agente,
    centro: centro,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
  };
  $("#loaderView1").fadeIn("slow");
  $("#loaderView1").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasCanal.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loaderView1").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".indicadoresUtilidad").html(data).fadeIn("slow");
      $("#loaderView1").html("");
    },
  });
}
function redireccionAccionVentasIndicadores(
  nombre,
  tipo,
  fecha,
  año,
  mes,
  centro
) {
  switch (tipo) {
    case "Canal":
      localStorage.setItem("canalDetalle", nombre);
      localStorage.setItem("agenteDetalle", "");
      localStorage.setItem("centroDetalle", centro);
      localStorage.setItem("clienteDetalle", "");
      localStorage.setItem("fechaDetalle", fecha);
      localStorage.setItem("mesDetalle", mes);
      localStorage.setItem("semanaDetalle", "");
      localStorage.setItem("añoDetalle", año);
      localStorage.setItem("conceptoDetalle", "");
      localStorage.setItem("codigoDetalle", "");
      localStorage.setItem("marcaDetalle", "");
      window.open("detalleVentas", "_blank");
      break;
  }
}
function detalleIndicadores(centro, año, mes, centroDesglose) {
  var datos = new FormData();
  datos.append("accion", "detalleIndicadores");
  datos.append("centro", centro);
  datos.append("año", año);
  datos.append("mes", mes);
  datos.append("centroDesglose", centroDesglose);
  $("#modalEntradasSalidasCanal").modal();
  $.ajax({
    url: "ajax/admonFunctions.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      var response = respuesta;

      var listaCabeceras = ["CENTRO", "ENTRADAS", "SALIDAS", "TOTAL"];

      body = document.getElementById("tablaDetalleIndicadores");

      thead = document.createElement("thead");

      theadTr = document.createElement("tr");

      for (var h = 0; h < listaCabeceras.length; h++) {
        var celdaThead = document.createElement("th");
        var textoCeldaThead = document.createTextNode(listaCabeceras[h]);
        celdaThead.appendChild(textoCeldaThead);
        theadTr.appendChild(celdaThead);
      }

      thead.appendChild(theadTr);

      tblBody = document.createElement("tbody");

      var arregloNombres = ["CANAL", "ENTRADAS", "SALIDAS", "TOTAL"];

      // Crea las celdas

      for (var i = 0; i < 1; i++) {
        // Crea las hileras de la tabla
        var hilera = document.createElement("tr");
        for (var j = 0; j < arregloNombres.length; j++) {
          var celda = document.createElement("td");
          if (arregloNombres[j] == "CANAL") {
            if (centroDesglose == "") {
              var valor = response[arregloNombres[j]];
            } else {
              var valor = centroDesglose;
            }
          } else if (arregloNombres[j] == "TOTAL") {
            var valor2 = parseFloat(response[arregloNombres[j]]);

            valor = "$" + formatNumber(parseFloat(valor2.toFixed(2)));
          } else if (arregloNombres[j] == "ENTRADAS") {
            celda.setAttribute(
              "onclick",
              "detalleEntradasSalidas('" +
                centro +
                "','" +
                año +
                "','" +
                mes +
                "','ENTRADAS','" +
                centroDesglose +
                "')"
            );
            celda.setAttribute("class", "btnDetalleEntradasSalidas");
            var valor2 = parseFloat(response[arregloNombres[j]]);

            valor = "$" + formatNumber(parseFloat(valor2.toFixed(2)));
          } else if (arregloNombres[j] == "SALIDAS") {
            celda.setAttribute(
              "onclick",
              "detalleEntradasSalidas('" +
                centro +
                "','" +
                año +
                "','" +
                mes +
                "','SALIDAS','" +
                centroDesglose +
                "')"
            );
            celda.setAttribute("class", "btnDetalleEntradasSalidas");
            var valor2 = parseFloat(response[arregloNombres[j]]);

            valor = "$" + formatNumber(parseFloat(valor2.toFixed(2)));
          }

          var textoCelda = document.createTextNode(valor);
          celda.appendChild(textoCelda);
          hilera.appendChild(celda);
        }

        // agrega la hilera al final de la tabla (al final del elemento tblbody)
        tblBody.appendChild(hilera);
      }

      // appends <table> into <body>
      body.appendChild(tblBody);
      body.appendChild(thead);
    },
  });
}
$(".btnCerrarDetalleIndicadores").click(function () {
  var nodos = document.getElementById("tablaDetalleIndicadores");
  while (nodos.firstChild) {
    nodos.removeChild(nodos.firstChild);
  }
});

function detalleEntradasSalidas(centro, año, mes, tipo, centroDesglose) {
  $("#textModal").html("DETALLE " + tipo + "");
  var datos = new FormData();
  datos.append("accion", "detalleEntradasSalidas");
  datos.append("centro", centro);
  datos.append("año", año);
  datos.append("mes", mes);
  datos.append("tipo", tipo);
  datos.append("centroDesglose", centroDesglose);
  $("#modalDetalleEntradasSalidas").modal();
  $.ajax({
    url: "ajax/admonFunctions.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      var response = respuesta;

      var listaCabeceras = [
        "SERIE",
        "FOLIO",
        "FECHA",
        "ALM ORIGEN",
        "ALM DESTINO",
        "REFERENCIA",
        "TOTAL",
      ];

      body = document.getElementById("tablaDetalleEntradasSalidas");

      thead = document.createElement("thead");

      theadTr = document.createElement("tr");

      for (var h = 0; h < listaCabeceras.length; h++) {
        var celdaThead = document.createElement("th");
        var textoCeldaThead = document.createTextNode(listaCabeceras[h]);
        celdaThead.appendChild(textoCeldaThead);
        theadTr.appendChild(celdaThead);
      }

      thead.appendChild(theadTr);

      tblBody = document.createElement("tbody");

      var arregloNombres = [
        "CSERIEDOCUMENTO",
        "CFOLIO",
        "CFECHA",
        "ALMORIGEN",
        "ALMDESTINO",
        "CREFERENCIA",
        "TOTAL",
      ];

      // Crea las celdas
      var acumulado = 0;
      for (var i = 0; i < response.length; i++) {
        // Crea las hileras de la tabla
        var hilera = document.createElement("tr");
        for (var j = 0; j < arregloNombres.length; j++) {
          var celda = document.createElement("td");
          if (arregloNombres[j] == "CFOLIO") {
            celda.setAttribute(
              "onclick",
              "detalleProductosDocumento('" + response[i]["CIDDOCUMENTO"] + "')"
            );
            celda.setAttribute("class", "btnDetalleEntradasSalidas");
            var valor = parseInt(response[i][arregloNombres[j]]);
          } else if (arregloNombres[j] == "TOTAL") {
            if (response[i][arregloNombres[j]] === null) {
              var monto = 0;
            } else {
              var monto = response[i][arregloNombres[j]];
            }
            var valor2 = parseFloat(monto);

            valor = "$" + formatNumber(parseFloat(Math.abs(valor2).toFixed(2)));
            acumulado = acumulado + parseFloat(Math.abs(valor2).toFixed(2));
          } else {
            var valor = response[i][arregloNombres[j]];
          }

          var textoCelda = document.createTextNode(valor);
          celda.appendChild(textoCelda);
          hilera.appendChild(celda);
        }

        // agrega la hilera al final de la tabla (al final del elemento tblbody)
        tblBody.appendChild(hilera);
      }
      var hilera = document.createElement("tr");
      hilera.style.background = "#00BCD4";
      hilera.style.color = "#ffffff";
      for (var j = 0; j < arregloNombres.length; j++) {
        var celda = document.createElement("td");
        celda.style.color = "#ffffff";
        celda.style.fontWeight = "900";
        if (arregloNombres[j] == "TOTAL") {
          valor = "$" + formatNumber(parseFloat(acumulado.toFixed(2)));
        } else {
          valor = "";
        }

        var textoCelda = document.createTextNode(valor);
        celda.appendChild(textoCelda);
        hilera.appendChild(celda);
      }
      tblBody.appendChild(hilera);
      // appends <table> into <body>
      body.appendChild(tblBody);
      body.appendChild(thead);
    },
  });
}
$(".btnCerrarEntradasSalidas").click(function () {
  var nodos = document.getElementById("tablaDetalleEntradasSalidas");
  while (nodos.firstChild) {
    nodos.removeChild(nodos.firstChild);
  }
});
function detalleProductosDocumento(idDocumento) {
  $("#textModal").html("DETALLE DOCUMENTO");
  var datos = new FormData();
  datos.append("accion", "detalleDocumento");
  datos.append("idDocumentoDetalle", idDocumento);
  $("#modalDetalleDocumentoIndicadores").modal();
  $.ajax({
    url: "ajax/admonFunctions.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      var response = respuesta;

      var listaCabeceras = [
        "N° MOVIMIENTO",
        "CÓDIGO",
        "NOMBRE",
        "UNIDADES",
        "UNIDAD",
        "COSTO",
        "TOTAL",
      ];

      body = document.getElementById("tablaDetalleDocumentoIndicadores");

      thead = document.createElement("thead");

      theadTr = document.createElement("tr");

      for (var h = 0; h < listaCabeceras.length; h++) {
        var celdaThead = document.createElement("th");
        var textoCeldaThead = document.createTextNode(listaCabeceras[h]);
        celdaThead.appendChild(textoCeldaThead);
        theadTr.appendChild(celdaThead);
      }

      thead.appendChild(theadTr);

      tblBody = document.createElement("tbody");

      var arregloNombres = [
        "CNUMEROMOVIMIENTO",
        "CCODIGOPRODUCTO",
        "CNOMBREPRODUCTO",
        "CUNIDADESCAPTURADAS",
        "CNOMBREUNIDAD",
        "COST",
        "TOTAL",
      ];

      // Crea las celdas
      var acumulado = 0;
      for (var i = 0; i < response.length; i++) {
        // Crea las hileras de la tabla
        var hilera = document.createElement("tr");
        for (var j = 0; j < arregloNombres.length; j++) {
          var celda = document.createElement("td");
          if (arregloNombres[j] == "CIDPRODUCTO") {
            var valor = parseInt(response[i][arregloNombres[j]]);
          } else if (arregloNombres[j] == "TOTAL") {
            if (response[i][arregloNombres[j]] === null) {
              var monto = 0;
            } else {
              var monto = response[i][arregloNombres[j]];
            }
            var valor2 = parseFloat(monto);

            valor = "$" + formatNumber(parseFloat(Math.abs(valor2).toFixed(2)));
            acumulado = acumulado + parseFloat(Math.abs(valor2).toFixed(2));
          } else {
            var valor = response[i][arregloNombres[j]];
          }

          var textoCelda = document.createTextNode(valor);
          celda.appendChild(textoCelda);
          hilera.appendChild(celda);
        }

        // agrega la hilera al final de la tabla (al final del elemento tblbody)
        tblBody.appendChild(hilera);
      }
      var hilera = document.createElement("tr");
      hilera.style.background = "#00BCD4";
      hilera.style.color = "#ffffff";
      for (var j = 0; j < arregloNombres.length; j++) {
        var celda = document.createElement("td");
        celda.style.color = "#ffffff";
        celda.style.fontWeight = "900";
        if (arregloNombres[j] == "TOTAL") {
          valor = "$" + formatNumber(parseFloat(acumulado.toFixed(2)));
        } else {
          valor = "";
        }

        var textoCelda = document.createTextNode(valor);
        celda.appendChild(textoCelda);
        hilera.appendChild(celda);
      }
      tblBody.appendChild(hilera);
      // appends <table> into <body>
      body.appendChild(tblBody);
      body.appendChild(thead);
    },
  });
}
$(".btnCerrarDetalleDocumentoIndicadores").click(function () {
  var nodos = document.getElementById("tablaDetalleDocumentoIndicadores");
  while (nodos.firstChild) {
    nodos.removeChild(nodos.firstChild);
  }
});
function cargarInventarioActual() {
  var vista = "cargarInventarioActual";
  var empresa = $("#empresa").val();
  var ejercicio = $("#ejercicio").val();
  if (ejercicio === null) {
    ejercicio = 2;
  } else {
    ejercicio = ejercicio;
  }

  var parametros = {
    action: "inventarioActual",
    vista: vista,
    empresa: empresa,
    ejercicio: ejercicio,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasCanal.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".indicadoresData").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarInventarioActualUnidades() {
  var vista = "cargarInventarioActualUnidades";
  var empresa = $("#empresa2").val();
  var ejercicio = $("#ejercicio2").val();
  if (ejercicio === null) {
    ejercicio = 2;
  } else {
    ejercicio = ejercicio;
  }

  var parametros = {
    action: "inventarioActualUnidades",
    vista: vista,
    empresa: empresa,
    ejercicio: ejercicio,
  };
  $("#loaderView").fadeIn("slow");
  $("#loaderView").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasCanal.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loaderView").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".indicadores").html(data).fadeIn("slow");
      $("#loaderView").html("");
    },
  });
}
function generarReporteIndicadores(vista) {
  agregarEvento("Descargo El Reporte " + vista + "", 3);

  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var page = 1;
  location.href =
    "views/moduls/reporteador.php?reporteIndicadoresMensual=" +
    "&estatus=" +
    estatus +
    "&año=" +
    anio +
    "&per_page=" +
    per_page +
    "&page=" +
    page +
    "&campo=" +
    campo +
    "&orden=" +
    orden +
    "&vista=" +
    vista;
}
function generarReporteDetalladoIndicadores(vista) {
  agregarEvento("Descargo El Reporte " + vista + "", 3);

  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var page = 1;
  location.href =
    "views/moduls/reporteador.php?reporteDetalladoIndicadoresMensual=" +
    "&estatus=" +
    estatus +
    "&año=" +
    anio +
    "&per_page=" +
    per_page +
    "&page=" +
    page +
    "&campo=" +
    campo +
    "&orden=" +
    orden +
    "&vista=" +
    vista;
}
function generarReporteIndicadoresUtilidad(vista) {
  agregarEvento("Descargo El Reporte " + vista + "", 3);

  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var page = 1;
  location.href =
    "views/moduls/reporteador.php?reporteIndicadoresMensual=" +
    "&estatus=" +
    estatus +
    "&año=" +
    anio +
    "&per_page=" +
    per_page +
    "&page=" +
    page +
    "&campo=" +
    campo +
    "&orden=" +
    orden +
    "&vista=" +
    vista;
}
function generarReporteInventarioActual(indicador) {
  if (indicador === "1") {
    vista = "importe";
    var empresa = $("#empresa").val();
    var ejercicio = $("#ejercicio").val();
  } else {
    vista = "unidades";
    var empresa = $("#empresa2").val();
    var ejercicio = $("#ejercicio2").val();
  }

  if (ejercicio === null) {
    ejercicio = 2;
  } else {
    ejercicio = ejercicio;
  }
  location.href =
    "views/moduls/reporteador.php?reporteInventarioActual=" +
    "&empresa=" +
    empresa +
    "&ejercicio=" +
    ejercicio +
    "&vista=" +
    vista;
}
function setEjercicios() {
  var empresa = $("#empresa").val();
  var parametros = {
    empresa: empresa,
    action: "ejercicios",
  };
  $.ajax({
    url: "ajax/weekDays.ajax.php",
    data: parametros,
    success: function (data) {
      $("#ejercicio").empty();
      $("#ejercicio2").empty();
      var datos = JSON.parse(data);
      var select = document.getElementById("ejercicio");
      var option = document.createElement("option");
      for (var i = 1; i <= Object.keys(datos).length; i++) {
        var option = document.createElement("option");
        option.innerHTML = datos[i];
        option.value = i;
        select.appendChild(option);
        if (datos[i] == 2022) {
          option.setAttribute("selected", "");
        }
      }
    },
  });
}
function setEjercicios2() {
  var empresa = $("#empresa2").val();
  var parametros = {
    empresa: empresa,
    action: "ejercicios",
  };
  $.ajax({
    url: "ajax/weekDays.ajax.php",
    data: parametros,
    success: function (data) {
      $("#ejercicio2").empty();
      var datos = JSON.parse(data);
      var select = document.getElementById("ejercicio2");
      var option = document.createElement("option");
      for (var i = 1; i <= Object.keys(datos).length; i++) {
        var option = document.createElement("option");
        option.innerHTML = datos[i];
        option.value = i;
        select.appendChild(option);
        if (datos[i] == 2022) {
          option.setAttribute("selected", "");
        }
      }
    },
  });
}
/******************************************************/
function listarDocumentosNoImpresos(page) {
  var per_page = 500;
  var vista = "cargarListaRequisiciones";
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var idDocumentoDe = $("#idDocumentoDe").val();
  var idConcepto = $("#idConcepto").val();
  var estatus = $("#estatus").val();
  var parametros = {
    action: "listadoDocumentosNoImpresos",
    page: page,
    per_page: per_page,
    idDocumentoDe: idDocumentoDe,
    idConcepto: idConcepto,
    estatus: estatus,
    campo: campo,
    orden: orden,
    vista: vista,
  };
  $("#loader").fadeIn("slow");
  $.ajax({
    url: "ajax/documentos.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Buscando...");
    },
    success: function (data) {
      $(".data").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function impresionDocumentos() {
  var idDocumentoDe = $("#idDocumentoDe").val();
  var idConcepto = $("#idConcepto").val();
  var estatus = $("#estatus").val();
  var datos = new FormData();
  datos.append("accion", "impresionDocumentos");
  datos.append("idDocumentoDe", idDocumentoDe);
  datos.append("idConcepto", idConcepto);
  datos.append("estatus", estatus);

  $.ajax({
    url: "ajax/inventariosFunctions.ajax.php",
    type: "post",
    dataType: "json",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function (res) {
      var response = res.replace(/['"]+/g, "");
      if (response == "ok") {
        listarDocumentosNoImpresos(1);
        Swal.fire({
          icon: "success",
          title: "¡Documentos Impresos Correctamente!",
          showConfirmButton: false,
          timer: 1500,
        });
      }
    },
  });
}
function listaRequisiciones() {
  if (
    localStorage.grupoUsuario === "Administracion" ||
    localStorage.grupoUsuario === "Almacen"
  ) {
    cargarListaRequisicionesAdmin(1);
    document.getElementById("btnListaSucursales").style.display = "";
    document
      .getElementById("btnRefresh")
      .setAttribute("onclick", "cargarListaRequisicionesAdmin(1)");
  } else {
    cargarListaRequisiciones(1);
    document.getElementById("btnRealizarRequisicion").style.display = "";
    document
      .getElementById("btnRefresh")
      .setAttribute("onclick", "cargarListaRequisiciones(1)");
  }
}
/****FUNCIONES MODULOS*/
function cargarListaRequisiciones(page) {
  var per_page = $("#per_page").val();
  var vista = "cargarListaRequisiciones";
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var prioridad = $("#prioridad").val();
  var estatus = $("#estatus").val();
  var parametros = {
    action: "listaRequisiciones",
    page: page,
    usuario: idUsuario,
    per_page: per_page,
    prioridad: prioridad,
    estatus: estatus,
    campo: campo,
    orden: orden,
    vista: vista,
  };
  $("#loader").fadeIn("slow");
  $.ajax({
    url: "ajax/requisiciones.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Buscando...");
    },
    success: function (data) {
      $(".data").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}

function cargarListaRequisicionesAdmin(page) {
  var per_page = $("#per_page").val();
  var vista = "cargarListaRequisicionesAdmin";
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var prioridad = $("#prioridad").val();
  var estatus = $("#estatus").val();
  var sucursal = $("#sucursal").val();

  var parametros = {
    action: "listaRequisicionesAdmin",
    page: page,
    per_page: per_page,
    prioridad: prioridad,
    estatus: estatus,
    sucursal: sucursal,
    campo: campo,
    orden: orden,
    vista: vista,
  };
  $("#loader").fadeIn("slow");
  $.ajax({
    url: "ajax/requisiciones.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Buscando...");
    },
    success: function (data) {
      $(".data").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarListaProductosRequisicion(page, folio) {
  var per_page = 100;
  var vista = "cargarListaProductosRequisicion";
  if (localStorage.tipoDetalleDocumento === undefined) {
    tipoDetalleDocumento = "completo";
  } else if (localStorage.tipoDetalleDocumento == "completo") {
    tipoDetalleDocumento = "completo";
  } else if (localStorage.tipoDetalleDocumento == "faltante") {
    tipoDetalleDocumento = "faltante";
  }

  if (
    localStorage.grupoUsuario == "Administracion" ||
    localStorage.grupoUsuario == "Almacen"
  ) {
    var usuario = 0;
    var periodo = $("#periodo").val();
    var parametros = {
      action: "listarProductosRequisicionAdmin",
      page: page,
      usuario: usuario,
      per_page: per_page,
      vista: vista,
      folio: folio,
      periodo: periodo,
      ejercicio: ejercicio,
      tipoDetalleDocumento: tipoDetalleDocumento,
      tipo: localStorage.tipoDocumento,
    };
  } else {
    if (
      localStorage.estatusDocumento == 3 ||
      localStorage.estatusDocumento == 4
    ) {
      var usuario = 0;
      var periodo = $("#periodo").val();
      var parametros = {
        action: "listarProductosRequisicionAdmin",
        page: page,
        usuario: usuario,
        per_page: per_page,
        vista: vista,
        folio: folio,
        periodo: periodo,
        ejercicio: ejercicio,
        tipoDetalleDocumento: tipoDetalleDocumento,
        tipo: localStorage.tipoDocumento,
      };
    } else {
      var parametros = {
        action: "listarProductosRequisicion",
        page: page,
        usuario: idUsuario,
        per_page: per_page,
        vista: vista,
        folio: folio,
        tipo: localStorage.tipoDocumento,
        tipoDetalleDocumento: "",
      };
    }
  }

  $.ajax({
    url: "ajax/listarProductosSolicitudes.ajax.php",
    data: parametros,
    success: function (data) {
      if (data != "fail") {
        $(".data").html(data).fadeIn("slow");
        $(".dataFail").html("");
        updateTotalesCart();
        updateTotalesCartAprobado();
        updateTotalesCartPendiente();
        if (
          localStorage.estatusDocumento == 3 ||
          localStorage.estatusDocumento == 4
        ) {
          var boton = document.getElementsByClassName("btnGenerarContratipo");

          for (var i = 0; i < boton.length; i++) {
            boton[i].style.display = "none";
          }
          var boton2 = document.getElementsByClassName("btnEliminarProducto");

          for (var i = 0; i < boton2.length; i++) {
            boton2[i].style.display = "none";
          }

          var input = document.getElementsByClassName("unidadesAprobadas");

          for (var i = 0; i < input.length; i++) {
            input[i].readOnly = true;
          }
        }
      } else {
        $(".data").html("");
        updateTotalesCart();
        updateTotalesCartAprobado();
        $(".dataFail").html("<h3></h3>");
      }
    },
  });
}

/****FUNCIONES MODULOS*/
/*****OPTION SOLICITANTES */
function elegirSolicitante() {
  var solic = document.getElementById("solicitante");
  var nombre = solic.options[solic.selectedIndex].text;
  $("#nombreSolicitante").html(nombre);
}
function elegirRealizador() {
  var solic = document.getElementById("realizador");
  var nombre = solic.options[solic.selectedIndex].text;
  $("#nombreSolicitante").html(nombre);
}

/*****OPTION SOLICITANTES */
/****BUSCADOR DE PRODUCTOS */
function loadProductosSolicitudes(page) {
  var producto = $("#nombreProducto").val();
  var vista = "loadProductosSolicitudes";
  var per_page = "5";
  var parametros = {
    action: "busquedaProductosSolicitudes",
    page: page,
    producto: producto,
    vista: vista,
    per_page: per_page,
  };
  $("#loader2").fadeIn("slow");
  $.ajax({
    url: "ajax/listaBusqueda.ajax.php",
    data: parametros,
    beforeSend: function () {
      $("#loader2").html(
        '<img src="views/images/ajax-loader.gif"> Cargando...'
      );
    },
    success: function (data) {
      $(".dataProductos").html(data).fadeIn("slow");
      $("#loader2").html("");
    },
  });
}
/****BUSCADOR DE PRODUCTOS */
function loadClientesProveedores(page) {
  var clienteProveedor = $("#nombre").val();
  var vista = "loadClientesProveedores";
  var per_page = "5";
  var parametros = {
    action: "busquedaClientesProveedores",
    page: page,
    clienteProveedor: clienteProveedor,
    vista: vista,
    tipo: 3,
    per_page: per_page,
  };
  $("#loader2").fadeIn("slow");
  $.ajax({
    url: "ajax/listaBusqueda.ajax.php",
    data: parametros,
    beforeSend: function () {
      $("#loader2").html(
        '<img src="views/images/ajax-loader.gif"> Cargando...'
      );
    },
    success: function (data) {
      $(".dataClientesProveedores").html(data).fadeIn("slow");
      $("#loader2").html("");
    },
  });
}
function updateCart(el) {
  var row = $(el).parents("tr");
  var cantidad = row.find(".cantidadProducto").val();
  var costo = row.find(".costoProducto").val();
  costo = parseFloat(costo.replace(/[$,]/g, ""));

  var conversion = $("option:selected", row.find(".unidadProducto")).attr(
    "valorConversion"
  );
  if (conversion != 1) {
    var importe = (costo / conversion) * cantidad;
    var cantidadConversion = cantidad / conversion;
  } else {
    var importe = cantidad * costo;
    var cantidadConversion = parseFloat(cantidad);
  }
  row
    .find(".cantidadProducto")
    .attr("cantidadConv", cantidadConversion.toFixed(13));
  row
    .find(".importeProducto")
    .val("$" + formatNumber(parseFloat(importe.toFixed(2))));
  updateTotalesCart();
}
function updateCartAprobado(el) {
  var row = $(el).parents("tr");
  var solicitado = row.find(".cantidadProducto").attr("cantidadConv");
  var conversion = row.find(".unidadProducto").attr("valorConversion");
  var cantidad = row.find(".unidadesAprobadas").val();
  var costo = row.find(".costoProducto").text().replace(/[$,]/g, "");
  costo = parseFloat(costo.replace(/[$,]/g, ""));
  var aprobadoConv = cantidad;
  var solicitadoConv = solicitado * conversion;
  if (conversion != 1) {
    var importe = (costo / conversion) * cantidad;
    var cantidadConversion = cantidad / conversion;
  } else {
    var importe = cantidad * costo;
    var cantidadConversion = parseFloat(cantidad);
  }
  if (aprobadoConv > solicitadoConv) {
    row.find(".unidadesAprobadas").val(solicitadoConv.toFixed(2));
    importe = (costo / conversion) * solicitadoConv;
    row
      .find(".importeAprobado")
      .val("$" + formatNumber(parseFloat(importe.toFixed(2))));
  } else {
    row
      .find(".unidadesAprobadas")
      .attr("cantidadConv", cantidadConversion.toFixed(13));
    row
      .find(".importeAprobado")
      .val("$" + formatNumber(parseFloat(importe.toFixed(2))));
    updateTotalesCartAprobado();
    updateProductCartAprobado(el);
  }
}
function updateCartPendiente(el) {
  var row = $(el).parents("tr");
  var solicitado = row.find(".cantidadProducto").attr("cantidadConv");
  var conversion = row.find(".unidadProducto").attr("valorConversion");
  var cantidad = row.find(".unidadesAprobadas").val();
  var costo = row.find(".costoProducto").text().replace(/[$,]/g, "");
  costo = parseFloat(costo.replace(/[$,]/g, ""));
  var aprobadoConv = cantidad;
  var solicitadoConv = solicitado * conversion;
  var pendiente = solicitadoConv - aprobadoConv;

  if (conversion != 1) {
    var importe = (costo / conversion) * pendiente;
    var cantidadConversion = pendiente / conversion;
  } else {
    var importe = pendiente * costo;
    var cantidadConversion = parseFloat(pendiente);
  }
  if (aprobadoConv > solicitadoConv) {
    row.find(".unidadesPendientes").val(pendiente.toFixed(2));
    importe = (costo / conversion) * pendiente;
    row
      .find(".importePendiente")
      .val("$" + formatNumber(parseFloat(importe.toFixed(2))));
  } else {
    row
      .find(".unidadesPendientes")
      .attr("cantidadConv", cantidadConversion.toFixed(13));
    row
      .find(".importePendiente")
      .val("$" + formatNumber(parseFloat(importe.toFixed(2))));
  }
  updateTotalesCartPendiente();
  updateProductCartPendiente(el);
}
function updateInventario(el) {
  var row = $(el).parents("tr");
  var inventario = row.find(".inventarioProducto").val();
  var costo = row.find(".costoProducto").text();
  costo = parseFloat(costo.replace(/[$,]/g, ""));
  var idUnidad = $("option:selected", row.find(".unidadProducto")).val();
  var conversion = row.find(".unidadProductoBase").attr("valorConversion");
  var idUnidadBase = row.find(".unidadProductoBase").attr("idUnidad");
  //alert(idUnidadBase + " " + idUnidad);
  var existencia = row.find(".existenciasProducto").text();
  var existenciaImporte = row.find(".existenciasImporteProducto").text();
  existenciaImporte = parseFloat(existenciaImporte.replace(/[$,]/g, ""));
  var almacen = $("#almacen").val();
  if (conversion != 1) {
    var importe = (costo / conversion) * inventario;

    if (
      almacen === "3" ||
      almacen === "5" ||
      almacen === "7" ||
      almacen === "9" ||
      almacen === "11" ||
      almacen === "13"
    ) {
      var existenciaConversion = existencia * conversion;
      if (
        idUnidad == "1" ||
        idUnidad == "11" ||
        idUnidad == "16" ||
        idUnidad == "28" ||
        idUnidad == "50"
      ) {
        if (idUnidad == "28" && idUnidadBase == "28") {
          var cantidadConversion = inventario * conversion;
          var diferencia = existencia - inventario;
          var importe = importe * costo;
          var diferenciaConversion = parseFloat(diferencia);
        } else {
          var cantidadConversion = inventario / conversion;
          var diferencia = existenciaConversion - inventario;
          var importe = cantidadConversion * costo;
          var diferenciaConversion = parseFloat(diferencia / conversion);
        }
      } else {
        var cantidadConversion = parseFloat(inventario * conversion);
        var diferencia = existencia - inventario;
        var importe = inventario * costo;
        var diferenciaConversion = parseFloat(diferencia);
      }
    } else {
      var existenciaConversion = parseFloat(existencia);
      var cantidadConversion = parseFloat(inventario);
      var diferencia = existencia - inventario;
      var importe = inventario * costo;
      var diferenciaConversion = parseFloat(diferencia);
    }
  } else {
    var cantidadConversion = parseFloat(inventario);
    var existenciaConversion = parseFloat(existencia);
    var diferencia = existencia - inventario;
    var importe = inventario * costo;
    var diferenciaConversion = parseFloat(diferencia);
  }
  var diferenciaImporte = existenciaImporte - importe;
  row
    .find(".diferenciasProducto")
    .html(formatNumber(parseFloat(diferencia.toFixed(5))));

  row
    .find(".inventarioImporteProducto")
    .html("$" + formatNumber(parseFloat(importe.toFixed(5))));

  row
    .find(".diferenciasImporteProducto")
    .html("$" + formatNumber(parseFloat(diferenciaImporte.toFixed(5))));

  row
    .find(".existenciasProducto")
    .attr("cantidadConv", existenciaConversion.toFixed(13));
  row
    .find(".diferenciasProducto")
    .attr("cantidadConv", diferenciaConversion.toFixed(13));
  row
    .find(".inventarioProducto")
    .attr("cantidadConv", cantidadConversion.toFixed(13));

  switch (Math.sign(diferencia)) {
    case 0:
      row.find(".estadoProducto").html("Sin Accion");
      break;
    case 1:
      row.find(".estadoProducto").html("Salida");
      break;
    case -1:
      if (existencia == "0.00000") {
        row.find(".estadoProducto").html("Entrada");
      } else if (diferencia == "-1.4210854715202004e-14") {
        row.find(".estadoProducto").html("Sin Accion");
      } else {
        row.find(".estadoProducto").html("Entrada");
      }

      break;
  }

  updateTotalesExistencias(almacen);
  updateTotalesDiferencias(almacen);
  updateTotalesInventario();
}
function loadCart(el) {
  var row = $(el).parents("tr");
  var tipoDocumento = localStorage.tipoDocumento;
  var idProducto = row.find(".idProducto").text();
  var codigo = row.find(".codigoProducto").text();
  var descripcion = row.find(".nombreProducto").text();
  var unidades = row.find(".cantidadProducto").attr("cantidadConv");
  var idUnidad = $("option:selected", row.find(".unidadProducto")).val();
  var valorConversion = $("option:selected", row.find(".unidadProducto")).attr(
    "valorConversion"
  );
  var unidadesConversion = unidades * valorConversion;
  var costo = row.find(".costoProducto").val();
  costo = parseFloat(costo.replace(/[$,]/g, ""));
  var importe = row.find(".importeProducto").val();
  importe = parseFloat(importe.replace(/[$,]/g, ""));
  if (localStorage.folioDocumento === undefined) {
    var folioDocumento = 0;
  } else {
    var folioDocumento = localStorage.folioDocumento;
  }

  var datas = new FormData();
  datas.append("accion", "searchProductos");
  datas.append("idUsuario", idUsuario);
  datas.append("idProducto", idProducto);
  datas.append("folioDocumento", folioDocumento);
  $.ajax({
    url: "ajax/inventariosFunctions.ajax.php",
    type: "post",
    dataType: "json",
    data: datas,
    cache: false,
    contentType: false,
    processData: false,
  }).done(function (res) {
    var response = res.replace(/['"]+/g, "");
    if (response == "ok") {
      var datos = new FormData();
      datos.append("accion", "insertProductos");
      datos.append("idUsuario", idUsuario);
      datos.append("idProducto", idProducto);
      datos.append("codigo", codigo);
      datos.append("descripcion", descripcion);
      datos.append("unidades", unidades);
      datos.append("idUnidad", idUnidad);
      datos.append("unidadesConversion", unidadesConversion);
      datos.append("valorConversion", valorConversion);
      datos.append("costo", costo);
      datos.append("importe", importe);
      datos.append("tipo", tipoDocumento);
      datos.append("folioDocumento", folioDocumento);
      $.ajax({
        url: "ajax/inventariosFunctions.ajax.php",
        type: "post",
        dataType: "json",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
      }).done(function (res) {
        var response = res.replace(/['"]+/g, "");
        if (response == "ok") {
          cargarListaProductosRequisicion(1, folioDocumento);
        }
      });
    }
  });
}
function updateProductCart(el) {
  var row = $(el).parents("tr");

  var idProducto = row.find(".idProducto").attr("idTemp");
  var unidades = row.find(".cantidadProducto").attr("cantidadConv");
  var idUnidad = $("option:selected", row.find(".unidadProducto")).val();
  var idAlmacen = $("option:selected", row.find(".almacenProducto")).val();
  var valorConversion = $("option:selected", row.find(".unidadProducto")).attr(
    "valorConversion"
  );
  var unidadesConversion = unidades * valorConversion;
  var importe = row.find(".importeProducto").val();
  var costo = row.find(".costoProducto").val();
  importe = parseFloat(importe.replace(/[$,]/g, ""));
  costo = parseFloat(costo.replace(/[$,]/g, ""));
  var tipoDocumento = localStorage.tipoDocumento;
  if (localStorage.folioDocumento === undefined) {
    var folioDocumento = 0;
  } else {
    var folioDocumento = localStorage.folioDocumento;
  }

  var datos = new FormData();
  datos.append("accion", "updateProductos");
  datos.append("idUsuario", idUsuario);
  datos.append("idProducto", idProducto);
  datos.append("unidades", unidades);
  datos.append("unidadesConversion", unidadesConversion);
  datos.append("idUnidad", idUnidad);
  datos.append("idAlmacen", idAlmacen);
  datos.append("valorConversion", valorConversion);
  datos.append("importe", importe);
  datos.append("costo", costo);
  datos.append("tipoDocumento", tipoDocumento);
  datos.append("folioDocumento", folioDocumento);

  $.ajax({
    url: "ajax/inventariosFunctions.ajax.php",
    type: "post",
    dataType: "json",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
  }).done(function (res) {
    var response = res.replace(/['"]+/g, "");
    if (response == "ok") {
      cargarListaProductosRequisicion(1, folioDocumento);
    }
  });
}
function updateProductCartAprobado(el) {
  var row = $(el).parents("tr");
  var idProducto = row.find(".idProducto").attr("idTemp");
  var unidades = row.find(".unidadesAprobadas").attr("cantidadConv");
  var unidadesConversion = row.find(".unidadesAprobadas").val();

  var importe = row.find(".importeAprobado").val();
  importe = parseFloat(importe.replace(/[$,]/g, ""));
  var tipoDocumento = localStorage.tipoDocumento;
  if (localStorage.folioDocumento === undefined) {
    var folioDocumento = 0;
  } else {
    var folioDocumento = localStorage.folioDocumento;
  }
  var datos = new FormData();
  datos.append("accion", "updateProductosAprobados");
  datos.append("idProducto", idProducto);
  datos.append("unidades", unidades);
  datos.append("unidadesConversion", unidadesConversion);
  datos.append("importe", importe);
  datos.append("tipoDocumento", tipoDocumento);
  datos.append("folioDocumento", folioDocumento);

  $.ajax({
    url: "ajax/inventariosFunctions.ajax.php",
    type: "post",
    dataType: "json",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
  }).done(function (res) {
    var response = res.replace(/['"]+/g, "");
    if (response == "ok") {
      cargarListaProductosRequisicion(1, folioDocumento);
    }
  });
}
function updateProductCartPendiente(el) {
  var row = $(el).parents("tr");
  var idProducto = row.find(".idProducto").attr("idTemp");
  var unidades = row.find(".unidadesPendientes").attr("cantidadConv");
  var solicitado = row.find(".cantidadProducto").text();
  var aprobado = row.find(".unidadesAprobadas").val();
  var unidadesConversion = solicitado - aprobado;

  var importe = row.find(".importePendiente").val();
  importe = parseFloat(importe.replace(/[$,]/g, ""));
  var tipoDocumento = localStorage.tipoDocumento;
  if (localStorage.folioDocumento === undefined) {
    var folioDocumento = 0;
  } else {
    var folioDocumento = localStorage.folioDocumento;
  }
  var datos = new FormData();
  datos.append("accion", "updateProductosPendientes");
  datos.append("idProducto", idProducto);
  datos.append("unidades", unidades);
  datos.append("unidadesConversion", unidadesConversion);
  datos.append("importe", importe);
  datos.append("tipoDocumento", tipoDocumento);
  datos.append("folioDocumento", folioDocumento);

  $.ajax({
    url: "ajax/inventariosFunctions.ajax.php",
    type: "post",
    dataType: "json",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
  }).done(function (res) {
    var response = res.replace(/['"]+/g, "");
    if (response == "ok") {
      cargarListaProductosRequisicion(1, folioDocumento);
    }
  });
}
function eliminarProducto(idProducto, tipo) {
  if (localStorage.folioDocumento === undefined) {
    var folioDocumento = 0;
  } else {
    var folioDocumento = localStorage.folioDocumento;
  }
  var datos = new FormData();
  datos.append("accion", "deleteProductos");
  datos.append("idProducto", idProducto);
  datos.append("idUsuario", idUsuario);
  datos.append("tipoDocumento", tipo);
  datos.append("folioDocumento", folioDocumento);
  $.ajax({
    url: "ajax/inventariosFunctions.ajax.php",
    type: "post",
    dataType: "json",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
  }).done(function (res) {
    var response = res.replace(/['"]+/g, "");
    if (response == "ok") {
      cargarListaProductosRequisicion(1, folioDocumento);
    }
  });
}
function updateTotalesCart() {
  /*SUMA DE CANTIDADES*/
  var cantidad = 0;
  var importe = 0;
  $("#contenedorProductos .cantidadProducto").each(function () {
    if ($(this).val() == "") {
      cantidad += parseFloat($(this).text());
    } else {
      cantidad += parseFloat($(this).val());
    }
  });

  $("#cantidadTotal").val(cantidad.toFixed(2));

  $("#contenedorProductos .importeProducto").each(function () {
    if ($(this).val() == "") {
      importe += parseFloat($(this).text().replace(/[$,]/g, ""));
    } else {
      importe += parseFloat($(this).val().replace(/[$,]/g, ""));
    }
  });
  $("#importeTotal").val("$" + importe.toFixed(2));
}
function updateTotalesCartAprobado() {
  /*SUMA DE CANTIDADES*/
  var cantidad = 0;
  var importe = 0;
  $("#contenedorProductos .unidadesAprobadas").each(function () {
    if ($(this).val() == "") {
      cantidad += parseFloat($(this).text());
    } else {
      cantidad += parseFloat($(this).val());
    }
  });

  $("#cantidadTotalAprobada").val(cantidad.toFixed(2));

  $("#contenedorProductos .importeAprobado").each(function () {
    if ($(this).val() == "") {
      importe += parseFloat($(this).text().replace(/[$,]/g, ""));
    } else {
      importe += parseFloat($(this).val().replace(/[$,]/g, ""));
    }
  });
  $("#importeTotalAprobado").val("$" + importe.toFixed(2));
}
function updateTotalesCartPendiente() {
  /*SUMA DE CANTIDADES*/
  var cantidad = 0;
  var importe = 0;
  $("#contenedorProductos .unidadesPendientes").each(function () {
    if ($(this).val() == "") {
      cantidad += parseFloat($(this).text());
    } else {
      cantidad += parseFloat($(this).val());
    }
  });

  $("#cantidadTotalPendiente").val(cantidad.toFixed(2));

  $("#contenedorProductos .importePendiente").each(function () {
    if ($(this).val() == "") {
      importe += parseFloat($(this).text().replace(/[$,]/g, ""));
    } else {
      importe += parseFloat($(this).val().replace(/[$,]/g, ""));
    }
  });
  $("#importeTotalPendiente").val("$" + importe.toFixed(2));
}
function updateTotalesCartSolicitado() {
  /*SUMA DE CANTIDADES*/
  var cantidad = 0;
  var importe = 0;
  $("#contenedorProductos .unidadesPendientes").each(function () {
    if ($(this).val() == "") {
      cantidad += parseFloat($(this).text());
    } else {
      cantidad += parseFloat($(this).val());
    }
  });

  $("#cantidadTotalSolicitada").val(cantidad.toFixed(2));

  $("#contenedorProductos .importePendiente").each(function () {
    if ($(this).val() == "") {
      importe += parseFloat($(this).text().replace(/[$,]/g, ""));
    } else {
      importe += parseFloat($(this).val().replace(/[$,]/g, ""));
    }
  });
  $("#importeTotalSolicitado").val("$" + importe.toFixed(2));
}
function updateTotalesExistencias(idAlmacen) {
  /*SUMA DE CANTIDADES*/

  var cantidad = 0;
  var importe = 0;
  if (
    idAlmacen === "3" ||
    idAlmacen === "5" ||
    idAlmacen === "7" ||
    idAlmacen === "9" ||
    idAlmacen === "11" ||
    idAlmacen === "13"
  ) {
    $("#contenedorProductos .existenciasConversion").each(function () {
      cantidad += parseFloat($(this).text());
    });
  } else {
    $("#contenedorProductos .existenciasProducto").each(function () {
      cantidad += parseFloat($(this).text());
    });
  }

  $("#existenciaTotalUnidades").val(cantidad.toFixed(5));

  $("#contenedorProductos .existenciasImporteProducto").each(function () {
    if ($(this).val() == "") {
      importe += parseFloat($(this).text().replace(/[$,]/g, ""));
    } else {
      importe += parseFloat($(this).val().replace(/[$,]/g, ""));
    }
  });
  $("#existenciaTotalImporte").val(
    "$" + formatNumber(parseFloat(importe.toFixed(5)))
  );
}
function updateTotalesInventario() {
  /*SUMA DE CANTIDADES*/
  var cantidad = 0;
  var importe = 0;
  $("#contenedorProductos .inventarioProducto").each(function () {
    if ($(this).val() == "") {
      cantidad += parseFloat($(this).text().replace(/[$,]/g, ""));
    } else {
      cantidad += parseFloat($(this).val().replace(/[$,]/g, ""));
    }
  });

  $("#inventarioTotalUnidades").val(cantidad.toFixed(5));
  $("#contenedorProductos .inventarioImporteProducto").each(function () {
    if ($(this).val() == "") {
      importe += parseFloat($(this).text().replace(/[$,]/g, ""));
    } else {
      importe += parseFloat($(this).val().replace(/[$,]/g, ""));
    }
  });
  $("#inventarioTotalImporte").val(
    "$" + formatNumber(parseFloat(importe.toFixed(5)))
  );
}
function updateTotalesDiferencias(idAlmacen) {
  /*SUMA DE CANTIDADES*/
  var cantidad = 0;
  var importe = 0;

  if (
    idAlmacen === "3" ||
    idAlmacen === "5" ||
    idAlmacen === "7" ||
    idAlmacen === "9" ||
    idAlmacen === "11" ||
    idAlmacen === "13"
  ) {
    $("#contenedorProductos .diferenciasProducto").each(function () {
      //cantidad += parseFloat($(this).attr("cantidadconv"));
      cantidad += parseFloat($(this).text());
    });
  } else {
    $("#contenedorProductos .diferenciasProducto").each(function () {
      cantidad += parseFloat($(this).text());
    });
  }

  $("#diferenciasTotalUnidades").val(cantidad.toFixed(5));
  $("#contenedorProductos .diferenciasImporteProducto").each(function () {
    if ($(this).val() == "") {
      importe += parseFloat($(this).text().replace(/[$,]/g, ""));
    } else {
      importe += parseFloat($(this).val().replace(/[$,]/g, ""));
    }
  });
  $("#diferenciasTotalImporte").val(
    "$" + formatNumber(parseFloat(importe.toFixed(5)))
  );
}
function generarDocumento(documento) {
  if (localStorage.folioDocumento === undefined) {
    var datos = new FormData();
    datos.append("accion", "detailProductos");
    datos.append("idUsuario", idUsuario);
    $.ajax({
      url: "ajax/inventariosFunctions.ajax.php",
      type: "post",
      dataType: "json",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
    }).done(function (res) {
      var response = res.replace(/['"]+/g, "");
      if (response == "ok") {
        var idAlmacen = $("#almacenDestino").val();
        var solicitado = $("#cantidadTotal").val();
        var importeSolicitado = parseFloat(
          $("#importeTotal").val().replace(/[$,]/g, "")
        );
        var idSolicitante = $("#solicitante").val();
        var prioridad = $("#prioridad").val();
        var observaciones = $("#observaciones").val();
        var tipoDocumento = localStorage.tipoDocumento;
        var fecha = $("#fecha").val();
        var datos = new FormData();
        datos.append("accion", "generarDocumento");
        datos.append("idAlmacen", idAlmacen);
        datos.append("solicitado", solicitado);
        datos.append("importeSolicitado", importeSolicitado);
        datos.append("idSolicitante", idSolicitante);
        datos.append("prioridad", prioridad);
        datos.append("documento", documento);
        datos.append("observaciones", observaciones.trim());
        datos.append("tipoDocumento", tipoDocumento);
        datos.append("fecha", fecha);
        $.ajax({
          url: "ajax/inventariosFunctions.ajax.php",
          type: "post",
          dataType: "json",
          data: datos,
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (res) {
          var response = res.replace(/['"]+/g, "");
          if (response != "error") {
            var datas = new FormData();
            datas.append("accion", "updateFolioDocumento");
            datas.append("idUsuario", idUsuario);
            datas.append("folioDocumento", response);
            datas.append("documento", documento);

            $.ajax({
              url: "ajax/inventariosFunctions.ajax.php",
              type: "post",
              dataType: "json",
              data: datas,
              cache: false,
              contentType: false,
              processData: false,
            }).done(function (res) {
              var response = res.replace(/['"]+/g, "");
              if (response != "error") {
                Swal.fire({
                  icon: "success",
                  title: "¡Documento generado correctamente!",
                  showConfirmButton: false,
                  timer: 1500,
                });
                setInterval(() => {
                  window.location.href = "" + documento + "";
                }, 300);
              }
            });
          }
        });
      } else {
        Swal.fire({
          icon: "error",
          title: "¡No se puede generar el documento no hay productos...!",
          confirmButtonText: "Cerrar",
        });
      }
    });
  } else {
    var idAlmacen = $("#almacenDestino").val();
    var solicitado = $("#cantidadTotal").val();
    var importeSolicitado = parseFloat(
      $("#importeTotal").val().replace(/[$,]/g, "")
    );
    var idSolicitante = $("#solicitante").val();
    var prioridad = $("#prioridad").val();
    var observaciones = $("#observaciones").val();
    var folioDocumento = localStorage.folioDocumento;
    var datos = new FormData();
    datos.append("accion", "actualizarDocumento");
    datos.append("idAlmacen", idAlmacen);
    datos.append("solicitado", solicitado);
    datos.append("importeSolicitado", importeSolicitado);
    datos.append("idSolicitante", idSolicitante);
    datos.append("prioridad", prioridad);
    datos.append("documento", documento);
    datos.append("observaciones", observaciones.trim());
    datos.append("folioDocumento", folioDocumento);
    $.ajax({
      url: "ajax/inventariosFunctions.ajax.php",
      type: "post",
      dataType: "json",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
    }).done(function (res) {
      var response = res.replace(/['"]+/g, "");
      if (response != "error") {
        localStorage.removeItem("folioDocumento");
        localStorage.removeItem("estatusDocumento");
        localStorage.removeItem("tipoDetalleDocumento");
        Swal.fire({
          icon: "success",
          title: "¡Documento actualizado correctamente!",
          showConfirmButton: false,
          timer: 1500,
        });
        setInterval(() => {
          window.location.href = "" + documento + "";
        }, 200);
      }
    });
  }
}
function editarDocumento(
  tipoDocumento,
  tabla,
  folio,
  tipoDetalle,
  tipoDocumentoUnion
) {
  var datas = new FormData();
  datas.append("accion", "estatusDocumento");
  datas.append("folioDocumento", folio);
  datas.append("tabla", tabla);

  $.ajax({
    url: "ajax/inventariosFunctions.ajax.php",
    type: "post",
    dataType: "json",
    data: datas,
    cache: false,
    contentType: false,
    processData: false,
  }).done(function (response) {
    if (response["idEstatus"] == 1) {
      localStorage.setItem("tipoDocumento", tipoDocumento);
      localStorage.setItem("tablaDocumento", tabla);
      localStorage.setItem("folioDocumento", folio);
      localStorage.setItem("tipoDetalleDocumento", tipoDetalle);
      localStorage.setItem("tipoDocumentoUnion", tipoDocumentoUnion);
      localStorage.setItem("estatusDocumento", response["idEstatus"]);
      switch (tabla) {
        case "requisiciones":
          var url = "editarRequisicion";
          break;
        case "pedidos":
          var url = "editarPedido";
          break;
        case "autorizacionescompra":
          var url = "editarAutorizacion";
          break;
      }
      window.location.href = url;
    } else if (response["idEstatus"] == 3 || response["idEstatus"] == 4) {
      localStorage.setItem("tipoDocumento", tipoDocumento);
      localStorage.setItem("tablaDocumento", tabla);
      localStorage.setItem("folioDocumento", folio);
      localStorage.setItem("tipoDetalleDocumento", tipoDetalle);
      localStorage.setItem("tipoDocumentoUnion", tipoDocumentoUnion);
      localStorage.setItem("estatusDocumento", response["idEstatus"]);
      switch (tabla) {
        case "requisiciones":
          var url = "editarRequisicion";
          break;
        case "pedidos":
          var url = "editarPedido";
          break;
        case "autorizacionescompra":
          var url = "editarAutorizacion";
          break;
      }
      window.location.href = url;
    } else {
      if (tipoDocumento == 3) {
        localStorage.setItem("tipoDocumento", tipoDocumento);
        localStorage.setItem("tablaDocumento", tabla);
        localStorage.setItem("folioDocumento", folio);
        localStorage.setItem("tipoDetalleDocumento", tipoDetalle);
        localStorage.setItem("tipoDocumentoUnion", tipoDocumentoUnion);
        localStorage.setItem("estatusDocumento", response["idEstatus"]);
        switch (tabla) {
          case "autorizacionescompra":
            var url = "editarAutorizacion";
            break;
        }
        window.location.href = url;
      } else {
        listaRequisiciones();
        Swal.fire({
          icon: "info",
          title:
            "¡El documento no puede ser editado porque ya se encuentra en revisión!",
          confirmButtonText: "Cerrar",
        });
      }
    }
  });
}
function detalleDocumento(folio, tabla) {
  if (localStorage.tipoDocumento === "1") {
    var serieDocumento = "REMA";
  } else if (localStorage.tipoDocumento === "2") {
    var serieDocumento = "PDMA";
  }
  var tipoDocumentoUnion = localStorage.tipoDocumentoUnion;
  var datas = new FormData();
  datas.append("accion", "detalleDocumento");
  datas.append("serieDocumento", serieDocumento);
  datas.append("folioDocumento", folio);
  datas.append("tipoDocumentoUnion", tipoDocumentoUnion);
  datas.append("tabla", tabla);

  $.ajax({
    url: "ajax/inventariosFunctions.ajax.php",
    type: "post",
    dataType: "json",
    data: datas,
    cache: false,
    contentType: false,
    processData: false,
  }).done(function (response) {
    $("#documento").html(response["serie"] + " " + response["folio"]);
    $("#fecha").val(response["fechaDocumento"]);
    document.getElementById("fecha").disabled = true;
    $("#prioridad").val(response["prioridad"]);
    $("#almacenDestino").val(response["idAlmacen"]);
    $("#solicitante").val(response["idSolicitante"]);
    if (
      localStorage.grupoUsuario == "Administracion" ||
      localStorage.grupoUsuario == "Almacen"
    ) {
      document.getElementById("almacenDestino").disabled = true;
      document.getElementById("prioridad").disabled = true;
      document.getElementById("solicitante").disabled = true;
      document.getElementById("searchProductoVenta").disabled = true;
      document.getElementById("unidadesSurtidas").style.display = "";
      document.getElementById("importeSurtido").style.display = "";
      document.getElementById("unidadesPendientes").style.display = "";
      document.getElementById("importePendiente").style.display = "";
      document.getElementById("headMain").style.display = "none";
      document.getElementById("headSecond").style.display = "";
      $("#observaciones").val(response["observaciones"]);
      $("#observacionesRevision").val(response["observacionesAprobada"]);
    } else {
      document.getElementById("observacionesRevision").disabled = true;
      document.getElementById("headMain").style.display = "";
      document.getElementById("headSecond").style.display = "none";
      $("#observacionesRevision").val(response["observacionesAprobada"]);
      if (localStorage.estatusDocumento == 3) {
        document.getElementById("btnFinalizarDocumento").style.display = "";
        document.getElementById("unidadesSurtidas").style.display = "";
        document.getElementById("importeSurtido").style.display = "";
        document.getElementById("unidadesPendientes").style.display = "";
        document.getElementById("importePendiente").style.display = "";
      } else {
        document.getElementById("unidadesSurtidas").style.display = "";
        document.getElementById("importeSurtido").style.display = "";
        document.getElementById("unidadesPendientes").style.display = "";
        document.getElementById("importePendiente").style.display = "";
      }
    }
    if (
      localStorage.estatusDocumento == 3 ||
      localStorage.estatusDocumento == 4
    ) {
      document.getElementById("searchProductoVenta").disabled = true;
      document.getElementById("btnGenerarDocumento").style.display = "none";
      document.getElementById("btnAprobarDocumento").style.display = "none";
      document.getElementById("observaciones").disabled = true;
      document.getElementById("observacionesRevision").disabled = true;
      document.getElementById("almacenDestino").disabled = true;
      document.getElementById("prioridad").disabled = true;
      document.getElementById("solicitante").disabled = true;
      document.getElementById("headSecond").style.display = "";
      document.getElementById("headMain").style.display = "none";
    } else {
      if (
        localStorage.grupoUsuario == "Administracion" ||
        localStorage.grupoUsuario == "Almacen"
      ) {
        document.getElementById("btnGenerarDocumento").style.display = "none";
        document.getElementById("btnAprobarDocumento").style.display = "";
      } else {
        document.getElementById("btnGenerarDocumento").style.display = "";
      }

      document.getElementById("observaciones").disabled = true;
    }
    if (localStorage.grupoUsuario != "Administracion") {
      if (
        localStorage.estatusDocumento == 4 ||
        (localStorage.estatusDocumento == 3 &&
          response["pendientes"] != 0 &&
          response["folioAutorizacion"] == 0)
      ) {
        document.getElementById(
          "btnSolicitarAutorizacionCompra"
        ).style.display = "";
      } else {
        document.getElementById(
          "btnSolicitarAutorizacionCompra"
        ).style.display = "none";
      }
    }
    elegirSolicitante();
    cargarListaProductosPedido(1, folio);
  });
}
function detalleDocumentoAutorizacion(folio, tabla) {
  var serieDocumento = "AUMA";
  var tipoDocumentoUnion = localStorage.tipoDocumentoUnion;
  var datas = new FormData();
  datas.append("accion", "detalleDocumento");
  datas.append("serieDocumento", serieDocumento);
  datas.append("folioDocumento", folio);
  datas.append("tipoDocumentoUnion", tipoDocumentoUnion);
  datas.append("tabla", tabla);

  $.ajax({
    url: "ajax/inventariosFunctions.ajax.php",
    type: "post",
    dataType: "json",
    data: datas,
    cache: false,
    contentType: false,
    processData: false,
  }).done(function (response) {
    localStorage.setItem("serieOrigen", response["serie"]);
    $("#documento").html(response["serieAut"] + " " + response["folioAut"]);
    $("#documentoOrigen").html(response["serie"] + " " + response["folio"]);
    $("#fecha").val(response["fecha"]);
    $("#observaciones").val(response["observaciones"]);
    document.getElementById("fecha").disabled = true;

    $("#solicitante").val(response["idSolicitante"]);
    document.getElementById("solicitante").disabled = true;
    if (
      localStorage.grupoUsuario == "Administracion" ||
      localStorage.grupoUsuario == "Almacen"
    ) {
      document.getElementById("headMain").style.display = "none";
      document.getElementById("headSecond").style.display = "";
      if (response["aprobada"] === "0") {
        document.getElementById("btnGenerarOrdenCompra").style.display = "";
      }
    } else {
      document.getElementById("headMain").style.display = "none";
      document.getElementById("headSecond").style.display = "";
      document.getElementById("observaciones").setAttribute("readonly", true);
    }

    elegirSolicitante();
    cargarListaProductosAutorizacion(1, response["folio"]);
  });
}
function eliminarDocumento(tipoDocumento, folio) {
  switch (tipoDocumento) {
    case "requisicion":
      var tabla = "requisiciones";
      var tipo = "1";
      break;
    case "pedido":
      var tabla = "pedidos";
      var tipo = "2";
      break;
    case "autorizacion":
      var tabla = "autorizacionescompra";
      var tipo = "3";
      break;
  }
  Swal.fire({
    icon: "warning",
    title: "¿Eliminar documento?",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si,Eliminar",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      var datas = new FormData();
      datas.append("accion", "estatusDocumento");
      datas.append("folioDocumento", folio);
      datas.append("tabla", tabla);

      $.ajax({
        url: "ajax/inventariosFunctions.ajax.php",
        type: "post",
        dataType: "json",
        data: datas,
        cache: false,
        contentType: false,
        processData: false,
      }).done(function (response) {
        if (response["idEstatus"] == 1) {
          var datos = new FormData();
          datos.append("accion", "eliminarDocumento");
          datos.append("folioDocumento", folio);
          datos.append("tipoDocumento", tipo);
          datos.append("tabla", tabla);
          $.ajax({
            url: "ajax/inventariosFunctions.ajax.php",
            type: "post",
            dataType: "json",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
          }).done(function (res) {
            var response = res.replace(/['"]+/g, "");
            if (response == "ok") {
              Swal.fire({
                icon: "success",
                title: "¡Documento eliminado correctamente!",
                confirmButtonText: "Cerrar",
              }).then((result) => {
                if (result.isConfirmed) {
                  switch (tipoDocumento) {
                    case "requisicion":
                      listaRequisiciones();
                      break;
                    case "pedido":
                      listaPedidos();
                      break;
                    case "autorizacion":
                      listaAutorizaciones();
                      break;
                  }
                }
              });
            } else {
              Swal.fire({
                icon: "danger",
                title: "¡El documento no pudo eliminarse",
                confirmButtonText: "Cerrar",
              });
            }
          });
        } else {
          Swal.fire({
            icon: "info",
            title:
              "¡El documento no puede ser eliminado porque ya se encuentra en revisión!",
            confirmButtonText: "Cerrar",
          });
        }
      });
    } else {
    }
  });
}
function cargarListaProductosEcommerce(page) {
  var per_page = $("#per_page").val();
  var vista = "cargarListaProductosEcommerce";
  var arregloMarca = JSON.parse(localStorage.getItem("arrayMarca"));
  var arregloProductos = JSON.parse(localStorage.getItem("arrayProductos"));
  var estatusFacebook = $("#estatusFacebook").val();
  var categoria = $("#categoria").val();
  var clasificacion = $("#clasificacion").val();
  var almacen = $("option:selected", "#almacen").attr("idAlmacen");

  var almacen2 = $("#almacen").val();
  var campoOrden = $("#campoOrden").val();
  var orden = $("#orden").val();
  var utilidad = $("#utilidad").val();
  var utilidadMl = $("#utilidadMl").val();
  var periodo = $("#periodo").val();

  if (arregloProductos === null) {
    localStorage.setItem("arrayProductos", "[]");
    var producto = "";
  } else {
    if (arregloProductos == "[]") {
      var producto = "";
    } else {
      var producto = arregloProductos.toString();
    }
  }
  if (arregloMarca === null) {
    localStorage.setItem("arrayMarca", "[]");
    var marca = "";
  } else {
    if (arregloMarca == "[]") {
      var marca = "";
    } else {
      var marca = arregloMarca.toString();
    }
  }
  var parametros = {
    action: "listadoProductosEcommerce",
    page: page,
    per_page: per_page,
    estatusFacebook: estatusFacebook,
    categoria: categoria,
    clasificacion: clasificacion,
    almacen: almacen,
    almacen2: almacen2,
    producto: producto,
    marca: marca,
    campoOrden: campoOrden,
    orden: orden,
    utilidad: utilidad,
    utilidadMl: utilidadMl,
    periodo: periodo,
    vista: vista,
  };
  $("#loader").fadeIn("slow");
  $.ajax({
    url: "ajax/listadoProductos.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Buscando...");
    },
    success: function (data) {
      $(".data").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function actualizarEstatusAprobacion(
  tipoDocumento,
  tabla,
  folio,
  estatus,
  tipoDetalle
) {
  var datas = new FormData();
  datas.append("accion", "estatusDocumento");
  datas.append("folioDocumento", folio);
  datas.append("tabla", tabla);

  $.ajax({
    url: "ajax/inventariosFunctions.ajax.php",
    type: "post",
    dataType: "json",
    data: datas,
    cache: false,
    contentType: false,
    processData: false,
  }).done(function (response) {
    if (response["idEstatus"] == 1) {
      var datos = new FormData();
      datos.append("accion", "updateEstatusDocumento");
      datos.append("folioDocumento", folio);
      datos.append("estatus", estatus);
      datos.append("tabla", tabla);

      $.ajax({
        url: "ajax/inventariosFunctions.ajax.php",
        type: "post",
        dataType: "json",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
      }).done(function (res) {
        var response = res.replace(/['"]+/g, "");
        if (response == "ok") {
          localStorage.setItem("tipoDocumento", tipoDocumento);
          localStorage.setItem("tablaDocumento", tabla);
          localStorage.setItem("folioDocumento", folio);
          localStorage.setItem("tipoDetalleDocumento", tipoDetalle);
          localStorage.setItem("estatusDocumento", 2);
          switch (tabla) {
            case "requisiciones":
              var url = "editarRequisicion";
              break;
            case "pedidos":
              var url = "editarPedido";
              break;
          }
          window.location.href = url;
        }
      });
    } else {
      localStorage.setItem("tipoDocumento", tipoDocumento);
      localStorage.setItem("tablaDocumento", tabla);
      localStorage.setItem("folioDocumento", folio);
      localStorage.setItem("tipoDetalleDocumento", tipoDetalle);
      localStorage.setItem("estatusDocumento", response["idEstatus"]);
      switch (tabla) {
        case "requisiciones":
          var url = "editarRequisicion";
          break;
        case "pedidos":
          var url = "editarPedido";
          break;
      }
      window.location.href = url;
    }
  });
}
function aprobarDocumento(documento) {
  var aprobado = $("#cantidadTotalAprobada").val();
  var importeAprobado = parseFloat(
    $("#importeTotalAprobado").val().replace(/[$,]/g, "")
  );
  var pendiente = $("#cantidadTotalPendiente").val();
  var importePendiente = parseFloat(
    $("#importeTotalPendiente").val().replace(/[$,]/g, "")
  );
  var observaciones = $("#observacionesRevision").val();
  var folioDocumento = localStorage.folioDocumento;
  var aprobador = idUsuario;
  var datos = new FormData();
  datos.append("accion", "actualizarDocumentoAprobado");
  datos.append("aprobado", aprobado);
  datos.append("importeAprobado", importeAprobado);
  datos.append("pendiente", pendiente);
  datos.append("importePendiente", importePendiente);
  datos.append("documento", documento);
  datos.append("observaciones", observaciones.trim());
  datos.append("aprobador", aprobador);
  datos.append("folioDocumento", folioDocumento);
  $.ajax({
    url: "ajax/inventariosFunctions.ajax.php",
    type: "post",
    dataType: "json",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
  }).done(function (res) {
    var response = res.replace(/['"]+/g, "");
    if (response != "error") {
      localStorage.removeItem("folioDocumento");
      localStorage.removeItem("estatusDocumento");
      localStorage.removeItem("tipoDetalleDocumento");
      Swal.fire({
        icon: "success",
        title: "¡Documento aprobado correctamente!",
        showConfirmButton: false,
        timer: 1500,
      });
      setInterval(() => {
        window.location.href = "" + documento + "";
      }, 200);
    }
  });
}
function generarContratipo(el) {
  var row = $(el).parents("tr");
  var idProducto = row.find(".idProducto").attr("idProducto");
}
function finalizarDocumento(tabla) {
  var datos = new FormData();
  datos.append("accion", "updateEstatusDocumento");
  datos.append("folioDocumento", localStorage.folioDocumento);
  datos.append("estatus", 4);
  datos.append("tabla", tabla);

  $.ajax({
    url: "ajax/inventariosFunctions.ajax.php",
    type: "post",
    dataType: "json",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
  }).done(function (res) {
    var response = res.replace(/['"]+/g, "");
    if (response == "ok") {
      localStorage.removeItem("tipoDocumento");
      localStorage.removeItem("tablaDocumento");
      localStorage.removeItem("folioDocumento");
      localStorage.removeItem("estatusDocumento");
      localStorage.removeItem("tipoDetalleDocumento");
      Swal.fire({
        icon: "success",
        title: "¡Documento finalizado correctamente!",
        showConfirmButton: false,
        timer: 1500,
      });
      setInterval(() => {
        window.location.href = tabla;
      }, 300);
    }
  });
}
function productosAlmacenes() {
  cargarListaProductosAlmacenes(1).then(function () {
    sumaTotalExistencias();
  });
}
function cargarListaProductosAlmacenes(page) {
  return new Promise((resolve, reject) => {
    var per_page = $("#per_page").val();
    var vista = "cargarListaProductosAlmacenes";
    var arregloMarca = JSON.parse(localStorage.getItem("arrayMarca"));
    var arregloProductos = JSON.parse(localStorage.getItem("arrayProductos"));
    var categoria = $("#categoria").val();
    var clasificacion = $("#clasificacion").val();
    var almacen = $("option:selected", "#almacen").attr("idAlmacen");
    var almacen2 = $("#almacen").val();
    var campoOrden = $("#campoOrden").val();
    var orden = $("#orden").val();
    var periodo = $("#periodo").val();

    if (arregloProductos === null) {
      localStorage.setItem("arrayProductos", "[]");
      var producto = "";
    } else {
      if (arregloProductos == "[]") {
        var producto = "";
      } else {
        var producto = arregloProductos.toString();
      }
    }
    if (arregloMarca === null) {
      localStorage.setItem("arrayMarca", "[]");
      var marca = "";
    } else {
      if (arregloMarca == "[]") {
        var marca = "";
      } else {
        var marca = arregloMarca.toString();
      }
    }
    var parametros = {
      action: "listadoProductosAlmacenes",
      page: page,
      per_page: per_page,
      categoria: categoria,
      clasificacion: clasificacion,
      almacen: almacen,
      almacen2: almacen2,
      producto: producto,
      marca: marca,
      campoOrden: campoOrden,
      orden: orden,
      periodo: periodo,
      vista: vista,
    };
    $("#loader").fadeIn("slow");
    $.ajax({
      url: "ajax/listadoProductos.ajax.php",
      data: parametros,
      beforeSend: function (objeto) {
        $("#loader").html("Buscando...");
      },
      success: function (data) {
        $(".data").html(data).fadeIn("slow");
        $("#loader").html("");
      },
    }).then(() => {
      resolve(100);
    });
  });
}
function productosPorAgotarse() {
  cargarListaProductosAgotarse(1).then(function () {
    sumaTotalExistencias();
  });
}
function cargarListaProductosAgotarse(page) {
  return new Promise((resolve, reject) => {
    var per_page = $("#per_page").val();
    var vista = "cargarListaProductosAgotarse";
    var arregloMarca = JSON.parse(localStorage.getItem("arrayMarca"));
    var arregloProductos = JSON.parse(localStorage.getItem("arrayProductos"));
    var categoria = $("#categoria").val();
    var clasificacion = $("#clasificacion").val();
    var almacen = $("option:selected", "#almacen").attr("idAlmacen");
    var almacen2 = $("#almacen").val();
    var campoOrden = $("#campoOrden").val();
    var orden = $("#orden").val();
    var periodo = $("#periodo").val();
    var estatus = $("#estatus").val();

    if (arregloProductos === null) {
      localStorage.setItem("arrayProductos", "[]");
      var producto = "";
    } else {
      if (arregloProductos == "[]") {
        var producto = "";
      } else {
        var producto = arregloProductos.toString();
      }
    }
    if (arregloMarca === null) {
      localStorage.setItem("arrayMarca", "[]");
      var marca = "";
    } else {
      if (arregloMarca == "[]") {
        var marca = "";
      } else {
        var marca = arregloMarca.toString();
      }
    }
    var parametros = {
      action: "listadoProductosAgotarse",
      page: page,
      per_page: per_page,
      categoria: categoria,
      clasificacion: clasificacion,
      almacen: almacen,
      almacen2: almacen2,
      producto: producto,
      marca: marca,
      campoOrden: campoOrden,
      orden: orden,
      periodo: periodo,
      estatus: estatus,
      vista: vista,
    };
    $("#loader").fadeIn("slow");
    $.ajax({
      url: "ajax/listadoProductos.ajax.php",
      data: parametros,
      beforeSend: function (objeto) {
        $("#loader").html("Buscando...");
      },
      success: function (data) {
        $(".data").html(data).fadeIn("slow");
        $("#loader").html("");
      },
    }).then(() => {
      resolve(100);
    });
  });
}
function obtenerSalidasProducto(empresa, codigo, almacen, almacen2, periodo) {
  var datos = new FormData();
  datos.append("accion", "detalleSalidasProducto");
  datos.append("empresa", empresa);
  datos.append("codigo", codigo);
  datos.append("idAlmacen", almacen);
  datos.append("idAlmacen2", almacen2);
  datos.append("periodo", periodo);
  $("#modalDetalleSalidas").modal();
  $.ajax({
    url: "ajax/inventariosFunctions.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      $("#codigoDetalle").html(codigo);
      var response = respuesta;

      switch (periodo) {
        case 1:
          var listaCabeceras = [
            "Jul",
            "Ago",
            "Sep",
            "Oct",
            "Nov",
            "Dic",
            "Total",
          ];
          break;
        case 2:
          var listaCabeceras = [
            "Ago",
            "Sep",
            "Oct",
            "Nov",
            "Dic",
            "Ene",
            "Total",
          ];
          break;
        case 3:
          var listaCabeceras = [
            "Sep",
            "Oct",
            "Nov",
            "Dic",
            "Ene",
            "Feb",
            "Total",
          ];
          break;
        case 4:
          var listaCabeceras = [
            "Oct",
            "Nov",
            "Dic",
            "Ene",
            "Feb",
            "Mar",
            "Total",
          ];
          break;
        case 5:
          var listaCabeceras = [
            "Nov",
            "Dic",
            "Ene",
            "Feb",
            "Mar",
            "Abr",
            "Total",
          ];
          break;
        case 6:
          var listaCabeceras = [
            "Dic",
            "Ene",
            "Feb",
            "Mar",
            "Abr",
            "May",
            "Total",
          ];
          break;
        case 7:
          var listaCabeceras = [
            "Ene",
            "Feb",
            "Mar",
            "Abr",
            "May",
            "Jun",
            "Total",
          ];
          break;
        case 8:
          var listaCabeceras = [
            "Feb",
            "Mar",
            "Abr",
            "May",
            "Jun",
            "Jul",
            "Total",
          ];
          break;
        case 9:
          var listaCabeceras = [
            "Mar",
            "Abr",
            "May",
            "Jun",
            "Jul",
            "Ago",
            "Total",
          ];
          break;
        case 10:
          var listaCabeceras = [
            "Abr",
            "May",
            "Jun",
            "Jul",
            "Ago",
            "Sep",
            "Total",
          ];
          break;
        case 11:
          var listaCabeceras = [
            "May",
            "Jun",
            "Jul",
            "Ago",
            "Sep",
            "Oct",
            "Total",
          ];
          break;
        case 12:
          var listaCabeceras = [
            "Jun",
            "Jul",
            "Ago",
            "Sep",
            "Oct",
            "Nov",
            "Total",
          ];
          break;
      }

      body = document.getElementById("tablaDetalleSalidas");

      thead = document.createElement("thead");

      theadTr = document.createElement("tr");

      for (var h = 0; h < listaCabeceras.length; h++) {
        var celdaThead = document.createElement("th");
        var textoCeldaThead = document.createTextNode(listaCabeceras[h]);
        celdaThead.appendChild(textoCeldaThead);
        theadTr.appendChild(celdaThead);
      }

      thead.appendChild(theadTr);

      tblBody = document.createElement("tbody");

      var arregloNombres = ["1", "2", "3", "4", "5", "6", "total"];

      // Crea las celdas

      for (var i = 0; i < 1; i++) {
        // Crea las hileras de la tabla
        var hilera = document.createElement("tr");

        for (var j = 0; j < arregloNombres.length; j++) {
          var celda = document.createElement("td");
          var valor = response[arregloNombres[j]];
          var dato = parseFloat(valor).toFixed(2);
          var textoCelda = document.createTextNode(formatNumber(dato));
          celda.appendChild(textoCelda);
          hilera.appendChild(celda);
        }

        // agrega la hilera al final de la tabla (al final del elemento tblbody)
        tblBody.appendChild(hilera);
      }

      // appends <table> into <body>
      body.appendChild(tblBody);
      body.appendChild(thead);
    },
  });
}
$(".btnCerrarDetalleSalidas").click(function () {
  var nodos = document.getElementById("tablaDetalleSalidas");
  while (nodos.firstChild) {
    nodos.removeChild(nodos.firstChild);
  }
});
function sumaTotalExistencias() {
  const noTruncarDecimales = { maximumFractionDigits: 2 };
  /****UNIDADES EXISTENCIAS */
  var total = 0;
  var totalMinimo = 0;
  $(".totalExistencias").each(function () {
    if (isNaN(parseFloat($(this).text()))) {
      total += 0;
    } else {
      total += parseFloat($(this).text());
    }
  });
  $(".totalMinimo").each(function () {
    if (isNaN(parseFloat($(this).text()))) {
      totalMinimo += 0;
    } else {
      totalMinimo += parseFloat($(this).text());
    }
  });
  $("#totalMinimoTh").html(
    "#" + totalMinimo.toLocaleString("es-MX", noTruncarDecimales)
  );
  $("#totalExistenciasTh").html(
    "#" + total.toLocaleString("es-MX", noTruncarDecimales)
  );
  /****MONTO EXISTENCIAS */
  var monto = 0;
  $(".montoExistencias").each(function () {
    var montoTotal = $(this).text();
    montoTotal = parseFloat(montoTotal.replace(/[$,]/g, ""));
    if (isNaN(parseFloat(montoTotal))) {
      monto += 0;
    } else {
      monto += parseFloat(montoTotal);
    }
  });
  $("#montoExistenciasTh").html(
    "$" + monto.toLocaleString("es-MX", noTruncarDecimales)
  );
  /****TOTAL FALTANTE */
  var faltante = 0;
  $(".totalDiferencia").each(function () {
    var faltantes = $(this).text();
    if (isNaN(parseFloat(faltantes))) {
      faltante += 0;
    } else {
      faltante += parseFloat(faltantes);
    }
  });

  $("#totalPorAgotarse").html(
    "#" + faltante.toLocaleString("es-MX", noTruncarDecimales)
  );
  $("#totalDiferenciaTh").html(
    "#" + faltante.toLocaleString("es-MX", noTruncarDecimales)
  );
  /****MONTO MINIMOS */
  var montoDiferencia = 0;
  $(".montoDiferencia").each(function () {
    var montoDiferenciaTotal = $(this).text();
    montoDiferenciaTotal = parseFloat(
      montoDiferenciaTotal.replace(/[$,]/g, "")
    );
    if (isNaN(parseFloat(montoDiferenciaTotal))) {
      montoDiferencia += 0;
    } else {
      montoDiferencia += parseFloat(montoDiferenciaTotal);
    }
  });
  $("#montoPorAgotarse").html(
    "$" + montoDiferencia.toLocaleString("es-MX", noTruncarDecimales)
  );
  $("#montoDiferenciaTh").html(
    "$" + montoDiferencia.toLocaleString("es-MX", noTruncarDecimales)
  );
}
function listaRequisicionesFaltantes() {
  if (
    localStorage.grupoUsuario === "Administracion" ||
    localStorage.grupoUsuario === "Almacen"
  ) {
    cargarListaRequisicionesFaltantesAdmin(1);
    document.getElementById("btnListaSucursales").style.display = "";
    document
      .getElementById("btnRefresh")
      .setAttribute("onclick", "cargarListaRequisicionesFaltantesAdmin(1)");
  } else {
    cargarListaRequisicionesFaltantes(1);
    document
      .getElementById("btnRefresh")
      .setAttribute("onclick", "cargarListaRequisicionesFaltantes(1)");
  }
}
function cargarListaRequisicionesFaltantes(page) {
  var per_page = $("#per_page").val();
  var vista = "cargarListaRequisicionesFaltantes";
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var prioridad = $("#prioridad").val();
  var estatus = $("#estatus").val();
  var parametros = {
    action: "listaRequisicionesFaltantes",
    page: page,
    usuario: idUsuario,
    per_page: per_page,
    prioridad: prioridad,
    estatus: estatus,
    campo: campo,
    orden: orden,
    vista: vista,
  };
  $("#loader").fadeIn("slow");
  $.ajax({
    url: "ajax/requisiciones.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Buscando...");
    },
    success: function (data) {
      $(".data").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarListaRequisicionesFaltantesAdmin(page) {
  var per_page = $("#per_page").val();
  var vista = "cargarListaRequisicionesFaltantesAdmin";
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var prioridad = $("#prioridad").val();
  var estatus = $("#estatus").val();
  var sucursal = $("#sucursal").val();
  var parametros = {
    action: "listaRequisicionesFaltantesAdmin",
    page: page,
    usuario: idUsuario,
    per_page: per_page,
    prioridad: prioridad,
    estatus: estatus,
    sucursal: sucursal,
    campo: campo,
    orden: orden,
    vista: vista,
  };
  $("#loader").fadeIn("slow");
  $.ajax({
    url: "ajax/requisiciones.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Buscando...");
    },
    success: function (data) {
      $(".data").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function autorizacionCompra() {
  if (localStorage.tipoDocumento === "1") {
    var serieDocumento = "REMA";
    var documento = "requisiciones";
  } else if (localStorage.tipoDocumento === "2") {
    var serieDocumento = "PDMA";
    var documento = "pedidos";
  }
  var solicitado = $("#cantidadTotalPendiente").val();
  var importeSolicitado = parseFloat(
    $("#importeTotalPendiente").val().replace(/[$,]/g, "")
  );

  var folioDocumento = localStorage.folioDocumento;
  var tipoDocumento = localStorage.tipoDocumento;
  var datos = new FormData();
  datos.append("accion", "generarAutorizacionCompra");
  datos.append("serieDocumento", serieDocumento);
  datos.append("folioDocumento", folioDocumento);
  datos.append("tipoDocumento", tipoDocumento);
  datos.append("unidades", solicitado);
  datos.append("importe", importeSolicitado);

  $.ajax({
    url: "ajax/inventariosFunctions.ajax.php",
    type: "post",
    dataType: "json",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
  }).done(function (res) {
    var response = res.replace(/['"]+/g, "");
    if (response != "error") {
      localStorage.removeItem("tipoDocumento");
      localStorage.removeItem("tablaDocumento");
      localStorage.removeItem("folioDocumento");
      localStorage.removeItem("estatusDocumento");
      localStorage.removeItem("tipoDetalleDocumento");
      Swal.fire({
        icon: "success",
        title: "¡Documento generado correctamente!",
        showConfirmButton: false,
        timer: 1500,
      });
      setInterval(() => {
        window.location.href = "" + documento + "";
      }, 300);
    }
  });
}
function listaAutorizaciones() {
  if (
    localStorage.grupoUsuario === "Administracion" ||
    localStorage.grupoUsuario === "Almacen"
  ) {
    cargarListaAutorizacionesAdmin(1);
    document.getElementById("btnListaSucursales").style.display = "";
    document
      .getElementById("btnRefresh")
      .setAttribute("onclick", "cargarListaAutorizacionesAdmin(1)");
  } else {
    cargarListaAutorizaciones(1);
    document
      .getElementById("btnRefresh")
      .setAttribute("onclick", "cargarListaAutorizaciones(1)");
  }
}
function cargarListaAutorizaciones(page) {
  var per_page = $("#per_page").val();
  var vista = "cargarListaAutorizaciones";
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var estatus = $("#estatus").val();
  var parametros = {
    action: "listaAutorizaciones",
    page: page,
    usuario: idUsuario,
    per_page: per_page,
    estatus: estatus,
    campo: campo,
    orden: orden,
    vista: vista,
  };
  $("#loader").fadeIn("slow");
  $.ajax({
    url: "ajax/requisiciones.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Buscando...");
    },
    success: function (data) {
      $(".data").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}

function cargarListaAutorizacionesAdmin(page) {
  var per_page = $("#per_page").val();
  var vista = "cargarListaAutorizacionesAdmin";
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var prioridad = $("#prioridad").val();
  var estatus = $("#estatus").val();
  var sucursal = $("#sucursal").val();

  var parametros = {
    action: "listaAutorizacionesAdmin",
    page: page,
    per_page: per_page,
    prioridad: prioridad,
    estatus: estatus,
    sucursal: sucursal,
    campo: campo,
    orden: orden,
    vista: vista,
  };
  $("#loader").fadeIn("slow");
  $.ajax({
    url: "ajax/requisiciones.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Buscando...");
    },
    success: function (data) {
      $(".data").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarListaRequisicionesAdmin(page) {
  var per_page = $("#per_page").val();
  var vista = "cargarListaRequisicionesAdmin";
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var prioridad = $("#prioridad").val();
  var estatus = $("#estatus").val();
  var sucursal = $("#sucursal").val();

  var parametros = {
    action: "listaRequisicionesAdmin",
    page: page,
    per_page: per_page,
    prioridad: prioridad,
    estatus: estatus,
    sucursal: sucursal,
    campo: campo,
    orden: orden,
    vista: vista,
  };
  $("#loader").fadeIn("slow");
  $.ajax({
    url: "ajax/requisiciones.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Buscando...");
    },
    success: function (data) {
      $(".data").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarListaProductosAutorizacion(page, folio) {
  var per_page = 100;
  var vista = "cargarListaProductosAutorizacion";
  if (localStorage.tipoDetalleDocumento === undefined) {
    tipoDetalleDocumento = "completo";
  } else if (localStorage.tipoDetalleDocumento == "completo") {
    tipoDetalleDocumento = "completo";
  } else if (localStorage.tipoDetalleDocumento == "faltante") {
    tipoDetalleDocumento = "faltante";
  } else if (localStorage.tipoDetalleDocumento == "autorizacion") {
    tipoDetalleDocumento = "autorizacion";
  }

  if (
    localStorage.grupoUsuario == "Administracion" ||
    localStorage.grupoUsuario == "Almacen"
  ) {
    var usuario = 0;
    var periodo = $("#periodo").val();
    var parametros = {
      action: "listarProductosRequisicionAdmin",
      page: page,
      usuario: usuario,
      per_page: per_page,
      vista: vista,
      folio: folio,
      periodo: periodo,
      ejercicio: ejercicio,
      tipoDetalleDocumento: tipoDetalleDocumento,
      tipo: localStorage.tipoDocumentoUnion,
    };
  } else {
    var periodo = $("#periodo").val();
    var parametros = {
      action: "listarProductosRequisicionAdmin",
      page: page,
      usuario: idUsuario,
      per_page: per_page,
      vista: vista,
      folio: folio,
      periodo: periodo,
      ejercicio: ejercicio,
      tipoDetalleDocumento: tipoDetalleDocumento,
      tipo: localStorage.tipoDocumentoUnion,
    };
  }

  var datos = new FormData();
  datos.append("accion", "productosAutorizacion");
  datos.append("page", page);
  datos.append("usuario", usuario);
  datos.append("per_page", per_page);
  datos.append("vista", vista);
  datos.append("folio", folio);
  datos.append("periodo", periodo);
  datos.append("ejercicio", ejercicio);
  datos.append("tipoDetalleDocumento", tipoDetalleDocumento);
  datos.append("tipo", localStorage.tipoDocumentoUnion);

  $.ajax({
    url: "ajax/inventariosFunctions.ajax.php",
    type: "post",
    dataType: "json",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
  }).done(function (res) {
    localStorage.setItem("listadoProductos", JSON.stringify(res));
  });
  $.ajax({
    url: "ajax/listarProductosSolicitudes.ajax.php",
    data: parametros,
    success: function (data) {
      if (data != "fail") {
        $(".data").html(data).fadeIn("slow");
        $(".dataFail").html("");
        updateTotalesCart();
        updateTotalesCartAprobado();
        updateTotalesCartPendiente();
        updateTotalesCartSolicitado();
        if (
          localStorage.estatusDocumento == 3 ||
          localStorage.estatusDocumento == 4
        ) {
          var boton = document.getElementsByClassName("btnGenerarContratipo");

          for (var i = 0; i < boton.length; i++) {
            boton[i].style.display = "none";
          }
          var boton2 = document.getElementsByClassName("btnEliminarProducto");

          for (var i = 0; i < boton2.length; i++) {
            boton2[i].style.display = "none";
          }

          var input = document.getElementsByClassName("unidadesAprobadas");

          for (var i = 0; i < input.length; i++) {
            input[i].readOnly = true;
          }
        }
        document.getElementById("unidadesSolicitadas").style.display = "";
        document.getElementById("importeSolicitado").style.display = "";
      } else {
        $(".data").html("");
        updateTotalesCart();
        updateTotalesCartAprobado();
        $(".dataFail").html("<h3></h3>");
      }
    },
  });
}
function ordenCompra(el) {
  var referencia = $("#documento").text();
  var documento = referencia.split(" ");
  var serie = documento[0];
  var folio = documento[1];
  var row = $(el).parents("tr");
  var idClienteProveedor = row.find(".idClienteProveedor").text();
  var rfcClienteProveedor = row.find(".rfcClienteProveedor").text();
  var razonSocialClienteProveedor = row
    .find(".razonSocialClienteProveedor")
    .text();
  var productos = localStorage.listadoProductos;
  var unidades = $("#cantidadTotalSolicitada").val();
  var importe = $("#importeTotalSolicitado").val();
  importe = parseFloat(importe.replace(/[$,]/g, ""));
  var observaciones = $("#observaciones").val();

  var datos = new FormData();
  datos.append("accion", "generarOrdenCompra");
  datos.append("referencia", referencia);
  datos.append("idClienteProveedor", idClienteProveedor);
  datos.append("rfcClienteProveedor", rfcClienteProveedor);
  datos.append("razonSocialClienteProveedor", razonSocialClienteProveedor);
  datos.append("productos", productos);
  datos.append("unidades", unidades);
  datos.append("importe", importe);
  datos.append("serie", serie);
  datos.append("folio", folio);
  datos.append("observaciones", observaciones);

  $.ajax({
    url: "ajax/inventariosFunctions.ajax.php",
    type: "post",
    dataType: "json",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    beforeSend: function (objeto) {
      $("#loadDocument").modal("show");
      $("#titleLoadDocument").html("Generando Orden de Compra...");
    },
    success: function (data) {
      setTimeout(function () {
        $("#titleLoadDocument").html(
          "Orden de Compra Generada Correctamente..."
        );

        localStorage.removeItem("listadoProductos");
        window.location.href = "ordenesCompra";
      }, 2000);
    },
  });
}
function listaOrdenesCompra() {
  document
    .getElementById("btnRefresh")
    .setAttribute("onclick", "cargarListaOrdenesCompra(1)");

  if (
    localStorage.grupoUsuario === "Administracion" ||
    localStorage.grupoUsuario === "Almacen"
  ) {
    document.getElementById("btnListaSucursales").style.display = "";
  }
  cargarListaOrdenesCompra(1);
}
function cargarListaOrdenesCompra(page) {
  var per_page = $("#per_page").val();
  var vista = "cargarListaOrdenesCompra";
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var estatus = $("#estatus").val();
  var sucursal = $("#sucursal").val();
  if (
    localStorage.grupoUsuario === "Administracion" ||
    localStorage.grupoUsuario === "Almacen"
  ) {
    var tipo = 1;
  } else {
    var tipo = 2;
  }
  var parametros = {
    action: "listaOrdenesCompra",
    page: page,
    usuario: idUsuario,
    per_page: per_page,
    estatus: estatus,
    campo: campo,
    orden: orden,
    vista: vista,
    sucursal: sucursal,
    tipo: tipo,
  };
  $("#loader").fadeIn("slow");
  $.ajax({
    url: "ajax/requisiciones.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Buscando...");
    },
    success: function (data) {
      $(".data").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function listaCompras() {
  document
    .getElementById("btnRefresh")
    .setAttribute("onclick", "cargarListaCompras(1)");

  if (
    localStorage.grupoUsuario === "Administracion" ||
    localStorage.grupoUsuario === "Almacen"
  ) {
    document.getElementById("btnListaSucursales").style.display = "";
  }
  cargarListaCompras(1);
}
function cargarListaCompras(page) {
  var per_page = $("#per_page").val();
  var vista = "cargarListaCompras";
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var estatus = $("#estatus").val();
  var sucursal = $("#sucursal").val();
  if (
    localStorage.grupoUsuario === "Administracion" ||
    localStorage.grupoUsuario === "Almacen"
  ) {
    var tipo = 1;
  } else {
    var tipo = 2;
  }
  var parametros = {
    action: "listaCompras",
    page: page,
    usuario: idUsuario,
    per_page: per_page,
    estatus: estatus,
    campo: campo,
    orden: orden,
    vista: vista,
    sucursal: sucursal,
    tipo: tipo,
  };
  $("#loader").fadeIn("slow");
  $.ajax({
    url: "ajax/requisiciones.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Buscando...");
    },
    success: function (data) {
      $(".data").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function detalleMovimientosDocumento(idDocumento) {
  $("#textModal").html("MOVIMIENTOS");
  var datos = new FormData();
  datos.append("accion", "detalleMovimientosDocumento");
  datos.append("idDocumentoDetalle", idDocumento);
  $("#modalMovimientosDocumento").modal();
  $.ajax({
    url: "ajax/admonFunctions.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      var response = respuesta;

      var listaCabeceras = [
        "N° MOVIMIENTO",
        "CÓDIGO",
        "NOMBRE",
        "UNIDADES",
        "UNIDAD",
        "PRECIO",
        "NETO",
        "IMPUESTO",
        "TOTAL",
      ];

      body = document.getElementById("tablaMovimientosDocumento");

      thead = document.createElement("thead");

      theadTr = document.createElement("tr");

      for (var h = 0; h < listaCabeceras.length; h++) {
        var celdaThead = document.createElement("th");
        var textoCeldaThead = document.createTextNode(listaCabeceras[h]);
        celdaThead.appendChild(textoCeldaThead);
        theadTr.appendChild(celdaThead);
      }

      thead.appendChild(theadTr);

      tblBody = document.createElement("tbody");

      var arregloNombres = [
        "CNUMEROMOVIMIENTO",
        "CCODIGOPRODUCTO",
        "CNOMBREPRODUCTO",
        "CUNIDADESCAPTURADAS",
        "CNOMBREUNIDAD",
        "CPRECIOCAPTURADO",
        "CNETO",
        "CIMPUESTO1",
        "TOTAL",
      ];

      // Crea las celdas
      var acumuladoNeto = 0;
      var acumuladoTotal = 0;
      for (var i = 0; i < response.length; i++) {
        // Crea las hileras de la tabla
        var hilera = document.createElement("tr");
        for (var j = 0; j < arregloNombres.length; j++) {
          var celda = document.createElement("td");
          if (arregloNombres[j] == "CIDPRODUCTO") {
            var valor = parseInt(response[i][arregloNombres[j]]);
          } else if (
            arregloNombres[j] == "CPRECIOCAPTURADO" ||
            arregloNombres[j] == "CNETO" ||
            arregloNombres[j] == "CIMPUESTO1" ||
            arregloNombres[j] == "TOTAL"
          ) {
            if (response[i][arregloNombres[j]] === null) {
              var monto = 0;
            } else {
              var monto = response[i][arregloNombres[j]];
            }
            var valor2 = parseFloat(monto);

            valor = "$" + formatNumber(parseFloat(Math.abs(valor2).toFixed(2)));
            if (arregloNombres[j] == "CNETO") {
              acumuladoNeto =
                acumuladoNeto + parseFloat(Math.abs(valor2).toFixed(2));
            }
            if (arregloNombres[j] == "TOTAL") {
              acumuladoTotal =
                acumuladoTotal + parseFloat(Math.abs(valor2).toFixed(2));
            }
          } else {
            var valor = response[i][arregloNombres[j]];
          }

          var textoCelda = document.createTextNode(valor);
          celda.appendChild(textoCelda);
          hilera.appendChild(celda);
        }

        // agrega la hilera al final de la tabla (al final del elemento tblbody)
        tblBody.appendChild(hilera);
      }
      var hilera = document.createElement("tr");
      hilera.style.background = "#00BCD4";
      hilera.style.color = "#ffffff";
      for (var j = 0; j < arregloNombres.length; j++) {
        var celda = document.createElement("td");
        celda.style.color = "#ffffff";
        celda.style.fontWeight = "900";
        if (arregloNombres[j] == "CNETO") {
          valor = "$" + formatNumber(parseFloat(acumuladoNeto.toFixed(2)));
        } else if (arregloNombres[j] == "TOTAL") {
          valor = "$ " + formatNumber(parseFloat(acumuladoTotal.toFixed(2)));
        } else {
          valor = "";
        }

        var textoCelda = document.createTextNode(valor);
        celda.appendChild(textoCelda);
        hilera.appendChild(celda);
      }
      tblBody.appendChild(hilera);
      // appends <table> into <body>
      body.appendChild(tblBody);
      body.appendChild(thead);
    },
  });
}
$(".btnCerrarMovimientosDocumento").click(function () {
  var nodos = document.getElementById("tablaMovimientosDocumento");
  while (nodos.firstChild) {
    nodos.removeChild(nodos.firstChild);
  }
});
function listaRecordatorios() {
  if (
    localStorage.grupoUsuario === "Administracion" ||
    localStorage.grupoUsuario === "Almacen"
  ) {
    document.getElementById("btnListaSucursales").style.display = "";
    document.getElementById("btnActualizarRecordatorio").style.display = "";
    document.getElementById("btnEliminarRecordatorio").style.display = "";
    var usuario = $("#sucursal").val();
    var tipoUsuario = 1;
  } else {
    var tipoUsuario = 2;
    document.getElementById("evtStart").setAttribute("readonly", "");
    document.getElementById("evtEnd").setAttribute("readonly", "");
    document.getElementById("evtMensaje").setAttribute("readonly", "");
  }
  var datos = new FormData();
  datos.append("accion", "listaRecordatorios");
  datos.append("usuario", usuario);
  datos.append("tipoUsuario", tipoUsuario);
  $.ajax({
    url: "ajax/inventariosFunctions.ajax.php",
    type: "post",
    dataType: "json",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
  }).done(function (res) {
    cargarRecordatorios(res);
  });
}
function generarRecordatorio() {
  var start = $("#evtCrearStart").val();
  var end = $("#evtCrearEnd").val();
  var titulo = $("#evtCrearTitulo").val();
  var color = $("#evtCrearAccion").val();
  var mensaje = $("#evtCrearMensaje").val();
  var startDate = formatIsoToDate(start);
  var endDate = formatIsoToDate(end);
  var sucursal = $("#evtCrearSucursal").val();
  if (start === "" && end === "") {
    Swal.fire({
      icon: "warning",
      title: "¡Elegir las fechas del recordatorio!",
      showConfirmButton: false,
      timer: 1500,
    });
  } else {
    var datos = new FormData();
    datos.append("accion", "generarRecordatorio");
    datos.append("titulo", titulo);
    datos.append("color", color);
    datos.append("mensaje", mensaje);
    datos.append("startDate", startDate);
    datos.append("endDate", endDate);
    datos.append("usuario", idUsuario);
    datos.append("sucursal", sucursal);
    $.ajax({
      url: "ajax/inventariosFunctions.ajax.php",
      type: "post",
      dataType: "json",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
    }).done(function (res) {
      var response = res.replace(/['"]+/g, "");
      if (response == "ok") {
        $("#modalCrearRecordatorio").modal("hide");
        Swal.fire({
          icon: "success",
          title: "¡Recordatorio Generado Correctamente!",
          showConfirmButton: false,
          timer: 1500,
        });
        listaRecordatorios();
      }
    });
  }
}
function detalleRecordatorio(id) {
  var datos = new FormData();
  datos.append("accion", "detalleRecordatorio");
  datos.append("id", id);
  $.ajax({
    url: "ajax/inventariosFunctions.ajax.php",
    type: "post",
    dataType: "json",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
  }).done(function (res) {
    var titulo = res["titulo"];
    var mensaje = res["mensaje"];
    var start = res["start"];
    var end = res["end"];
    var solicitante = res["Solicitante"];
    var idRecordatorio = res["id"];
    $("#evtId").val(idRecordatorio);
    $("#evtMensaje").val(mensaje);
    $("#evtSolicitante").val(solicitante);
    $("#titleModal").html(titulo);

    var nowStart = new Date(start);
    nowStart.setMinutes(nowStart.getMinutes() - nowStart.getTimezoneOffset());
    document.getElementById("evtStart").value = nowStart
      .toISOString()
      .slice(0, 16);

    var nowEnd = new Date(end);
    nowEnd.setMinutes(nowEnd.getMinutes() - nowEnd.getTimezoneOffset());
    document.getElementById("evtEnd").value = nowEnd.toISOString().slice(0, 16);
  });
}
function actualizarRecordatorio() {
  var start = $("#evtStart").val();
  var end = $("#evtEnd").val();
  var mensaje = $("#evtMensaje").val();
  var startDate = formatIsoToDate(start);
  var endDate = formatIsoToDate(end);
  var id = $("#evtId").val();

  var datos = new FormData();
  datos.append("accion", "actualizarRecordatorio");
  datos.append("mensaje", mensaje);
  datos.append("startDate", startDate);
  datos.append("endDate", endDate);
  datos.append("id", id);
  $.ajax({
    url: "ajax/inventariosFunctions.ajax.php",
    type: "post",
    dataType: "json",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
  }).done(function (res) {
    var response = res.replace(/['"]+/g, "");
    if (response == "ok") {
      $("#modalDetalleRecordatorio").modal("hide");
      Swal.fire({
        icon: "success",
        title: "¡Recordatorio Actualizado Correctamente!",
        showConfirmButton: false,
        timer: 1500,
      });
      listaRecordatorios();
    }
  });
}
function eliminarRecordatorio() {
  var id = $("#evtId").val();

  var datos = new FormData();
  datos.append("accion", "eliminarRecordatorio");
  datos.append("id", id);
  $.ajax({
    url: "ajax/inventariosFunctions.ajax.php",
    type: "post",
    dataType: "json",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
  }).done(function (res) {
    var response = res.replace(/['"]+/g, "");
    if (response == "ok") {
      $("#modalDetalleRecordatorio").modal("hide");
      Swal.fire({
        icon: "success",
        title: "¡Recordatorio Eliminado Correctamente!",
        showConfirmButton: false,
        timer: 1200,
      });
      listaRecordatorios();
    }
  });
}
/*****CREACION DE PEDIDOS******/
function listaPedidos() {
  if (
    localStorage.grupoUsuario === "Administracion" ||
    localStorage.grupoUsuario === "Almacen"
  ) {
    cargarListaPedidosAdmin(1);
    document.getElementById("btnListaSucursales").style.display = "";
    document
      .getElementById("btnRefresh")
      .setAttribute("onclick", "cargarListaPedidosAdmin(1)");
  } else {
    cargarListaPedidos(1);
    document.getElementById("btnRealizarPedidos").style.display = "";
    document
      .getElementById("btnRefresh")
      .setAttribute("onclick", "cargarListaPedidos(1)");
  }
}
function cargarListaPedidos(page) {
  var per_page = $("#per_page").val();
  var vista = "cargarListaPedidos";
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var prioridad = $("#prioridad").val();
  var estatus = $("#estatus").val();
  var parametros = {
    action: "listaPedidos",
    page: page,
    usuario: idUsuario,
    per_page: per_page,
    prioridad: prioridad,
    estatus: estatus,
    campo: campo,
    orden: orden,
    vista: vista,
  };
  $("#loader").fadeIn("slow");
  $.ajax({
    url: "ajax/pedidos.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Buscando...");
    },
    success: function (data) {
      $(".data").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}

function cargarListaPedidosAdmin(page) {
  var per_page = $("#per_page").val();
  var vista = "cargarListaPedidosAdmin";
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var prioridad = $("#prioridad").val();
  var estatus = $("#estatus").val();
  var sucursal = $("#sucursal").val();

  var parametros = {
    action: "listaPedidosAdmin",
    page: page,
    per_page: per_page,
    prioridad: prioridad,
    estatus: estatus,
    sucursal: sucursal,
    campo: campo,
    orden: orden,
    vista: vista,
  };
  $("#loader").fadeIn("slow");
  $.ajax({
    url: "ajax/pedidos.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Buscando...");
    },
    success: function (data) {
      $(".data").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarListaProductosPedido(page, folio) {
  var per_page = 100;
  var vista = "cargarListaProductosPedido";
  if (localStorage.tipoDetalleDocumento === undefined) {
    tipoDetalleDocumento = "completo";
  } else if (localStorage.tipoDetalleDocumento == "completo") {
    tipoDetalleDocumento = "completo";
  } else if (localStorage.tipoDetalleDocumento == "faltante") {
    tipoDetalleDocumento = "faltante";
  }

  if (
    localStorage.grupoUsuario == "Administracion" ||
    localStorage.grupoUsuario == "Almacen"
  ) {
    var usuario = 0;
    var periodo = $("#periodo").val();
    var parametros = {
      action: "listarProductosPedidosAdmin",
      page: page,
      usuario: usuario,
      per_page: per_page,
      vista: vista,
      folio: folio,
      periodo: periodo,
      ejercicio: ejercicio,
      tipoDetalleDocumento: tipoDetalleDocumento,
      tipo: localStorage.tipoDocumento,
    };
  } else {
    if (
      localStorage.estatusDocumento == 3 ||
      localStorage.estatusDocumento == 4
    ) {
      var usuario = 0;
      var periodo = $("#periodo").val();
      var parametros = {
        action: "listarProductosPedidosAdmin",
        page: page,
        usuario: usuario,
        per_page: per_page,
        vista: vista,
        folio: folio,
        periodo: periodo,
        ejercicio: ejercicio,
        tipoDetalleDocumento: tipoDetalleDocumento,
        tipo: localStorage.tipoDocumento,
      };
    } else {
      var parametros = {
        action: "listarProductosPedidos",
        page: page,
        usuario: idUsuario,
        per_page: per_page,
        vista: vista,
        folio: folio,
        tipo: localStorage.tipoDocumento,
        tipoDetalleDocumento: "",
      };
    }
  }

  $.ajax({
    url: "ajax/listarProductosSolicitudes.ajax.php",
    data: parametros,
    success: function (data) {
      if (data != "fail") {
        $(".data").html(data).fadeIn("slow");
        $(".dataFail").html("");
        updateTotalesCart();
        updateTotalesCartAprobado();
        updateTotalesCartPendiente();
        if (
          localStorage.estatusDocumento == 3 ||
          localStorage.estatusDocumento == 4
        ) {
          var boton = document.getElementsByClassName("btnGenerarContratipo");

          for (var i = 0; i < boton.length; i++) {
            boton[i].style.display = "none";
          }
          var boton2 = document.getElementsByClassName("btnEliminarProducto");

          for (var i = 0; i < boton2.length; i++) {
            boton2[i].style.display = "none";
          }

          var input = document.getElementsByClassName("unidadesAprobadas");

          for (var i = 0; i < input.length; i++) {
            input[i].readOnly = true;
          }
        }
      } else {
        $(".data").html("");
        updateTotalesCart();
        updateTotalesCartAprobado();
        $(".dataFail").html("<h3></h3>");
      }
    },
  });
}
function listaPedidosFaltantes() {
  if (
    localStorage.grupoUsuario === "Administracion" ||
    localStorage.grupoUsuario === "Almacen"
  ) {
    cargarListaPedidosFaltantesAdmin(1);
    document.getElementById("btnListaSucursales").style.display = "";
    document
      .getElementById("btnRefresh")
      .setAttribute("onclick", "cargarListaPedidosFaltantesAdmin(1)");
  } else {
    cargarListaPedidosFaltantes(1);
    document
      .getElementById("btnRefresh")
      .setAttribute("onclick", "cargarListaPedidosFaltantes(1)");
  }
}
function cargarListaPedidosFaltantes(page) {
  var per_page = $("#per_page").val();
  var vista = "cargarListaPedidosFaltantes";
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var prioridad = $("#prioridad").val();
  var parametros = {
    action: "listaPedidosFaltantes",
    page: page,
    usuario: idUsuario,
    per_page: per_page,
    prioridad: prioridad,
    campo: campo,
    orden: orden,
    vista: vista,
  };
  $("#loader").fadeIn("slow");
  $.ajax({
    url: "ajax/pedidos.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Buscando...");
    },
    success: function (data) {
      $(".data").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarListaPedidosFaltantesAdmin(page) {
  var per_page = $("#per_page").val();
  var vista = "cargarListaPedidosFaltantesAdmin";
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var prioridad = $("#prioridad").val();
  var sucursal = $("#sucursal").val();
  var parametros = {
    action: "listaPedidosFaltantesAdmin",
    page: page,
    usuario: idUsuario,
    per_page: per_page,
    prioridad: prioridad,
    sucursal: sucursal,
    campo: campo,
    orden: orden,
    vista: vista,
  };
  $("#loader").fadeIn("slow");
  $.ajax({
    url: "ajax/pedidos.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Buscando...");
    },
    success: function (data) {
      $(".data").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
/*****CREACION DE PEDIDOS******/
function listaInventarios() {
  if (
    localStorage.grupoUsuario === "Administracion" ||
    localStorage.grupoUsuario === "Almacen"
  ) {
    cargarListaInventarios(1);
    document.getElementById("btnListaSucursales").style.display = "";
    document
      .getElementById("btnRefresh")
      .setAttribute("onclick", "cargarListaInventarios(1)");
  } else {
    cargarListaInventarios(1);
    document
      .getElementById("btnRefresh")
      .setAttribute("onclick", "cargarListaInventarios(1)");
  }
}
function cargarListaInventarios(page) {
  var per_page = $("#per_page").val();
  var sucursal = $("#sucursal").val();
  var vista = "cargarListaInventarios";
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var año = $("#anio").val();
  var mes = $("#periodo").val();
  var estatus = $("#estatus").val();
  var parametros = {
    action: "listaInventarios",
    page: page,
    usuario: idUsuario,
    per_page: per_page,
    mes: mes,
    año: año,
    sucursal: sucursal,
    campo: campo,
    orden: orden,
    vista: vista,
    estatus: estatus,
  };
  $("#loader").fadeIn("slow");
  $.ajax({
    url: "ajax/inventarios.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Buscando...");
    },
    success: function (data) {
      $(".data").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarListaProductosInventarios(page) {
  var per_page = 100;
  var vista = "cargarListaProductosInventarios";
  var arregloMarca = JSON.parse(localStorage.getItem("arrayMarca"));
  var arregloFamilia = JSON.parse(localStorage.getItem("arrayFamilia"));
  var arregloCategoria = JSON.parse(localStorage.getItem("arrayCategoria"));
  var arregloAnaquel = JSON.parse(localStorage.getItem("arrayAnaquel"));
  var arregloRepisa = JSON.parse(localStorage.getItem("arrayRepisa"));
  var arregloProveedor = JSON.parse(localStorage.getItem("arrayProveedor"));
  var periodo = $("#periodo").val();
  var almacen = $("#almacen").val();
  if (arregloMarca === null) {
    localStorage.setItem("arrayMarca", "[]");
    var marca = "";
  } else {
    if (arregloMarca == "[]") {
      var marca = "";
    } else {
      var marca = arregloMarca.toString();
    }
  }
  if (arregloFamilia === null) {
    localStorage.setItem("arrayFamilia", "[]");
    var familia = "";
  } else {
    if (arregloFamilia == "[]") {
      var familia = "";
    } else {
      var familia = arregloFamilia.toString();
    }
  }
  if (arregloCategoria === null) {
    localStorage.setItem("arrayCategoria", "[]");
    var categoria = "";
  } else {
    if (arregloCategoria == "[]") {
      var categoria = "";
    } else {
      var categoria = arregloCategoria.toString();
    }
  }
  if (arregloAnaquel === null) {
    localStorage.setItem("arrayAnaquel", "[]");
    var anaquel = "";
  } else {
    if (arregloAnaquel == "[]") {
      var anaquel = "";
    } else {
      var anaquel = arregloAnaquel.toString();
    }
  }
  if (arregloRepisa === null) {
    localStorage.setItem("arrayRepisa", "[]");
    var repisa = "";
  } else {
    if (arregloRepisa == "[]") {
      var repisa = "";
    } else {
      var repisa = arregloRepisa.toString();
    }
  }
  if (arregloProveedor === null) {
    localStorage.setItem("arrayProveedor", "[]");
    var proveedor = "";
  } else {
    if (arregloProveedor == "[]") {
      var proveedor = "";
    } else {
      var proveedor = arregloProveedor.toString();
    }
  }
  var campoOrden = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "listarProductosInventario",
    page: page,
    usuario: idUsuario,
    per_page: per_page,
    vista: vista,
    marca: marca,
    familia: familia,
    categoria: categoria,
    anaquel: anaquel,
    repisa: repisa,
    proveedor: proveedor,
    campoOrden: campoOrden,
    orden: orden,
    periodo: periodo,
    almacen: almacen,
  };
  $("#loader").fadeIn("slow");
  $.ajax({
    url: "ajax/listarProductosSolicitudes.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando productos espere un momento porfavor...");
    },
    success: function (data) {
      $("#loader").html("");
      if (data != "fail") {
        $(".data").html(data).fadeIn("slow");
        $(".dataFail").html("");
        updateTotalesExistencias(almacen);
        updateTotalesDiferencias(almacen);
        updateTotalesInventario();
      } else {
        $(".data").html("");
        updateTotalesExistencias(almacen);
        updateTotalesDiferencias(almacen);
        updateTotalesInventario();
        $(".dataFail").html("<h3></h3>");
      }
    },
  });
}
function generarNuevoInventario() {
  var productosInventario = [];
  $("#tablaInventarios tbody tr").each((index, tr) => {
    var idProducto = parseInt($(tr).find(".idProducto").attr("idProducto"));
    var idAlmacen = parseInt($(tr).find(".almacenProducto").attr("idAlmacen"));
    var codigo = $(tr).find(".codigoProducto").text();
    var descripcion = $(tr).find(".nombreProducto").text();
    var idUnidad = parseInt($(tr).find(".unidadProducto").val());
    var idUnidadBase = parseInt(
      $(tr).find(".unidadProductoBase").attr("idUnidad")
    );
    var despliegue = $(tr).find(".unidadProductoBase").attr("despliegue");
    var nombreUnidad = $(tr).find(".unidadProductoBase").attr("nombreUnidad");

    var valorConversion = parseFloat(
      $(tr).find(".unidadProductoBase").attr("valorConversion")
    );
    var costo = $(tr).find(".costoProducto").text();
    costo = parseFloat(costo.replace(/[$,]/g, ""));
    var precioCapturado = costo / valorConversion;
    precioCapturado = formatNumber(parseFloat(precioCapturado.toFixed(5)));

    /***EXISTENCIAS */
    var existenciaConversion = parseFloat(
      $(tr).find(".existenciasProducto").attr("cantidadConv")
    );
    var existencia = parseFloat($(tr).find(".existenciasProducto").text());
    var existenciaImporte = $(tr).find(".existenciasImporteProducto").text();
    existenciaImporte = parseFloat(existenciaImporte.replace(/[$,]/g, ""));
    /***EXISTENCIAS */
    /***INVENTARIO */
    var inventarioConversion = parseFloat(
      $(tr).find(".inventarioProducto").attr("cantidadConv")
    );
    var inventario = parseFloat($(tr).find(".inventarioProducto").val());
    var inventarioImporte = $(tr).find(".inventarioImporteProducto").text();
    inventarioImporte = parseFloat(inventarioImporte.replace(/[$,]/g, ""));
    /***INVENTARIO */
    /***DIFERENCIAS */
    var diferenciaConversion = parseFloat(
      $(tr).find(".diferenciasProducto").attr("cantidadConv")
    );
    var diferencia = parseFloat($(tr).find(".diferenciasProducto").text());
    var diferenciaImporte = $(tr).find(".diferenciasImporteProducto").text();
    diferenciaImporte = parseFloat(diferenciaImporte.replace(/[$,]/g, ""));
    var estado = $(tr).find(".estadoProducto").text();
    if (estado == "") {
      estado = "SIN CONTABILIZAR";
    } else {
      estado = $(tr).find(".estadoProducto").text();
    }

    /***DIFERENCIAS */
    var producto = [
      ["idProducto", idProducto],
      ["idAlmacen", idAlmacen],
      ["codigo", codigo],
      ["descripcion", descripcion],
      ["idUnidad", idUnidad],
      ["idUnidadBase", idUnidadBase],
      ["despliegue", despliegue],
      ["nombreUnidad", nombreUnidad],
      ["valorConversion", valorConversion],
      ["costo", costo],
      ["precioCapturado", precioCapturado],
      ["existenciaConversion", existenciaConversion],
      ["existencia", existencia],
      ["existenciaImporte", existenciaImporte],
      ["inventarioConversion", inventarioConversion],
      ["inventario", inventario],
      ["inventarioImporte", inventarioImporte],
      ["diferenciaConversion", diferenciaConversion],
      ["diferencia", diferencia],
      ["diferenciaImporte", diferenciaImporte],
      ["estado", estado],
    ];

    productosInventario.push(producto);
  });

  switch (idUsuario) {
    case "8":
      var serie = "INVGE";
      break;
    case "9":
      var serie = "INVGE";
      break;
    case "10":
      var serie = "INVSN";
      break;
    case "12":
      var serie = "INVRM";
      break;
    case "13":
      var serie = "INVST";
      break;
    case "14":
      var serie = "INVCA";
      break;
    case "15":
      var serie = "INVTO";
      break;
  }
  var existencias = $("#existenciaTotalUnidades").val();
  var inventario = $("#inventarioTotalUnidades").val();
  var diferencia = $("#diferenciasTotalUnidades").val();
  var existenciasImportes = $("#existenciaTotalImporte").val();
  existenciasImportes = parseFloat(existenciasImportes.replace(/[$,]/g, ""));
  var inventarioImportes = $("#inventarioTotalImporte").val();
  inventarioImportes = parseFloat(inventarioImportes.replace(/[$,]/g, ""));
  var diferenciaImportes = $("#diferenciasTotalImporte").val();
  diferenciaImportes = parseFloat(diferenciaImportes.replace(/[$,]/g, ""));
  var idSolicitante = 1;
  var idRealizador = $("#realizador").val();
  var observaciones = $("#observaciones").val();
  var idAlmacen = $("#almacen").val();
  var periodo = $("#periodo").val();
  let productos = generarProductosInventario(productosInventario);

  var arregloMarca = JSON.parse(localStorage.getItem("arrayMarca"));
  var arregloFamilia = JSON.parse(localStorage.getItem("arrayFamilia"));
  var arregloCategoria = JSON.parse(localStorage.getItem("arrayCategoria"));
  var arregloAnaquel = JSON.parse(localStorage.getItem("arrayAnaquel"));
  var arregloRepisa = JSON.parse(localStorage.getItem("arrayRepisa"));
  var arregloProveedor = JSON.parse(localStorage.getItem("arrayProveedor"));

  if (arregloMarca === null) {
    var marca = "";
  } else {
    if (arregloMarca == "[]") {
      var marca = "";
    } else {
      var marca = arregloMarca.toString();
    }
  }
  if (arregloFamilia === null) {
    var familia = "";
  } else {
    if (arregloFamilia == "[]") {
      var familia = "";
    } else {
      var familia = arregloFamilia.toString();
    }
  }
  if (arregloCategoria === null) {
    var categoria = "";
  } else {
    if (arregloCategoria == "[]") {
      var categoria = "";
    } else {
      var categoria = arregloCategoria.toString();
    }
  }
  if (arregloAnaquel === null) {
    var anaquel = "";
  } else {
    if (arregloAnaquel == "[]") {
      var anaquel = "";
    } else {
      var anaquel = arregloAnaquel.toString();
    }
  }
  if (arregloRepisa === null) {
    var repisa = "";
  } else {
    if (arregloRepisa == "[]") {
      var repisa = "";
    } else {
      var repisa = arregloRepisa.toString();
    }
  }
  if (arregloProveedor === null) {
    var proveedor = "";
  } else {
    if (arregloProveedor == "[]") {
      var proveedor = "";
    } else {
      var proveedor = arregloProveedor.toString();
    }
  }

  var datos = new FormData();
  datos.append("accion", "generarInventario");
  datos.append("serie", serie);
  datos.append("existencias", existencias);
  datos.append("inventario", inventario);
  datos.append("diferencia", diferencia);
  datos.append("existenciasImportes", existenciasImportes);
  datos.append("inventarioImportes", inventarioImportes);
  datos.append("diferenciaImportes", diferenciaImportes);
  datos.append("idSolicitante", idSolicitante);
  datos.append("idRealizador", idRealizador);
  datos.append("observaciones", observaciones);
  datos.append("idAlmacen", idAlmacen);
  datos.append("periodo", periodo);
  datos.append("marca", marca);
  datos.append("familia", familia);
  datos.append("categoria", categoria);
  datos.append("anaquel", anaquel);
  datos.append("repisa", repisa);
  datos.append("proveedor", proveedor);
  datos.append("productos", JSON.stringify(productos));

  $.ajax({
    url: "ajax/inventariosFunctions.ajax.php",
    type: "post",
    dataType: "json",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    beforeSend: function (objeto) {
      $("#loadDocument").modal("show");
      $("#titleLoadDocument").html("Generando Inventario...");
    },
    success: function (res) {
      var response = res.replace(/['"]+/g, "");
      if (response == "ok") {
        localStorage.setItem("arrayMarca", "[]");
        localStorage.setItem("arrayFamilia", "[]");
        localStorage.setItem("arrayCategoria", "[]");
        localStorage.setItem("arrayAnaquel", "[]");
        localStorage.setItem("arrayRepisa", "[]");
        localStorage.setItem("arrayProveedor", "[]");
        localStorage.removeItem("folioInventario");
        setTimeout(function () {
          $("#titleLoadDocument").html("Inventario Generado Correctamente...");
          window.location.href = "inventarios";
        }, 2000);
      }
    },
  });
}
function generarInventario() {
  var inventario = $("#inventarioTotalUnidades").val();
  if (inventario === "0.00000") {
    Swal.fire({
      showDenyButton: true,
      confirmButtonText: "Generar",
      denyButtonText: "Seguir modificando",
      icon: "warning",
      title:
        "No se capturo el inventario de ningun producto ¿Desea generar el inventario?",
      showConfirmButton: true,
      timer: 3000,
    }).then((result) => {
      if (result.isConfirmed) {
        generarNuevoInventario();
      }
    });
  } else {
    Swal.fire({
      showDenyButton: true,
      confirmButtonText: "Generar",
      denyButtonText: "Seguir modificando",
      icon: "warning",
      title: "¿Desea generar el registro del inventario?",
      showConfirmButton: true,
    }).then((result) => {
      if (result.isConfirmed) {
        generarNuevoInventario();
      }
    });
  }
}

function generarProductosInventario(array) {
  var obj = {};
  var final = [];
  var arrayJson = JSON.parse(JSON.stringify(array));
  for (var i = 0; i < arrayJson.length; i++) {
    obj = {}; // <-- Se limpia la variable objeto para que no almacene más de una referencia
    var general = array[i];
    for (var n = 0; n < general.length; n++) {
      var data = general[n];
      var first = data.shift();
      var last = data.pop();
      obj[first] = last;
    }
    final.push(obj);
  }

  return final;
}
function editarInventario(folio) {
  if (
    idUsuario === "8" ||
    idUsuario === "9" ||
    idUsuario === "10" ||
    idUsuario === "12" ||
    idUsuario === "13" ||
    idUsuario === "14" ||
    idUsuario === "15"
  ) {
    var datas = new FormData();
    datas.append("accion", "estatusDocumentoInventario");
    datas.append("folioDocumento", folio);
    datas.append("tabla", "inventarios");

    $.ajax({
      url: "ajax/inventariosFunctions.ajax.php",
      type: "post",
      dataType: "json",
      data: datas,
      cache: false,
      contentType: false,
      processData: false,
    }).done(function (response) {
      if (response["idEstatus"] == 0 && response["habilitado"] == 0) {
        var datos = new FormData();
        datos.append("accion", "updateEstatusDocumentoInventario");
        datos.append("folioDocumento", folio);
        datos.append("estatus", 1);
        datos.append("habilitado", 1);
        datos.append("tabla", "inventarios");

        $.ajax({
          url: "ajax/inventariosFunctions.ajax.php",
          type: "post",
          dataType: "json",
          data: datos,
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (res) {
          var response = res.replace(/['"]+/g, "");
          if (response == "ok") {
            localStorage.setItem("folioInventario", folio);
            window.location.href = "editarInventario";
          }
        });
      } else {
        localStorage.setItem("folioInventario", folio);
        window.location.href = "editarInventario";
      }
    });
  } else {
    var datas = new FormData();
    datas.append("accion", "estatusDocumentoInventario");
    datas.append("folioDocumento", folio);
    datas.append("tabla", "inventarios");

    $.ajax({
      url: "ajax/inventariosFunctions.ajax.php",
      type: "post",
      dataType: "json",
      data: datas,
      cache: false,
      contentType: false,
      processData: false,
    }).done(function (response) {
      if (response["idEstatus"] == 1 && response["habilitado"] == 0) {
        var datos = new FormData();
        datos.append("accion", "updateEstatusDocumento");
        datos.append("folioDocumento", folio);
        datos.append("estatus", 2);
        datos.append("tabla", "inventarios");

        $.ajax({
          url: "ajax/inventariosFunctions.ajax.php",
          type: "post",
          dataType: "json",
          data: datos,
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (res) {
          var response = res.replace(/['"]+/g, "");
          if (response == "ok") {
            localStorage.setItem("folioInventario", folio);
            window.location.href = "editarInventario";
          }
        });
      } else {
        localStorage.setItem("folioInventario", folio);
        window.location.href = "editarInventario";
      }
    });
  }
}
function detalleInventario(folio) {
  var data = new FormData();
  data.append("accion", "detalleInventario");
  data.append("folioDocumento", folio);

  var campo = [
    "marca",
    "familia",
    "categoria",
    "anaquel",
    "repisa",
    "proveedor",
  ];
  $.ajax({
    url: "ajax/inventariosFunctions.ajax.php",
    type: "post",
    dataType: "json",
    data: data,
    cache: false,
    contentType: false,
    processData: false,
  }).done(function (response) {
    $("#documento").html(response["serie"] + " " + response["folio"]);
    $("#estatusDocumento").html(response["idEstatus"]);
    $("#habilitadoDocumento").html(response["habilitado"]);
    $("#fecha").val(response["fechaDocumento"]);
    document.getElementById("fecha").disabled = true;
    $("#periodo").val(response["periodo"]);
    $("#almacen").val(response["idAlmacen"]);
    document.getElementById("almacen").disabled = true;
    $("#almacenInventario").html(response["almacen"]);
    $("#nombreSolicitante").html(response["realizador"]);

    for (let i = 0; i < 6; i++) {
      var fields = response[campo[i]];
      generarFiltroInventarios(campo[i], fields);
    }

    $("#observaciones").val(response["observaciones"]);
    document.getElementById("observaciones").disabled = true;
    if (localStorage.grupoUsuario === "Administracion") {
      if (response["idEstatus"] == "2" && response["habilitado"] == "0") {
        document.getElementById("btnAprobarInventario").style.display = "";
        document.getElementById("btnDesaprobarInventario").style.display = "";
        document.getElementById("btnDesaprobarInventario").innerText =
          "Volver a contar";
        document
          .getElementById("marca")
          .setAttribute("onchange", "cargarListaProductosInventario(0)");
        document
          .getElementById("familia")
          .setAttribute("onchange", "cargarListaProductosInventario(0)");
        document
          .getElementById("categoria")
          .setAttribute("onchange", "cargarListaProductosInventario(0)");
        document
          .getElementById("anaquel")
          .setAttribute("onchange", "cargarListaProductosInventario(0)");
        document
          .getElementById("repisa")
          .setAttribute("onchange", "cargarListaProductosInventario(0)");
        document
          .getElementById("proveedor")
          .setAttribute("onchange", "cargarListaProductosInventario(0)");
      } else if (response["idEstatus"] == "3") {
        document.getElementById("divGenerarMovimientos").style.display = "";
        document.getElementById(
          "btnGenerarMovimientosInventario"
        ).style.display = "";
        document.getElementById("btnDesaprobarInventario").style.display = "";
        document
          .getElementById("marca")
          .setAttribute("onchange", "cargarListaProductosInventario(0)");
        document
          .getElementById("familia")
          .setAttribute("onchange", "cargarListaProductosInventario(0)");
        document
          .getElementById("categoria")
          .setAttribute("onchange", "cargarListaProductosInventario(0)");
        document
          .getElementById("anaquel")
          .setAttribute("onchange", "cargarListaProductosInventario(0)");
        document
          .getElementById("repisa")
          .setAttribute("onchange", "cargarListaProductosInventario(0)");
        document
          .getElementById("proveedor")
          .setAttribute("onchange", "cargarListaProductosInventario(0)");
      }
    } else {
      if (response["idEstatus"] == "1" && response["habilitado"] == "1") {
        document.getElementById("btnActualizarInventario").style.display = "";
        document.getElementById("filtroDiferencias").style.display = "";
        document
          .getElementById("marca")
          .setAttribute("onchange", "cargarListaProductosInventario(0)");
        document
          .getElementById("familia")
          .setAttribute("onchange", "cargarListaProductosInventario(0)");
        document
          .getElementById("categoria")
          .setAttribute("onchange", "cargarListaProductosInventario(0)");
        document
          .getElementById("anaquel")
          .setAttribute("onchange", "cargarListaProductosInventario(0)");
        document
          .getElementById("repisa")
          .setAttribute("onchange", "cargarListaProductosInventario(0)");
        document
          .getElementById("proveedor")
          .setAttribute("onchange", "cargarListaProductosInventario(0)");
      } else if (response["idEstatus"] == "3") {
        document
          .getElementById("marca")
          .setAttribute("onchange", "cargarListaProductosInventario(0)");
        document
          .getElementById("familia")
          .setAttribute("onchange", "cargarListaProductosInventario(0)");
        document
          .getElementById("categoria")
          .setAttribute("onchange", "cargarListaProductosInventario(0)");
        document
          .getElementById("anaquel")
          .setAttribute("onchange", "cargarListaProductosInventario(0)");
        document
          .getElementById("repisa")
          .setAttribute("onchange", "cargarListaProductosInventario(0)");
        document
          .getElementById("proveedor")
          .setAttribute("onchange", "cargarListaProductosInventario(0)");
      }
    }
    cargarListaProductosInventario(folio);
  });
}
function generarFiltroInventarios(selector, campos) {
  camposFiltro = campos.split(",");
  const options = $("#" + selector + " option");
  if (options[0].value === "") {
    $(options[0]).attr("activo", 1);
  }
  for (let j = 0; j < camposFiltro.length; j++) {
    for (var i = 0; i < options.length; i++) {
      if (options[i].value.indexOf(camposFiltro[j]) < 0) {
      } else {
        if (camposFiltro[j] == "") {
          $(options[0]).css("display", "block");
          $(options[0]).text("Ninguno");
          $(options[0]).attr("activo", 1);
        } else {
          $(options[i]).attr("activo", 1);
        }
      }
    }
  }
  $("#" + selector + " option").each(function () {
    if ($(this).attr("activo") == 1) {
      $(this).removeAttr("display");
    } else {
      $(this).css("display", "none");
    }
  });
}
function cargarListaProductosInventario(folioInventario) {
  if (folioInventario === 0) {
    folio = localStorage.folioInventario;
  } else {
    folio = folioInventario;
  }
  var idEstatus = $("#estatusDocumento").text();
  var habilitado = $("#habilitadoDocumento").text();
  var vista = "cargarListaProductosInventario";
  var almacen = $("#almacen").val();
  var accionMovimiento = $("#accionMovimiento").val();
  var filtroDiferencias = $("#filtroDiferencia").val();

  var parametros = {
    action: "listadoProductosInventario",
    page: 1,
    per_page: 5000,
    vista: vista,
    folio: folio,
    almacen: almacen,
    idEstatus: idEstatus,
    habilitado: habilitado,
    accionMovimiento: accionMovimiento,
    filtroDiferencias: filtroDiferencias,
  };
  $("#loader").fadeIn("slow");
  $.ajax({
    url: "ajax/listarProductosSolicitudes.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando productos espere un momento porfavor...");
    },
    success: function (data) {
      $("#loader").html("");
      if (data != "fail") {
        $(".data").html(data).fadeIn("slow");
        $(".dataFail").html("");
        updateTotalesExistencias(almacen);
        updateTotalesDiferencias(almacen);
        updateTotalesInventario();
      } else {
        $(".data").html("");
        updateTotalesExistencias(almacen);
        updateTotalesDiferencias(almacen);
        updateTotalesInventario();
        $(".dataFail").html("<h3></h3>");
      }
    },
  });
}
function desaprobarInventario() {
  var folio = localStorage.folioInventario;
  var datos = new FormData();
  datos.append("accion", "updateEstatusDocumentoInventario");
  datos.append("folioDocumento", folio);
  datos.append("estatus", 1);
  datos.append("habilitado", 1);
  datos.append("tabla", "inventarios");

  $.ajax({
    url: "ajax/inventariosFunctions.ajax.php",
    type: "post",
    dataType: "json",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
  }).done(function (res) {
    var response = res.replace(/['"]+/g, "");
    if (response == "ok") {
      Swal.fire({
        icon: "success",
        title: "¡Documento desaprobado correctamente!",
        showConfirmButton: false,
        timer: 1500,
      });
      setInterval(() => {
        localStorage.removeItem("folioDocumento");
        window.location.href = "inventarios";
      }, 300);
    }
  });
}
function aprobarInventario() {
  var folio = localStorage.folioInventario;
  var datos = new FormData();
  datos.append("accion", "updateEstatusDocumento");
  datos.append("folioDocumento", folio);
  datos.append("estatus", 3);
  datos.append("tabla", "inventarios");

  $.ajax({
    url: "ajax/inventariosFunctions.ajax.php",
    type: "post",
    dataType: "json",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
  }).done(function (res) {
    var response = res.replace(/['"]+/g, "");
    if (response == "ok") {
      Swal.fire({
        icon: "success",
        title: "¡Documento aprobado correctamente!",
        showConfirmButton: false,
        timer: 1500,
      });
      setInterval(() => {
        localStorage.removeItem("folioDocumento");
        window.location.href = "inventarios";
      }, 300);
    }
  });
}
function obtenerMovimientosInventario() {
  var folio = localStorage.folioInventario;
  cargarListaProductosInventario(folio);
}
function generarMovimientosInventario() {
  var accion = $("#accionMovimiento").val();
  if (accion === "") {
    Swal.fire({
      icon: "warning",
      title: "¡Elegir que tipo de movimiento desea realizar",
      showConfirmButton: false,
      timer: 1500,
    });
  } else {
    let filasProductos = 0;
    $("#tablaDetalleInventarios tbody tr").each((index, tr) => {
      filasProductos++;
    });
    if (filasProductos === 0) {
      Swal.fire({
        icon: "warning",
        title: "No hay productos para generar movimientos de entrada o salida.",
        showConfirmButton: false,
        timer: 2500,
      });
    } else {
      var documento = $("#documento").text();
      var documentoOrigen = documento.split(" ");
      var serieOrigen = documentoOrigen[0];
      var folioOrigen = documentoOrigen[1];
      var marca = $("#marcaInventario").text();
      if (marca != "") {
        marca = "la marca " + marca;
      } else {
        marca = "todas las marcas";
      }
      var referencia = documento;
      var unidades = convertPositive($("#diferenciasTotalUnidades").val());
      var importe = $("#diferenciasTotalImporte").val();
      importe = parseFloat(convertPositive(importe.replace(/[$,]/g, "")));

      var fecha = $("#fecha").val();
      var observaciones =
        "Movimientos de " +
        accion +
        " apartir del documento " +
        documento +
        " del dia " +
        fecha;
      var almacen = $("#almacen").val();
      if (accion == "Entrada") {
        switch (almacen) {
          case "1":
            var serie = "ETGE";
            var idConcepto = "37";
            break;
          case "3":
            var serie = "ETLB";
            var idConcepto = "3036";
            break;
          case "4":
            var serie = "ETCA";
            var idConcepto = "34";
            break;
          case "5":
            var serie = "ETCA";
            var idConcepto = "34";
            break;
          case "6":
            var serie = "ETRM";
            var idConcepto = "3023";
            break;
          case "7":
            var serie = "ETRM";
            var idConcepto = "3023";
            break;
          case "8":
            var serie = "ETSN";
            var idConcepto = "3024";
            break;
          case "9":
            var serie = "ETSN";
            var idConcepto = "3024";
            break;
          case "10":
            var serie = "ETST";
            var idConcepto = "3025";
            break;
          case "11":
            var serie = "ETST";
            var idConcepto = "3025";
            break;
          case "12":
            var serie = "ETTO";
            var idConcepto = "3026";
            break;
          case "13":
            var serie = "ETTO";
            var idConcepto = "3026";
            break;
        }
        var idDocumentoDe = "32";
      } else {
        switch (almacen) {
          case "1":
            var serie = "SLGE";
            var idConcepto = "38";
            break;
          case "3":
            var serie = "SLLB";
            var idConcepto = "3037";
            break;
          case "4":
            var serie = "SLCA";
            var idConcepto = "35";
            break;
          case "5":
            var serie = "SLCA";
            var idConcepto = "35";
            break;
          case "6":
            var serie = "SLRM";
            var idConcepto = "3027";
            break;
          case "7":
            var serie = "SLRM";
            var idConcepto = "3027";
            break;
          case "8":
            var serie = "SLSN";
            var idConcepto = "3028";
            break;
          case "9":
            var serie = "SLSN";
            var idConcepto = "3028";
            break;
          case "10":
            var serie = "SLST";
            var idConcepto = "3029";
            break;
          case "11":
            var serie = "SLST";
            var idConcepto = "3029";
            break;
          case "12":
            var serie = "SLTO";
            var idConcepto = "3030";
            break;
          case "13":
            var serie = "SLTO";
            var idConcepto = "3030";
            break;
        }
        var idDocumentoDe = "33";
      }
      var productosInventario = [];
      $("#tablaDetalleInventarios tbody tr").each((index, tr) => {
        var idProducto = parseInt($(tr).find(".idProducto").attr("idProducto"));
        var idInventario = parseInt(
          $(tr).find(".idProducto").attr("idInventario")
        );
        var idProdInv = parseInt($(tr).find(".idProducto").attr("idProdInv"));

        var idAlmacen = parseInt(
          $(tr).find(".almacenProducto").attr("idAlmacen")
        );
        var unidades = parseFloat($(tr).find(".diferenciasProducto").text());
        var unidadesConversion = parseFloat(
          $(tr).find(".diferenciasProducto").attr("cantidadConv")
        );
        var idUnidad = parseInt(
          $(tr).find(".unidadProductoBase").attr("idUnidad")
        );
        var costoCapturado = $(tr)
          .find(".costoProducto")
          .attr("costoCapturado");
        costoCapturado = parseFloat(costoCapturado.replace(/[$,]/g, ""));

        var neto = $(tr).find(".diferenciasImporteProducto").text();
        neto = parseFloat(neto.replace(/[$,]/g, ""));

        var producto = [
          ["idInventario", idInventario],
          ["idProdInv", idProdInv],
          ["idProducto", idProducto],
          ["idDocumentoDe", idDocumentoDe],
          ["idAlmacen", idAlmacen],
          ["unidades", convertPositive(unidades)],
          ["unidadesConversion", convertPositive(unidadesConversion)],
          ["idUnidad", idUnidad],
          ["costoCapturado", costoCapturado],
          ["costoEspecifico", convertPositive(neto)],
          ["neto", convertPositive(neto)],
          ["total", convertPositive(neto)],
        ];

        productosInventario.push(producto);
      });
      let productos = generarProductosInventario(productosInventario);
      var datos = new FormData();
      datos.append("accion", "generarMovimientoInventario");
      datos.append("referencia", referencia);
      datos.append("unidades", unidades);
      datos.append("importe", importe);
      datos.append("productos", JSON.stringify(productos));
      datos.append("serie", serie);
      datos.append("serieOrigen", serieOrigen);
      datos.append("folioOrigen", folioOrigen);
      datos.append("observaciones", observaciones);
      datos.append("idDocumentoDe", idDocumentoDe);
      datos.append("idConcepto", idConcepto);
      datos.append("tipo", accion);

      $.ajax({
        url: "ajax/inventariosFunctions.ajax.php",
        type: "post",
        dataType: "json",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function (objeto) {
          $("#loadDocument").modal("show");
          $("#titleLoadDocument").html("Generando Movimiento...");
        },
        success: function (data) {
          setTimeout(function () {
            $("#titleLoadDocument").html(accion + " Generada Correctamente...");
            window.location.href = "editarInventario";
          }, 2000);
        },
      });
    }
  }
}
function updateProductoInventario(el) {
  var productosInventario = [];
  var row = $(el).parents("tr");
  var idProducto = parseInt(row.find(".idProducto").attr("idProducto"));
  var idProdInv = parseInt(row.find(".idProducto").attr("idProdInv"));
  var folioInventario = localStorage.folioInventario;
  var inventarioConversion = parseFloat(
    row.find(".inventarioProducto").attr("cantidadConv")
  );
  var inventario = parseFloat(row.find(".inventarioProducto").val());
  var inventarioImporte = row.find(".inventarioImporteProducto").text();
  inventarioImporte = parseFloat(inventarioImporte.replace(/[$,]/g, ""));

  var diferenciaConversion = parseFloat(
    row.find(".diferenciasProducto").attr("cantidadConv")
  );
  var diferencia = parseFloat(row.find(".diferenciasProducto").text());
  var diferenciaImporte = row.find(".diferenciasImporteProducto").text();
  diferenciaImporte = parseFloat(diferenciaImporte.replace(/[$,]/g, ""));
  var estado = row.find(".estadoProducto").text();
  if (estado == "") {
    estado = "SIN CONTABILIZAR";
  } else {
    estado = row.find(".estadoProducto").text();
  }

  var producto = [
    ["idProducto", idProducto],
    ["idProdInv", idProdInv],
    ["inventarioConversion", inventarioConversion],
    ["inventario", inventario],
    ["inventarioImporte", inventarioImporte],
    ["diferenciaConversion", diferenciaConversion],
    ["diferencia", diferencia],
    ["diferenciaImporte", diferenciaImporte],
    ["estado", estado],
    ["folio", folioInventario],
  ];

  productosInventario.push(producto);

  let productos = generarProductosInventario(productosInventario);

  var datos = new FormData();
  datos.append("accion", "actualizarProductoInventario");
  datos.append("productos", JSON.stringify(productos));

  $.ajax({
    url: "ajax/inventariosFunctions.ajax.php",
    type: "post",
    dataType: "json",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function (res) {
      var response = res.replace(/['"]+/g, "");
      if (response == "ok") {
        cargarListaProductosInventario(0);
      } else {
        alert("Error al actualizar el movimiento");
      }
    },
  });
}
function actualizarInventario() {
  let filtro = $("#filtroDiferencia").val();
  let folioInventario = localStorage.folioInventario;

  if (filtro === "0") {
    Swal.fire({
      icon: "warning",
      title: "¡Para continuar eliminar filtro de diferencias.!",
      showConfirmButton: false,
      timer: 1500,
    });
  } else {
    Swal.fire({
      showDenyButton: true,
      confirmButtonText: "Finalizar Inventario",
      denyButtonText: "Seguir modificando",
      icon: "warning",
      title: "¿Las diferencias del inventario son correctas?",
      showConfirmButton: true,
    }).then((result) => {
      if (result.isConfirmed) {
        var inventario = $("#inventarioTotalUnidades").val();
        var diferencia = $("#diferenciasTotalUnidades").val();

        var inventarioImportes = $("#inventarioTotalImporte").val();
        inventarioImportes = parseFloat(
          inventarioImportes.replace(/[$,]/g, "")
        );
        var diferenciaImportes = $("#diferenciasTotalImporte").val();
        diferenciaImportes = parseFloat(
          diferenciaImportes.replace(/[$,]/g, "")
        );

        var datos = new FormData();
        datos.append("accion", "actualizarInventario");
        datos.append("folioInventario", folioInventario);
        datos.append("inventario", inventario);
        datos.append("diferencia", diferencia);
        datos.append("inventarioImportes", inventarioImportes);
        datos.append("diferenciaImportes", diferenciaImportes);

        $.ajax({
          url: "ajax/inventariosFunctions.ajax.php",
          type: "post",
          dataType: "json",
          data: datos,
          cache: false,
          contentType: false,
          processData: false,
          beforeSend: function (objeto) {
            $("#loadDocument").modal("show");
            $("#titleLoadDocument").html("Actualizando Inventario...");
          },
          success: function (res) {
            var response = res.replace(/['"]+/g, "");
            if (response == "ok") {
              setTimeout(function () {
                localStorage.removeItem("folioInventario");
                $("#titleLoadDocument").html(
                  "Inventario Actualizado Correctamente..."
                );
                window.location.href = "inventarios";
              }, 2000);
            } else {
              alert("Error al actualizar el inventario");
            }
          },
        });
      }
    });
  }
}
function setFiltrosInventario() {
  var empresa = $("#empresaInventario").val();
  var idGrupo = localStorage.idGrupo;
  var parametros = {
    idGrupo: idGrupo,
    empresa: empresa,
    action: "listadoAlmacenes",
  };
  $.ajax({
    url: "ajax/inventariosFunctions.ajax.php",
    data: parametros,
    success: function (data) {
      $("#diaDashboard").empty();
      var datos = JSON.parse(data);
      var select = document.getElementById("diaDashboard");
      var option = document.createElement("option");
      option.innerHTML = "Toda la semana";
      option.value = "";
      select.appendChild(option);
      for (var i = 0; i < datos.length; i++) {
        var option = document.createElement("option");
        option.innerHTML = datos[i];
        option.value = datos[i];
        select.appendChild(option);
      }
      $("#periodWeek").html("PERIODO " + datos[0] + " - " + datos[5]);
    },
  });
}
function generarReporteRealizarInventario() {
  var per_page = 100;
  var page = 1;
  var vista = "cargarListaProductosInventarios";
  var arregloMarca = JSON.parse(localStorage.getItem("arrayMarca"));
  var arregloFamilia = JSON.parse(localStorage.getItem("arrayFamilia"));
  var arregloCategoria = JSON.parse(localStorage.getItem("arrayCategoria"));
  var arregloAnaquel = JSON.parse(localStorage.getItem("arrayAnaquel"));
  var arregloRepisa = JSON.parse(localStorage.getItem("arrayRepisa"));
  var arregloProveedor = JSON.parse(localStorage.getItem("arrayProveedor"));
  var periodo = $("#periodo").val();
  var almacen = $("#almacen").val();
  var alm = document.getElementById("almacen");
  var nombreAlmacen = alm.options[alm.selectedIndex].text;

  if (arregloMarca === null) {
    localStorage.setItem("arrayMarca", "[]");
    var marca = "";
  } else {
    if (arregloMarca == "[]") {
      var marca = "";
    } else {
      var marca = arregloMarca.toString();
    }
  }
  if (arregloFamilia === null) {
    localStorage.setItem("arrayFamilia", "[]");
    var familia = "";
  } else {
    if (arregloFamilia == "[]") {
      var familia = "";
    } else {
      var familia = arregloFamilia.toString();
    }
  }
  if (arregloCategoria === null) {
    localStorage.setItem("arrayCategoria", "[]");
    var categoria = "";
  } else {
    if (arregloCategoria == "[]") {
      var categoria = "";
    } else {
      var categoria = arregloCategoria.toString();
    }
  }
  if (arregloAnaquel === null) {
    localStorage.setItem("arrayAnaquel", "[]");
    var anaquel = "";
  } else {
    if (arregloAnaquel == "[]") {
      var anaquel = "";
    } else {
      var anaquel = arregloAnaquel.toString();
    }
  }
  if (arregloRepisa === null) {
    localStorage.setItem("arrayRepisa", "[]");
    var repisa = "";
  } else {
    if (arregloRepisa == "[]") {
      var repisa = "";
    } else {
      var repisa = arregloRepisa.toString();
    }
  }
  if (arregloProveedor === null) {
    localStorage.setItem("arrayProveedor", "[]");
    var proveedor = "";
  } else {
    if (arregloProveedor == "[]") {
      var proveedor = "";
    } else {
      var proveedor = arregloProveedor.toString();
    }
  }
  var campoOrden = $("#campoOrden").val();
  var orden = $("#orden").val();

  location.href =
    "views/moduls/reporteador.php?reporteRealizarInventario=" +
    "&page=" +
    page +
    "&usuario=" +
    idUsuario +
    "&per_page=" +
    per_page +
    "&marca=" +
    marca +
    "&familia=" +
    familia +
    "&categoria=" +
    categoria +
    "&anaquel=" +
    anaquel +
    "&repisa=" +
    repisa +
    "&proveedor=" +
    proveedor +
    "&campoOrden=" +
    campoOrden +
    "&orden=" +
    orden +
    "&periodo=" +
    periodo +
    "&almacen=" +
    almacen +
    "&nombreAlmacen=" +
    nombreAlmacen;
}
function generarReporteEditarInventario() {
  folio = localStorage.folioInventario;
  var idEstatus = $("#estatusDocumento").text();
  var habilitado = $("#habilitadoDocumento").text();
  var documento = $("#documento").text();
  var nombreAlmacen = $("#almacenInventario").text();
  var almacen = $("#almacen").val();
  var accionMovimiento = $("#accionMovimiento").val();
  var filtroDiferencias = $("#filtroDiferencia").val();
  page = 1;
  per_page = 10000;
  location.href =
    "views/moduls/reporteador.php?reporteEditarInventario=" +
    "&page=" +
    page +
    "&per_page=" +
    per_page +
    "&folio=" +
    folio +
    "&almacen=" +
    almacen +
    "&idEstatus=" +
    idEstatus +
    "&habilitado=" +
    habilitado +
    "&accionMovimiento=" +
    accionMovimiento +
    "&filtroDiferencias=" +
    filtroDiferencias +
    "&documento=" +
    documento +
    "&nombreAlmacen=" +
    nombreAlmacen;
}
