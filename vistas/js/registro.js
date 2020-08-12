actualizarActivo();
/*=============================================
LLAMAR AL DNI QUE ESTA ALMACENADO EN EL LOCALSTRORE
 =============================================*/
$(document).ready(function () {


    var dni = localStorage.getItem("dniLocalStore");
    $("#nuevDniVisitaFuncionario").val(dni);

    $("#nuevEntidadSelectSearch").select2();

})
/*=============================================
ALMACENAR EL DNI EN EL LOCALSTRORE
 =============================================*/
$("#crearFuncionarioVisita").on("click", function () {

    var dniLocalStore = $(".dniLocalStore").val();

    localStorage.setItem("dniLocalStore", dniLocalStore);

})


/*=============================================
ELIMINAR DNI EN EL LOCALSTRORE
 =============================================*/
$("#limpiarFuncionario").on("click", function () {

    localStorage.removeItem("dniLocalStore");

    $("#nuevDniVisitaFuncionario").val("");
    $("#nuevDniVisitaFuncionario").removeClass('.')
    $("#nuevNombreFuncionario").val("");
    $("#nuevCargoFuncionario").val("");
    $("#nuevEntidadFuncionario").val("");

})
/*=============================================
 CARGAR MODAL DE FUNCIONARIO 
 =============================================*/
$("#agregarFuncionario").on("click", function () {

    $('#modalAgregarRegistro').modal('show');

    var dni = localStorage.getItem("dniLocalStore");
    $("#nuevDniVisitaFuncionario").val(dni);



})

$("#crearFuncionario").on("click", function () {
    $('#modalAgregarFuncionarioVisita').modal('show');
})

$("#agregarEntidades").on("click", function () {
    $('#modalAgregarEntidadVisita').modal('show');
})

/*=============================================
 CARGAR HORA DE DATETIMEPICKER
 =============================================*/
$(function () {
    $('#datetimepicker3').datetimepicker({
        format: 'LT'
    });
});

/*=============================================
 ACTUALIZAR PAGINA 
 =============================================*/
$("#actualizar").click(function () {
    window.location = "registro";
})
/*=============================================
 VALIDAR FUNCIONARIO SI EXISTE
 =============================================*/

$("#buscarFuncionario").click(function () {

    var funcionario = $("#nuevDniVisitaFuncionario").val();
    console.log("funcionario", funcionario);

    var datos = new FormData();
    datos.append("validarFuncionario", funcionario);

    $.ajax({
        url: "ajax/funcionario.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            if (!respuesta) {

                $("#nuevDniVisitaFuncionario").parent()
                    .after(

                        swal({
                            type: "error",
                            title: "¡EL usuario no exite en la base de datos, CREAR USUARIO!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function (result) {
                            if (result.value) {



                            }
                        })

                    );
                $("#nuevNombreFuncionario").val("");
                $("#nuevCargoFuncionario").val("");
                $("#nuevEntidadFuncionario").val("");
            } else {

                $("#nuevIdFuncionario").val(respuesta["id"]);
                $("#nuevNombreFuncionario").val(respuesta["nombre"]);
                $("#nuevCargoFuncionario").val(respuesta["cargo"]);


                var datosEntidad = new FormData();
                datosEntidad.append("idEntidad", respuesta["identidad"]);

                //METODO AJAX PARA TRAER EL NOMBRE A LA VENTANA EDITAR 
                $.ajax({

                    url: "ajax/entidad.ajax.php",
                    method: "POST",
                    data: datosEntidad,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function (respuesta) {

                        $("#nuevEntidadFuncionario").val(respuesta["entidad"]);


                    }

                })


            }

        }

    })
})

/*=============================================
 CARGAR LA TABLA DINÁMICA DE REGISTRO
 =============================================*/
function actualizarActivo() {

    $('.tablaRegistro').DataTable({

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



/*================================
 //REMOVER EL ID DEL COMBO
 ===================================*/
$("#editarCatg").on("click", function () {

    $("#editarCategoria").remove();
})

/*=============================================
 EDITAR TICKET   ACTIVO
 =============================================*/

$(".tablaRegistro tbody").on("click", "button.btnEditarTicket", function () {

    var idRegistro = $(this).attr("idRegistro");

    var datos = new FormData();
    datos.append("idRegistro", idRegistro);

    $.ajax({

        url: "ajax/registro.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            var datosFuncionario = new FormData();
            datosFuncionario.append("idFuncionario", respuesta["idfuncionario"]);


            //METODO AJAX PARA TRAER EL FUNCIONARIO EDITAR 
            $.ajax({

                url: "ajax/funcionario.ajax.php",
                method: "POST",
                data: datosFuncionario,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {

                    $("#editarNombreFuncionario").val(respuesta["id"]);


                }

            })


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
/*=============================================
SELECCIONAR FUNCIONARIO DE LISTA
 =============================================*/

$("#listarFuncionario").on("click", function () {
    $('#modalListarFuncionario').modal('show');
})



$(".tablasListado tbody").on("click", "button.listarFuncionario", function () {


    var idFuncionario = $(this).attr("idFuncionarioLista");

    var datos = new FormData();
    datos.append("idFuncionario", idFuncionario);

    $.ajax({
        url: "ajax/funcionario.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            $("#nuevIdFuncionario").val(respuesta["id"]);
            $("#nuevDniVisitaFuncionario").val(respuesta["num_documento"]);
            $("#nuevNombreFuncionario").val(respuesta["nombre"]);
            $("#nuevCargoFuncionario").val(respuesta["cargo"]);


            var datosEntidad = new FormData();
            datosEntidad.append("idEntidad", respuesta["identidad"]);

            //METODO AJAX PARA TRAER EL NOMBRE A LA VENTANA EDITAR 
            $.ajax({

                url: "ajax/entidad.ajax.php",
                method: "POST",
                data: datosEntidad,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {

                    $("#nuevEntidadFuncionario").val(respuesta["entidad"]);


                }

            })

            var datosTipoDocumento = new FormData();
            datosTipoDocumento.append("idDocumento", respuesta["idtipo_documento"]);

            $.ajax({

                url: "ajax/documento.ajax.php",
                method: "POST",
                data: datosTipoDocumento,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {

                    $("#nuevTipoDocumento").val(respuesta["tipo_documento"]);


                }

            })

        }

    })
})

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

