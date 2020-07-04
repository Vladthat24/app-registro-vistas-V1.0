<?php
@session_start();

require_once "../controladores/registro.controlador.php";
require_once "../modelos/registro.modelo.php";


require_once "../controladores/funcionario.controlador.php";
require_once "../modelos/funcionario.modelo.php";

class TablaRegistro
{
  /* =============================================
      MOSTRAR LA TABLA DE TICKET
      ============================================= */

  public function mostrarTablaRegistro()
  {

    $item = null;
    $valor = null;
    
    $registro = ControladorRegistro::ctrMostrarRegistro($item, $valor);

    if (count($registro) == 0) {

      echo '{"data": []}';

      return;
    }

    $datosJson = '{
		  "data": [';

    for ($i = 0; $i < count($registro); $i++) {

      /* =============================================
       TRAEMOS LAS ACCIONES
       ============================================= */

      $botones = "<div class='btn-group'><button class='btn btn-info btnImprimirRegistro' idRegistro='" . $registro[$i]["id"] . "'><i class='fa fa-print'></i></button><button class='btn btn-warning btnEditarRegistro' idRegistro='" . $registro[$i]["id"] . "' data-toggle='modal' data-target='#modalEditarRegistro'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarRegistro' idRegistro='" . $registro[$i]["id"] . "'><i class='fa fa-times'></i></button></div>";

      $datosJson .= '[
			      "' . ($i + 1) . '",
                              "' . $botones . '",                               
                              "' . $registro[$i]["num_dni_funcionario"] . '",
                              "' . $registro[$i]["nombre_funcionario"] . '",
                              "' . $registro[$i]["cargo_funcionario"] . '",
                              "' . $registro[$i]["entidad_funcionario"] . '",
                              "' . $registro[$i]["motivo"] . '",
                              "' . $registro[$i]["fecha_I"] . '",
                              "' . $registro[$i]["fecha_S"] . '",
                              "' . $registro[$i]["usuario"] . '"

			    ],';
    }

    $datosJson = substr($datosJson, 0, -1);

    $datosJson .= '] 

		 }';

    echo $datosJson;
  }
}

/* =============================================
  ACTIVAR TABLA DE PRODUCTOS
  ============================================= */
$activarRegistro = new TablaRegistro();
$activarRegistro->mostrarTablaRegistro();
