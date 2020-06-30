<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Administrar Funcionario

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Administrar Funcionario</li>

        </ol>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-header with-border">

                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarFuncionario">

                    Agregar Funcionario

                </button>

            </div>


            <div class="box-body">

                <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

                    <thead>

                        <tr>

                            <th style="width:10px">#</th>
                            <th>Tipo Documento</th>
                            <th>N° Documento</th>
                            <th>Nombre</th>
                            <th>Entidad</th>
                            <th>Fecha</th>
                            <th>Acciones</th>

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
                              <td>' . $value["tipo_documento"] . '</td>
                              <td>' . $value["num_documento"] . '</td>
                              <td>' . $value["nombre"] . '</td>
                              <td>' . $value["entidad"] . '</td>
                              <td>' . $value["cargo"] . '</td>
                              <td>' . $value["fecha_registro"] . '</td>';
                        }

                        ?>

                    </tbody>

                </table>

            </div>

        </div>

    </section>

</div>

<!--=====================================
MODAL AGREGAR FUNCIONARIO
======================================-->

<div id="modalAgregarFuncionario" class="modal fade" role="dialog">

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

                                <input type="text" class="form-control input-lx dni" maxlength="8" id="dni" name="dni" placeholder="Documento de Identidad" required>


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

                        <!-- ENTRADA PARA SELECCIONAR ENTIDAD-->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                <select class="form-control input-lx" id="nuevEntidad" name="nuevEntidad" required>

                                    <option value="">Entidad</option>

                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $entidad = ControladorEntidad::ctrMostrarEntidad($item, $valor);

                                    foreach ($entidad as $key => $value) {

                                        echo '<option value="' . $value["id"] . '">' . $value["entidad"] . '</option>';
                                    }
                                    ?>

                                </select>


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

                    <button type="submit" class="btn btn-primary">Guardar usuario</button>

                </div>

                <?php
                $crearFuncionario = new ControladorFuncionario();
                $crearFuncionario->ctrCrearFuncionario();
                ?>

            </form>

        </div>

    </div>

</div>

<!--=====================================
MODAL EDITAR USUARIO
======================================-->

<div id="modalEditarUsuario" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Editar usuario</h4>

                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->

                <div class="modal-body">

                    <div class="box-body">

                        <!-- ENTRADA PARA SELECCIONAR DOCUMENTO DEL REGISTRO-->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                <select class="form-control input-lx" name="editarTipoDocumento" required>

                                    <option id="editarTipoDocumento">Tipo de Documento</option>

                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $documento = ControladorDocumento::ctrMostrarDocumento($item, $valor);

                                    foreach ($documento as $key => $value) {

                                        echo '<option value="' . $value["tipo_documento"] . '">' . $value["tipo_documento"] . '</option>';
                                    }
                                    ?>

                                </select>

                            </div>

                        </div>
                        <!-- ENTRADA PARA DNI -->

                        <div class="form-group">

                            <div class="input-group ">

                                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                                <input type="text" class="form-control input-lx" maxlength="8" id="editarDni" name="editarDni" value="" readonly>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL NOMBRE -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                <input type="text" class="form-control input-lx" id="editarNombre" name="editarNombre" value="" readonly>

                            </div>

                        </div>
                        <!-- ENTRADA PARA OFICINA -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-building"></i></span>

                                <input type="text" class="form-control input-lx" id="editarOficina" name="editarOficina" value="">

                            </div>

                        </div>

                        <!-- ENTRADA PARA AREA -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>

                                <input type="text" class="form-control input-lx" id="editarArea" name="editarArea">

                            </div>

                        </div>
                        <!-- ENTRADA PARA CARGO -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>

                                <input type="text" class="form-control input-lx" id="editarCargo" name="editarCargo" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA CEL -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                                <input type="text" class="form-control input-lx celular" id="editarCel" name="editarCel" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR SU SEDE -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-building"></i></span>

                                <select class="form-control input-lx" name="editarSede">

                                    <option value="" id="editarSede"></option>

                                    <option value="Pinillos">Pinillos</option>

                                    <option value="Fap">Fap</option>

                                </select>

                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR SU PISO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-angle-double-up"></i></span>

                                <select class="form-control input-lx" name="editarPiso">

                                    <option value="" id="editarPiso"></option>

                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="4(Palomar N°1)">4(Palomar N°1)</option>
                                    <option value="5(Palomar N°2)">5(Palomar N°2)</option>

                                </select>
                            </div>
                        </div>

                        <!-- ENTRADA PARA EL USUARIO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                                <input type="text" class="form-control input-lx" id="editarUsuario" name="editarUsuario" value="" readonly>

                            </div>

                        </div>

                        <!-- ENTRADA PARA LA CONTRASEÑA -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                <input type="password" class="form-control input-lx" name="editarPassword" placeholder="Escriba la nueva contraseña">

                                <input type="hidden" id="passwordActual" name="passwordActual">

                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                                <select class="form-control input-lx" name="editarPerfil">

                                    <option id="editarPerfil"></option>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $perfil = ControladorPerfil::ctrMostrarPerfil($item, $valor);

                                    foreach ($perfil as $key => $value) {

                                        echo '<option value="' . $value["perfil"] . '">' . $value["perfil"] . '</option>';
                                    }
                                    ?>

                                </select>

                            </div>

                        </div>


                        <!-- ENTRADA PARA FECHA DE REGISTRO -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                                <input type="date" class="form-control input-lx" id="editarFecha" name="editarFecha" required>

                            </div>

                        </div>



                        <!-- ENTRADA PARA SUBIR FOTO -->

                        <div class="form-group">

                            <div class="panel">SUBIR FOTO</div>

                            <input type="file" class="nuevFoto" name="editarFoto">

                            <p class="help-block">Peso máximo de la foto 2MB</p>

                            <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

                            <input type="hidden" name="fotoActual" id="fotoActual">

                        </div>

                    </div>

                </div>

                <!--=====================================
                PIE DEL MODAL
                ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary">Modificar usuario</button>

                </div>

                <?php
                $editarUsuario = new ControladorUsuarios();
                $editarUsuario->ctrEditarUsuario();
                ?>

            </form>

        </div>

    </div>

</div>

<?php
$borrarUsuario = new ControladorUsuarios();
$borrarUsuario->ctrBorrarUsuario();
?>