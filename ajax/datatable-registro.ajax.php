<?php

@session_start();
require_once "../controladores/registro.controlador.php";
require_once "../modelos/registro.modelo.php";


require_once "../controladores/funcionario.controlador.php";
require_once "../modelos/funcionario.modelo.php";

class TablaTicket
{
  /* =============================================
      MOSTRAR LA TABLA DE TICKET
      ============================================= */

  public function mostrarTablaTicket()
  {

    $item = null;
    $valor = null;
    
    $ticket = ControladorFuncionario::ctrMostrarFuncionario($item, $valor);

    if (count($ticket) == 0) {

      echo '{"data": []}';

      return;
    }

    $datosJson = '{
		  "data": [';

    for ($i = 0; $i < count($ticket); $i++) {

      /* =============================================
       TRAEMOS TIPO DE DOCUMENTO
      ============================================= */
      $item = "id";
      $valor = $ticket[$i]["id_documento"];

      $documento = ControladorDocumento::ctrMostrarDocumento($item, $valor);

      /* =============================================
        TOMA MUESTRA
      ============================================= */

      $muestra_paciente2 = "<div type='button'>" . $ticket[$i]["muestra_paciente"] . "</div>";

      /* =============================================
       TRAEMOS LAS ACCIONES
       ============================================= */

      $botones = "<div class='btn-group'><button class='btn btn-info btnImprimirTicket' idTicket='" . $ticket[$i]["id"] . "'><i class='fa fa-print'></i></button><button class='btn btn-warning btnEditarTicket' idTicket='" . $ticket[$i]["id"] . "' data-toggle='modal' data-target='#modalEditarTicket'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarTicket' idTicket='" . $ticket[$i]["id"] . "' codigo='" . $ticket[$i]["codigo"] . "' imagen='" . $ticket[$i]["imagen"] . "'><i class='fa fa-times'></i></button></div>";

      $datosJson .= '[
			      "' . ($i + 1) . '",
                              "' . $botones . '",                               
                              "' . $ticket[$i]["num_dni_funcionario"] . '",
                              "' . $ticket[$i]["nombre_funcionario"] . '",
                              "' . $ticket[$i]["cargo_funcionario"] . '",
                              "' . $ticket[$i]["entidad_funcionario"] . '",
                              "' . $ticket[$i]["motivo"] . '",
                              "' . $ticket[$i]["fecha_ingreso"] . '",
                              "' . $ticket[$i]["fecha_salida"] . '",
                              "' . $ticket[$i]["usuario"] . '"

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
$activarTicket = new TablaTicket();
$activarTicket->mostrarTablaTicket();
