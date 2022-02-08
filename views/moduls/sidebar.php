<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">

        <?php
        session_start();

        if ($_SESSION["modulo"] == "Ventas") {
            if ($_SESSION["grupo"] != 'Almacen') {
                echo '<div class="pcoded-navigation-label">Tablero</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="active">
                        <a href="dashboard" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-home"></i><b></b></span>
                            <span class="pcoded-mtext">Tablero 1</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
        
                    </li>
                   
                </ul>
        
                <div class="pcoded-navigation-label">Detalle</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="">
                        <a href="detalleDocumentos" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-money"></i><b>UC</b></span>
                            <span class="pcoded-mtext">Detalle Documentos</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
                <div class="pcoded-navigation-label">Ventas Diarias</div>
        
                <ul class="pcoded-item pcoded-left-item">
                    <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i><b></b></span>
                            <span class="pcoded-mtext">Ventas</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class=" ">
                                <a href="ventasClienteDiario" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Cliente</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class=" ">
                                <a href="ventasCanalDiario" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Canal</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="ventasAgenteDiario" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Agente</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="ventasProductoDiario" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Productos</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="ventasLitreadoDiario" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Productos Litreados</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="ventasMarcaDiario" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Marca</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
        
        
                        </ul>
                    </li>
                </ul>
                <div class="pcoded-navigation-label">Ventas Mensual</div>
        
                <ul class="pcoded-item pcoded-left-item">
                    <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i><b></b></span>
                            <span class="pcoded-mtext">Ventas</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class=" ">
                                <a href="ventasClienteMensual" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Cliente</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class=" ">
                                <a href="ventasCanalMensual" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Canal</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="ventasAgenteMensual" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Agente</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="ventasProductoMensual" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Productos</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="ventasLitreadoMensual" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Productos Litreados</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="ventasMarcaMensual" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Marca</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
        
        
        
                        </ul>
                    </li>
                </ul>
                <div class="pcoded-navigation-label">Ventas Anual</div>
        
                <ul class="pcoded-item pcoded-left-item">
                    <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i><b></b></span>
                            <span class="pcoded-mtext">Ventas</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class=" ">
                                <a href="ventasClienteAnual" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Cliente</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class=" ">
                                <a href="ventasCanalAnual" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Canal</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="ventasAgenteAnual" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Agente</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="ventasProductoAnual" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Productos</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="ventasLitreadoAnual" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Productos Litreados</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="ventasMarcaAnual" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Marca</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
        
        
        
                        </ul>
                    </li>
                </ul>
                <div class="pcoded-navigation-label">Ultimos Costos</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="">
                        <a href="ultimosCostos" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-money"></i><b>UC</b></span>
                            <span class="pcoded-mtext">Ultimos Costos</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
                <!--
                <div class="pcoded-navigation-label">Margenes de Utilidad</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="">
                        <a href="utilidad" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-money"></i><b>UC</b></span>
                            <span class="pcoded-mtext">Utilidad</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    -->
                </ul>
                ';
            } else {
                echo '<div class="pcoded-navigation-label">Ultimos Costos</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="">
                        <a href="ultimosCostos" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-money"></i><b>UC</b></span>
                            <span class="pcoded-mtext">Ultimos Costos</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>';
            }


            if ($_SESSION["nombre"] == 'Elsa Martinez') {

                echo ' <div class="pcoded-navigation-label">Administracion</div><ul class="pcoded-item pcoded-left-item">
                <li class="pcoded-hasmenu">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i><b></b></span>
                        <span class="pcoded-mtext">Administracion</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                    <ul class="pcoded-submenu">
                    <li class="">
                        <a href="usuarios" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-user"></i><b>UC</b></span>
                            <span class="pcoded-mtext">Usuarios</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="">
                        <a href="bitacora" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-user"></i><b>UC</b></span>
                            <span class="pcoded-mtext">Bitacora</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class=" ">
                            <a href="conceptosPinturas" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                <span class="pcoded-mtext">Pinturas</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class=" ">
                            <a href="conceptosFlex" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                <span class="pcoded-mtext">Flex</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        
    
                    </ul>
                </li>
            </ul>';
            }

            echo '<div class="pcoded-navigation-label">Mi Perfil</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="">
                    <a href="miPerfil" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-pencil-alt"></i><b>UC</b></span>
                        <span class="pcoded-mtext">Mi perfil</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            </ul>';
        } else {

            if ($_SESSION["grupo"] == "Tiendas") {
            } else {
                echo '<div class="pcoded-navigation-label">Tablero</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="active">
                    <a href="dashboardInventarios" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-home"></i><b></b></span>
                        <span class="pcoded-mtext">Tablero</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
    
                </li>
            </ul>';
            }

            echo '<ul class="pcoded-item pcoded-left-item">
                <li class="">
                    <a href="requisiciones" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-bookmark-alt"></i><b></b></span>
                        <span class="pcoded-mtext">Requisiciones de Material</span>
                        <span class="pcoded-mcaret"></span>
                    </a>

                </li>
            </ul>';
            echo '<ul class="pcoded-item pcoded-left-item">
                <li class="">
                    <a href="recordatorios" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-calendar"></i><b></b></span>
                        <span class="pcoded-mtext">Recordatorios</span>
                        <span class="pcoded-mcaret"></span>
                    </a>

                </li>
            </ul>';
            echo '<ul class="pcoded-item pcoded-left-item">
            <li class="">
                <a href="existencias" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-package"></i><b></b></span>
                    <span class="pcoded-mtext">Existencias y costos</span>
                    <span class="pcoded-mcaret"></span>
                </a>

            </li>
        </ul>';
            if ($_SESSION["grupo"] == "Administracion") {
                echo '<ul class="pcoded-item pcoded-left-item">
                <li class="pcoded-hasmenu">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-money"></i><b></b></span>
                        <span class="pcoded-mtext">Compras</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                    <ul class="pcoded-submenu">
                    <li class="">
                        <a href="compras" class="waves-effect waves-dark">
                            <span class="pcoded-mtext">Compras</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="">
                        <a href="ordenesCompra" class="waves-effect waves-dark">
                            <span class="pcoded-mtext">Órdenes de compra</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="">
                    <a href="autorizacionesCompra" class="waves-effect waves-dark">
                        <span class="pcoded-mtext">Autorizaciones de Compra</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                   
    
                    </ul>
                </li>
            </ul>';
                echo '<ul class="pcoded-item pcoded-left-item">
                <li class="pcoded-hasmenu">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-flag-alt"></i><b></b></span>
                        <span class="pcoded-mtext">Movimientos</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                    <ul class="pcoded-submenu">
                    <li class="">
                        <a href="entradas" class="waves-effect waves-dark">
                            <span class="pcoded-mtext">Entradas</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="">
                        <a href="salidas" class="waves-effect waves-dark">
                            <span class="pcoded-mtext">Salidas</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="">
                        <a href="existencias" class="waves-effect waves-dark">
                            <span class="pcoded-mtext">Existencias</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="">
                        <a href="traspasos" class="waves-effect waves-dark">
               
                            <span class="pcoded-mtext">Traspasos</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                   
    
                    </ul>
                </li>
            </ul>';
            }


            echo '<ul class="pcoded-item pcoded-left-item">
                <li class="pcoded-hasmenu">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-bookmark-alt"></i><b></b></span>
                        <span class="pcoded-mtext">Pedidos</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                    <ul class="pcoded-submenu">
                    <li class="">
                        <a href="pedidoSugerido" class="waves-effect waves-dark">
                            <span class="pcoded-mtext">Pedido Sugerido</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="">
                        <a href="nuevoPedido" class="waves-effect waves-dark">
                            <span class="pcoded-mtext">Crear Pedido</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="">
                        <a href="pedidosRealizados" class="waves-effect waves-dark">
                            <span class="pcoded-mtext">Pedidos Realizados</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                
  
                    </ul>
                </li>
            </ul>';
            echo '<ul class="pcoded-item pcoded-left-item">
                <li class="pcoded-hasmenu">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-dropbox"></i><b></b></span>
                        <span class="pcoded-mtext">Inventarios</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                    <ul class="pcoded-submenu">
                    <li class="">
                        <a href="realizarInventario" class="waves-effect waves-dark">
                            <span class="pcoded-mtext">Realizar Inventario</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="">
                        <a href="inventariosRealizados" class="waves-effect waves-dark">
                            <span class="pcoded-mtext">Inventarios Realizados</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    </ul>
                </li>
            </ul>
            ';
        }
        ?>
    </div>

</nav>