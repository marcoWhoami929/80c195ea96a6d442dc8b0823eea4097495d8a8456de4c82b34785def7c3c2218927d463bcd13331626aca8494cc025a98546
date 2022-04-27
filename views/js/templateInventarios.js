const formatNumber = (num) => {
  const n = String(num),
    p = n.indexOf(".");
  return n.replace(/\d(?=(?:\d{3})+(?:\.|$))/g, (m, i) =>
    p < 0 || i < p ? `${m},` : m
  );
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
        loadProductosSolicitudes(1);
        localStorage.setItem("tipoDocumento", "1");
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
        loadProductosVenta(1);

        break;
      case "miAlmacen":
        $("#periodo").val(mm.replace("0", ""));
        productosAlmacenes();
        loadProductosVenta(1);
        break;
      case "agotarse":
        $("#periodo").val(mm.replace("0", ""));
        productosPorAgotarse();
        loadProductosVenta(1);
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
          //loadProductosAutorizaciones(1);
        }
        break;
      case "indicadores":
        cargarIndicadoresUtilidad(1);
        break;
      case "inventarioActual":
        cargarInventarioActual();
        setEjercicios();
        setEjercicios2();
        break;
    }
  }
  $(".selectorCategoria").select2();
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
  var usuario = localStorage.idUsuarioInventarios;
  var vista = "cargarListaRequisiciones";
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var prioridad = $("#prioridad").val();
  var estatus = $("#estatus").val();
  var parametros = {
    action: "listaRequisiciones",
    page: page,
    usuario: usuario,
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
      var usuario = localStorage.idUsuarioInventarios;
      var parametros = {
        action: "listarProductosRequisicion",
        page: page,
        usuario: usuario,
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
  importe = parseFloat(importe.replace(/[$,]/g, ""));
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
  } else if (tipoDocumento === "2") {
    var serieDocumento = "PEMA";
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
        localStorage.estatusDocumento == 4 &&
        response["pendientes"] != 0 &&
        response["folioAutorizacion"] == 0
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
    cargarListaProductosRequisicion(1, folio);
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
    $("#documento").html(response["serieAut"] + " " + response["folioAut"]);
    $("#documentoOrigen").html(response["serie"] + " " + response["folio"]);
    $("#fecha").val(response["fecha"]);
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
      document.getElementById("headMain").style.display = "";
      document.getElementById("headSecond").style.display = "none";
    }

    elegirSolicitante();
    cargarListaProductosAutorizacion(1, folio);
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
  var aprobador = localStorage.idUsuarioInventarios;
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
  alert(idProducto);
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
  var usuario = localStorage.idUsuarioInventarios;
  var vista = "cargarListaRequisicionesFaltantes";
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var prioridad = $("#prioridad").val();
  var estatus = $("#estatus").val();
  var parametros = {
    action: "listaRequisicionesFaltantes",
    page: page,
    usuario: usuario,
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
  var usuario = localStorage.idUsuarioInventarios;
  var vista = "cargarListaRequisicionesFaltantesAdmin";
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var prioridad = $("#prioridad").val();
  var estatus = $("#estatus").val();
  var sucursal = $("#sucursal").val();
  var parametros = {
    action: "listaRequisicionesFaltantesAdmin",
    page: page,
    usuario: usuario,
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
  } else if (tipoDocumento === "2") {
    var serieDocumento = "PEMA";
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
  var usuario = localStorage.idUsuarioInventarios;
  var vista = "cargarListaAutorizaciones";
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var estatus = $("#estatus").val();
  var parametros = {
    action: "listaAutorizaciones",
    page: page,
    usuario: usuario,
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
      tipo: localStorage.tipoDocumento,
    };
  } else {
    var usuario = localStorage.idUsuarioInventarios;
    var parametros = {
      action: "listarProductosRequisicion",
      page: page,
      usuario: usuario,
      per_page: per_page,
      vista: vista,
      folio: folio,
      tipo: localStorage.tipoDocumento,
      tipoDetalleDocumento: "",
    };
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
