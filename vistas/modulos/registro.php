<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Administrar Paciente

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Administrar Pacientes</li>

        </ol>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-header with-border">

                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarTicket">

                    Agregar Paciente

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

            <strong>PACIENTES OBSERVADOS</strong>

            <div class="box-body" id="resultados">

                <br>
                <table class="table table-bordered table-striped dt-responsive tablaTicket tablaActualizar" width="100%">

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

<div id="modalAgregarTicket" class="modal fade" role="dialog">

    <div class="modal-dialog">

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

                    <div class="form-group">

                        <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-th"></i></span>

                            <select class="form-control input-lx" id="nuevaCategoria" name="nuevaCategoria" required>

                                <option value="">Categoria Seguros</option>

                                <?php
                                $item = null;
                                $valor = null;

                                $categorias = ControladorFuncionario::ctrMostrarFuncionario($item, $valor);

                                foreach ($categorias as $key => $value) {

                                    echo '<option value="' . $value["id"] . '">' . $value["categoria"] . '</option>';
                                }
                                ?>

                            </select>

                            <span class="input-group-addon"><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modalAgregarFuncionario" data-dismiss="modal">Agregar cliente</button></span>
                       
                        </div>

                    </div>

                    <!-- ENTRADA PARA EL CÓDIGO -->

                    <div class="form-group">

                        <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-code"></i></span>

                            <input type="text" class="form-control input-lx" id="nuevoCodigo" name="nuevoCodigo" placeholder="Codigo Autogenerado" readonly required>

                        </div>

                    </div>
                    <!-- ENTRADA PARA SELECCIONAR TIPO DE DOCUMENTO-->

                    <div class="form-group">

                        <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-th"></i></span>

                            <select class="form-control input-lx" id="nuevaDocumento" name="nuevaDocumento" required>

                                <option value="">Tipo de Documento</option>

                                <?php
                                $item = null;
                                $valor = null;

                                $categorias = ControladorDocumento::ctrMostrarDocumento($item, $valor);

                                foreach ($categorias as $key => $value) {

                                    echo '<option value="' . $value["id"] . '">' . $value["documento"] . '</option>';
                                }
                                ?>

                            </select>

                        </div>

                    </div>
                    <div class="box-body">
                        <!-- ENTRADA PARA DNI -->

                        <div class="form-group">

                            <div class="input-group ">

                                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                                <input type="text" class="form-control input-lx dni dniminivalidar" maxlength="8" id="dniPaciente" name="dniPaciente" placeholder="Documento de Identidad" required>


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

                                <input type="text" class="form-control input-lx" id="nuevoNombrePaciente" name="nuevoNombrePaciente" placeholder="Nombres y Apellidos" required>

                            </div>


                        </div>

                        <!-- ENTRADA PARA SEXO-->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-sort-numeric-desc"></i></span>

                                <select name="nuevoSexoPaciente" id="nuevoSexoPaciente">

                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>

                                </select>
                            </div>


                        </div>

                        <!-- ENTRADA PARA EDAD-->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-sort-numeric-desc"></i></span>

                                <input type="text" class="form-control input-lx" id="nuevoEdadPaciente" name="nuevoEdadPaciente" placeholder="Edad" required>

                            </div>


                        </div>

                        <!-- ENTRADA PARA PAIS-->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-sort-numeric-desc"></i></span>

                                <input type="text" class="form-control input-lx" id="nuevoPaisPaciente" name="nuevoPaisPaciente" placeholder="Pais" required>

                            </div>


                        </div>

                        <!-- ENTRADA PARA DEPARTAMENTO PACIENTE-->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-sort-numeric-desc"></i></span>

                                <input type="text" class="form-control input-lx" id="nuevoDepartamentoPaciente" name="nuevoDepartamentoPaciente" placeholder="Departamento" required>

                            </div>


                        </div>


                        <!-- ENTRADA PARA SELECCIONAR DISTRITO-->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-map"></i></span>

                                <select class="form-control input-lx" id="nuevoDistritoSelect" name="nuevoDistritoSelect" required>

                                    <option value="">Selecionar Distrito</option>

                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $distrito = ControladorDistrito::ctrMostrarDistrito($item, $valor);

                                    foreach ($distrito as $key => $value) {

                                        echo '<option value="' . $value["id"] . '">' . $value["distrito"] . '</option>';
                                    }
                                    ?>

                                </select>

                            </div>

                        </div>
                        <!-- ENTRADA PARA DIRECCION-->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                                <input type="text" class="form-control input-lx" id="nuevoDireccionPaciente" name="nuevoDireccionPaciente" placeholder="Direccion" required>

                            </div>


                        </div>
                        <!-- ENTRADA PARA CORREO-->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-mobile"></i></span>

                                <input type="text" class="form-control input-lx" id="nuevoCorreoPaciente" name="nuevoCorreoPaciente" placeholder="Correo" required>

                            </div>


                        </div>

                        <!-- ENTRADA PARA TELEFONO-->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-mobile"></i></span>

                                <input type="text" class="form-control input-lx" id="nuevoTelefonoPaciente" name="nuevoTelefonoPaciente" placeholder="Telefono" required>

                            </div>


                        </div>

                        <!-- ENTRADA PARA NOMBRE Y APELLIDO DE CONTACTO FAMILIAR-->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-mobile"></i></span>

                                <input type="text" class="form-control input-lx" id="nuevoNyAContactoFamiliarPaciente" name="nuevoNyAContactoFamiliarPaciente" placeholder="Datos Familiar" required>

                            </div>


                        </div>

                        <!-- ENTRADA PARA CEL CONTACTO PACIENTE-->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-ellipsis-h"></i></span>

                                <input type="text" class="form-control input-lx" id="nuevoCelContactoPaciente" name="nuevoCelContactoPaciente" placeholder="CelContacto">

                            </div>


                        </div>

                        <!-- ENTRADA PARA ¿HA TENIDO CONTACTO CON UN PACIENTE SOSPECHOSO O CONFIRMADO DE INFECCIÓN POR CORONAVIRUS? -->

                        <div class="form-group">
                            <p style="text-align: center;">¿HA TENIDO CONTACTO CON UN PACIENTE SOSPECHOSO O CONFIRMADO DE INFECCIÓN POR CORONAVIRUS?</p>
                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-sign-language"></i></span>

                                <select class="form-control input-lx" id="nuevoContactoPersonaSospechosa" name="nuevoContactoPersonaSospechosa">

                                    <option value="">CONTACTO CON CASO SOSPECHOSO O CONFIRMADO (SI/NO)</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>

                                </select>

                            </div>
                            <style>
                                .zebra {
                                    border: 2px dashed black;
                                }
                            </style>
                            <div id="textDatosPersona" class="input-group hidden">

                                <span class="input-group-addon"><i class="fa fa-sign-language"></i><i class="fa fa-user-circle-o"></i></span>

                                <input type="text" class="form-control input-lx zebra" id="nuevoDatosPersonaSospechosa" name="nuevoDatosPersonaSospechosa" placeholder="Ingrese el Nombre de la Persona">

                            </div>
                            <div id="textDatosPersona_cel" class="input-group hidden">

                                <span class="input-group-addon"><i class="fa fa-sign-language"></i><i class="fa fa-mobile"></i></span>

                                <input type="text" class="form-control input-lx zebra" id="nuevoCelPersonaSospechosa" name="nuevoCelPersonaSospechosa" placeholder="Ingrese el  Celular de la Persona">

                            </div>

                        </div>










                        <!-- ENTRADA PARA DESCRIPCION DEL ESTADO DEL PACIENTE-->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-keyboard-o"></i></span>

                                <input type="text" class="form-control input-lx" id="nuevaDescripcion" name="nuevaDescripcion" placeholder="Observación del Paciente" required>

                            </div>


                        </div>

                        <!-- ENTRADA PARA SELECCIONAR ESTADO -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-hourglass-end"></i></span>

                                <select class="form-control input-lx" id="nuevaEstado" name="nuevaEstado">

                                    <option value="">Selecionar Estado</option>

                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $estado = ControladorEstado::ctrMostrarEstado($item, $valor);

                                    foreach ($estado as $key => $value) {

                                        echo '<option value="' . $value["id"] . '">' . $value["estado"] . '</option>';
                                    }
                                    ?>

                                </select>

                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR MUESTRA -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-thermometer-full"></i></span>

                                <select class="form-control input-lx" id="nuevaMuestra" name="nuevaMuestra">

                                    <option value="">Estado de Muestra</option>
                                    <option value="TOMO MUESTRA">TOMO MUESTRA</option>
                                    <option value="NO TOMO MUESTRA">NO TOMO MUESTRA</option>

                                </select>

                            </div>

                        </div>
                        <!-- ********************************************************************* -->

                        <!-- ENTRADA PARA FECHA INICIO DE SINTOMAS -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-calendar"> <strong>Fecha de Sintoma: </strong></i></span>

                                <input type="text" class="form-control input-lx" id="nuevoFechaSintomas" name="nuevoFechaSintomas" placeholder="00/00/2020">

                            </div>

                        </div>
                        <!-- ENTRADA PARA SUFRE SINTOMAS -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-universal-access"></i></span>

                                <select class="form-control input-lx" id="nuevoSintomas" name="nuevoSintomas">

                                    <option value="">¿SUFRE DE ALGUNA ENFERMEDAD PREVIA?</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>

                                </select>

                            </div>
                            <BR>
                            <style>
                                .zebra {
                                    border: 2px dashed black;
                                }
                            </style>
                            <div id="textSintomas" class="input-group hidden">

                                <span class="input-group-addon"><i class="fa fa-universal-access"></i></span>

                                <input type="text" class="form-control input-lx zebra" id="nuevoEnfermedad" name="nuevoEnfermedad" placeholder="Ingrese la Enfermedad que Tiene el Paciente">

                            </div>
                        </div>


                        <!-- ENTRADA PARA TOS -->

                        <div class="form-group">
                            <p style="text-align: center;">¿PRESENTA ALGUNO DE ESTOS SINTOMAS?</p>
                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-check-square-o"></i></span>

                                <select class="form-control input-lx" id="nuevoTos" name="nuevoTos">

                                    <option value="">TOS (SI/NO)</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>

                                </select>

                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR DOLOR DE GARGANTA (SI/NO) -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-check-square-o"></i></span>

                                <select class="form-control input-lx" id="nuevoDolorGarganta" name="nuevoDolorGarganta">

                                    <option value="">DOLOR DE GARGANTA (SI/NO)</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>

                                </select>

                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR FIEBRE (SI/NO) -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-check-square-o"></i></span>

                                <select class="form-control input-lx" id="nuevoFiebre" name="nuevoFiebre">

                                    <option value="">FIEBRE (SI/NO)</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>

                                </select>

                            </div>
                            <style>
                                .zebra {
                                    border: 2px dashed black;
                                }
                            </style>
                            <div id="textFiebre" class="input-group hidden">

                                <span class="input-group-addon"><i class="fa fa-thermometer-full"></i></span>

                                <input type="text" class="form-control input-lx zebra" id="nuevoFiebre_num" name="nuevoFiebre_num" placeholder="Ingrese la Temperatura">

                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR SECRECIÓN  NASAL (SI/NO)-->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-check-square-o"></i></span>

                                <select class="form-control input-lx" id="nuevoSecrecionNasal" name="nuevoSecrecionNasal">

                                    <option value="">SECRECIÓN NASAL (SI/NO)</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>

                                </select>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL OTRO SINTOMAS-->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-check-square-o"></i></span>

                                <input type="text" class="form-control input-lx" id="nuevoOtroSintomas" name="nuevoOtroSintomas" placeholder="Otros Sintomas del Paciente">

                            </div>

                        </div>
                        <!-- ENTRADA PARA VIAJE A OTRO PAIS O CIUDAD DEL PERÚ (SI/NO) -->

                        <div class="form-group">
                            <p style="text-align: center;">¿HA VIAJADO EN LOS ULTIMOS 14 DÍAS PREVIOS A LOS SINTOMAS?</p>
                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-plane"></i></span>

                                <select class="form-control input-lx" id="nuevoViaje" name="nuevoViaje">

                                    <option value="">VIAJE A OTRO PAIS O CIUDAD DEL PERÚ (SI/NO)</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>

                                </select>

                            </div>
                            <style>
                                .zebra {
                                    border: 2px dashed black;
                                }
                            </style>
                            <div id="textPaisViaje" class="input-group hidden">

                                <span class="input-group-addon"><i class="fa fa-plane"></i></span>

                                <input type="text" class="form-control input-lx zebra" id="nuevoPaisViaje" name="nuevoPaisViaje" placeholder="Ingrese el País">

                            </div>
                            <div id="textNumViaje" class="input-group hidden">

                                <span class="input-group-addon"><i class="fa fa-plane"></i></span>

                                <input type="text" class="form-control input-lx zebra" id="nuevoNumeroViaje" name="nuevoNumeroViaje" placeholder="Ingrese el Número de Días">

                            </div>

                        </div>

                        <!-- ********************************************************************* -->
                        <!-- ENTRADA PARA EL NOMBRE DEL USUARIO -->

                        <div class="form-group hidden">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>

                                <input type="text" class="form-control input-lx" id="nuevaNombre" name="nuevaNombre" value="<?php echo $_SESSION["nombre"]; ?>" readonly>

                            </div>

                        </div>
                        <!-- ENTRADA PARA EL OFICIO DEL USUARIO -->

                        <div class="form-group hidden">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-building"></i></span>

                                <input type="text" class="form-control input-lx" id="nuevaOficina" name="nuevaOficina" value="<?php echo $_SESSION["oficina"]; ?>" readonly>

                            </div>

                        </div>
                        <!-- ENTRADA PARA EL AREA DEL USUARIO -->

                        <div class="form-group hidden">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>

                                <input type="text" class="form-control input-lx" id="nuevaArea" name="nuevaArea" value="<?php echo $_SESSION["area"]; ?>" readonly>

                            </div>

                        </div>
                        <!-- ENTRADA PARA EL CARGO DEL USUARIO -->

                        <div class="form-group hidden">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>

                                <input type="text" class="form-control input-lx" id="nuevaCargo" name="nuevaCargo" value="<?php echo $_SESSION["cargo"]; ?>" readonly>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL CEL DEL USUARIO -->

                        <div class="form-group hidden">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                                <input type="text" class="form-control input-lx" id="nuevaCel" name="nuevaCel" value="<?php echo $_SESSION["cel"] ?>" readonly>

                            </div>

                        </div>
                        <!-- ENTRADA PARA LA SEDE DEL USUARIO -->

                        <div class="form-group hidden">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-building"></i></span>

                                <input type="text" class="form-control input-lx" id="nuevaSede" name="nuevaSede" value="<?php echo $_SESSION["sede"]; ?>" readonly>

                            </div>

                        </div>
                        <!-- ENTRADA PARA EL PISO DEL USUARIO -->

                        <div class="form-group hidden">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-angle-double-up"></i></span>

                                <input type="text" class="form-control input-lx" id="nuevaPiso" name="nuevaPiso" value="<?php echo $_SESSION["piso"]; ?>" readonly>

                            </div>

                        </div>




                        <!-- ENTRADA PARA SUBIR FOTO -->

                        <div class="form-group">

                            <div class="panel">Subir Imagen del Problema</div>

                            <input type="file" class="nuevaImagen" name="nuevaImagen">

                            <p class="help-block">Peso máximo de la imagen 2MB</p>

                            <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

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
            $crearTicket = new ControladorTicket();
            $crearTicket->ctrCrearTicket();
            ?>

        </div>

    </div>

</div>

<!--=====================================
MODAL EDITAR PRODUCTO
======================================-->

<div id="modalEditarTicket" class="modal fade" role="dialog">

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

                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                                    foreach ($categorias as $key => $value) {

                                        echo '<option value="' . $value["id"] . '">' . $value["categoria"] . '</option>';
                                    }
                                    ?>

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

                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $categorias = ControladorDocumento::ctrMostrarDocumento($item, $valor);

                                    foreach ($categorias as $key => $value) {

                                        echo '<option value="' . $value["id"] . '">' . $value["documento"] . '</option>';
                                    }
                                    ?>

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
                        <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                <select class="form-control input-lx" id="editarDist" name="editarDistritoSelect" readonly required>

                                    <option id="editarDistritoSelect"></option>

                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $distrito = ControladorDistrito::ctrMostrarDistrito($item, $valor);

                                    foreach ($distrito as $key => $value) {

                                        echo '<option value="' . $value["id"] . '">' . $value["distrito"] . '</option>';
                                    }
                                    ?>

                                </select>

                            </div>

                        </div>
                        <!-- ENTRADA PARA CELULAR-->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-mobile"></i></span>

                                <input type="text" class="form-control input-lx" id="editarCelularPaciente" name="editarCelularPaciente" placeholder="Celular" required>

                            </div>


                        </div>
                        <!-- ENTRADA PARA COMOBAR-->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                <input type="text" class="form-control input-lx" id="editarComoABPaciente" name="editarComoABPaciente" placeholder="ComoAB" required>

                            </div>


                        </div>


                        <!-- ENTRADA PARA LA DESCRIPCIÓN PACIENTE -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-keyboard-o"></i></span>

                                <input type="text" class="form-control input-lx" id="editarDescripcion" name="editarDescripcion" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR ESTADO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-hourglass-end"></i></span>

                                <select class="form-control input-lx" id="editarEst" name="editarEstado" required>

                                    <option id="editarEstado"></option>

                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $estado = ControladorEstado::ctrMostrarEstado($item, $valor);

                                    foreach ($estado as $key => $value) {

                                        echo '<option value="' . $value["id"] . '">' . $value["estado"] . '</option>';
                                    }
                                    ?>


                                </select>

                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR MUESTRA -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa fa-bed"></i></span>

                                <select class="form-control input-lx" id="editarSop" name="editarMuestra" required>

                                    <option value="" id="editarMuestra"></option>
                                    <option value="TOMO MUESTRA">TOMO MUESTRA</option>
                                    <option value="NO TOMO MUESTRA">NO TOMO MUESTRA</option>

                                </select>

                            </div>

                        </div>
                        <!-- ********************************************************************* -->

                        <!-- ENTRADA PARA FECHA INICIO DE SINTOMAS -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-calendar"> <strong>Fecha de Sintoma: </strong></i></span>

                                <input type="text" class="form-control input-lx" id="editarFechaSintomas" name="editarFechaSintomas" placeholder="00/00/2020">

                            </div>

                        </div>
                        <!-- ENTRADA PARA SUFRE SINTOMAS -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-universal-access"></i></span>

                                <select class="form-control input-lx" name="editarSintomas">

                                    <option value="" id="editarSintomas"></option>
                                    <option value="">¿SUFRE DE ALGUNA ENFERMEDAD PREVIA?</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>

                                </select>

                            </div>
                            <BR>
                            <style>
                                .zebra {
                                    border: 2px dashed black;
                                }
                            </style>
                            <div id="textSintomas" class="input-group">

                                <span class="input-group-addon"><i class="fa fa-universal-access"></i></span>

                                <input type="text" class="form-control input-lx zebra" id="editarEnfermedad" name="editarEnfermedad" placeholder="Ingrese la Enfermedad que Tiene el Paciente">

                            </div>
                        </div>


                        <!-- ENTRADA PARA TOS -->

                        <div class="form-group">
                            <p style="text-align: center;">¿PRESENTA ALGUNO DE ESTOS SINTOMAS?</p>
                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-check-square-o"></i></span>

                                <select class="form-control input-lx" name="editarTos">

                                    <option value="" id="editarTos"></option>
                                    <option value="">TOS (SI/NO)</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>

                                </select>

                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR DOLOR DE GARGANTA (SI/NO) -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-check-square-o"></i></span>

                                <select class="form-control input-lx" name="editarDolorGarganta">

                                    <option value="" id="editarDolorGarganta"></option>
                                    <option value="">DOLOR DE GARGANTA (SI/NO)</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>

                                </select>

                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR FIEBRE (SI/NO) -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-check-square-o"></i></span>

                                <select class="form-control input-lx" name="editarFiebre">

                                    <option value="" id="editarFiebre"></option>
                                    <option value="">FIEBRE (SI/NO)</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>

                                </select>

                            </div>
                            <style>
                                .zebra {
                                    border: 2px dashed black;
                                }
                            </style>
                            <div id="textFiebre" class="input-group">

                                <span class="input-group-addon"><i class="fa fa-thermometer-full"></i></span>

                                <input type="text" class="form-control input-lx zebra" id="editarFiebre_num" name="editarFiebre_num" placeholder="Ingrese la Temperatura">

                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR SECRECIÓN  NASAL (SI/NO)-->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-check-square-o"></i></span>

                                <select class="form-control input-lx" name="editarSecrecionNasal">

                                    <option value="" id="editarSecrecionNasal"></option>
                                    <option value="">SECRECIÓN NASAL (SI/NO)</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>

                                </select>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL OTRO SINTOMAS-->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-check-square-o"></i></span>

                                <input type="text" class="form-control input-lx" id="editarOtroSintomas" name="editarOtroSintomas" placeholder="Otros Sintomas del Paciente">

                            </div>

                        </div>
                        <!-- ENTRADA PARA VIAJE A OTRO PAIS O CIUDAD DEL PERÚ (SI/NO) -->

                        <div class="form-group">
                            <p style="text-align: center;">¿HA VIAJADO EN LOS ULTIMOS 14 DÍAS PREVIOS A LOS SINTOMAS?</p>
                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-plane"></i></span>

                                <select class="form-control input-lx" name="editarViaje">

                                    <option value="" id="editarViaje"></option>
                                    <option value="">VIAJE A OTRO PAIS O CIUDAD DEL PERÚ (SI/NO)</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>

                                </select>

                            </div>
                            <style>
                                .zebra {
                                    border: 2px dashed black;
                                }
                            </style>
                            <div id="textPaisViaje" class="input-group">

                                <span class="input-group-addon"><i class="fa fa-plane"></i></span>

                                <input type="text" class="form-control input-lx zebra" id="editarPaisViaje" name="editarPaisViaje" placeholder="Ingrese el País">

                            </div>
                            <div id="textNumViaje" class="input-group">

                                <span class="input-group-addon"><i class="fa fa-plane"></i></span>

                                <input type="text" class="form-control input-lx zebra" id="editarNumeroViaje" name="editarNumeroViaje" placeholder="Ingrese el Número de Días">

                            </div>


                        </div>
                        <!-- ENTRADA PARA ¿HA TENIDO CONTACTO CON UN PACIENTE SOSPECHOSO O CONFIRMADO DE INFECCIÓN POR CORONAVIRUS? -->

                        <div class="form-group">
                            <p style="text-align: center;">¿HA TENIDO CONTACTO CON UN PACIENTE SOSPECHOSO O CONFIRMADO DE INFECCIÓN POR CORONAVIRUS?</p>
                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-sign-language"></i></span>

                                <select class="form-control input-lx" name="editarContactoPersonaSospechosa">

                                    <option value="" id="editarContactoPersonaSospechosa"></option>
                                    <option value="">CONTACTO CON CASO SOSPECHOSO O CONFIRMADO (SI/NO)</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>

                                </select>

                            </div>
                            <style>
                                .zebra {
                                    border: 2px dashed black;
                                }
                            </style>
                            <div id="textDatosPersona" class="input-group">

                                <span class="input-group-addon"><i class="fa fa-sign-language"></i><i class="fa fa-user-circle-o"></i></span>

                                <input type="text" class="form-control input-lx zebra" id="editarDatosPersonaSospechosa" name="editarDatosPersonaSospechosa" placeholder="Ingrese el Nombre de la Persona">

                            </div>
                            <div id="textDatosPersona_cel" class="input-group">

                                <span class="input-group-addon"><i class="fa fa-sign-language"></i><i class="fa fa-mobile"></i></span>

                                <input type="text" class="form-control input-lx zebra" id="editarCelPersonaSospechosa" name="editarCelPersonaSospechosa" placeholder="Ingrese el  Celular de la Persona">

                            </div>

                        </div>
                        <!-- ********************************************************************* -->
                        <!-- ENTRADA PARA EL NOMBRE DEL USUARIO -->

                        <div class="form-group hidden">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>

                                <input type="text" class="form-control input-lx" id="editarNombre" name="editarNombre" readonly>

                            </div>

                        </div>
                        <!-- ENTRADA PARA EL OFICIO DEL USUARIO -->

                        <div class="form-group hidden">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-building"></i></span>

                                <input type="text" class="form-control input-lx" id="editarOficina" name="editarOficina" readonly>

                            </div>

                        </div>
                        <!-- ENTRADA PARA EL AREA DEL USUARIO -->

                        <div class="form-group hidden">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>

                                <input type="text" class="form-control input-lx" id="editarArea" name="editarArea" readonly>

                            </div>

                        </div>
                        <!-- ENTRADA PARA EL CARGO DEL USUARIO -->

                        <div class="form-group hidden">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>

                                <input type="text" class="form-control input-lx" id="editarCargo" name="editarCargo" readonly>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL CEL DEL USUARIO -->

                        <div class="form-group hidden">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                                <input type="text" class="form-control input-lx" id="editarCel" name="editarCel" readonly>

                            </div>

                        </div>
                        <!-- ENTRADA PARA LA SEDE DEL USUARIO -->

                        <div class="form-group hidden">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-building"></i></span>

                                <input type="text" class="form-control input-lx" id="editarSede" name="editarSede" readonly>

                            </div>

                        </div>
                        <!-- ENTRADA PARA EL PISO DEL USUARIO -->

                        <div class="form-group hidden">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-angle-double-up"></i></span>

                                <input type="text" class="form-control input-lx" id="editarPiso" name="editarPiso" readonly>

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

            <?php
            $editarTicket = new ControladorTicket();
            $editarTicket->ctrEditarTicket();
            ?>

        </div>

    </div>

</div>

<?php
$eliminarTicket = new ControladorTicket();
$eliminarTicket->ctrEliminarTicket();
?>