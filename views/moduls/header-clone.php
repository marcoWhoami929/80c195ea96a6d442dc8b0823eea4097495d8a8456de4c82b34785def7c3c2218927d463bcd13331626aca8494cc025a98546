<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
        <nav class="navbar header-navbar pcoded-header">
            <div class="navbar-wrapper">
                <div class="navbar-logo">
                    <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
                        <i class="ti-menu"></i>
                    </a>
                    <div class="mobile-search waves-effect waves-light">
                        <div class="header-search">
                            <div class="main-search morphsearch-search">
                                <div class="input-group">
                                    <span class="input-group-prepend search-close"><i class="ti-close input-group-text"></i></span>
                                    <input type="text" class="form-control" placeholder="Enter Keyword">
                                    <span class="input-group-append search-btn"><i class="ti-search input-group-text"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="index.html">
                        <img class="img-fluid" src="views/images/logo.png" alt="Theme-Logo" />
                    </a>
                    <a class="mobile-options waves-effect waves-light">
                        <i class="ti-more"></i>
                    </a>
                </div>
                <div class="navbar-container container-fluid">
                    <ul class="nav-left">
                        <li>
                            <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                        </li>
                        <li>
                            <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                <i class="ti-fullscreen"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav-left">
                        <li>
                            <button type="button" class="btn btn-info" onclick="openModal()"> <i class="fa fa-window-restore"></i>Accesos Directos</button>
                            <strong style="color:white">*presionar f2 para desplegar acceso</strong>
                        </li>
                    </ul>
                    <ul class="nav-right">

                        <li class="header-notification">
                            <a href="#!" class="waves-effect waves-light">
                                <i class="ti-bell"></i>
                                <span class="badge bg-c-red"></span>
                            </a>
                            <ul class="show-notification">
                                <li>
                                    <h6>Notificaciones</h6>
                                    <label class="label label-danger">0</label>
                                </li>

                            </ul>
                        </li>
                        <li class="user-profile header-notification">
                            <a href="#!" class="waves-effect waves-light">
                                <img src="<?php echo $_SESSION["foto"] ?>" class="img-radius" alt="User-Profile-Image">
                                <span><?php echo $_SESSION["nombre"] ?></span>

                                <i class="ti-angle-down"></i>
                            </a>
                            <ul class="show-notification profile-notification">

                                <li class="waves-effect waves-light">
                                    <a href="logout">
                                        <i class="ti-layout-sidebar-left"></i> Salir
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="modal" id="modalProcesos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="samples">
                            <div style="width:100%">
                                <div id="myDiagramDiv" style="width:100%; height:400px;position:relative;z-index:10001;"></div>

                            </div>
                            <div>

                                <textarea id="mySavedModel" style="display: none">

                                { "class": "GraphLinksModel",
  "nodeDataArray": [
{"icon":"canal","text":"Canal","key":-8,"pos":"-20 -227","color":"green","caption":"","imgsrc":"","url":"ventasCanalDiario"},
{"icon":"clientes","text":"Clientes","key":-3,"pos":"-140 -227","color":"red","caption":"","imgsrc":"","url":"ventasClienteDiario"},
{"icon":"agentes","text":"Agentes","key":-6,"pos":"100 -227","color":"blue","caption":"","imgsrc":"","url":"ventasAgenteDiario"},
{"icon":"producto","text":"Productos","key":-10,"pos":"230 -227","caption":"","imgsrc":"","color":"pink","url":"ventasProductoDiario"},
{"icon":"pedido","text":"Litreado","key":-1,"pos":"360 -227","caption":"","imgsrc":"","color":"purple","url":"ventasLitreadoDiario"},
{"icon":"marca","text":"Marca","key":-11,"pos":"480 -233","color":"orange","caption":"","imgsrc":"","url":"ventasMarcaDiario"},
{"icon":"factura","text":"Ventas","key":-5,"pos":"-420 -28","caption":"","imgsrc":"","color":"orange"},
{"text":"Diario","key":-7,"pos":"-290 -233","caption":"","imgsrc":"","icon":"ventas","color":"lightred"},
{"text":"Mensual","key":-9,"pos":"-290 -11","caption":"","imgsrc":"","icon":"ventas","color":"lightblue"},
{"text":"Anual","key":-12,"pos":"-290 163","caption":"","imgsrc":"","icon":"ventas","color":"lightgreen"},
{"icon":"clientes","text":"Clientes","key":-13,"pos":"-150 -12","color":"red","caption":"","imgsrc":"","url":"ventasClienteMensual"},
{"icon":"canal","text":"Canal","key":-14,"pos":"-30 -12","color":"green","caption":"","imgsrc":"","url":"ventasCanalMensual"},
{"icon":"agentes","text":"Agentes","key":-15,"pos":"90 -12","color":"blue","caption":"","imgsrc":"","url":"ventasAgenteMensual"},
{"icon":"producto","text":"Producto","key":-2,"pos":"230 -12","color":"pink","caption":"","imgsrc":"","url":"ventasProductoMensual"},
{"icon":"pedido","text":"Litreado","key":-16,"pos":"360 -12","color":"purple","caption":"","imgsrc":"","url":"ventasLitreadoMensual"},
{"icon":"marca","text":"Marca","key":-17,"pos":"490 -13","color":"orange","caption":"","imgsrc":"","url":"ventasMarcaMensual"},
{"icon":"clientes","text":"Clientes","key":-18,"pos":"-150 163","color":"red","caption":"","imgsrc":"","url":"ventasClienteAnual"},
{"icon":"canal","text":"Canal","key":-19,"pos":"-40 163","color":"green","caption":"","imgsrc":"","url":"ventasCanalAnual"},
{"icon":"agentes","text":"Agentes","key":-20,"pos":"90 163","color":"blue","caption":"","imgsrc":"","url":"ventasAgenteAnual"},
{"icon":"producto","text":"Producto","key":-21,"pos":"230 163","color":"pink","caption":"","imgsrc":"","url":"ventasProductoAnual"},
{"icon":"pedido","text":"Litreado","key":-22,"pos":"360 163","color":"purple","caption":"","imgsrc":"","url":"ventasLitreadoAnual"},
{"icon":"marca","text":"Marca","key":-23,"pos":"490 163","color":"orange","caption":"","imgsrc":"","url":"ventasMarcaAnual"},
{"text":"Filtro Clientes","key":-24,"pos":"20 -138","caption":"","imgsrc":""},
{"text":"Filtro Productos","key":-25,"pos":"280 -137","caption":"","imgsrc":""},
{"text":"Filtro Clientes","key":-26,"pos":"20 54","caption":"","imgsrc":""},
{"text":"Filtro Productos","key":-27,"pos":"280 52","caption":"","imgsrc":""},
{"icon":"ventas","text":"Ultimos Costos","key":-4,"pos":"-410 -177","caption":"","imgsrc":"","color":"green","url":"ultimosCostos"},
{"icon":"clientes","text":"Utilidad","key":-28,"pos":"-420 130","color":"green","caption":"","imgsrc":"","url":"utilidad"},
{"icon":"dashboard","text":"Tablero","key":-29,"pos":"-420 -296","color":"green","caption":"","imgsrc":"","url":"dashboard"}
],
  "linkDataArray": [
{"from":-5,"to":-7,"points":[-400,-21.5,-390,-21.5,-355,-21.5,-355,-220,-320,-220,-310,-220],"color":"blue"},
{"from":-5,"to":-9,"points":[-400,-15,-382,-15,-351,-15,-351,2,-320,2,-310,2],"color":"blue"},
{"from":-5,"to":-12,"points":[-400,-8.5,-390,-8.5,-355,-8.5,-355,176,-320,176,-310,176],"color":"blue"},
{"from":-7,"to":-3,"points":[-270,-220,-260,-220,-215,-220,-215,-220,-170,-220,-160,-220]},
{"from":-3,"to":-8,"points":[-120,-220,-110,-220,-80,-220,-80,-220,-50,-220,-40,-220]},
{"from":-8,"to":-6,"points":[0,-220,10,-220,40,-220,40,-220,70,-220,80,-220]},
{"from":-6,"to":-10,"points":[120,-220,130,-220,165,-220,165,-220,200,-220,210,-220]},
{"from":-10,"to":-1,"points":[250,-220,260,-220,295,-220,295,-220,330,-220,340,-220]},
{"from":-1,"to":-11,"points":[380,-220,390,-220,420,-220,420,-226,450,-226,460,-226]},
{"from":-9,"to":-13,"points":[-270,6.333333333333332,-252,6.333333333333332,-216,6.333333333333332,-216,-5,-180,-5,-170,-5]},
{"from":-13,"to":-14,"points":[-130,-5,-120,-5,-90,-5,-90,-5,-60,-5,-50,-5]},
{"from":-14,"to":-15,"points":[-10,-5,0,-5,30,-5,30,-5,60,-5,70,-5]},
{"from":-15,"to":-2,"points":[110,-5,120,-5,160,-5,160,-5,200,-5,210,-5]},
{"from":-2,"to":-16,"points":[250,-5,260,-5,295,-5,295,-5,330,-5,340,-5]},
{"from":-16,"to":-17,"points":[380,-5,390,-5,425,-5,425,-6,460,-6,470,-6]},
{"from":-12,"to":-18,"points":[-270,180.33333333333334,-252,180.33333333333334,-216,180.33333333333334,-216,170,-180,170,-170,170]},
{"from":-18,"to":-19,"points":[-130,170,-120,170,-95,170,-95,170,-70,170,-60,170]},
{"from":-19,"to":-20,"points":[-20,170,-10,170,25,170,25,170,60,170,70,170]},
{"from":-20,"to":-21,"points":[110,170,120,170,160,170,160,170,200,170,210,170]},
{"from":-21,"to":-22,"points":[250,170,260,170,295,170,295,170,330,170,340,170]},
{"from":-22,"to":-23,"points":[380,170,390,170,425,170,425,170,460,170,470,170]},
{"from":-9,"to":-24,"points":[-290,-11,-290,-21,-290,-61.5,20,-61.5,20,-102,20,-112],"color":"lightblue","fromSpot":"Top","toSpot":"BottomSide"},
{"from":-24,"to":-25,"points":[40,-125,50,-125,150,-125,150,-124,250,-124,260,-124]},
{"from":-9,"to":-26,"points":[-290,15,-290,25,-290,67,-150,67,-10,67,0,67],"toSpot":"LeftSide","fromSpot":"Bottom","color":"lightblue"},
{"from":-26,"to":-27,"points":[40,67,50,67,150,67,150,65,250,65,260,65]},
{"from":-7,"to":-24,"points":[-290,-207,-290,-197,-290,-125,-150,-125,-10,-125,0,-125],"fromSpot":"Bottom","color":"lightred"},
{"from":-12,"to":-26,"points":[-290,163,-290,153,-290,121.5,20,121.5,20,90,20,80],"fromSpot":"Top","toSpot":"Bottom","color":"lightgreen"},
{"from":-23,"to":-27,"points":[510,170,520,170,520,65,415,65,310,65,300,65],"fromSpot":"Right","toSpot":"Right"},
{"from":-17,"to":-27,"points":[510,-6,520,-6,520,65,415,65,310,65,300,65],"fromSpot":"Right","toSpot":"Right"},
{"from":-11,"to":-25,"points":[500,-226,510,-226,510,-124,410,-124,310,-124,300,-124],"toSpot":"Right"},
{"from":-17,"to":-25,"points":[510,-6,520,-6,520,-124,415,-124,310,-124,300,-124],"fromSpot":"Right","toSpot":"Right"},
{"from":-5,"to":-4,"points":[-400,-22.8,-390,-22.8,-390,-103.53700714111328,-440,-103.53700714111328,-440,-170,-430,-170]},
{"from":-5,"to":-28,"points":[-400,-6.333333333333332,-390,-6.333333333333332,-390,55.96299285888672,-450,55.96299285888672,-450,137,-440,137]}
]}
    </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>
        <link rel='stylesheet' type='text/css' href='views/assets/css/style.css'>
        <script src='views/assets/js/goSamples.js'></script>
        <script src='views/assets/js/go.js'></script>
        <script id="code">
            function init() {

                // Abstract colors
                var Colors = {
                    "red": "#be4b15",
                    "green": "#52ce60",
                    "blue": "#6ea5f8",
                    "lightred": "#fd8852",
                    "lightblue": "#afd4fe",
                    "lightgreen": "#b9e986",
                    "pink": "#faadc1",
                    "purple": "#d689ff",
                    "orange": "#f08c00"
                }

                var ColorNames = [];
                for (var n in Colors) ColorNames.push(n);

                // a conversion function for translating general color names to specific colors
                function colorFunc(colorname) {
                    var c = Colors[colorname]
                    if (c) return c;
                    return "gray";
                }


                // Icons derived from SVG paths designed by freepik: http://www.freepik.com/
                var Icons = {};
                Icons.pedido =
                    "M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z";

                Icons.producto =
                    "M7.354 5.646a.5.5 0 1 0-.708.708L7.793 7.5 6.646 8.646a.5.5 0 1 0 .708.708L8.5 8.207l1.146 1.147a.5.5 0 0 0 .708-.708L9.207 7.5l1.147-1.146a.5.5 0 0 0-.708-.708L8.5 6.793 7.354 5.646z\
        M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"

                Icons.factura =
                    "M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z\
       M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z";

                Icons.ventas =
                    "M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z";

                Icons.clientes =
                    "M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z\
      M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z\
      M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z";

                Icons.agentes =
                    "M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm4.5 0a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm5 2.755C12.146 12.825 10.623 12 8 12s-4.146.826-5 1.755V14a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-.245z";

                Icons.canal =
                    "M1.333 2.667C1.333 1.194 4.318 0 8 0s6.667 1.194 6.667 2.667V4c0 1.473-2.985 2.667-6.667 2.667S1.333 5.473 1.333 4V2.667z\
        M1.333 6.334v3C1.333 10.805 4.318 12 8 12s6.667-1.194 6.667-2.667V6.334a6.51 6.51 0 0 1-1.458.79C11.81 7.684 9.967 8 8 8c-1.966 0-3.809-.317-5.208-.876a6.508 6.508 0 0 1-1.458-.79z\
        M14.667 11.668a6.51 6.51 0 0 1-1.458.789c-1.4.56-3.242.876-5.21.876-1.966 0-3.809-.316-5.208-.876a6.51 6.51 0 0 1-1.458-.79v1.666C1.333 14.806 4.318 16 8 16s6.667-1.194 6.667-2.667v-1.665z";
                Icons.marca =
                    "M6 4.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm-1 0a.5.5 0 1 0-1 0 .5.5 0 0 0 1 0z\
        M2 1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 1 6.586V2a1 1 0 0 1 1-1zm0 5.586 7 7L13.586 9l-7-7H2v4.586z";
                Icons.usuario =
                    "M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z\
        M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z";

                Icons.dashboard =
                    "M 53.927 78.281 h 31.5 c 1.973 0 3.573 -1.6 3.573 -3.573 V 15.292 c 0 -1.973 -1.6 -3.573 -3.573 -3.573 H 4.573 C 2.6 11.719 1 13.319 1 15.292 v 59.415 c 0 1.973 1.6 3.573 3.573 3.573 h 31.5\
                    M 84.436 11.719 H 5.564 C 3.044 11.719 1 13.763 1 16.284 v 8.732 h 88 v -8.732 C 89 13.763 86.956 11.719 84.436 11.719 z\
                    M 49.501 20 H 7.378 c -0.552 0 -1 -0.448 -1 -1 s 0.448 -1 1 -1 h 42.123 c 0.553 0 1 0.448 1 1 S 50.054 20 49.501 20 z\
                    M 82.622 20 h -3.814 c -0.553 0 -1 -0.448 -1 -1 s 0.447 -1 1 -1 h 3.814 c 0.553 0 1 0.448 1 1 S 83.175 20 82.622 20 z\
                    M 73.622 20 h -3.814 c -0.553 0 -1 -0.448 -1 -1 s 0.447 -1 1 -1 h 3.814 c 0.553 0 1 0.448 1 1 S 74.175 20 73.622 20 z\
                    M 46.907 79.28 h -3.814 c -0.552 0 -1 -0.447 -1 -1 s 0.448 -1 1 -1 h 3.814 c 0.553 0 1 0.447 1 1 S 47.46 79.28 46.907 79.28 z\
                    M 85.427 10.719 H 4.573 C 2.052 10.719 0 12.771 0 15.292 v 59.416 c 0 2.521 2.052 4.572 4.573 4.572 h 31.5 c 0.552 0 1 -0.447 1 -1 s -0.448 -1 -1 -1 h -31.5 C 3.154 77.28 2 76.126 2 74.708 V 26.016 h 86 v 48.692 c 0 1.418 -1.154 2.572 -2.573 2.572 h -31.5 c -0.553 0 -1 0.447 -1 1 s 0.447 1 1 1 h 31.5 c 2.521 0 4.573 -2.051 4.573 -4.572 V 15.292 C 90 12.771 87.948 10.719 85.427 10.719 z M 2 24.016 v -8.723 c 0 -1.419 1.154 -2.573 2.573 -2.573 h 80.854 c 1.419 0 2.573 1.154 2.573 2.573 v 8.723 H 2 z\
                    M 21.512 70.875 h -6.483 c -0.912 0 -1.651 -0.739 -1.651 -1.651 v -5.483 c 0 -0.912 0.739 -1.651 1.651 -1.651 h 6.483 c 0.912 0 1.651 0.739 1.651 1.651 v 5.483 C 23.163 70.136 22.424 70.875 21.512 70.875 z\
                    M 39.332 70.875 h -6.483 c -0.912 0 -1.651 -0.739 -1.651 -1.651 V 58.741 c 0 -0.912 0.739 -1.651 1.651 -1.651 h 6.483 c 0.912 0 1.651 0.739 1.651 1.651 v 10.483 C 40.983 70.136 40.244 70.875 39.332 70.875 z\
                    M 57.151 70.875 h -6.483 c -0.912 0 -1.651 -0.739 -1.651 -1.651 V 46.741 c 0 -0.912 0.739 -1.651 1.651 -1.651 h 6.483 c 0.912 0 1.651 0.739 1.651 1.651 v 22.483 C 58.803 70.136 58.063 70.875 57.151 70.875 z\
                    M 74.971 70.875 h -6.483 c -0.912 0 -1.651 -0.739 -1.651 -1.651 V 34.741 c 0 -0.912 0.739 -1.651 1.651 -1.651 h 6.483 c 0.912 0 1.651 0.739 1.651 1.651 v 34.483 C 76.622 70.136 75.883 70.875 74.971 70.875 z\
                    M 21.512 71.875 h -6.483 c -1.462 0 -2.651 -1.189 -2.651 -2.651 v -5.482 c 0 -1.462 1.189 -2.651 2.651 -2.651 h 6.483 c 1.462 0 2.651 1.189 2.651 2.651 v 5.482 C 24.163 70.686 22.974 71.875 21.512 71.875 z M 15.029 63.09 c -0.359 0 -0.651 0.292 -0.651 0.651 v 5.482 c 0 0.359 0.292 0.651 0.651 0.651 h 6.483 c 0.359 0 0.651 -0.292 0.651 -0.651 v -5.482 c 0 -0.359 -0.292 -0.651 -0.651 -0.651 H 15.029 z\
                    M 39.332 71.875 h -6.483 c -1.462 0 -2.651 -1.189 -2.651 -2.651 V 58.741 c 0 -1.462 1.189 -2.651 2.651 -2.651 h 6.483 c 1.462 0 2.651 1.189 2.651 2.651 v 10.482 C 41.983 70.686 40.793 71.875 39.332 71.875 z M 32.849 58.09 c -0.359 0 -0.651 0.292 -0.651 0.651 v 10.482 c 0 0.359 0.292 0.651 0.651 0.651 h 6.483 c 0.359 0 0.651 -0.292 0.651 -0.651 V 58.741 c 0 -0.359 -0.292 -0.651 -0.651 -0.651 H 32.849 z\
                    M 57.151 71.875 h -6.483 c -1.462 0 -2.651 -1.189 -2.651 -2.651 V 46.741 c 0 -1.462 1.189 -2.651 2.651 -2.651 h 6.483 c 1.462 0 2.651 1.189 2.651 2.651 v 22.482 C 59.803 70.686 58.613 71.875 57.151 71.875 z M 50.668 46.09 c -0.359 0 -0.651 0.292 -0.651 0.651 v 22.482 c 0 0.359 0.292 0.651 0.651 0.651 h 6.483 c 0.359 0 0.651 -0.292 0.651 -0.651 V 46.741 c 0 -0.359 -0.292 -0.651 -0.651 -0.651 H 50.668 z\
                    M 74.971 71.875 h -6.482 c -1.462 0 -2.651 -1.189 -2.651 -2.651 V 34.741 c 0 -1.462 1.189 -2.651 2.651 -2.651 h 6.482 c 1.462 0 2.651 1.189 2.651 2.651 v 34.482 C 77.622 70.686 76.433 71.875 74.971 71.875 z M 68.488 34.09 c -0.359 0 -0.651 0.292 -0.651 0.651 v 34.482 c 0 0.359 0.292 0.651 0.651 0.651 h 6.482 c 0.359 0 0.651 -0.292 0.651 -0.651 V 34.741 c 0 -0.359 -0.292 -0.651 -0.651 -0.651 H 68.488 z";
                var IconNames = [];
                for (var n in Icons) IconNames.push(n);

                // A data binding conversion function. Given an name, return the Geometry.
                // If there is only a string, replace it with a Geometry object, which can be shared by multiple Shapes.
                function geoFunc(geoname) {
                    var geo = Icons[geoname];
                    if (typeof geo === "string") {
                        geo = Icons[geoname] = go.Geometry.parse(geo, true);
                    }
                    return geo;
                }


                var $ = go.GraphObject.make; // for conciseness in defining templates
                myDiagram = $(go.Diagram, "myDiagramDiv", // create a Diagram for the DIV HTML element
                    {
                        initialAutoScale: go.Diagram.Uniform, // scale to show all of the contents
                        "ChangedSelection": onSelectionChanged, // view additional information
                        maxSelectionCount: 1, // don't allow users to select more than one thing at a time
                        isReadOnly: true
                    });

                myDiagram.nodeTemplate =
                    $(go.Node, "Spot", {

                            locationObjectName: "PORT",
                            locationSpot: go.Spot.Top, // location point is the middle top of the PORT
                            linkConnected: updatePortHeight,
                            linkDisconnected: updatePortHeight,
                            toolTip: $("ToolTip",
                                $(go.TextBlock, {
                                        margin: 4,
                                        width: 140
                                    },

                                    new go.Binding("text", "", function(data) {
                                        return data.text + ":\n\n" + data.description;
                                    }))
                            )
                        },
                        new go.Binding("location", "pos", go.Point.parse).makeTwoWay(go.Point.stringify),
                        // The main element of the Spot panel is a vertical panel housing an optional icon,
                        // plus a rectangle that acts as the port
                        $(go.Panel, "Vertical",
                            $(go.Shape, {
                                    width: 40,
                                    height: 0,
                                    stroke: null,
                                    strokeWidth: 0,
                                    fill: "gray"
                                },
                                new go.Binding("height", "icon", function() {
                                    return 40;
                                }),
                                new go.Binding("fill", "color", colorFunc),
                                new go.Binding("geometry", "icon", geoFunc)),
                            $(go.Shape, {
                                    name: "PORT",
                                    width: 40,
                                    height: 24,
                                    margin: new go.Margin(-1, 0, 0, 0),
                                    stroke: null,
                                    strokeWidth: 0,
                                    fill: "gray",
                                    portId: "",
                                    fromLinkable: true,
                                    toLinkable: true
                                },
                                new go.Binding("fill", "color", colorFunc)),
                            $(go.TextBlock, {
                                    font: "Bold 14px Lato, sans-serif",
                                    textAlign: "center",
                                    margin: 3,
                                    maxSize: new go.Size(100, NaN),
                                    alignment: go.Spot.Top,
                                    alignmentFocus: go.Spot.Bottom,
                                    editable: true
                                },
                                new go.Binding("text").makeTwoWay())
                        )
                    );

                function updatePortHeight(node, link, port) {
                    var sideinputs = 0;
                    var sideoutputs = 0;
                    node.findLinksConnected().each(function(l) {
                        if (l.toNode === node && l.toSpot === go.Spot.LeftSide) sideinputs++;
                        if (l.fromNode === node && l.fromSpot === go.Spot.RightSide) sideoutputs++;
                    });
                    var tot = Math.max(sideinputs, sideoutputs);
                    tot = Math.max(1, Math.min(tot, 2));
                    port.height = tot * (10 + 2) + 2; // where 10 is the link path's strokeWidth
                }

                myDiagram.linkTemplate =
                    $(go.Link, {
                            layerName: "Background",
                            routing: go.Link.Orthogonal,
                            corner: 15,
                            reshapable: true,
                            resegmentable: true,
                            fromSpot: go.Spot.RightSide,
                            toSpot: go.Spot.LeftSide
                        },
                        // make sure links come in from the proper direction and go out appropriately
                        new go.Binding("fromSpot", "fromSpot", go.Spot.parse),
                        new go.Binding("toSpot", "toSpot", go.Spot.parse),
                        new go.Binding("points").makeTwoWay(),
                        // mark each Shape to get the link geometry with isPanelMain: true
                        $(go.Shape, {
                                isPanelMain: true,
                                stroke: "gray",
                                strokeWidth: 10
                            },
                            // get the default stroke color from the fromNode
                            new go.Binding("stroke", "fromNode", function(n) {
                                return go.Brush.lighten((n && Colors[n.data.color]) || "gray");
                            }).ofObject(),
                            // but use the link's data.color if it is set
                            new go.Binding("stroke", "color", colorFunc)),
                        $(go.Shape, {
                            isPanelMain: true,
                            stroke: "white",
                            strokeWidth: 3,
                            name: "PIPE",
                            strokeDashArray: [20, 40]
                        })
                    );

                var SpotNames = ["Top", "Left", "Right", "Bottom", "TopSide", "LeftSide", "RightSide", "BottomSide"];

                myDiagram.model = go.Model.fromJson(document.getElementById("mySavedModel").textContent);

                loop(); // animate some flow through the pipes
            }

            var opacity = 1;
            var down = true;

            function loop() {
                var diagram = myDiagram;
                setTimeout(function() {
                    var oldskips = diagram.skipsUndoManager;
                    diagram.skipsUndoManager = true;
                    diagram.links.each(function(link) {
                        var shape = link.findObject("PIPE");
                        var off = shape.strokeDashOffset - 3;
                        // animate (move) the stroke dash
                        shape.strokeDashOffset = (off <= 0) ? 60 : off;
                        // animte (strobe) the opacity:
                        if (down) opacity = opacity - 0.01;
                        else opacity = opacity + 0.003;
                        if (opacity <= 0) {
                            down = !down;
                            opacity = 0;
                        }
                        if (opacity > 1) {
                            down = !down;
                            opacity = 1;
                        }
                        shape.opacity = opacity;
                    });
                    diagram.skipsUndoManager = oldskips;
                    loop();
                }, 60);
            }

            function onSelectionChanged() {
                var node = myDiagram.selection.first();
                if (!(node instanceof go.Node)) return;
                var data = node.data;
                var image = document.getElementById("Image");
                var title = document.getElementById("Title");
                var description = document.getElementById("Description");
                var url = data.url;

                if (url == undefined) {


                } else {

                    window.open(data.url, '_blank');
                }

                if (data.imgsrc) {
                    image.src = data.imgsrc;
                    image.alt = data.caption;
                } else {
                    image.src = "";
                    image.alt = "";
                }
                title.textContent = data.text;

                if (data.description) {
                    description.textContent = data.description;
                } else {
                    description.textContent = '';
                }
            }
        </script>

        <script type="text/javascript">
            shortcut.add("f2", function() {
                openModal();
            });

            function openModal() {
                $("#modalProcesos").modal("show");
                init();
            }
        </script>