<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Administrar Registro de Visitas

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Administrar Registro de Visitas</li>

        </ol>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-header with-border">

                <button class="btn btn-primary" data-toggle="modal" id="agregarFuncionario">

                    Agregar Visita

                </button>

                <button class="btn btn-primary" id="actualizar"><img src="vistas/img/plantilla/android-o-iconos-adaptivos.gif" width="30px" /><strong> Actualizar Registros</strong></button>
                <?php

                if (isset($_GET["fechaInicial"])) {
                } else {

                    echo '<a href="vistas/modulos/descargar-reporte.php?reporte=reporte">';
                }

                ?>

                <button class="btn btn-success" style="margin-top:5px">Descargar reporte en Excel</button>
                </a>
            </div>



            <div class="box-body" id="resultados">

                <br>
                <table class="table table-bordered table-striped dt-responsive tablaRegistro tablaActualizar" width="100%">

                    <thead>

                        <tr>

                            <th style="width:10px">#</th>
                            <th>ACCIONES</th>
                            <th>Tipo Doc.</th>
                            <th>N° Doc Visitante</th>
                            <th>Nombre Visitante</th>
                            <th>Cargo de Visitante</th>
                            <th>Entidad Visitante</th>
                            <th>Movito</th>
                            <th>Funcionario</th>
                            <th>Area/Oficina</th>
                            <th>Cargo</th>
                            <th>Fecha de Ingreso</th>
                            <th>Hora de Ingreso</th>
                            <th>Fecha de Salida</th>
                            <th>Hora de Salida</th>
                            <th>Digitador</th>

                        </tr>

                    </thead>



                </table>

            </div>

        </div>

    </section>

</div>


<!--=====================================
MODAL AGREGAR VISITA
======================================-->

<div id="modalAgregarRegistro" class="modal fade" role="dialog" style="overflow-y: scroll;">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Agregar Visita</h4>

                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->

                <div class="modal-body">

                    <div class="content">

                        <div class="row">

                            <div class="col-lg-12">

                                <p class="help-block"><strong>FUNCIONARIO VISITANTE:</strong></p>

                                <div class="form-row">

                                    <div class="from-group col-md-12">

                                        <div class="input-group">

                                            <span class="input-group-addon">Tipo Doc</span>

                                            <input type="text" class="form-control input-lx" id="nuevTipoDocumento" name="nuevTipoDocumento" placeholder="Tipo de Documento" require readonly>

                                        </div>

                                    </div>
                                    
                                </div>

                                <!-- ENTRADA PARA SELECCIONAR CATEGORÍA DEL REGISTRO-->
                                <div class="form-row">

                                    <div class="form-group col-md-5">

                                        <div class="input-group ">

                                            <span class="input-group-addon">N° Doc:</span>

                                            <input type="text" class="form-control input-lx" maxlength="15" id="nuevDniVisitaFuncionario" name="nuevDniVisitaFuncionario" placeholder="N° Doc Funcionario" required>


                                        </div>
                                    </div>

                                    <div class="form-group col-md-7">

                                        <div class="input-group">

                                            <button type="button" class="btn btn-primary" id="buscarFuncionario">BUSCAR</button>
                                            <button type="button" class="btn btn-primary" id="crearFuncionario">CREAR</button>
                                            <button type="button" class="btn btn-primary" id="limpiarFuncionario">LIMPIAR</button>


                                        </div>

                                    </div>


                                </div>
                                <!-- ENTRADA PARA NOMBRE FUNCIONARIO -->
                                <div class="fron-row">

                                    <div class="form-group col-md-12">

                                        <div class="input-group">

                                            <span class="input-group-addon">Nombre Funcionario:</span>

                                            <input type="text" class="form-control input-lx" id="nuevNombreFuncionario" name="nuevNombreFuncionario" placeholder="Nombre del Funcionario" readonly required>
                                            <input class="hidden" type="text" id="nuevIdFuncionario" name="nuevIdFuncionario">

                                        </div>

                                    </div>

                                    <!-- ENTRADA PARA NOMBRE FUNCIONARIO -->

                                    <div class="form-group col-md-12">

                                        <div class="input-group">

                                            <span class="input-group-addon">Cargo Funcionario:</span>

                                            <input type="text" class="form-control input-lx" id="nuevCargoFuncionario" name="nuevCargoFuncionario" placeholder="Cargo del Funcionario" readonly required>

                                        </div>

                                    </div>

                                    <!-- ENTRADA PARA CARGO FUNCIONARIO -->

                                    <div class="form-group col-md-12">

                                        <div class="input-group">

                                            <span class="input-group-addon">Entidad:</span>

                                            <input type="text" class="form-control input-lx" id="nuevEntidadFuncionario" name="nuevEntidadFuncionario" placeholder="Entidad del Funcionario" readonly required>

                                        </div>

                                    </div>

                                    <!-- ENTRADA PARA USUARIO REGISTRADOR -->

                                    <div class="form-group col-md-12">

                                        <div class="input-group">

                                            <span class="input-group-addon">Digitador:</span>

                                            <input type="text" class="form-control input-lx" id="nuevUsuarioDigitador" name="nuevUsuarioDigitador" value="<?php echo $_SESSION["nombre"]; ?>" readonly>

                                        </div>

                                    </div>

                                </div>


                                <p class="help-block"><strong>FUNCIONARIO DE LA ENTIDAD:</strong></p>

                                <!-- ENTRADA PARA NOMBRE FUNCIONARIO VISITADO-->
                                <div class="fron-row">

                                    <div class="form-group col-md-12">

                                        <div class="input-group">

                                            <span class="input-group-addon">Nombre Funcionario:</span>

                                            <input type="text" class="form-control input-lx" name="nuevNombreFuncionarioLocal" placeholder="Nombre del Funcionario" required>


                                        </div>

                                    </div>




                                    <!-- ENTRADA PARA AREA O OFICINA FUNCIONARIO VISITADO-->

                                    <div class="form-group col-md-12">

                                        <div class="input-group">

                                            <span class="input-group-addon">Cargo Funcionario:</span>

                                            <input type="text" class="form-control input-lx" name="nuevAreaOfFuncionarioLocal" placeholder="Area o Oficina del Funcionario" required>

                                        </div>

                                    </div>

                                    <!-- ENTRADA PARA CARGO EN FUNCIONARIO VISITADO -->

                                    <div class="form-group col-md-12">

                                        <div class="input-group">

                                            <span class="input-group-addon">Entidad:</span>

                                            <input type="text" class="form-control input-lx" name="nuevCargoFuncionarioLocal" placeholder="Cargo del Funcionario" required>

                                        </div>

                                    </div>



                                    <p class="help-block"><strong>MOVITO DE LA VISITA:</strong></p>
                                    <!-- ENTRADA PARA MOTIVO DE VISITA DEL FUNCIONARIO A LA ENTIDAD -->

                                    <div class="form-group col-md-12">

                                        <div class="input-group">

                                            <span class="input-group-addon"></span>

                                            <input type="text" class="form-control input-lx" name="nuevMotivo" placeholder="Motivo" required>

                                        </div>

                                    </div>
                                </div>

                            </div> <!-- FIN DEL LA COLUMNA DE FORMULARIO VISITANTE -->

                            <!-- TABLA DE FENCIONARIOS VISITANTES -->
                            <div class="col-lg-12">

                                <table class="table table-bordered table-striped dt-responsive tablas tablasListado" width="100%">

                                    <thead>

                                        <tr>

                                            <th style="width:10px">#</th>
                                            <th>Acciones</th>
                                            <th>Tipo Documento</th>
                                            <th>N° Documento</th>
                                            <th>Nombre</th>
                                            <th>Entidad</th>
                                            <th>Cargo</th>
                                            <th>Fecha</th>
                                        </tr>

                                    </thead>

                                    <tbody>

                                        <?php

                                        $item = null;
                                        $valor = null;

                                        $funcionario = ControladorFuncionario::ctrMostrarFuncionario($item, $valor);

                                        foreach ($funcionario as $key => $value) {


                                            echo ' <tr>                            
            
                                                <td>' . ($key + 1) . '</td>                       
                                                    <td>

                                                    <div class="btn-group">
                                                        
                                                        <button class="btn btn-warning  listarFuncionario" idFuncionarioLista="' . $value["id"] . '"><i class="fa fa-pencil"></i></button>

                                                    </div>  

                                                    </td>
                                                <td>' . $value["tipo_documento"] . '</td>
                                                <td>' . $value["num_documento"] . '</td>
                                                <td>' . $value["nombre"] . '</td>
                                                <td>' . $value["entidad"] . '</td>
                                                <td>' . $value["cargo"] . '</td>
                                                <td>' . $value["fecha_registro"] . '</td>
                                            
                                            </tr>';
                                        }

                                        ?>

                                    </tbody>

                                </table>



                            </div>
                        </div>
                    </div>
                </div>

                <!--=====================================
                PIE DEL MODAL
                ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary actualizar">Guardar Registro</button>

                </div>

            </form>

            <?php

            $registroVisita = new ControladorRegistro();
            $registroVisita->ctrCrearRegistro();


            ?>

        </div>

    </div>

</div>

<!--=====================================
MODAL EDITAR REGISTRO
======================================-->

<div id="modalEditarRegistro" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
                    CABEZA DEL MODAL
                    ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Editar Visita</h4>

                </div>

                <!--=====================================
                    CUERPO DEL MODAL
                    ======================================-->

                <div class="modal-body">


                    <p class="help-block"><strong>FUNCIONARIO VISITANTE:</strong></p>


                    <!-- ENTRADA PARA SELECCIONAR CATEGORÍA DEL REGISTRO-->
                    <div class="form-row">
                        <div class="form-group col-md-12">

                            <div class="input-group ">

                                <span class="input-group-addon">Tipo Doc:</span>

                                <input type="text" class="form-control input-lx" maxlength="15" id="editarDniVisitaFuncionario" name="editarDniVisitaFuncionario" readonly>


                            </div>
                        </div>

                    </div>
                    <!-- ENTRADA PARA NOMBRE FUNCIONARIO -->
                    <div class="fron-row">

                        <div class="form-group col-md-12">

                            <div class="input-group">

                                <span class="input-group-addon">Nombre Funcionario:</span>

                                <input type="text" class="form-control input-lx" id="editarNombreFuncionario" name="editarNombreFuncionario" readonly>
                                <input class="hidden" type="text" id="editarIdFuncionario" name="editarIdFuncionario">

                            </div>

                        </div>

                        <!-- ENTRADA PARA NOMBRE FUNCIONARIO -->

                        <div class="form-group col-md-12">

                            <div class="input-group">

                                <span class="input-group-addon">Cargo Funcionario:</span>

                                <input type="text" class="form-control input-lx" id="editarCargoFuncionario" name="editarCargoFuncionario" readonly>

                            </div>

                        </div>

                        <!-- ENTRADA PARA CARGO FUNCIONARIO -->

                        <div class="form-group col-md-12">

                            <div class="input-group">

                                <span class="input-group-addon">Entidad:</span>

                                <input type="text" class="form-control input-lx" id="editarEntidadFuncionario" name="editarEntidadFuncionareditar" readonly>

                            </div>

                        </div>

                        <!-- ENTRADA PARA USUARIO REGISTRADOR -->

                        <div class="form-group col-md-12">

                            <div class="input-group">

                                <span class="input-group-addon">Digitador:</span>

                                <input type="text" class="form-control input-lx" id="editarUsuarioDigitador" name="editarUsuarioDigitador" readonly>

                            </div>

                        </div>

                    </div>


                    <p class="help-block"><strong>FUNCIONARIO DE LA ENTIDAD:</strong></p>

                    <!-- ENTRADA PARA NOMBRE FUNCIONARIO VISITADO-->
                    <div class="fron-row">

                        <div class="form-group col-md-12">

                            <div class="input-group">

                                <span class="input-group-addon">Nombre Funcionario:</span>

                                <input type="text" class="form-control input-lx" id="editarNombreFuncionarioLocal" name="editarNombreFuncionarioLocal" required>


                            </div>

                        </div>




                        <!-- ENTRADA PARA AREA O OFICINA FUNCIONARIO VISITADO-->

                        <div class="form-group col-md-12">

                            <div class="input-group">

                                <span class="input-group-addon">Cargo Funcionario:</span>

                                <input type="text" class="form-control input-lx" id="editarAreaOfFuncionarioLocal" name="editarAreaOfFuncionarioLocal" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA CARGO EN FUNCIONARIO VISITADO -->

                        <div class="form-group col-md-12">

                            <div class="input-group">

                                <span class="input-group-addon">Entidad:</span>

                                <input type="text" class="form-control input-lx" id="editarCargoFuncionarioLocal" name="editarCargoFuncionarioLocal" required>

                            </div>

                        </div>



                        <p class="help-block"><strong>MOVITO DE LA VISITA:</strong></p>
                        <!-- ENTRADA PARA MOTIVO DE VISITA DEL FUNCIONARIO A LA ENTIDAD -->

                        <div class="form-group col-md-12">

                            <div class="input-group">

                                <span class="input-group-addon"></span>

                                <input type="text" class="form-control input-lx" id="editarMotivo" name="editarMotivo" required>

                            </div>

                        </div>
                    </div>
                    <!-- ENTRADA PARA FECHA DE REGISTRO -->
                    <div class="form-row">

                        <p class="help-block">Fecha de Salida del Funcionario:</p>

                        <div class="form-group col-md-6">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                                <input type="date" class="form-control input-lx" id="editarFechaSalida" name="editarFechaSalida" required>

                            </div>


                        </div>

                        <div class="form-group col-md-6">

                            <div class="input-group" id="datetimepicker3">

                                <input type='text' class="form-control" id="editarHoraSalida" name="editarHoraSalida" />

                                <span class="input-group-addon">

                                    <span class="glyphicon glyphicon-time"></span>

                                </span>

                            </div>

                        </div>

                    </div>

                </div>

                <!--=====================================
                    PIE DEL MODAL
                    ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary actualizar">Guardar Registro</button>

                </div>

            </form>



        </div>

    </div>

</div>


<!--=====================================
MODAL AGREGAR FUNCIONARIO
======================================-->

<div id="modalAgregarFuncionarioVisita" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Agregar Funcionario</h4>

                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->

                <div class="modal-body">

                    <div class="box-body">

                        <div class="form-row">



                            <!-- ENTRADA PARA SELECCIONAR DOCUMENTO DEL REGISTRO-->

                            <div class="form-group col-md-12">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                    <select class="form-control input-lx" id="nuevTipoDocumento" name="nuevTipoDocumento" required>

                                        <option value="">Tipo de Documento</option>

                                        <?php
                                        $item = null;
                                        $valor = null;

                                        $documento = ControladorDocumento::ctrMostrarDocumento($item, $valor);

                                        foreach ($documento as $key => $value) {

                                            echo '<option value="' . $value["id"] . '">' . $value["tipo_documento"] . '</option>';
                                        }
                                        ?>

                                    </select>


                                </div>

                            </div>

                            <!-- ENTRADA PARA NUMERO DE DOCUMENTO (DNI) -->

                            <div class="form-group col-md-12">

                                <div class="input-group ">

                                    <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                                    <input type="text" class="form-control input-lx dni validardni dniLocalStore" maxlength="15" id="dni" name="dni" placeholder="Documento de Identidad" required>


                                    <span class="input-group-addon">
                                        <button type="button" id="consultar" class="btn btn-primary btn-xs consultar">
                                            Consultar
                                        </button>
                                    </span>

                                </div>

                            </div>
                            <!-- ENTRADA PARA EL NOMBRE Y APELLIDO-->

                            <div class="form-group col-md-12">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                    <input type="text" class="form-control input-lx nuevoNombre" id="nuevNombre" name="nuevNombre" placeholder="Nombres y Apellidos" required>

                                </div>


                            </div>



                            <!-- ENTRADA PARA CARGO -->
                            <div class="form-group col-md-12">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>

                                    <input type="text" class="form-control input-lx" name="nuevCargo" placeholder="Cargo" required>

                                </div>

                            </div>


                            <!-- ENTRADA PARA SELECCIONAR ENTIDAD-->
                            <div class="form-group col-md-12">

                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-university"></i></span>


                                    <select id="nuevEntidadSelectSearch" name="nuevEntidad">
                                        <!-- id="nuevEntidadFun" -->
                                        <option value="">BUSCAR ENTIDAD DEL FUNCIONARIO</option>

                                        <?php
                                        $item = null;
                                        $valor = null;

                                        $entidad = ControladorEntidad::ctrMostrarEntidad($item, $valor);

                                        foreach ($entidad as $key => $value) {

                                            echo '<option value="' . $value["id"] . '">' . $value["entidad"] . '</option>';
                                        }
                                        ?>

                                    </select>

                                    <!-- <span class="input-group-addon"><button type="button" class="btn btn-primary btn-xs" id="agregarEntidades">Agregar</button></span> -->


                                </div>


                            </div>


                        </div>

                    </div>

                </div>

                <!--=====================================
                PIE DEL MODAL
                ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary" id="crearFuncionarioVisita">Guardar Funcionario</button>

                </div>

                <?php
                $crearFuncionario = new ControladorFuncionario();
                $crearFuncionario->ctrCrearFuncionarioVisita();
                ?>

            </form>

        </div>

    </div>

</div>


<?php

?>