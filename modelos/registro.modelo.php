<?php

require_once "conexion.php";

class ModeloRegistro
{
    /* =============================================
      MOSTRAR TICKET
      ============================================= */
    static public function mdlMostrarRegistroReporte($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt->close();

        $stmt = null;
    }
    static public function mdlMostrarRegistro($tabla, $item, $valor)
    {
        //CAPTURAR DATOS PARA EL EDIT EN EL FORMULARIO
        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT Tap_RegistroVisita.id as id,
            Tap_Funcionario.num_documento as num_dni_funcionario,
            Tap_Funcionario.nombre as nombre_funcionario,
            Tap_Funcionario.cargo as cargo_funcionario,
            Tap_Entidad.entidad as entidad_funcionario,
            motivo,
            convert(date,fecha_ingreso) as fecha_I,
            convert(date,fecha_salida)as fecha_S,
            usuario  FROM $tabla inner join Tap_Funcionario  on 
            Tap_RegistroVisita.idfuncionario=Tap_Funcionario.id 
            inner join Tap_Entidad on Tap_Funcionario.identidad=Tap_Entidad.id ORDER BY Tap_RegistroVisita.id DESC");

            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt->close();

        $stmt = null;
    }

    /* =============================================
      REGISTRO DE TICKET
      ============================================= */

    static public function mdlIngresarRegistro($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idtipo_documento
        ,tipo_documento,num_documento,nya_funcionario,identidad,nombre_entidad
        ,motivo,oficina_funcionario,cargo_funcionario,fecha_ingreso,fecha_salida
        ,idusuario,usuario,imagen)
         VALUES (:idtipo_documento,:tipo_documento,:num_documento,:nya_funcionario,
         :identidad,:nombre_entidad,:motivo,:oficina_funcionario,:cargo_funcionario,
         :fecha_ingreso,:fecha_salida,:idusuario,:usuario,:imagen)");

        $stmt->bindParam(":idtipo_documento", $datos["idtipo_documento"], PDO::PARAM_INT);
        $stmt->bindParam(":tipo_documento", $datos["tipo_documento"], PDO::PARAM_STR);

        $stmt->bindParam(":num_documento", $datos["num_documento"], PDO::PARAM_INT);
        $stmt->bindParam(":nya_funcionario", $datos["nya_funcionario"], PDO::PARAM_STR);
        $stmt->bindParam(":identidad", $datos["identidad"], PDO::PARAM_INT);
        $stmt->bindParam(":nombre_entidad", $datos["nombre_entidad"], PDO::PARAM_STR);
        $stmt->bindParam(":motivo", $datos["motivo"], PDO::PARAM_STR);
        $stmt->bindParam(":oficina_funcionario", $datos["oficina_funcionario"], PDO::PARAM_STR);
        $stmt->bindParam(":cargo_funcionario", $datos["cargo_funcionario"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_ingreso", $datos["fecha_ingreso"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_salida", $datos["fecha_salida"], PDO::PARAM_STR);
        $stmt->bindParam(":idusuario", $datos["idusuario"], PDO::PARAM_STR);
        $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);


        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();
        $stmt = null;
    }

    /* =============================================
      EDITAR TICKET
      ============================================= */

    static public function mdlEditarRegistro($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET 
        idtipo_documento=:idtipo_documento
        ,tipo_documento=:tipo_documento,num_documento=:num_documento
        ,nya_funcionario=:nya_funcionario,identidad=:identidad,nombre_entidad=:nombre_entidad
        ,motivo=:motivo,oficina_funcionario=:oficina_funcionario
        ,cargo_funcionario=:cargo_funcionario,fecha_ingreso=:fecha_ingreso
        ,fecha_salida=:fecha_salida,idusuario=:idusuario,usuario=:usuario,imagen=:imagen
        WHERE id = :id");

        $stmt->bindParam(":id",$datos["id"],PDO::PARAM_INT);
        $stmt->bindParam(":idtipo_documento", $datos["idtipo_documento"], PDO::PARAM_INT);
        $stmt->bindParam(":tipo_documento", $datos["tipo_documento"], PDO::PARAM_STR);

        $stmt->bindParam(":num_documento", $datos["num_documento"], PDO::PARAM_INT);
        $stmt->bindParam(":nya_funcionario", $datos["nya_funcionario"], PDO::PARAM_STR);
        $stmt->bindParam(":identidad", $datos["identidad"], PDO::PARAM_INT);
        $stmt->bindParam(":nombre_entidad", $datos["nombre_entidad"], PDO::PARAM_STR);
        $stmt->bindParam(":motivo", $datos["motivo"], PDO::PARAM_STR);
        $stmt->bindParam(":oficina_funcionario", $datos["oficina_funcionario"], PDO::PARAM_STR);
        $stmt->bindParam(":cargo_funcionario", $datos["cargo_funcionario"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_ingreso", $datos["fecha_ingreso"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_salida", $datos["fecha_salida"], PDO::PARAM_STR);
        $stmt->bindParam(":idusuario", $datos["idusuario"], PDO::PARAM_STR);
        $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();
        $stmt = null;
    }

    /* =============================================
      BORRAR TICKET
      ============================================= */

    static public function mdlEliminarRegistro($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

        $stmt->bindParam(":id", $datos, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    /* =============================================
      ACTUALIZAR TICKET
      ============================================= */

    static public function mdlActualizarRegistro($tabla, $item1, $valor1, $valor)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE id = :id");

        $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
        $stmt->bindParam(":id", $valor, PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }
}
