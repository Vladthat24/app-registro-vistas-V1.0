<?php


require_once "../controladores/funcionario.controlador.php";
require_once "../modelos/funcionario.modelo.php";

class AjaxFuncionario
{
  /* =============================================
      EDITAR FUNCIONARIO
      ============================================= */

  public $idFuncionario;

  public function ajaxEditarFuncionario()
  {

    $item = "id";
    $valor = $this->idFuncionario;

    $respuesta = ControladorFuncionario::ctrMostrarFuncionario($item, $valor);

    echo json_encode($respuesta);
  }

  /* =============================================
      VALIDAR NO REPETIR NOMBRE DEL FUNCIONARIO 
      ============================================= */

  public $validarDni;

  public function ajaxValidarDni()
  {

    $item = "num_documento";
    $valor = $this->validarDni;

    $respuesta = ControladorFuncionario::ctrMostrarFuncionario($item, $valor);

    echo json_encode($respuesta);
  }
}

/* =============================================
  EDITAR FUNCIONARIO
  ============================================= */
if (isset($_POST["idFuncionario"])) {

  $editar = new AjaxFuncionario();
  $editar->idFuncionario = $_POST["idFuncionario"];
  $editar->ajaxEditarFuncionario();
}

/* =============================================
  VALIDAR NO REPETIR NOMBRE DE FUNCIONARIO
  ============================================= */

if (isset($_POST["validarDni"])) {

  $valDni = new AjaxFuncionario();
  $valDni->validarDni = $_POST["validarDni"];
  $valDni->ajaxValidarDni();
}
