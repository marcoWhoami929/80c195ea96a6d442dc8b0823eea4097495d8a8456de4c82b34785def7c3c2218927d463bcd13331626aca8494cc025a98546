<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">

        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">

                <div class="pcoded-content">
                    <!-- Page-header start -->
                    <div class="page-header">
                        <div class="page-block">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <div class="page-header-title">
                                        <h5 class="m-b-10">Recordatorios</h5>
                                        <p class="m-b-0"></p>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="dashboard"> <i class="fa fa-home"></i> </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#!">Recordatorios Inventario</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Page-header end -->
                    <div class="pcoded-inner-content">
                        <!-- Main-body start -->
                        <div class="main-body">
                            <div class="pcoded-inner-content">
                                <div class="main-body">
                                    <div class="page-wrapper">
                                        <div class="page-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <div class="container col-lg-12">
                                                                <div class="row">
                                                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                                                        <i class="fa fa-circle text-info m-r-10 fa-2x"></i>Programar Inventario
                                                                    </div>
                                                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                                                        <i class="fa fa-circle text-success m-r-10 fa-2x"></i> Revision de Inventarios
                                                                    </div>
                                                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                                                        <i class="fa fa-circle text-danger m-r-10 fa-2x"></i> Solicitar Inventario
                                                                    </div>
                                                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                                                        <i class="fa fa-circle text-warning m-r-10 fa-2x"></i>Entrega de Material
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="card-header-right">
                                                                <ul class="list-unstyled card-option">
                                                                    <li>
                                                                        <i class="fa fa fa-wrench open-card-option"></i>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa fa-window-maximize full-card"></i>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa fa-minus minimize-card"></i>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa fa-refresh reload-card"></i>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa fa-trash close-card"></i>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="card-block table-border-style">
                                                            <div class="table-wrapper">
                                                                <div class="row text-center" id="loader" style="position: absolute;top: 30px;left: 50%;color:#00BCD4;font-size:22px">

                                                                </div>
                                                                <div class="table-title" style="margin-top:-80px">
                                                                    <div class="row">

                                                                    </div>
                                                                    <div class="filter-group">
                                                                        <button type="button" class="btn nestable-info" id="btnRefresh" onclick="listaRecordatorios()"> <i class="fa fa-refresh"></i>Actualizar</button>
                                                                    </div>
                                                                </div>


                                                                <div class="table-filter filterParams">
                                                                    <div class="row">

                                                                        <div class="col-lg-12 col-md-12 col-sm-12">

                                                                            <div class="filter-group" style="display:none" id="btnListaSucursales">
                                                                                <span class="filter-icon"><i class="fa fa-filter"></i></span>
                                                                                <label>Sucursal</label>

                                                                                <select class="form-control" id="sucursal" onchange="listaRecordatorios();">
                                                                                    <option value="">Todas</option>
                                                                                    <option value="10">Sucursal San Manuel</option>
                                                                                    <option value="12">Sucursal Reforma</option>
                                                                                    <option value="13">Sucursal Santiago</option>
                                                                                    <option value="14">Sucursal Capu</option>
                                                                                    <option value="15">Sucursal Las Torres</option>

                                                                                </select>
                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <span>Estatus</span>
                                                                                <select class="form-control" id="estatus" onchange="listaOrdenesCompra();">
                                                                                    <option value="0">Pendientes</option>
                                                                                    <option value="1">Completados</option>

                                                                                </select>
                                                                            </div>

                                                                            <!----->
                                                                        </div>

                                                                        <div class="col-sm-3 text-right">
                                                                            <div class="show-entries">


                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="card">
                                                                        <div class="">
                                                                            <div class="row">

                                                                                <div class="col-lg-12 col-md-12 col-sm-12 border-right p-r-0">
                                                                                    <div id="calendar"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id=" styleSelector"> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalDetalleRecordatorio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header estilosTablas">
                <h4 class="modal-title" id="exampleModalLabel"><span id="titleModal"></span></h4>

                <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container col-lg-12 col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-lg-4">
                            <h5>Solicitante:</h5>
                            <input type="hidden" class="form-control " id="evtId" readonly>
                            <input type="text" class="form-control " id="evtSolicitante" readonly>
                        </div>
                        <div class="col-lg-4">
                            <h5>Inicio:</h5>
                            <input type="datetime-local" class="form-control " id="evtStart" value="2022-05-05T14:30:00.000Z">
                        </div>
                        <div class="col-lg-4">
                            <h5>Fin:</h5>
                            <input type="datetime-local" class="form-control " id="evtEnd">
                        </div>
                        <div class="col-lg-12">
                            <h5>Mensaje:</h5>
                            <textarea id="evtMensaje" rows="4" cols="50" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="modal-footer">

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <button type="button" class="btn nestable-danger" style="display:none" id="btnEliminarRecordatorio" onclick="eliminarRecordatorio()">Eliminar</button>
                        <button type="button" class="btn nestable-info" style="display:none" id="btnActualizarRecordatorio" onclick="actualizarRecordatorio()">Actualizar</button>
                        <button type="button" class="btn nestable-success btnCerrar" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalCrearRecordatorio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header estilosTablas">
                <h4 class="modal-title" id="exampleModalLabel">
                    <span>Nuevo Recordatorio</span>
                </h4>

                <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container col-lg-12 col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h5>Título:</h5>
                            <input type="text" class="form-control " id="evtCrearTitulo" placeholder="Ingrese el titulo del recordatorio">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <h5>Sucursal Asignada:</h5>
                            <select id="evtCrearSucursal" class="form-control">
                                <option value="10">Sucursal San Manuel</option>
                                <option value="12">Sucursal Reforma</option>
                                <option value="13">Sucursal Santiago</option>
                                <option value="14">Sucursal Capu</option>
                                <option value="15">Sucursal Las Torres</option>

                            </select>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <h5>Acción Solicitada:</h5>
                            <select name="evtAccion" id="evtCrearAccion" class="form-control">
                                <option value="#00BCD4">Programar Inventario</option>
                                <option value="#11C15B">Revision de Inventarios</option>
                                <option value="#FF5252">Solicitar Inventario</option>
                                <option value="#FFE100">Entrega de Material</option>

                            </select>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <h5>Inicio:</h5>
                            <input type="datetime-local" class="form-control " id="evtCrearStart">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <h5>Fin:</h5>
                            <input type="datetime-local" class="form-control " id="evtCrearEnd">
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h5>Mensaje:</h5>
                            <textarea id="evtCrearMensaje" rows="4" cols="50" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="modal-footer">

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <button type="button" class="btn nestable-info" onclick="generarRecordatorio()">Crear Recordatorio</button>
                        <button type="button" class="btn nestable-danger btnCerrar" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        var date = new Date();
        var yyyy = date.getFullYear().toString();
        var mm = (date.getMonth() + 1).toString().length == 1 ? "0" + (date.getMonth() + 1).toString() : (date.getMonth() + 1).toString();
        var dd = (date.getDate()).toString().length == 1 ? "0" + (date.getDate()).toString() : (date.getDate()).toString();

        var calendarEl = document.getElementById('calendar');

        calendar = new FullCalendar.Calendar(calendarEl, {

            locale: 'es',
            headerToolbar: {

                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            initialDate: yyyy + "-" + mm + "-" + dd,
            navLinks: true, // can click day/week names to navigate views
            selectable: true,
            selectMirror: true,
            select: function(arg) {


                if (
                    localStorage.grupoUsuario === "Administracion" ||
                    localStorage.grupoUsuario === "Almacen"
                ) {
                    var nowStart = new Date(arg.startStr);
                    nowStart.setMinutes(nowStart.getMinutes() + nowStart.getTimezoneOffset());
                    document.getElementById('evtCrearStart').value = nowStart.toISOString().slice(0, 16);
                    document.getElementById('evtCrearEnd').value = nowStart.toISOString().slice(0, 16);
                    $("#modalCrearRecordatorio").modal("show");
                }
            },
            eventClick: function(arg) {
                var recordatorios = JSON.stringify(arg);
                var recordatorio = JSON.parse(recordatorios);
                var titulo = recordatorio.event.title;
                var id = recordatorio.event.id;
                $("#modalDetalleRecordatorio").modal("show");
                detalleRecordatorio(id);


            },
            editable: false,
            dayMaxEvents: true, // allow "more" link when too many events
            events: []
        });
        calendar.render();
    });
</script>