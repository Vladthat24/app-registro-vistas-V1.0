<div class="content">
    <div class="row">

        <h1 style="color: white; text-align: center">Plataforma Tecnológica - Registro de Visitas V. 1.0.0</h1>
        <h2 style="color: white;text-align: center"><a href="https://www.dirislimasur.gob.pe/">Equipo de Trabajo Funcional Tecnologías de la Información - DIRIS LIMA SUR</a></h2>

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
</div>