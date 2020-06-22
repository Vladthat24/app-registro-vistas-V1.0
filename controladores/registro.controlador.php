<?php

class ControladorRegistro
{
  /* =============================================
      MOSTRAR TICKET DE ACUERDO AL PERIL
      ============================================= */

  static public function ctrMostrarRegistro($item, $valor, $item2, $valor2)
  {

    $tabla = "Tap_RegistroVisita";

    $respuesta = ModeloRegistro::mdlMostrarRegistro($tabla, $item, $valor, $item2, $valor2);

    return $respuesta;
  }

  static public function ctrMostrarRegistro_usuario($item, $item2, $valor, $item3, $valor3)
  {

    $tabla = "Tap_RegistroVisita";

    $respuesta = ModeloRegistro::mdlMostrarRegistro_usuario($tabla, $item, $item2, $valor, $item3, $valor3);

    return $respuesta;
  }

  static public function ctrMostrarRegistro_informatico($item, $item2, $valor, $item3, $valor3)
  {

    $tabla = "Tap_RegistroVisita";

    $respuesta = ModeloRegistro::mdlMostrarRegistro_informatico($tabla, $item, $item2, $valor, $item3, $valor3);

    return $respuesta;
  }

  /* =============================================
      CREAR REGISTRO
      ============================================= */

  static public function ctrCrearRegistro()
  {

    if (isset($_POST["nuevNum_documento"])) {

      if ($_POST["nuevNum_documento"]) {

        /* =============================================
                  VALIDAR IMAGEN
        ============================================= */

        $ruta = "vistas/img/productos/default/anonymous.png";

        if (isset($_FILES["nuevImagen"]["tmp_name"])) {

          list($ancho, $alto) = getimagesize($_FILES["nuevImagen"]["tmp_name"]);

          $nuevoAncho = 500;
          $nuevoAlto = 500;

          /* =============================================
            CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
           ============================================= */

          $directorio = "vistas/img/productos/" . $_POST["nuevNum_documento"];

          mkdir($directorio, 0755);

          /* =============================================
              DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
           ============================================= */

          if ($_FILES["nuevImagen"]["type"] == "image/jpeg") {

            /* =============================================
              GUARDAMOS LA IMAGEN EN EL DIRECTORIO
            ============================================= */

            $aleatorio = mt_rand(100, 999);

            $ruta = "vistas/img/productos/" . $_POST["nuevNum_documento"] . "/" . $aleatorio . ".jpg";

            $origen = imagecreatefromjpeg($_FILES["nuevImagen"]["tmp_name"]);

            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

            imagejpeg($destino, $ruta);
          }

          if ($_FILES["nuevImagen"]["type"] == "image/png") {

            /* =============================================
                GUARDAMOS LA IMAGEN EN EL DIRECTORIO
            ============================================= */

            $aleatorio = mt_rand(100, 999);

            $ruta = "vistas/img/productos/" . $_POST["nuevNum_documento"] . "/" . $aleatorio . ".png";

            $origen = imagecreatefrompng($_FILES["nuevImagen"]["tmp_name"]);

            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

            imagepng($destino, $ruta);
          }
        }
        date_default_timezone_set('America/Lima');

        $fecha = date('Y-m-d');
        $hora = date('H:i:s');

        $fechaActual = $fecha . ' ' . $hora;

        $tabla = "Tap_RegistroVisita";

        $datos = array(
          "idtipo_documento" => $_POST["nuevTipoDocumento"],
          "tipo_documento" => $_POST["nuevTipo_documento"],
          "num_documento" => $_POST["nuevNum_documento"],

          "nya_funcionario" => $_POST["nuevNya_funcionario"],
          "identidad" => $_POST["nuevIdentidad"],
          "nombre_entidad" => $_POST["nuevNombre_entidad"],
          "motivo" => $_POST["motivo"],
          "oficina_funcionario" => $_POST["nuevOficina_funcionario"],
          "cargo_funcionario" => $_POST["nuevCargo_funcionario"],
          "fecha_ingreso" => $fechaActual,
          "fecha_salida" => $_POST["nuevFecha_salida"],
          "idusuario" => $_POST["nuevIdusuario"],
          "usuario" => $_POST["nuevUsuario"],
          "imagen" => $ruta

        );

        $respuesta = ModeloRegistro::mdlIngresarRegistro($tabla, $datos);

        if ($respuesta == "ok") {

          echo '<script>
            
						swal({
							  type: "success",
							  title: "El Registro ha sido generado correctamente",
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

    if (isset($_POST["editarNumero_documento"])) {

      if ($_POST["editarNumero_documento"]) {

        /* =============================================
                  VALIDAR IMAGEN
                  ============================================= */

        $ruta = $_POST["imagenActual"];

        if (isset($_FILES["editarImagen"]["tmp_name"]) && !empty($_FILES["editarImagen"]["tmp_name"])) {

          list($ancho, $alto) = getimagesize($_FILES["editarImagen"]["tmp_name"]);

          $nuevoAncho = 500;
          $nuevoAlto = 500;

          /* =============================================
           CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
         ============================================= */

          $directorio = "vistas/img/productos/" . $_POST["editarNumero_documento"];

          /* =============================================
          PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
          ============================================= */

          if (!empty($_POST["imagenActual"]) && $_POST["imagenActual"] != "vistas/img/productos/default/anonymous.png") {

            unlink($_POST["imagenActual"]);
          } else {

            mkdir($directorio, 0755);
          }

          /* =============================================
                      DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
                      ============================================= */

          if ($_FILES["editarImagen"]["type"] == "image/jpeg") {

            /* =============================================
                          GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                          ============================================= */

            $aleatorio = mt_rand(100, 999);

            $ruta = "vistas/img/productos/" . $_POST["editarNum_documento"] . "/" . $aleatorio . ".jpg";

            $origen = imagecreatefromjpeg($_FILES["editarImagen"]["tmp_name"]);

            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

            imagejpeg($destino, $ruta);
          }

          if ($_FILES["editarImagen"]["type"] == "image/png") {

            /* =============================================
                          GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                          ============================================= */

            $aleatorio = mt_rand(100, 999);

            $ruta = "vistas/img/productos/" . $_POST["editarNum_documento"] . "/" . $aleatorio . ".png";

            $origen = imagecreatefrompng($_FILES["editarImagen"]["tmp_name"]);

            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

            imagepng($destino, $ruta);
          }
        }

        $tabla = "Tap_RegistroVisita";

        $datos = array(

          "idtipo_documento" => $_POST["nuevTipoDocumento"],
          "tipo_documento" => $_POST["nuevTipo_documento"],
          "num_documento" => $_POST["nuevNum_documento"],

          "nya_funcionario" => $_POST["nuevNya_funcionario"],
          "identidad" => $_POST["nuevIdentidad"],
          "nombre_entidad" => $_POST["nuevNombre_entidad"],
          "motivo" => $_POST["motivo"],
          "oficina_funcionario" => $_POST["nuevOficina_funcionario"],
          "cargo_funcionario" => $_POST["nuevCargo_funcionario"],
          "fecha_salida" => $_POST["nuevFecha_salida"],
          "idusuario" => $_POST["nuevIdusuario"],
          "usuario" => $_POST["nuevUsuario"],
          "imagen" => $ruta
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

      if ($_GET["imagen"] != "" && $_GET["imagen"] != "vistas/img/productos/default/anonymous.png") {

        unlink($_GET["imagen"]);
        rmdir('vistas/img/productos/' . $_GET["num_documento"]);
      }

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
        $categoria = ControladorCategorias::ctrMostrarCategorias("id", $item["id_categoria"]);
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
                    <td style='border:1px solid #eee;'>" . $categoria["categoria"] . "</td>
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




