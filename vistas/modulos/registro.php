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

                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarRegistro">

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

                                <option value="">Funcionario</option>

                                <?php
                                $item = null;
                                $valor = null;

                                $funcionario = ControladorFuncionario::ctrMostrarFuncionario($item, $valor);

                                foreach ($funcionario as $key => $value) {

                                    echo '<option value="' . $value["id"] . '">' . $value["nombre"] . '</option>';
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
MODAL AGREGAR VISITA
======================================-->

<div id="modalAgregarRegistro" class="modal fade" role="dialog">

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

                    <div class="form-group">

                        <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-th"></i></span>

                            <select class="form-control input-lx" id="nuevaCategoria" name="nuevaCategoria" required>

                                <option value="">Funcionario</option>

                                <?php
                                $item = null;
                                $valor = null;

                                $funcionario = ControladorFuncionario::ctrMostrarFuncionario($item, $valor);

                                foreach ($funcionario as $key => $value) {

                                    echo '<option value="' . $value["id"] . '">' . $value["nombre"] . '</option>';
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
MODAL EDITAR PRODUCTO
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

<?php

?>