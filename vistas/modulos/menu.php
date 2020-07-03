<aside class="main-sidebar">

    <section class="sidebar">

        <ul class="sidebar-menu">

            <?php
            if ($_SESSION["perfil"] == "Informatico" || $_SESSION["perfil"] == "Usuario") {
                echo '
            <li>

                <a href="usuarios">

                    <i class="fa fa-user"></i>
                    <span>Usuarios</span>

                </a>

            </li>
                     
                <li>

                    <a href="ticket">

                        <i class="fa fa-product-hunt"></i>
                        <span>Paciente</span>

                    </a>

                </li>            
            <li>

                <a href="distrito">

                    <i class="fa fa-map"></i>
                    <span>Distrito</span>

                </a>

            </li>

            <li>

            <a href="documento">

                <i class="fa fa-id-card"></i>
                <span>Tipo de Documento</span>

            </a>

            </li>';
            } else if ($_SESSION["perfil"] = "Administrador") {
                echo '           
 
            <li>

                <a href="registro">

                    <i class="fa fa-registered"></i>
                    <span>Registro</span>

                </a>

            </li>   
            <li>

                <a href="usuarios">

                    <i class="fa fa-user"></i>
                    <span>Usuarios</span>

                </a>

            </li>
            <li>

                <a href="funcionario">

                    <i class="fa fa-universal-access"></i>
                    <span>Funcionario</span>

                </a>

            </li>



            <li>

                <a href="entidad">

                    <i class="fa fa-university"></i>
                    <span>Entidad</span>

                </a>

            </li>

            <li>

            <a href="documento">

                <i class="fa fa-id-card"></i>
                <span>Tipo de Documento</span>

            </a>

            </li>

            <li>

            <a href="perfil">

                <i class="fa fa-users"></i>
                <span>Perfil</span>

            </a>

            </li>

            <li class="treeview">

                <a href="#">

                    <i class="fa fa-list-ul"></i>
                    
                    <span>Reporte</span>
                    
                    <span class="pull-right-container">
                    
                        <i class="fa fa-angle-left pull-right"></i>

                    </span>

                </a>

            <ul class="treeview-menu">
                
                <li>

                    <a href="reporteticket">
                        
                        <i class="fa fa-circle-o"></i>
                        <span>Reporte Ticket</span>

                    </a>

                </li>
             </ul>   ';
            }
            ?>


            <!--            <li>
            
                            <a href="clientes">
            
                                <i class="fa fa-users"></i>
                                <span>Clientes</span>
            
                            </a>
            
                        </li>-->

            <!--            <li class="treeview">
            
                            <a href="#">
            
                                <i class="fa fa-list-ul"></i>
            
                                <span>Ventas</span>
            
                                <span class="pull-right-container">
            
                                    <i class="fa fa-angle-left pull-right"></i>
            
                                </span>
            
                            </a>
            
                            <ul class="treeview-menu">
            
                                <li>
            
                                    <a href="ventas">
            
                                        <i class="fa fa-circle-o"></i>
                                        <span>Administrar ventas</span>
            
                                    </a>
            
                                </li>
            
                                <li>
            
                                    <a href="crear-venta">
            
                                        <i class="fa fa-circle-o"></i>
                                        <span>Crear venta</span>
            
                                    </a>
            
                                </li>
            
                                <li>
            
                                    <a href="reportes">
            
                                        <i class="fa fa-circle-o"></i>
                                        <span>Reporte de ventas</span>
            
                                    </a>
            
                                </li>
            
                            </ul>
            
                        </li>-->

        </ul>
    </section>

</aside>