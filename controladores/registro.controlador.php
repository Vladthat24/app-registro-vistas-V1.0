<?php

class ControladorRegistro
{

	/*=============================================
	RANGO FECHAS
	=============================================*/	

	static public function ctrRangoFechasRegistro($fechaInicial, $fechaFinal){

		$tabla = "Tap_RegistroVisita";

		$respuesta = ModeloRegistro::mdlRangoFechasRegistro($tabla, $fechaInicial, $fechaFinal);

		return $respuesta;
		
	}





  /* =============================================
      MOSTRAR TICKET DE ACUERDO AL PERIL
      ============================================= */


  static public function ctrMostrarRegistro($item, $valor)
  {

    $tabla = "Tap_RegistroVisita";

    $respuesta = ModeloRegistro::mdlMostrarRegistro($tabla, $item, $valor);

    return $respuesta;
  }

  /* =============================================
      CREAR REGISTRO
   ============================================= */

  static public function ctrCrearRegistro()
  {

    if (isset($_POST["nuevIdFuncionario"])) {

      if ($_POST["nuevIdFuncionario"]) {

        date_default_timezone_set('America/Lima');

        $fecha = date('d-m-Y');
        $hora = date('H:i:s A');

        /* $fechaActual = $fecha . ' ' . $hora; */

        $tabla = "Tap_RegistroVisita";

        var_dump($_POST["nuevFechaSalida"], $_POST["nuevHoraSalida"]);

        $datos = array(

          "idfuncionario" => $_POST["nuevIdFuncionario"],
          "motivo" => $_POST["nuevMotivo"],
          "servidor_publico" => strtoupper($_POST["nuevNombreFuncionarioLocal"]),
          "area_oficina_sp" => strtoupper($_POST["nuevAreaOfFuncionarioLocal"]),
          "cargo" => strtoupper($_POST["nuevCargoFuncionarioLocal"]),
          "fecha_ingreso" => $fecha,
          "hora_ingreso" => $hora,
          "fecha_salida" => $_POST["nuevFechaSalida"],
          "hora_salida" => $_POST["nuevHoraSalida"],
          "usuario" => $_POST["nuevUsuarioDigitador"]

        );

        $respuesta = ModeloRegistro::mdlIngresarRegistro($tabla, $datos);

        if ($respuesta == "ok") {

          echo '<script>
            
						swal({
							  type: "success",
							  title: "La visita ha sido registrado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then((result) => {
										if (result.value) {

										window.location = "registro";

										}
									})

						</script>';
        } else {
          echo '<script>
            
          swal({
              type: "success",
              title: "Error al Registrar en la BDD, Comunicarse con el Administrador",
              showConfirmButton: true,
              confirmButtonText: "Cerrar"
              }).then((result) => {
                  if (result.value) {

                  window.location = "registro";

                  }
                })

          </script>';
        }
      } else {

        echo '<script>

					swal({
						  type: "error",
						  title: "¡El Registro no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then((result) => {
							if (result.value) {

							window.location = "registro";

							}
						})

			  	</script>';
      }
    }
  }

  /* =============================================
      EDITAR REGISTRO
      ============================================= */

  static public function ctrEditarRegistro()
  {

    if (isset($_POST["editarFechaSalida"])) {


      if ($_POST["editarFechaSalida"]) {


        $tabla = "Tap_RegistroVisita";

        
        $datos = array(

          "id" => $_POST["editarIdRegistro"],
          "fecha_salida" => $_POST["editarFechaSalida"],
          "hora_salida" => $_POST["editarHoraSalida"]
          
        );



        $respuesta = ModeloRegistro::mdlEditarRegistro($tabla, $datos);

        if ($respuesta == "ok") {

          echo '<script>

						swal({
							  type: "success",
							  title: "El Registro ha sido editado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then((result) => {
										if (result.value) {

										window.location = "registro";

										}
									})

						</script>';
        } else {
          echo '<script>

          swal({
              type: "success",
              title: "Error al Registrar la Visita, Contactar con el Administrador",
              showConfirmButton: true,
              confirmButtonText: "Cerrar"
              }).then((result) => {
                  if (result.value) {

                  window.location = "registro";

                  }
                })

          </script>';
        }
      } else {

        echo '<script>

					swal({
						  type: "error",
						  title: "¡El Registro no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then((result) => {
							if (result.value) {

							window.location = "registro";

							}
						})

			  	</script>';
      }
    }
  }

  /* =============================================
      BORRAR PRODUCTO
      ============================================= */

  static public function ctrEliminarRegistro()
  {

    if (isset($_GET["idRegistro"])) {

      $tabla = "Tap_RegistroVisita";
      $datos = $_GET["idRegistro"];

      $respuesta = ModeloRegistro::mdlEliminarRegistro($tabla, $datos);

      if ($respuesta == "ok") {

        echo '<script>

				swal({
					  type: "success",
					  title: "El Registro ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then((result) => {
								if (result.value) {

								window.location = "registro";

								}
							})

				</script>';
      }
    }
  }

  /* =============================================
      REPORTE EXCEL
      ============================================= */
  public function ctrDescargarReporte()
  {
    if (isset($_GET["reporte"])) {

      $tabla = "ticket";

      if (isset($_GET["fechaInicial"]) && isset($_GET["fechaFinal"])) {

        $ticket = ModeloRegistro::mdlMostrarRegistroReporte($tabla, $_GET["fechaInicial"], $_GET["fechaFinal"]);
      } else {

        $item = null;
        $valor = null;
        $ticket = ModeloRegistro::mdlMostrarRegistroReporte($tabla, $item, $valor);
      }


      /*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/

      $Name = $_GET["reporte"] . '.xls';

      header('Expires: 0');
      header('Cache-control: private');
      header("Content-type: application/vnd.ms-excel"); // Archivo de Excel
      header("Cache-Control: cache, must-revalidate");
      header('Content-Description: File Transfer');
      header('Last-Modified: ' . date('D, d M Y H:i:s'));
      header("Pragma: public");
      header('Content-Disposition:; filename="' . $Name . '"');
      header("Content-Transfer-Encoding: binary");

      echo utf8_decode("<table border='0'> 

      <tr>
      <td style='font-weight:bold; boder:1px solid #eee;'>Item</td> 
      <td style='font-weight:bold; boder:1px solid #eee;'>Estado de Visita</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>Fecha</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>Tipo de Documento</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>Dni</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>Nombre Paciente</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>Edad del Paciente</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>DireccionDelPaciente</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>Establecimiento de Salud</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>Distrito Seleccionado</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>Telefono</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>ComoAB</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>Muestra</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>Categoría</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>Código</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>Descripción del Problema</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>FechaSintomas</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>Sintomas</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>Enfermedad</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>Tos</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>DolorGarganta</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>Fiebre</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>Fiebre Temperatura</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>SecrecionNasal</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>OtroSintomas</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>Viaje</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>Pais donde Viajo</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>NumeroViaje</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>ContactoPersonaSospechosa</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>DatosPersonaSospechosa</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>CelPersonaSospechosa</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>Digitador</td>
      </tr>");

      foreach ($ticket as $row => $item) {

        $distrito = ControladorDistrito::ctrMostrarDistrito("id", $item["id_distrito"]);
        $estado = ControladorEstado::ctrMostrarEstado("id", $item["id_estado"]);
        $tipodoc = ControladorDocumento::ctrMostrarDocumento("id", $item["id_documento"]);
        echo utf8_decode("<tr>

        <td style='border:1px solid #eee;'>" . ($row + 1) . "</td>             
        <td style='border:1px solid #eee;'>" . $estado["estado"] . "</td>            
                    <td style='border:1px solid #eee;'>" . $item["fecha"] . "</td>
                    <td style='border:1px solid #eee;'>" . $tipodoc["documento"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["dni"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["nombre_paciente"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["edad_paciente"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["direccion_paciente"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["distrito_paciente"] . "</td>
                    <td style='border:1px solid #eee;'>" . $distrito["distrito"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["telefono_paciente"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["comoAB_paciente"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["muestra_paciente"] . "</td>
                    
                    <td style='border:1px solid #eee;'>" . $item["codigo"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["descripcion_paciente"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["FechaSintomas"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["Sintomas"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["Enfermedad"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["Tos"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["DolorGarganta"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["Fiebre"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["fiebre_num"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["SecrecionNasal"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["OtroSintomas"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["Viaje"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["pais_viaje"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["NumeroViaje"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["ContactoPersonaSospechosa"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["DatosPersonaSospechosa"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["CelPersonaSospechosa"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["nombre"] . "</td>
       </tr>");
      }
      echo "</table>";
    }
  }
}
