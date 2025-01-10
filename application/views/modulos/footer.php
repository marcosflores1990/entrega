<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        DESARROLLADO POR MARCOS FLORES
    </div>
    <!-- Default to the left -->
    <strong>UNIVERSIDAD DE TALCA.</strong>
</footer>
</div>
<!-- ./wrapper -->
<script>
$(".nav-link").click(function(e) {
    // e.preventDefault();
    $(".nav-link").removeClass('active');
    $(this).addClass('active');
});

//definimos la constante con la url base
const url = '<?php echo base_url()?>'

/*cargarTemplos();
cargarNiveles();
cargarEstados();
cargarGeneros();
cargarRegiones();
//cargarRegionesEnComunas();
cargarComunas();
cargarProfesiones();
cargarCuerpos();
cargarNacionalidades();
cargarMiembros();*/
//cargarUsuarios();


/*********  FUNCIONES DE CARGA  ************/
function cargarTemplos() {
    $('#idTablaTemplos').DataTable({
        ajax: {
            url: url + 'index.php/cTemplo/cObtenerTemplosDataTable',
            type: "POST",
            dataSrc: ''
        },
        columns: [{
                data: 'id_templo'
            },
            {
                data: 'nombre'
            },
            {
                data: 'estado'
            },
            {
                data: 'acciones'
            }

        ]
    });
}

function cargarNiveles() {
    $('#idTablaNiveles').DataTable({
        ajax: {
            url: url + 'index.php/cNivelEstudios/cObtenerNivelesDataTable',
            type: "POST",
            dataSrc: ''
        },
        columns: [{
                data: 'id_nivel'
            },
            {
                data: 'descripcion'
            },
            {
                data: 'estado'
            },
            {
                data: 'acciones'
            }

        ]
    });
}

function cargarEstados() {
    $('#idTablaEstados').DataTable({
        ajax: {
            url: url + 'index.php/cEstadoCivil/cObtenerEstadosDataTable',
            type: "POST",
            dataSrc: ''
        },
        columns: [{
                data: 'id_estado'
            },
            {
                data: 'descripcion'
            },
            {
                data: 'estado'
            },
            {
                data: 'acciones'
            }

        ]
    });
}

function cargarGeneros() {
    $('#idTablaGeneros').DataTable({
        ajax: {
            url: url + 'index.php/cGenero/cObtenerGenerosDataTable',
            type: "POST",
            dataSrc: ''
        },
        columns: [{
                data: 'id_genero'
            },
            {
                data: 'descripcion'
            },
            {
                data: 'estado'
            },
            {
                data: 'acciones'
            }

        ]
    });
}

function cargarRegiones() {
    $('#idTablaRegiones').DataTable({
        ajax: {
            url: url + 'index.php/cRegion/cObtenerRegionesDataTable',
            type: "POST",
            dataSrc: ''
        },
        columns: [{
                data: 'id_region'
            },
            {
                data: 'nombre'
            },
            {
                data: 'estado'
            },
            {
                data: 'acciones'
            }

        ]
    });
}

function cargarComunas() {
    $('#idTablaComunas').DataTable({
        ajax: {
            url: url + 'index.php/cComuna/cObtenerComunasDataTable',
            type: "POST",
            dataSrc: ''
        },
        columns: [{
                data: 'id_comuna'
            },
            {
                data: 'nombre'
            },
            {
                data: 'id_region'
            },
            {
                data: 'estado'
            },
            {
                data: 'acciones'
            }

        ]
    });
}

function cargarProfesiones() {
    $('#idTablaProfesiones').DataTable({
        ajax: {
            url: url + 'index.php/cProfesion/cObtenerProfesionesDataTable',
            type: "POST",
            dataSrc: ''
        },
        columns: [{
                data: 'id_profesion'
            },
            {
                data: 'descripcion'
            },
            {
                data: 'estado'
            },
            {
                data: 'acciones'
            }

        ]
    });
}

function cargarCuerpos() {
    $('#idTablaCuerpos').DataTable({
        ajax: {
            url: url + 'index.php/cCuerpo/cObtenerCuerposDataTable',
            type: "POST",
            dataSrc: ''
        },
        columns: [{
                data: 'id_cuerpo'
            },
            {
                data: 'descripcion'
            },
            {
                data: 'fecha_aniversario'
            },
            {
                data: 'estado'
            },
            {
                data: 'acciones'
            }

        ]
    });
}

function cargarNacionalidades() {
    $('#idTablaNacionalidades').DataTable({
        ajax: {
            url: url + 'index.php/cNacionalidad/cObtenerNacionalidadesDataTable',
            type: "POST",
            dataSrc: ''
        },
        columns: [{
                data: 'id_nacionalidad'
            },
            {
                data: 'descripcion'
            },
            {
                data: 'estado'
            },
            {
                data: 'acciones'
            }
            //{ defaultContent: '<div class="btn-group"><button class="btn btn-primary" onclick="cargarModalEditar('+id_producto+')">EDITAR</button><button class="btn btn-danger">ELIMINAR</button></div>'}
        ]
    });
}


$(document).ready(function() {
    /********* BTN TEMPLO  ************/
    $("#btnCrearTemplo").click(function(e) {

        e.preventDefault();
        $.ajax({
            url: url + "index.php/cTemplo/cGuardarTemplo",
            type: "POST",
            data: $('#idFormCrearTemplo').serialize(),

            success: function(resp) {

                Swal.fire({
                    icon: 'success',
                    title: 'Templo creado con éxito'

                })

                $('#idTablaTemplos').dataTable().fnDestroy();
                $('#idCampoNombreCreaTemplo').val('');
                $('#idModalCrearTemplo').modal('hide');
                cargarTemplos();

            },
            error: function() {

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Ha ocurrido un Error'
                })
            }
        });
    });

    $("#btnCerrarTemplo").click(function(e) {
        e.preventDefault();
        $("#idCampoNombreCreaTemplo").val('');
    });

    $("#btnActualizarTemplo").click(function(e) {
        e.preventDefault();

        var $nombre = $("#idCampoNombreEditaTemplo").val();
        //var $descrip = $("#idCampoDescripcionEditaNivel").val();
        // alert($nombre+$descrip);
        //if ($nombre == '' || $descrip == '') {
        if ($nombre == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Falta llenar un campo!'
            })
        } else {


            $("#IdModalEditarTemplo").modal('hide');
            Swal.fire({
                title: 'Desea guardar los cambios?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Guardar',
                denyButtonText: `No Guardar`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        data: $("#idFormEditarTemplo").serialize(),
                        url: url + "index.php/cTemplo/cActualizarTemplo",
                        type: "POST",
                        success: function() {
                            $('#idTablaTemplos').dataTable().fnDestroy();
                            cargarTemplos();
                            //$('#idTablaProductos').dataTable().ajax.reload();

                            /*window.location.href = url +
                                "index.php/cProducto/cObtenerProductos";*/
                        }
                    })
                    // window.location.href = url + "index.php/cProducto/cObtenerProductos";
                } else if (result.isDenied) {
                    Swal.fire('Cambios no guardados', '', 'info')
                }

            });
        }
    });

    /********* BTN NIVEL ESTUDIO  ************/
    $("#btnCrearNivel").click(function(e) {

        e.preventDefault();
        $.ajax({
            url: url + "index.php/cNivelEstudios/cGuardarNivel",
            type: "POST",
            data: $('#idFormCrearNivel').serialize(),

            success: function(resp) {

                Swal.fire({
                    icon: 'success',
                    title: 'Nivel creado con éxito'

                })

                $('#idTablaNiveles').dataTable().fnDestroy();
                $('#idCampoDescripcionCreaNivel').val('');
                $('#idModalCrearNivel').modal('hide');
                cargarNiveles();

            },
            error: function() {

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Ha ocurrido un Error'
                })
            }
        });
    });

    $("#btnCerrarNivel").click(function(e) {
        e.preventDefault();
        $("#idCampoDescripcionCreaNivel").val('');
    });

    $("#btnActualizarNivel").click(function(e) {
        e.preventDefault();

        var $nombre = $("#idCampoDescripcionEditaNivel").val();
        //var $descrip = $("#idCampoDescripcionEditaNivel").val();
        // alert($nombre+$descrip);
        //if ($nombre == '' || $descrip == '') {
        if ($nombre == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Falta llenar un campo!'
            })
        } else {


            $("#IdModalEditarNivel").modal('hide');
            Swal.fire({
                title: 'Desea guardar los cambios?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Guardar',
                denyButtonText: `No Guardar`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        data: $("#idFormEditarNivel").serialize(),
                        url: url + "index.php/cNivelEstudios/cActualizarNivel",
                        type: "POST",
                        success: function() {
                            $('#idTablaNiveles').dataTable().fnDestroy();
                            cargarNiveles();
                            //$('#idTablaProductos').dataTable().ajax.reload();

                            /*window.location.href = url +
                                "index.php/cProducto/cObtenerProductos";*/
                        }
                    })
                    // window.location.href = url + "index.php/cProducto/cObtenerProductos";
                } else if (result.isDenied) {
                    Swal.fire('Cambios no guardados', '', 'info')
                }

            });
        }
    });

    /********* BTN ESTADO CIVIL  ************/
    $("#btnCrearEstado").click(function(e) {

        e.preventDefault();
        $.ajax({
            url: url + "index.php/cEstadoCivil/cGuardarEstado",
            type: "POST",
            data: $('#idFormCrearEstado').serialize(),

            success: function(resp) {

                Swal.fire({
                    icon: 'success',
                    title: 'Estado Civil creado con éxito'

                })

                $('#idTablaEstados').dataTable().fnDestroy();
                $('#idCampoDescripcionCreaEstado').val('');
                $('#idModalCrearEstado').modal('hide');
                cargarEstados();

            },
            error: function() {

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Ha ocurrido un Error'
                })
            }
        });
    });

    $("#btnCerrarEstado").click(function(e) {
        e.preventDefault();
        $("#idCampoDescripcionCreaEstado").val('');
    });

    $("#btnActualizarEstado").click(function(e) {
        e.preventDefault();

        var $nombre = $("#idCampoDescripcionEditaEstado").val();
        //var $descrip = $("#idCampoDescripcionEditaNivel").val();
        // alert($nombre+$descrip);
        //if ($nombre == '' || $descrip == '') {
        if ($nombre == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Falta llenar un campo!'
            })
        } else {


            $("#IdModalEditarEstado").modal('hide');
            Swal.fire({
                title: 'Desea guardar los cambios?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Guardar',
                denyButtonText: `No Guardar`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        data: $("#idFormEditarEstado").serialize(),
                        url: url + "index.php/cEstadoCivil/cActualizarEstado",
                        type: "POST",
                        success: function() {
                            $('#idTablaEstados').dataTable().fnDestroy();
                            cargarEstados();
                            //$('#idTablaProductos').dataTable().ajax.reload();

                            /*window.location.href = url +
                                "index.php/cProducto/cObtenerProductos";*/
                        }
                    })
                    // window.location.href = url + "index.php/cProducto/cObtenerProductos";
                } else if (result.isDenied) {
                    Swal.fire('Cambios no guardados', '', 'info')
                }

            });
        }
    });

    /********* BTN GENEROS  ****************/
    $("#btnCrearGenero").click(function(e) {

        e.preventDefault();
        $.ajax({
            url: url + "index.php/cGenero/cGuardarGenero",
            type: "POST",
            data: $('#idFormCrearGenero').serialize(),

            success: function(resp) {

                Swal.fire({
                    icon: 'success',
                    title: 'Genero creado con éxito'

                })

                $('#idTablaGeneros').dataTable().fnDestroy();
                $('#idCampoDescripcionCreaGenero').val('');
                $('#idModalCrearGenero').modal('hide');
                cargarGeneros();

            },
            error: function() {

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Ha ocurrido un Error'
                })
            }
        });
    });

    $("#btnCerrarGenero").click(function(e) {
        e.preventDefault();
        $("#idCampoDescripcionCreaGenero").val('');
    });

    $("#btnActualizarGenero").click(function(e) {
        e.preventDefault();

        var $nombre = $("#idCampoDescripcionEditaGenero").val();
        //var $descrip = $("#idCampoDescripcionEditaNivel").val();
        // alert($nombre+$descrip);
        //if ($nombre == '' || $descrip == '') {
        if ($nombre == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Falta llenar un campo!'
            })
        } else {


            $("#IdModalEditarGenero").modal('hide');
            Swal.fire({
                title: 'Desea guardar los cambios?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Guardar',
                denyButtonText: `No Guardar`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        data: $("#idFormEditarGenero").serialize(),
                        url: url + "index.php/cGenero/cActualizarGenero",
                        type: "POST",
                        success: function() {
                            $('#idTablaGeneros').dataTable().fnDestroy();
                            cargarGeneros();
                            //$('#idTablaProductos').dataTable().ajax.reload();

                            /*window.location.href = url +
                                "index.php/cProducto/cObtenerProductos";*/
                        }
                    })
                    // window.location.href = url + "index.php/cProducto/cObtenerProductos";
                } else if (result.isDenied) {
                    Swal.fire('Cambios no guardados', '', 'info')
                }

            });
        }
    });
    /********* BTN REGIONES  ************/
    $("#btnCrearRegion").click(function(e) {

        e.preventDefault();
        $.ajax({
            url: url + "index.php/cRegion/cGuardarRegion",
            type: "POST",
            data: $('#idFormCrearRegion').serialize(),

            success: function(resp) {

                Swal.fire({
                    icon: 'success',
                    title: 'Región creada con éxito'

                })

                $('#idTablaRegiones').dataTable().fnDestroy();
                $('#idCampoNombreCreaRegion').val('');
                $('#idModalCrearRegion').modal('hide');
                cargarRegiones();

            },
            error: function() {

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Ha ocurrido un Error'
                })
            }
        });
    });

    $("#btnCerrarRegion").click(function(e) {
        e.preventDefault();
        $("#idCampoNombreCreaRegion").val('');
    });

    $("#btnActualizarRegion").click(function(e) {
        e.preventDefault();

        var $nombre = $("#idCampoNombreEditaRegion").val();
        //var $descrip = $("#idCampoDescripcionEditaNivel").val();
        // alert($nombre+$descrip);
        //if ($nombre == '' || $descrip == '') {
        if ($nombre == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Falta llenar un campo!'
            })
        } else {


            $("#IdModalEditarRegion").modal('hide');
            Swal.fire({
                title: 'Desea guardar los cambios?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Guardar',
                denyButtonText: `No Guardar`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        data: $("#idFormEditarRegion").serialize(),
                        url: url + "index.php/cRegion/cActualizarRegion",
                        type: "POST",
                        success: function() {
                            $('#idTablaRegiones').dataTable().fnDestroy();
                            cargarRegiones();
                            //$('#idTablaProductos').dataTable().ajax.reload();

                            /*window.location.href = url +
                                "index.php/cProducto/cObtenerProductos";*/
                        }
                    })
                    // window.location.href = url + "index.php/cProducto/cObtenerProductos";
                } else if (result.isDenied) {
                    Swal.fire('Cambios no guardados', '', 'info')
                }

            });
        }
    });

    /********* BTN COMUNAS  ************/
    $("#btnCrearComuna").click(function(e) {

        e.preventDefault();
        $.ajax({
            url: url + "index.php/cComuna/cGuardarComuna",
            type: "POST",
            data: $('#idFormCrearComuna').serialize(),

            success: function(resp) {

                Swal.fire({
                    icon: 'success',
                    title: 'Comuna creada con éxito'

                })

                $('#idTablaComunas').dataTable().fnDestroy();
                $('#idCampoNombreCreaComuna').val('');
                //$('#idSelectRegionCreaComuna').prop('selectedIndex',0);
                $('#idSelectRegionCreaComuna').empty();
                $('#idModalCrearComuna').modal('hide');
                cargarComunas();

            },
            error: function() {

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Ha ocurrido un Error'
                })
            }
        });
    });

    $("#btnCerrarComuna").click(function(e) {
        e.preventDefault();
        $("#idCampoNombreCreaComuna").val('');
    });

    $("#btnActualizarComuna").click(function(e) {
        e.preventDefault();

        var $nombre = $("#idCampoNombreEditaComuna").val();
        var $id_region = $("#idSelectRegionEditaComuna").val();
        //$('#idSelectRegionEditaComuna').empty();

        /*se hara segun lo legal y mi abogado se presentara una kerella penal contra tu hhno com oautor y en contra de tu como encubridor tienes responsabilidad civil*/
        //var $descrip = $("#idCampoDescripcionEditaNivel").val();
        // alert($nombre+$descrip);
        //if ($nombre == '' || $descrip == '') {
        if ($nombre == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Falta llenar un campo!'
            })
        } else {


            $("#IdModalEditarComuna").modal('hide');
            Swal.fire({
                title: 'Desea guardar los cambios?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Guardar',
                denyButtonText: `No Guardar`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        data: $("#idFormEditarComuna").serialize(),
                        url: url + "index.php/cComuna/cActualizarComuna/" + $id_region,
                        type: "POST",
                        success: function() {
                            $('#idTablaComunas').dataTable().fnDestroy();
                            cargarComunas();
                            //$('#idTablaProductos').dataTable().ajax.reload();

                            /*window.location.href = url +
                                "index.php/cProducto/cObtenerProductos";*/
                        }
                    })
                    // window.location.href = url + "index.php/cProducto/cObtenerProductos";
                } else if (result.isDenied) {
                    Swal.fire('Cambios no guardados', '', 'info')
                }

            });
        }
    });

    /********* BTN PROFESIONES  ****************/
    $("#btnCrearProfesion").click(function(e) {

        e.preventDefault();
        $.ajax({
            url: url + "index.php/cProfesion/cGuardarProfesion",
            type: "POST",
            data: $('#idFormCrearProfesion').serialize(),

            success: function(resp) {

                Swal.fire({
                    icon: 'success',
                    title: 'Profesion creada con éxito'

                })

                $('#idTablaProfesiones').dataTable().fnDestroy();
                $('#idCampoDescripcionCreaProfesion').val('');
                $('#idModalCrearProfesion').modal('hide');
                cargarProfesiones();

            },
            error: function() {

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Ha ocurrido un Error'
                })
            }
        });
    });

    $("#btnCerrarProfesion").click(function(e) {
        e.preventDefault();
        $("#idCampoDescripcionCreaProfesion").val('');
    });

    $("#btnActualizarProfesion").click(function(e) {
        e.preventDefault();

        var $nombre = $("#idCampoDescripcionEditaProfesion").val();
        //var $descrip = $("#idCampoDescripcionEditaNivel").val();
        // alert($nombre+$descrip);
        //if ($nombre == '' || $descrip == '') {
        if ($nombre == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Falta llenar un campo!'
            })
        } else {


            $("#IdModalEditarProfesion").modal('hide');
            Swal.fire({
                title: 'Desea guardar los cambios?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Guardar',
                denyButtonText: `No Guardar`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        data: $("#idFormEditarProfesion").serialize(),
                        url: url + "index.php/cProfesion/cActualizarProfesion",
                        type: "POST",
                        success: function() {
                            $('#idTablaProfesiones').dataTable().fnDestroy();
                            cargarProfesiones();
                            //$('#idTablaProductos').dataTable().ajax.reload();

                            /*window.location.href = url +
                                "index.php/cProducto/cObtenerProductos";*/
                        }
                    })
                    // window.location.href = url + "index.php/cProducto/cObtenerProductos";
                } else if (result.isDenied) {
                    Swal.fire('Cambios no guardados', '', 'info')
                }

            });
        }
    });

    /********* BTN CUERPOS  ****************/
    $("#btnCrearCuerpo").click(function(e) {

        e.preventDefault();
        var $descripcion = $("#idCampoDescripcionCreaCuerpo").val();
        var $fecha = $('#idSelectAniversarioCreaCuerpo').val();

        if ($descripcion == '' || $fecha == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Falta llenar un campo!'
            })
        } else {
            $.ajax({
                url: url + "index.php/cCuerpo/cGuardarCuerpo",
                type: "POST",
                data: $('#idFormCrearCuerpo').serialize(),

                success: function(resp) {
                    //console.log(resp); esto era para imprimir la fecha en consola
                    Swal.fire({
                        icon: 'success',
                        title: $descripcion + ' creado con éxito '

                    })

                    $('#idTablaCuerpos').dataTable().fnDestroy();
                    $('#idCampoDescripcionCreaCuerpo').val('');
                    $("#idSelectAniversarioCreaCuerpo").val('');
                    $('#idModalCrearCuerpo').modal('hide');
                    cargarCuerpos();

                },
                error: function() {

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Ha ocurrido un Error'
                    })
                }
            });
        }
    });

    $("#btnCerrarCuerpo").click(function(e) {
        e.preventDefault();
        $("#idCampoDescripcionCreaCuerpo").val('');
        //$('.calendario').datepicker('destroy');
        $("#idSelectAniversarioCreaCuerpo").val('');
    });

    /*$('#btnCerrarActualizarCuerpo').click(function(e) {
        e.preventDefault();
        $('.calendario').datepicker('destroy');
    });*/

    $("#btnActualizarCuerpo").click(function(e) {
        e.preventDefault();

        var $nombre = $("#idCampoDescripcionEditaCuerpo").val();
        var $aniversario = $('#idSelectAniversarioEditaCuerpo').val();
        //var $descrip = $("#idCampoDescripcionEditaNivel").val();
        // alert($nombre+$descrip);
        //if ($nombre == '' || $descrip == '') {
        if ($nombre == '' || $aniversario == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Falta llenar un campo!'
            })
        } else {


            $("#IdModalEditarCuerpo").modal('hide');
            Swal.fire({
                title: 'Desea guardar los cambios?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Guardar',
                denyButtonText: `No Guardar`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        data: $("#idFormEditarCuerpo").serialize(),
                        url: url + "index.php/cCuerpo/cActualizarCuerpo",
                        type: "POST",
                        success: function() {
                            $('#idTablaCuerpos').dataTable().fnDestroy();
                            cargarCuerpos();
                            //$('#idTablaProductos').dataTable().ajax.reload();

                            /*window.location.href = url +
                                "index.php/cProducto/cObtenerProductos";*/
                        }
                    })
                    // window.location.href = url + "index.php/cProducto/cObtenerProductos";
                } else if (result.isDenied) {
                    Swal.fire('Cambios no guardados', '', 'info')
                }

            });
        }
    });

    /*********  BTN NACIONALIDADES ************/
    $("#btnCrearNacionalidad").click(function(e) {

        e.preventDefault();

        var $descripcion = $("#idCampoDescripcionCreaNacionalidad").val();

        if ($descripcion == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Falta llenar un campo!'
            })
        } else {

            $.ajax({
                url: url + "index.php/cNacionalidad/cGuardarNacionalidad",
                type: "POST",
                data: $('#idFormCrearNacionalidad').serialize(),

                success: function(resp) {

                    Swal.fire({
                        icon: 'success',
                        title: 'Nacionalidad creada con éxito'

                    })

                    $('#idTablaNacionalidades').dataTable().fnDestroy();
                    $('#idCampoDescripcionCreaNacionalidad').val('');
                    $('#idModalCrearNacionalidad').modal('hide');
                    cargarNacionalidades();

                },
                error: function() {

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Ha ocurrido un Error'
                    })
                }
            });
        }
    });

    $("#btnCerrarNacionalidad").click(function(e) {
        e.preventDefault();
        $("#idCampoDescripcionCreaNacionalidad").val('');
    });

    $("#btnActualizarNacionalidad").click(function(e) {
        e.preventDefault();

        var $descripcion = $("#idCampoDescripcionEditaNacionalidad").val();
        //var $descrip = $("#idCampoDescripcionEditaNivel").val();
        // alert($descripcion+$descrip);
        //if ($descripcion == '' || $descrip == '') {
        if ($descripcion == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Falta llenar un campo!'
            })
        } else {


            $("#IdModalEditarNacionalidad").modal('hide');
            Swal.fire({
                title: 'Desea guardar los cambios?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Guardar',
                denyButtonText: `No Guardar`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        data: $("#idFormEditarNacionalidad").serialize(),
                        url: url + "index.php/cNacionalidad/cActualizarNacionalidad",
                        type: "POST",
                        success: function() {
                            $('#idTablaNacionalidades').dataTable().fnDestroy();
                            cargarNacionalidades();
                            //$('#idTablaProductos').dataTable().ajax.reload();

                            /*window.location.href = url +
                                "index.php/cProducto/cObtenerProductos";*/
                        }
                    })
                    // window.location.href = url + "index.php/cProducto/cObtenerProductos";
                } else if (result.isDenied) {
                    Swal.fire('Cambios no guardados', '', 'info')
                }

            });
        }
    });

    /*************  SELECT2  *******************/
    $('.clase_select2').select2();
    
     //FUNCION PARA PONER EL CURSOR DENTRO DEL CAMPO DE BUSQUEDA
     $(document).on("select2:open", () => {
        document.querySelector(".select2-container--open .select2-search__field").focus()
    })


    /*************CALENDARIO DATEPICKER ********/

    /*$('.calendario').datepicker({
         weekStart: 1,
         todayBtn: "linked",
         language: "es",
         autoclose: true,
         todayHighlight: true
     });*/



    $('.calendario').datepicker('destroy');
    /*******FUNCION PARA MANTENER EL VALOR DE LA FECHA EN EL CAMPO */
    $('.calendario').focusin(function(e) {
        e.preventDefault();
        let valor = $(this).val();
        //$('.calendario').datepicker('destroy');
        $('.calendario').datepicker({
            weekStart: 1,
            todayBtn: "linked",
            language: "es",
            autoclose: true,
            todayHighlight: true
            // defaultViewDate: {year: '2014'}
        });
        //$(this).val(valor);
        $('.calendario').focusout(function(e) {
            e.preventDefault();
            $(this).val(valor);
            // $('.calendario').datepicker('destroy');

        });
    });






});

/*********  MODALS TEMPLO  ************/

function cargarModalCrearTemplo() {
    $("#idModalCrearTemplo").modal();
}

function cargarModalEditarTemplo(id) {
    $("#IdModalEditarTemplo").modal();
    alert("el id es " + id);
    $.ajax({
        data: {
            id_editar: id
        },
        url: url + "index.php/cTemplo/cObtenerUnTemplo",
        type: "POST",
        dataType: "json",
        success: function(resp) {
            alert(resp[0].id_templo);
            $("#idTemploEdita").val(resp[0].id_templo);
            $("#idCampoNombreEditaTemplo").val(resp[0].nombre);
            // $("#idCampoNombreEditaTemplo").val(data);
        }
    });
}

function cargarModalEliminarTemplo(id, nombre) {

    Swal.fire({
        title: 'Desea eliminar el ' + nombre + '?',
        showDenyButton: false,
        showCancelButton: true,
        confirmButtonText: 'Eliminar',
        confirmButtonColor: '#dc3545',
        cancelButtonText: 'Cancelar'
        //denyButtonText: `Don't save`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                data: {
                    id_eliminar: id
                },
                url: url + "index.php/cTemplo/cEliminarTemplo",
                type: "POST",
                success: function() {
                    $('#idTablaTemplos').dataTable().fnDestroy();
                    cargarTemplos();
                    Swal.fire(nombre + ' eliminado con exito!', '', 'success')
                }
            });

        } else if (result.isDenied) {
            Swal.fire('Changes are not saved', '', 'info')
        }
    })
}
/*********  FIN MODALS TEMPLO  ************/

/*********  MODALS NIVEL DE ESTUDIOS  *****/

function cargarModalCrearNivel() {
    $("#idModalCrearNivel").modal();
}

function cargarModalEditarNivel(id) {
    $("#IdModalEditarNivel").modal();

    $.ajax({
        data: {
            id_editar: id
        },
        url: url + "index.php/cNivelEstudios/cObtenerUnNivel",
        type: "POST",
        dataType: "json",
        success: function(resp) {
            $("#idNivelEdita").val(resp[0].id_nivel);
            $("#idCampoDescripcionEditaNivel").val(resp[0].descripcion);
        }
    });
}

function cargarModalEliminarNivel(id, descripcion) {

    Swal.fire({
        title: 'Desea eliminar el nivel de estudios ' + descripcion + ' ?',
        showDenyButton: false,
        showCancelButton: true,
        confirmButtonText: 'Eliminar',
        confirmButtonColor: '#dc3545',
        cancelButtonText: 'Cancelar'
        //denyButtonText: `Don't save`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                data: {
                    id_eliminar: id
                },
                url: url + "index.php/cNivelEstudios/cEliminarNivel",
                type: "POST",
                success: function() {
                    $('#idTablaNiveles').dataTable().fnDestroy();
                    cargarNiveles();
                    Swal.fire(descripcion + ' eliminado con exito!', '', 'success')
                }
            });

        } else if (result.isDenied) {
            Swal.fire('Changes are not saved', '', 'info')
        }
    })
}
/********* FIN MODALS NIVEL DE ESTUDIOS  *****/
/********* MODALS ESTADO CIVIL *****/
function cargarModalCrearEstado() {
    $("#idModalCrearEstado").modal();
}

function cargarModalEditarEstado(id) {
    $("#IdModalEditarEstado").modal();

    $.ajax({
        data: {
            id_editar: id
        },
        url: url + "index.php/cEstadoCivil/cObtenerUnEstado",
        type: "POST",
        dataType: "json",
        success: function(resp) {
            $("#idEstadoEdita").val(resp[0].id_estado);
            $("#idCampoDescripcionEditaEstado").val(resp[0].descripcion);
        }
    });
}

function cargarModalEliminarEstado(id, descripcion) {

    Swal.fire({
        title: 'Desea eliminar el estado civil ' + descripcion + ' ?',
        showDenyButton: false,
        showCancelButton: true,
        confirmButtonText: 'Eliminar',
        confirmButtonColor: '#dc3545',
        cancelButtonText: 'Cancelar'
        //denyButtonText: `Don't save`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                data: {
                    id_eliminar: id
                },
                url: url + "index.php/cEstadoCivil/cEliminarEstado",
                type: "POST",
                success: function() {
                    $('#idTablaEstados').dataTable().fnDestroy();
                    cargarEstados();
                    Swal.fire(descripcion + ' eliminado con exito!', '', 'success')
                }
            });

        } else if (result.isDenied) {
            Swal.fire('Changes are not saved', '', 'info')
        }
    })
}

/*********  MODALS GENERO  ************/

function cargarModalCrearGenero() {
    $("#idModalCrearGenero").modal();
}

function cargarModalEditarGenero(id) {
    $("#IdModalEditarGenero").modal();

    $.ajax({
        data: {
            id_editar: id
        },
        url: url + "index.php/cGenero/cObtenerUnGenero",
        type: "POST",
        dataType: "json",
        success: function(resp) {
            $("#idGeneroEdita").val(resp[0].id_genero);
            $("#idCampoDescripcionEditaGenero").val(resp[0].descripcion);
        }
    });
}

function cargarModalEliminarGenero(id, descripcion) {

    Swal.fire({
        title: 'Desea eliminar el ' + descripcion + '?',
        showDenyButton: false,
        showCancelButton: true,
        confirmButtonText: 'Eliminar',
        confirmButtonColor: '#dc3545',
        cancelButtonText: 'Cancelar'
        //denyButtonText: `Don't save`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                data: {
                    id_eliminar: id
                },
                url: url + "index.php/cGenero/cEliminarGenero",
                type: "POST",
                success: function() {
                    $('#idTablaGeneros').dataTable().fnDestroy();
                    cargarGeneros();
                    Swal.fire(descripcion + ' eliminado con exito!', '', 'success')
                }
            });

        } else if (result.isDenied) {
            Swal.fire('Changes are not saved', '', 'info')
        }
    })
}

/*********  MODALS REGION  ************/

function cargarModalCrearRegion() {
    $("#idModalCrearRegion").modal();
}

function cargarModalEditarRegion(id) {
    $("#IdModalEditarRegion").modal();

    $.ajax({
        data: {
            id_editar: id
        },
        url: url + "index.php/cRegion/cObtenerUnRegion",
        type: "POST",
        dataType: "json",
        success: function(resp) {
            $("#idRegionEdita").val(resp[0].id_region);
            $("#idCampoNombreEditaRegion").val(resp[0].nombre);
        }
    });
}

function cargarModalEliminarRegion(id, nombre) {

    Swal.fire({
        title: 'Desea eliminar la región ' + nombre + '?',
        showDenyButton: false,
        showCancelButton: true,
        confirmButtonText: 'Eliminar',
        confirmButtonColor: '#dc3545',
        cancelButtonText: 'Cancelar'
        //denyButtonText: `Don't save`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                data: {
                    id_eliminar: id
                },
                url: url + "index.php/cRegion/cEliminarRegion",
                type: "POST",
                success: function() {
                    $('#idTablaRegiones').dataTable().fnDestroy();
                    cargarRegiones();
                    Swal.fire(nombre + ' eliminado con exito!', '', 'success')
                }
            });

        } else if (result.isDenied) {
            Swal.fire('Changes are not saved', '', 'info')
        }
    })
}

/*********  MODALS COMUNAS  ************/

function cargarModalCrearComuna() {
    $("#idModalCrearComuna").modal();
    $('#idSelectRegionCreaComuna').empty();

    $.ajax({
        data: {},
        url: url + "index.php/cRegion/cObtenerRegionesSelect",
        type: "POST",
        dataType: "json",
        success: function(resp) {
            var x = document.getElementById("idSelectRegionCreaComuna");
            var i = 0;

            while (i < resp.length) {
                var optionee = document.createElement('option');
                optionee.value = resp[i].id_region;
                optionee.text = resp[i].nombre;
                console.log(optionee.value);
                console.log(optionee.text);
                console.log(resp.length);
                //$select.appendChild(option);
                x.append(optionee);
                i++;
            }
        }
    });
}

function cargarModalEditarComuna(id) {
    $("#IdModalEditarComuna").modal();
    $('#idSelectRegionEditaComuna').empty();

    $.ajax({
        data: {
            id_editar: id
        },
        url: url + "index.php/cComuna/cObtenerUnComuna",
        type: "POST",
        dataType: "json",
        success: function(resp) {
            $("#idComunaEdita").val(resp[0].id_comuna);
            $("#idCampoNombreEditaComuna").val(resp[0].nombre);
            $.ajax({
                data: {},
                url: url + "index.php/cRegion/cObtenerRegionesSelect",
                type: "POST",
                dataType: "json",
                success: function(resp2) {

                    var x = document.getElementById("idSelectRegionEditaComuna");
                    var i = 0;

                    while (i < resp2.length) {
                        var optionee = document.createElement('option');
                        optionee.value = resp2[i].id_region;
                        optionee.text = resp2[i].nombre;
                        console.log(optionee.value);
                        console.log(optionee.text);
                        console.log(resp2.length);
                        //$select.appendChild(option);
                        x.append(optionee);
                        i++;

                    }
                    //alert("hola"+$("#idSelectRegionEditaComuna").val())
                    $("#idSelectRegionEditaComuna option[value=" + resp[0].id_region + "]")
                        .attr("selected", true);
                    alert("hola" + $("#idSelectRegionEditaComuna").val())
                }
            });
        }
    });

}

function cargarModalEliminarComuna(id, nombre) {

    Swal.fire({
        title: 'Desea eliminar la comuna ' + nombre + '?',
        showDenyButton: false,
        showCancelButton: true,
        confirmButtonText: 'Eliminar',
        confirmButtonColor: '#dc3545',
        cancelButtonText: 'Cancelar'
        //denyButtonText: `Don't save`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                data: {
                    id_eliminar: id
                },
                url: url + "index.php/cComuna/cEliminarComuna",
                type: "POST",
                success: function() {
                    $('#idTablaComunas').dataTable().fnDestroy();
                    cargarComunas();
                    Swal.fire(nombre + ' eliminado con exito!', '', 'success')
                }
            });

        } else if (result.isDenied) {
            Swal.fire('Changes are not saved', '', 'info')
        }
    })
}

/*********  MODALS PROFESIONES  ************/

function cargarModalCrearProfesion() {
    $("#idModalCrearProfesion").modal();
}

function cargarModalEditarProfesion(id) {
    $("#IdModalEditarProfesion").modal();

    $.ajax({
        data: {
            id_editar: id
        },
        url: url + "index.php/cProfesion/cObtenerUnProfesion",
        type: "POST",
        dataType: "json",
        success: function(resp) {
            $("#idProfesionEdita").val(resp[0].id_profesion);
            $("#idCampoDescripcionEditaProfesion").val(resp[0].descripcion);
        }
    });
}

function cargarModalEliminarProfesion(id, descripcion) {

    Swal.fire({
        title: 'Desea eliminar el ' + descripcion + '?',
        showDenyButton: false,
        showCancelButton: true,
        confirmButtonText: 'Eliminar',
        confirmButtonColor: '#dc3545',
        cancelButtonText: 'Cancelar'
        //denyButtonText: `Don't save`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                data: {
                    id_eliminar: id
                },
                url: url + "index.php/cProfesion/cEliminarProfesion",
                type: "POST",
                success: function() {
                    $('#idTablaProfesiones').dataTable().fnDestroy();
                    cargarProfesiones();
                    Swal.fire(descripcion + ' eliminada con exito!', '', 'success')
                }
            });

        } else if (result.isDenied) {
            Swal.fire('Changes are not saved', '', 'info')
        }
    })
}

/*********  MODALS CUERPOS  ************/

function cargarModalCrearCuerpo() {
    $("#idModalCrearCuerpo").modal();
    $('.calendario').datepicker('destroy');
}

function cargarModalEditarCuerpo(id) {

    $("#IdModalEditarCuerpo").modal();
    $('.calendario').datepicker('destroy');


    $.ajax({
        data: {
            id_editar: id
        },
        url: url + "index.php/cCuerpo/cObtenerUnCuerpo",
        type: "POST",
        dataType: "json",
        success: function(resp) {
            var fecha = (resp[0].fecha_aniversario).split('-');
            var fecha_fin = fecha[2] + "/" + fecha[1] + "/" + fecha[0];
            $("#idCuerpoEdita").val(resp[0].id_cuerpo);
            $("#idCampoDescripcionEditaCuerpo").val(resp[0].descripcion);
            $("#idSelectAniversarioEditaCuerpo").val(fecha_fin);

            $('.calendario').datepicker({
                weekStart: 1,
                todayBtn: "linked",
                language: "es",
                autoclose: true,
                todayHighlight: true
                //defaultViewDate: {year: '2014'}
            });
        }
    });
}

function cargarModalEliminarCuerpo(id, descripcion) {

    Swal.fire({
        title: 'Desea eliminar el ' + descripcion + '?',
        showDenyButton: false,
        showCancelButton: true,
        confirmButtonText: 'Eliminar',
        confirmButtonColor: '#dc3545',
        cancelButtonText: 'Cancelar'
        //denyButtonText: `Don't save`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                data: {
                    id_eliminar: id
                },
                url: url + "index.php/cCuerpo/cEliminarCuerpo",
                type: "POST",
                success: function() {
                    $('#idTablaCuerpos').dataTable().fnDestroy();
                    cargarCuerpos();
                    Swal.fire(descripcion + ' eliminado con exito!', '', 'success')
                }
            });

        } else if (result.isDenied) {
            Swal.fire('Changes are not saved', '', 'info')
        }
    })
}

/*********  MODALS NACIONALIDADES  ************/
function cargarModalCrearNacionalidad() {
    $("#idModalCrearNacionalidad").modal();
}

function cargarModalEditarNacionalidad(id) {
    $("#IdModalEditarNacionalidad").modal();

    $.ajax({
        data: {
            id_editar: id
        },
        url: url + "index.php/cNacionalidad/cObtenerUnNacionalidad",
        type: "POST",
        dataType: "json",
        success: function(resp) {
            $("#idNacionalidadEdita").val(resp[0].id_nacionalidad);
            $("#idCampoDescripcionEditaNacionalidad").val(resp[0].descripcion);
        }
    });
}

function cargarModalEliminarNacionalidad(id, descripcion) {

    Swal.fire({
        title: 'Desea eliminar ela nacionalidad ' + descripcion + '?',
        showDenyButton: false,
        showCancelButton: true,
        confirmButtonText: 'Eliminar',
        confirmButtonColor: '#dc3545',
        cancelButtonText: 'Cancelar'
        //denyButtonText: `Don't save`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                data: {
                    id_eliminar: id
                },
                url: url + "index.php/cNacionalidad/cEliminarNacionalidad",
                type: "POST",
                success: function() {
                    $('#idTablaNacionalidades').dataTable().fnDestroy();
                    cargarNacionalidades();
                    Swal.fire('Nacionalidad ' + descripcion + ' eliminado con exito!', '',
                        'success')
                }
            });

        } else if (result.isDenied) {
            Swal.fire('Changes are not saved', '', 'info')
        }
    })
}
</script>

</body>

</html>