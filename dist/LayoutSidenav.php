<div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <!--start sidebar-->
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Página principal</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Página principal
                        </a>
                        <!-- start sub-menu Busquedas-->
                        
                        <a class="nav-link collapsed" data-target="#Busquedas" href="#" data-toggle="collapse"  aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-search"></i></div>
                            Busquedas
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="Busquedas" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="./ListaCirculares.php">Busqueda Interna</a>
                                <a class="nav-link" href="BusquedasObligatorias.php">Busqueda Obligada</a>
                                <a class="nav-link" href="BusquedaMensual.php">Busqueda Mensual</a>
                            </nav>
                        </div>
                        <!-- end sub-menu Busquedas-->
                        
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Listas" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Listas de datos
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="Listas" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="ListaClientes.php">lista de clientes</a>
                                <a class="nav-link" href="ListaEmpleados.php">Lista de empleados</a>
                                <a class="nav-link" href="ListaProveedores.php">Lista de proveedores</a>
                                <a class="nav-link" href="ListaInterna.php">Lista restrictiva</a>
                                
                            </nav>
                        </div>
                        <!-- end sub-menu listas-->
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Informes" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
                            Informes y reportes
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        
                        <div class="collapse" id="Informes" aria-labelledby="headingThree" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="./listaInformesIDD.php">Informe IDD</a>
                                <a class="nav-link" href="./Matrices.php">Matrices de Riegos</a>
                            </nav>
                        </div>
                        <!-- end sub-menu Informes-->
                        
                        <!-- start sub-menu Administracion-->
                        <?php if ($rol == 1) { ?>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Admin" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-tools"></i></div>
                                Administración
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        
                        <div class="collapse" id="Admin" aria-labelledby="headingFour" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="adminTablasPic.php">Gestiones administrativas</a>
                                <a class="nav-link" href="#.php">Clientes de Credito</a>
                                
                            </nav>
                        </div>
                         
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#security" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-lock"></i></div>
                                Seguridad
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        
                        <div class="collapse" id="security" aria-labelledby="headingFive" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="./Usuario.php">Usuario</a> 
                                <a class="nav-link" href="./Roles.php">Roles</a>
                                <a class="nav-link" href="#">Permisos</a> 
                            </nav>
                        </div>

                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#trx_menu" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-exclamation-circle"></i></i></div>
                                Señales de alerta
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        
                        <div class="collapse" id="trx_menu" aria-labelledby="headingSix" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="./Trx_alertas_diarias.php">Alertas diarias</a> 
                                <a class="nav-link" href="#">Informe de Alertas</a> 
                                <a class="nav-link" href="#">Cargar Alertas</a>
                            </nav>
                        </div>
                        
                    </div>
                    <?php } ?>
                     <!--end sidebar-->
                </div>

                <div class="sb-sidenav-footer">
                    <div class="small">Registrado como:</div>
                    <?php echo $nombre; ?>
                </div>
            </nav>
        </div>