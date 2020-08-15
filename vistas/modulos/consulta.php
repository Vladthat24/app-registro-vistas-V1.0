<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col col-lg-6">
            <img src="vistas/img/plantilla/logo-dirisls-bloque copy.png" class="img-responsive" style="margin: 10px;">
        </div>
        <div class="col col-lg-5" style="margin-top: 20px;">

            <strong class="text-$http_response_header" style="color: white;">“Año de la Universalización de la Salud”</strong>
        </div>
        <div class="col col-lg-1" style="margin-top: 20px;">

            <a href="login" type="button" name="login" class="btn btn-primary">Iniciar Session</a>
        </div>

    </div>

</div>

<div class="content">

    <div class="row">

        <h1 style="color: white; text-align: center">Plataforma Tecnológica - Registro de Visitas</h1>
        
        <section class="content">

            <div class="box">

                <div class="box-header with-border">

                    <form class="form-inline" method="POST" action="">

                        <label>Fecha Desde:</label>

                        <input type="date" class="form-control" placeholder="Start" name="fechaI" />

                        <label>Hasta</label>

                        <input type="date" class="form-control" placeholder="End" name="fechaFinal" value="<?php echo date("Y-m-d");?>"/>
                        
                        <button class="btn btn-primary" name="search">

                            <span class="glyphicon glyphicon-search"></span>

                        </button>

                        <a href="consulta" type="button" class="btn btn-success">

                            <span class="glyphicon glyphicon-refresh"></span>

                        </a>

                    </form>

                </div>

                <div class="box-body" id="resultados">

                    <br>
                    <table class="table table-bordered table-striped dt-responsive tablas tablaActualizar" width="100%">

                        <thead>

                            <tr>

                                <th style="width:10px">#</th>

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

                        <tbody>
                            <?php

                            if (isset($_POST['search'])) {

                               
                                $d1 = DateTime::createFromFormat('Y-m-d', $_POST["fechaI"]);
                                $d2 = DateTime::createFromFormat('Y-m-d', $_POST["fechaFinal"]);
/*                              var_dump($d1->format('d/m/Y'));
                                var_dump($d2->format('d/m/Y')); */
                                $fechaInicial = $d1->format('d/m/Y');
                                $fechaFinal = $d2->format('d/m/Y');

                            } else {

                                $fechaInicial = null;
                                $fechaFinal = null;
                            }

                            $usuarios = ControladorRegistro::ctrRangoFechasRegistro($fechaInicial, $fechaFinal);

                            foreach ($usuarios as $key => $value) {

                                echo ' <tr>
                                            <td>' . ($key + 1) . '</td>
                                            <td class="text-center"><button class="btn btn-primary btn-xm">' . $value["TipoDocF"] . '</button></td>
                                            <td><button class="btn btn-warning btn-xm">' . $value["num_documento"] . '</button></td>
                                            <td>' . $value["nombre"] . '</td>
                                            <td>' . $value["cargo"] . '</td>
                                            <td>' . $value["ent_funcionario"] . '</td>
                                            <td>' . $value["motivo"] . '</td>
                                            <td>' . $value["servidor_publico"] . '</td>
                                            <td>' . $value["area_oficina_sp"] . '</td>
                                            <td>' . $value["cargo"] . '</td>
                                            <td>' . $value["fecha_ingreso"] . '</td>
                                            <td>' . $value["hora_ingreso"] . '</td>
                                            <td>' . $value["fecha_salida"] . '</td>
                                            <td>' . $value["hora_salida"] . '</td>
                                            <td>' . $value["usuario"] . '</td>


                                        </tr>';
                            }

                            ?>
                        </tbody>

                    </table>

                </div>

            </div>

        </section>
    </div>
</div>