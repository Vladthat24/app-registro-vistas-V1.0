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
                              
                              "' . $registro[$i]["TipoDocF"] . '",
                              "' . $registro[$i]["num_documento"] . '",
                              "' . $registro[$i]["nombre"] . '",
                              "' . $registro[$i]["cargo"] . '",
                              "' . $registro[$i]["ent_funcionario"] . '",
                              "' . $registro[$i]["motivo"] . '",
                              "' . $registro[$i]["servidor_publico"] . '",
                              "' . $registro[$i]["area_oficina_sp"] . '",
                              "' . $registro[$i]["cargo"] . '",
                              "' . $registro[$i]["fecha_ingreso"] . '",
                              "' . $registro[$i]["hora_ingreso"] . '",
                              "' . $registro[$i]["fecha_salida"] . '",
                              "' . $registro[$i]["hora_salida"] . '",
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
