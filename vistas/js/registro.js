actualizarActivo();
actualizarInactivo();

/* $(document).ready(function () {
     setTimeout(function () {
        $('.tablaActualizar').load(window.location = "ticket");
    }, 600000); 


    $('[muestra_paciente="TOMO MUESTRA"]').addClass('btn btn btn-success');

}) */

//$(document).ready(function () {
/*  CUENDO PRESIONAS LA TECLA
    $(".dniminivalidar").keydown(function () {
        console.log("Tecla pulsada");
    }); */

/* CUANDO SUELTAS LA TECLA */


//})


$("#actualizar").click(function () {
    window.location = "ticket";
})

$("#actualizarReporte").click(function () {
    window.location = "reporteticket";
})

/*=============================================
 CARGAR LA TABLA DINÁMICA DE REGISTRO
 =============================================*/
function actualizarActivo() {
    $('.tablaTicket').DataTable({

        "ajax": "ajax/datatable-registro.ajax.php",
        "deferRender": true,
        "retrieve": true,
        "processing": true,
        "language": {

            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }

        }


    })
}

/*=============================================
 CAPTURANDO LA CATEGORIA PARA ASIGNAR CÓDIGO - NUEVA
 =============================================*/
$("#nuevaCategoria").change(function () {
    /* $(document).ready(function () { */

    var idCategoria = $(this).val();

    var datos = new FormData();
    datos.append("idCategoria", idCategoria);

    $.ajax({

        url: "ajax/ticket.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            if (!respuesta) {

                var nuevoCodigo = idCategoria + "0001";
                $("#nuevoCodigo").val(nuevoCodigo);

            } else {

                var nuevoCodigo = Number(respuesta["codigo"]) + 1;
                $("#nuevoCodigo").val(nuevoCodigo);

            }

        }

    })

})
/*=============================================
 CAPTURANDO LA TIPO DE DOCUMENTO PARA ASIGNAR CÓDIGO - NUEVA
 =============================================*/
$("#nuevaDocumento").change(function () {

    var tipoDocumento = $('#nuevaDocumento option:selected').html();
    /* console.log(tipoDocumento); */
    if (tipoDocumento !== "DNI") {
        $("#dniPaciente").removeAttr("maxlength");
    } else {
        $("#dniPaciente").val('');
        $("#dniPaciente").attr("maxlength", "8");
    }

})

/*=============================================
 REVISAR SI EL USUARIO YA ESTÁ REGISTRADO
 =============================================*/

$("#nuevoNombrePaciente").change(function () {


    $(".alert").remove();

    var usuario = $(this).val();

    var datos = new FormData();
    datos.append("validarUsuario", usuario);

    $.ajax({
        url: "ajax/ticket.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            if (respuesta) {

                $("#nuevoNombrePaciente").parent().after('<div class="alert alert-warning">Este usuario ya existe en la base de datos</div>');

                $("#nuevoNombrePaciente").val("");

            }

        }

    })
});
/*=============================================
 HACER VISIBLE EL CAMBO ENFERMEDAD SI SELECCIONA "SI"
 =============================================*/
$("#nuevoSintomas").change(function () {

    /* var sintomas = document.getElementById("nuevoSintomas").value; */
    var sintomas = $(this).val();

    if (sintomas == "SI") {
        console.log("prueba del si");
        $("#textSintomas").removeClass("hidden");

    } else if (sintomas == "NO") {

        console.log("prueba del no");
        $("#textSintomas").addClass("hidden");
    }

});

/*=============================================
 HACER VISIBLE EL CAMBO VIAJE SI SELECCIONA "SI"
 =============================================*/
$("#nuevoViaje").change(function () {

    /* var sintomas = document.getElementById("nuevoSintomas").value; */
    var sintomas = $(this).val();

    if (sintomas == "SI") {
        console.log("prueba del si");
        $("#textNumViaje").removeClass("hidden");
        $("#textPaisViaje").removeClass("hidden");
    } else if (sintomas == "NO") {

        console.log("prueba del no");
        $("#textNumViaje").addClass("hidden");
        $("#textPaisViaje").addClass("hidden");
    }

});

/*=============================================
 HACER VISIBLE EL CAMBO FIEBRE NUM SI SELECCIONA "SI"
 =============================================*/
$("#nuevoFiebre").change(function () {

    /* var sintomas = document.getElementById("nuevoSintomas").value; */
    var fiebre = $(this).val();

    if (fiebre == "SI") {
        console.log("prueba del si");
        $("#textFiebre").removeClass("hidden");

    } else if (fiebre == "NO") {

        console.log("prueba del no");
        $("#textFiebre").addClass("hidden");
    }

});
/*=============================================
 HACER VISIBLE EL CAMBO PACIENTE SE TOPO CON USUARIO SOSPECHOSO DE COVID19
 =============================================*/
$("#nuevoContactoPersonaSospechosa").change(function () {

    /* var sintomas = document.getElementById("nuevoSintomas").value; */
    var sintomas = $(this).val();

    if (sintomas == "SI") {
        console.log("prueba del si");
        $("#textDatosPersona").removeClass("hidden");
        $("#textDatosPersona_cel").removeClass("hidden");

    } else if (sintomas == "NO") {

        console.log("prueba del no");
        $("#textDatosPersona").addClass("hidden");
        $("#textDatosPersona_cel").addClass("hidden");
    }

});

$("#dniPaciente").change(function () {
    //$('#consultar').on('click', function () {


    var dni = $('#dniPaciente').val();
    console.log("Tecla soltada", dni.length);

    if (dni.length < 8) {

        alert("INGRESE LOS 8 CARACTERES DEL DNI");
        $(".dniminivalidar").val('');
        return false;
    }

    $(".alert").remove();


    var dni = $('#dniPaciente').val();
    var datos = new FormData();
    datos.append("validarDni", dni);

    $.ajax({
        url: "ajax/ticket.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            if (respuesta) {

                $("#dniPaciente").parent().after('<div class="alert alert-warning">Este usuario ya existe en la base de datos</div>');

                $("#dniPaciente").val("");
                $("#nuevoNombrePaciente").html("");

            }

        }

    })
});


/*=============================================
 CAPTURANDO LA CATEGORIA PARA ASIGNAR CÓDIGO - EDITAR
 =============================================*/
$("#editarCategoria").change(function () {

    var idCategoria = $(this).val();

    var datos = new FormData();
    datos.append("idCategoria", idCategoria);

    $.ajax({

        url: "ajax/ticket.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            if (!respuesta) {

                var nuevoCodigo = idCategoria + "0001";
                $("#editarCodigo").val(nuevoCodigo);

            } else {

                var nuevoCodigo = Number(respuesta["codigo"]) + 1;
                $("#editarCodigo").val(nuevoCodigo);

            }

        }

    })

})


/*=============================================
 SUBIENDO LA FOTO DEL TICKET
 =============================================*/

$(".nuevaImagen").change(function () {

    var imagen = this.files[0];

    /*=============================================
     VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
     =============================================*/

    if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {

        $(".nuevaImagen").val("");

        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen debe estar en formato JPG o PNG!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });

    } else if (imagen["size"] > 2000000) {

        $(".nuevaImagen").val("");

        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen no debe pesar más de 2MB!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });

    } else {

        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);

        $(datosImagen).on("load", function (event) {

            var rutaImagen = event.target.result;

            $(".previsualizar").attr("src", rutaImagen);

        })

    }
})
/*================================
 //REMOVER EL ID DEL COMBO
 ===================================*/
$("#editarCatg").on("click", function () {

    $("#editarCategoria").remove();
})
$("#editarSop").on("click", function () {

    $("#editarSoporte").remove();
})
$("#editarEst").on("click", function () {

    $("#editarEstado").remove();
})
$("#editarDist").on("click", function () {

    $("#editarDistrito").remove();
})
$("#editarDocum").on("click", function () {
    $("#editarDocumento").remove();
})

/*=============================================
 EDITAR TICKET   ACTIVO
 =============================================*/

$(".tablaTicket tbody").on("click", "button.btnEditarTicket", function () {

    var idTicket = $(this).attr("idTicket");

    var datos = new FormData();
    datos.append("idTicket", idTicket);

    $.ajax({

        url: "ajax/ticket.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            var datosCategoria = new FormData();
            datosCategoria.append("idCategoria", respuesta["id_categoria"]);

            //            var datosSoporte = new FormData();
            //            datosSoporte.append("idSoporte", respuesta["id_soporte"]);

            var datosEstado = new FormData();
            datosEstado.append("idEstado", respuesta["id_estado"]);

            var datosDistrito = new FormData();
            datosDistrito.append("idDistrito", respuesta["id_distrito"]);

            var datosDocumento = new FormData();
            datosDocumento.append("idDocumento", respuesta["id_documento"]);

            //METODO AJAX PARA TRAER EL NOMBRE A LA VENTANA EDITAR 
            $.ajax({

                url: "ajax/categorias.ajax.php",
                method: "POST",
                data: datosCategoria,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {

                    $("#editarCategoria").val(respuesta["id"]);
                    $("#editarCategoria").html(respuesta["categoria"]);

                }

            })
            //METODO AJAX PARA TRAER EL NOMBRE A LA VENTANA EDITAR 
            $.ajax({

                url: "ajax/documento.ajax.php",
                method: "POST",
                data: datosDocumento,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {

                    $("#editarDocumento").val(respuesta["id"]);
                    $("#editarDocumento").html(respuesta["documento"]);

                }

            })

            $.ajax({

                url: "ajax/estado.ajax.php",
                method: "POST",
                data: datosEstado,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {

                    $("#editarEstado").val(respuesta["id"]);
                    $("#editarEstado").html(respuesta["estado"]);

                }

            })

            $.ajax({

                url: "ajax/distrito.ajax.php",
                method: "POST",
                data: datosDistrito,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {

                    $("#editarDistritoSelect").val(respuesta["id"]);
                    $("#editarDistritoSelect").html(respuesta["distrito"]);

                }

            })
            //CAPTURAR ID DEL MODAL EDITAR PARA MODIFICARLOS


            $("#editardniPaciente").val(respuesta["dni"]);
            $("#editarNombrePaciente").val(respuesta["nombre_paciente"]);
            $("#editarEdadPaciente").val(respuesta["edad_paciente"]);
            $("#editarDireccionPaciente").val(respuesta["direccion_paciente"]);
            $("#editarDistritoPaciente").val(respuesta["distrito_paciente"]);
            $("#editarCelularPaciente").val(respuesta["telefono_paciente"]);
            $("#editarCelularPaciente").val(respuesta["telefono_paciente"]);
            $("#editarComoABPaciente").val(respuesta["comoAB_paciente"]);
            $("#editarMuestra").val(respuesta["muestra_paciente"]);
            $("#editarMuestra").html(respuesta["muestra_paciente"]);


            $("#editarFechaSintomas").val(respuesta["FechaSintomas"]);
            $("#editarSintomas").val(respuesta["Sintomas"]);
            $("#editarSintomas").html(respuesta["Sintomas"]);
            $("#editarEnfermedad").val(respuesta["Enfermedad"]);
            $("#editarTos").val(respuesta["Tos"]);
            $("#editarTos").html(respuesta["Tos"]);
            $("#editarDolorGarganta").val(respuesta["DolorGarganta"]);
            $("#editarDolorGarganta").html(respuesta["DolorGarganta"]);
            $("#editarFiebre").val(respuesta["Fiebre"]);
            $("#editarFiebre").html(respuesta["Fiebre"]);
            $("#editarFiebre_num").val(respuesta["fiebre_num"]);
            $("#editarSecrecionNasal").val(respuesta["SecrecionNasal"]);
            $("#editarSecrecionNasal").html(respuesta["SecrecionNasal"]);
            $("#editarOtroSintomas").val(respuesta["OtroSintomas"]);
            $("#editarViaje").val(respuesta["Viaje"]);
            $("#editarViaje").html(respuesta["Viaje"]);
            $("#editarPaisViaje").val(respuesta["pais_viaje"]);
            $("#editarNumeroViaje").val(respuesta["NumeroViaje"]);
            $("#editarContactoPersonaSospechosa").val(respuesta["ContactoPersonaSospechosa"]);
            $("#editarContactoPersonaSospechosa").html(respuesta["ContactoPersonaSospechosa"]);
            $("#editarDatosPersonaSospechosa").val(respuesta["DatosPersonaSospechosa"]);
            $("#editarCelPersonaSospechosa").val(respuesta["CelPersonaSospechosa"]);

            $("#editarCodigo").val(respuesta["codigo"]);

            $("#editarDescripcion").val(respuesta["descripcion_paciente"]);

            $("#editarObservacion").val(respuesta["observacion"]);

            $("#editarNombre").val(respuesta["nombre"]);

            $("#editarOficina").val(respuesta["oficina"]);

            $("#editarArea").val(respuesta["area"]);

            $("#editarCargo").val(respuesta["cargo"]);

            $("#editarCel").val(respuesta["cel"]);

            $("#editarSede").val(respuesta["sede"]);

            $("#editarPiso").val(respuesta["piso"]);

            /*           $("#editarSoporte").val(respuesta["soporte"]);
                      $("#editarSoporte").html(respuesta["soporte"]); */



            if (respuesta["imagen"] != "") {

                $("#imagenActual").val(respuesta["imagen"]);

                $(".previsualizar").attr("src", respuesta["imagen"]);

            }

        }

    })

})


/*=============================================
 ELIMINAR TICKET
 =============================================*/

$(".tablaTicket tbody").on("click", "button.btnEliminarTicket", function () {

    var idTicket = $(this).attr("idTicket");
    var codigo = $(this).attr("codigo");
    var imagen = $(this).attr("imagen");

    swal({

        title: '¿Está seguro de borrar el Registro?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Registro!'
    }).then(function (result) {
        if (result.value) {

            window.location = "index.php?ruta=ticket&idTicket=" + idTicket + "&imagen=" + imagen + "&codigo=" + codigo;

        }


    })

})

/*=============================================
 IMPRIMIR TICKET
 =============================================*/
$(".tablaTicket").on("click", ".btnImprimirTicket", function () {

    var idTicket = $(this).attr("idTicket");

    window.open("extensiones/tcpdf/pdf/printTicket.php?idTicket=" + idTicket, "_blank");
}
)


/*===================================================================================================
*****************************************************************************************************
FUNCIONES EN JAVA SCRIPT PARA LA TABLA TERMINADOS 
*****************************************************************************************************
 ====================================================================================================*/

/*=============================================
 CARGAR LA TABLA DINÁMICA DE TICKETS TERMINADOS
 =============================================*/
function actualizarInactivo() {
    $('.tablaTicketInactivo').DataTable({

        "ajax": "ajax/datatable-ticket.ajaxInactivo.php",
        "deferRender": true,
        "retrieve": true,
        "processing": true,
        "language": {

            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }

        }


    })
}
/*=============================================
EDITAR TICKET TERMINADO
=============================================*/
$(".tablaTicketInactivo tbody").on("click", "button.btnEditarTicket", function () {

    var idTicket = $(this).attr("idTicket");

    var datos = new FormData();
    datos.append("idTicket", idTicket);

    $.ajax({

        url: "ajax/ticket.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {



            var datosCategoria = new FormData();
            datosCategoria.append("idCategoria", respuesta["id_categoria"]);

            //            var datosSoporte = new FormData();
            //            datosSoporte.append("idSoporte", respuesta["id_soporte"]);

            var datosEstado = new FormData();
            datosEstado.append("idEstado", respuesta["id_estado"]);

            var datosDistrito = new FormData();
            datosDistrito.append("idDistrito", respuesta["id_distrito"]);

            //METODO AJAX PARA TRAER EL NOMBRE A LA VENTANA EDITAR 
            var datosDocumento = new FormData();
            datosDocumento.append("idDocumento", respuesta["id_documento"]);

            //METODO AJAX PARA TRAER EL NOMBRE A LA VENTANA EDITAR 
            $.ajax({

                url: "ajax/categorias.ajax.php",
                method: "POST",
                data: datosCategoria,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {

                    $("#editarCategoria").val(respuesta["id"]);
                    $("#editarCategoria").html(respuesta["categoria"]);

                }

            })
            //METODO AJAX PARA TRAER EL NOMBRE A LA VENTANA EDITAR 
            $.ajax({

                url: "ajax/documento.ajax.php",
                method: "POST",
                data: datosDocumento,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {

                    $("#editarDocumento").val(respuesta["id"]);
                    $("#editarDocumento").html(respuesta["documento"]);

                }

            })

            $.ajax({

                url: "ajax/estado.ajax.php",
                method: "POST",
                data: datosEstado,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {

                    $("#editarEstado").val(respuesta["id"]);
                    $("#editarEstado").html(respuesta["estado"]);

                }

            })

            $.ajax({

                url: "ajax/distrito.ajax.php",
                method: "POST",
                data: datosDistrito,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {

                    $("#editarDistritoSelect").val(respuesta["id"]);
                    $("#editarDistritoSelect").html(respuesta["distrito"]);

                }

            })
            //CAPTURAR ID DEL MODAL EDITAR PARA MODIFICARLOS


            $("#editardniPaciente").val(respuesta["dni"]);
            $("#editarNombrePaciente").val(respuesta["nombre_paciente"]);
            $("#editarEdadPaciente").val(respuesta["edad_paciente"]);
            $("#editarDireccionPaciente").val(respuesta["direccion_paciente"]);
            $("#editarDistritoPaciente").val(respuesta["distrito_paciente"]);
            $("#editarCelularPaciente").val(respuesta["telefono_paciente"]);
            $("#editarCelularPaciente").val(respuesta["telefono_paciente"]);
            $("#editarComoABPaciente").val(respuesta["comoAB_paciente"]);
            $("#editarMuestra").val(respuesta["muestra_paciente"]);
            $("#editarMuestra").html(respuesta["muestra_paciente"]);

            $("#editarFechaSintomas").val(respuesta["FechaSintomas"]);
            $("#editarSintomas").val(respuesta["Sintomas"]);
            $("#editarSintomas").html(respuesta["Sintomas"]);
            $("#editarEnfermedad").val(respuesta["Enfermedad"]);
            $("#editarTos").val(respuesta["Tos"]);
            $("#editarTos").html(respuesta["Tos"]);
            $("#editarDolorGarganta").val(respuesta["DolorGarganta"]);
            $("#editarDolorGarganta").html(respuesta["DolorGarganta"]);
            $("#editarFiebre").val(respuesta["Fiebre"]);
            $("#editarFiebre").html(respuesta["Fiebre"]);
            $("#editarFiebre_num").val(respuesta["fiebre_num"]);
            $("#editarSecrecionNasal").val(respuesta["SecrecionNasal"]);
            $("#editarSecrecionNasal").html(respuesta["SecrecionNasal"]);
            $("#editarOtroSintomas").val(respuesta["OtroSintomas"]);
            $("#editarViaje").val(respuesta["Viaje"]);
            $("#editarViaje").html(respuesta["Viaje"]);
            $("#editarPaisViaje").val(respuesta["pais_viaje"]);
            $("#editarNumeroViaje").val(respuesta["NumeroViaje"]);
            $("#editarContactoPersonaSospechosa").val(respuesta["ContactoPersonaSospechosa"]);
            $("#editarContactoPersonaSospechosa").html(respuesta["ContactoPersonaSospechosa"]);
            $("#editarDatosPersonaSospechosa").val(respuesta["DatosPersonaSospechosa"]);
            $("#editarCelPersonaSospechosa").val(respuesta["CelPersonaSospechosa"]);

            $("#editarCodigo").val(respuesta["codigo"]);

            $("#editarDescripcion").val(respuesta["descripcion_paciente"]);

            $("#editarObservacion").val(respuesta["observacion"]);

            $("#editarNombre").val(respuesta["nombre"]);

            $("#editarOficina").val(respuesta["oficina"]);

            $("#editarArea").val(respuesta["area"]);

            $("#editarCargo").val(respuesta["cargo"]);

            $("#editarCel").val(respuesta["cel"]);

            $("#editarSede").val(respuesta["sede"]);

            $("#editarPiso").val(respuesta["piso"]);

            if (respuesta["imagen"] != "") {

                $("#imagenActual").val(respuesta["imagen"]);

                $(".previsualizar").attr("src", respuesta["imagen"]);

            }

        }

    })

})

/*=============================================
 IMPRIMIR TICKET TERMINADO
 =============================================*/
$(".tablaTicketInactivo").on("click", ".btnImprimirTicket", function () {

    var idTicket = $(this).attr("idTicket");

    window.open("extensiones/tcpdf/pdf/printTicket.php?idTicket=" + idTicket, "_blank");
}
)

/*=============================================
RANGO DE FECHAS
=============================================*/

$('#daterange-btn').daterangepicker(
    {
        ranges: {
            'Hoy': [moment(), moment()],
            'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Últimos 7 días': [moment().subtract(6, 'days'), moment()],
            'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
            'Este mes': [moment().startOf('month'), moment().endOf('month')],
            'Último mes': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment(),
        endDate: moment()
    },
    function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

        var fechaInicial = start.format('YYYY-MM-DD');

        var fechaFinal = end.format('YYYY-MM-DD');

        var capturarRango = $("#daterange-btn span").html();

        localStorage.setItem("capturarRango", capturarRango);

        window.location = "index.php?ruta=reporteticket&fechaInicial=" + fechaInicial + "&fechaFinal=" + fechaFinal;

    }

)

/*=============================================
CANCELAR RANGO DE FECHAS
=============================================*/

$(".daterangepicker.opensleft .range_inputs .cancelBtn").on("click", function () {

    localStorage.removeItem("capturarRango");
    localStorage.clear();
    window.location = "reporteticket";
})

