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
                            <th>Funcionario</th>
                            <th>Cargo</th>
                            <th>Entidad</th>
                            <th>Motivo</th>
                            <th>Fecha de Ingreso</th>
                            <th>Fecha de Salida</th>
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
                    <!-- ENTRADA PARA SELECCIONAR CATEGORÍA DEL REGISTRO-->
                    <div class="form-row">
                        <div class="form-group col-md-6">

                            <div class="input-group ">

                                <span class="input-group-addon">Tipo Doc:</span>

                                <input type="text" class="form-control input-lx" maxlength="15" id="nuevDniVisitaFuncionario" name="nuevDniVisitaFuncionario" placeholder="N° Doc Funcionario" required>


                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="input-group">

                                <button type="button" class="btn btn-primary" id="buscarFuncionario">BUSCAR</button>
                                <button type="button" class="btn btn-primary" id="crearFuncionario">CREAR</button>
                                <button type="button" class="btn btn-primary" id="limpiarFuncionario">LIMPIAR</button>


                            </div>

                        </div>


                    </div>
                    <!-- ENTRADA PARA NOMBRE FUNCIONARIO -->

                    <div class="form-group">

                        <div class="input-group">

                            <span class="input-group-addon">Nombre Funcionario:</span>

                            <input type="text" class="form-control input-lx" id="nuevNombreFuncionario" name="nuevNombreFuncionario" placeholder="Nombre Funcionario" readonly required>

                        </div>

                    </div>

                    <!-- ENTRADA PARA NOMBRE FUNCIONARIO -->

                    <div class="form-group">

                        <div class="input-group">

                            <span class="input-group-addon">Cargo Funcionario:</span>

                            <input type="text" class="form-control input-lx" id="nuevCargoFuncionario" name="nuevCargoFuncionario" placeholder="Cargo Funcionario" readonly required>

                        </div>

                    </div>

                    <!-- ENTRADA PARA CARGO FUNCIONARIO -->

                    <div class="form-group">

                        <div class="input-group">

                            <span class="input-group-addon">Entidad:</span>

                            <input type="text" class="form-control input-lx" id="nuevEntidadFuncionario" name="nuevEntidadFuncionario" placeholder="Entidad Funcionario" readonly required>

                        </div>

                    </div>

                    <!-- ENTRADA PARA FECHA DE REGISTRO -->
                    <div class="form-row">

                        <p class="help-block">Fecha de Salida del Funcionario:</p>

                        <div class="form-group col-md-6">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                                <input type="date" class="form-control input-lx" name="nuevFecha" required>

                            </div>


                        </div>

                        <div class="form-group col-md-6">

                            <div class="input-group" id="datetimepicker3">

                                <input type='text' class="form-control" />

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

            <?php

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

                    <h4 class="modal-title">Editar Paciente</h4>

                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->

                <div class="modal-body">

                    <div class="box-body">
                        <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                <select class="form-control input-lx" id="editarCatg" name="editarCategoria" readonly required>

                                    <option id="editarCategoria"></option>



                                </select>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL CÓDIGO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-code"></i></span>

                                <input type="text" class="form-control input-lx" id="editarCodigo" name="editarCodigo" readonly required>

                            </div>

                        </div>
                        <!-- ENTRADA PARA SELECCIONAR TIPO DE DOCUMENTO-->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                <select class="form-control input-lx" id="editarDocum" name="editarDocumento" required readonly>

                                    <option id="editarDocumento"></option>


                                </select>

                            </div>

                        </div>
                        <!-- ENTRADA PARA DNI -->

                        <div class="form-group">

                            <div class="input-group ">

                                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                                <input type="text" class="form-control input-lx dni" maxlength="8" id="editardniPaciente" name="editardniPaciente" readonly>


                                <span class="input-group-addon">
                                    <button type="button" id="consultar" class="btn btn-primary btn-xs consultar">
                                        Consultar
                                    </button>
                                </span>

                            </div>

                        </div>
                        <!-- ENTRADA PARA EL NOMBRE Y APELLIDO-->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                <input type="text" class="form-control input-lx" id="editarNombrePaciente" name="editarNombrePaciente" readonly>

                            </div>


                        </div>

                        <!-- ENTRADA PARA EDAD-->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                <input type="text" class="form-control input-lx" id="editarEdadPaciente" name="editarEdadPaciente" placeholder="Edad" required>

                            </div>


                        </div>

                        <!-- ENTRADA PARA DIRECCION-->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                <input type="text" class="form-control input-lx" id="editarDireccionPaciente" name="editarDireccionPaciente" placeholder="Direccion" required>

                            </div>


                        </div>
                        <!-- ENTRADA PARA DISTRITO-->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                <input type="text" class="form-control input-lx" id="editarDistritoPaciente" name="editarDistritoPaciente" placeholder="Distrito" required>

                            </div>


                        </div>



                        <!-- ENTRADA PARA SUBIR FOTO -->

                        <div class="form-group">

                            <div class="panel">SUBIR IMAGEN</div>

                            <input type="file" class="nuevaImagen" name="editarImagen">

                            <p class="help-block">Peso máximo de la imagen 2MB</p>

                            <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

                            <input type="hidden" name="imagenActual" id="imagenActual">

                        </div>

                    </div>

                </div>

                <!--=====================================
                PIE DEL MODAL
                ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary" id="update">Guardar cambios</button>


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
                        <!-- ENTRADA PARA SELECCIONAR ENTIDAD-->
                        <div class="form-row">
                            <div class="form-group col-ms-12">

                                <div class="input-group">
                                    <!-- <span class="input-group-addon"><i class="fa fa-university"></i></span> -->


                                    <select id="nuevEntidadSelectSearch" name="nuevEntidad">
                                        <!-- id="nuevEntidadFun" -->
                                        <option></option>

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
                        <!-- ENTRADA PARA SELECCIONAR DOCUMENTO DEL REGISTRO-->

                        <div class="form-group">

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

                        <div class="form-group">

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

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                <input type="text" class="form-control input-lx nuevoNombre" id="nuevNombre" name="nuevNombre" placeholder="Nombres y Apellidos" required>

                            </div>


                        </div>



                        <!-- ENTRADA PARA CARGO -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>

                                <input type="text" class="form-control input-lx" name="nuevCargo" placeholder="Cargo" required>

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


<!--=====================================
MODAL AGREGAR ENTIDAD
======================================-->

<div id="modalAgregarEntidadVisita" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post">

                <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Agregar Entidad</h4>

                </div>

                <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

                <div class="modal-body">

                    <div class="box-body">

                        <!-- ENTRADA PARA EL NOMBRE -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                <input type="text" class="form-control input-lg entidadLocalStore" name="nuevEntidadVisita" placeholder="Ingresar Entidad" required>

                            </div>

                        </div>

                    </div>

                </div>

                <!--=====================================
        PIE DEL MODAL
        ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary" id="crearEntidadVisita">Guardar Entidad</button>

                </div>

                <?php

                $crearEntidadVisita = new ControladorEntidad();
                $crearEntidadVisita->ctrCrearEntidadVisita();

                ?>

            </form>

        </div>

    </div>

</div>


<?php

?>