//MODAL TEMPLO
//alert("hola desde routes");

//cargarMiembros();
function cargarUsuarios22() {
    
    /*$('#idTablaUsuarios').DataTable({
        ajax: {
            url: 'https://677fdbab0476123f76a8718e.mockapi.io/apiutal/v1/usuarios/',
            //url: url + 'index.php/cUsuario/cObtenerUsuariosDataTable',
            type: "GET",
           
            dataSrc: function (json) {
                // Este callback se usa para manipular los datos si es necesario
                return json;  // Simplemente retornamos los datos tal como están
            }
        },
        columns: [
            {
                data: 'id'
            },
            {
                data: 'nombre'
            },
            {
                data: 'apellido'
            },
            /*{
                data: 'apaterno'
            },
            {
                data: 'amaterno'
            },*/
            /*{
                data: 'correo'
            },
            {
                data: 'password'
            }
  
        ]
    });*/
}

function cargarMiembros() {
  $('#idTablaMiembros').DataTable({
      ajax: {
          url: url + 'index.php/cMiembro/cObtenerMiembrosDataTable',
          type: "POST",
          dataSrc: ''
      },
      columns: [
          {
              data: 'id_miembro'
          },
          {
              data: 'rut'
          },
          {
              data: 'miembro'
          },
          /*{
              data: 'apaterno'
          },
          {
              data: 'amaterno'
          },*/
          {
              data: 'direccion'
          },
          {
              data: 'region'
          },
          {
              data: 'comuna'
          },
          {
              data: 'fecha_nacimiento'
          },
          {
               data: 'celular'
          },
          {
              data: 'nacionalidad'
          },
          {
            data: 'nivel_estudios'
          },
          {
            data: 'genero'
          },          
          {
            data: 'templo'
          },
         /* {
              data: 'email'
          },*/
   /* {
      data: 'genero'
  },*/
          {
              data: 'profesion'
          },
          {
              data: 'estado_civil'
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

/********* BTN CREAR MIEMBRO  ************/
$(document).ready(function () {

    $("#btnCrearMiembro").click(function(e) {

        e.preventDefault();
        
        form = document.getElementById('idFormCrearMiembro');

        form.classList.add('was-validated');
        
        if(form.checkValidity() === true){
            alert("hi")
            /*var nacionalidad = $("#idSelectNacionalidadCreaMiembro").val()
            var rut = $("#idCampoRutCreaMiembro").val();
            var profesion = $("#idSelectProfesionCreaMiembro").val();
            var nombre = $("#idCampoNombreCreaMiembro").val();
            var apaterno = $("#idCampoApaternoCreaMiembro").val();
            var amaterno = $("#idCampoAmaternoCreaMiembro").val();
            var direccion = $("#idCampoDireccionCreaMiembro").val();
            var region = $("#idSelectRegionCreaMiembro").val();
            var comuna = $("#idSelectComunaCreaMiembro").val();
            var fecha_nac = $("#idSelectFechaNacCreaMiembro").val();
            var fecha_def = $("#idSelectFechaDefCreaMiembro").val();
            var genero = $("#idSelectGeneroCreaMiembro").val();
            var email = $("#idCampoEmailCreaMiembro").val();
            var celular = $("#idCampoCelularCreaMiembro").val();
            var telefono = $("#idCampoTelefonoCreaMiembro").val();
            var estado_civil = $("#idSelectEstadoCivilCreaMiembro").val();
            var nivel_estudios = $("#idSelectNivelEstudiosCreaMiembro").val();
            var templo = $("#idSelectTemploCreaMiembro").val();
            var cuerpo = $("#idSelectCuerpoCreaMiembro").val();
            var fecha_prob = $("#idSelectFechaProbandoCreaMiembro").val();
            var fecha_plena = $("#idSelectFechaPlenaComuCreaMiembro").val();
            var fecha_bauti = $("#idSelectFechaBautismoCreaMiembro").val();*/

            var datos = $('#idFormCrearMiembro').serializeArray();
            console.log(datos);
            alert("pas")
            $.ajax({
                url: url + "index.php/cMiembro/cGuardarMiembro",
                type: "POST",
                data: datos,

                success: function(resp) {

                    Swal.fire({
                        icon: 'success',
                        title: 'Miembro creado con éxito'

                    })

                    $('#idTablaMiembros').dataTable().fnDestroy();
                    $('#idCampoRutCreaMiembro').val('');
                    //$('#idSelectProfesionCreaMiembro').empty();
                    $('#idCampoNombreCreaMiembro').val('');
                    $('#idCampoApaternoCreaMiembro').val('');
                    $('#idCampoAmaternoCreaMiembro').val('');
                    $('#idCampoDireccionCreaMiembro').val('');
                    $('#idSelectFechaNacCreaMiembro').val('');
                    $('#idSelectFechaDefCreaMiembro').val('');
                    //$('#idSelectGeneroCreaMiembro').empty();
                    $('#idCampoEmailCreaMiembro').val('');
                    $('#idCampoCelularCreaMiembro').val('');
                    $('#idCampoTelefonoCreaMiembro').val('');
                    //$('#idSelectEstadoCivilCreaMiembro').empty();
                    //$('#idSelectNivelEstudiosCreaMiembro').empty();
                    //$('#idSelectTemploCreaMiembro').empty();
                    //$('#idSelectCuerpoCreaMiembro').empty();
                    $('#idSelectFechaProbandoCreaMiembro').val('');
                    $('#idSelectFechaPlenaComuCreaMiembro').val('');
                    $('#idSelectFechaBautismoCreaMiembro').val('');

                    $('#idModalCrearMiembro').modal('hide');
                    cargarMiembros();

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
});




function cargarModalCrearMiembro() {
    
    $.ajax({
        //url: "<?php echo site_url('miControlador/cargar_vista'); ?>", // URL de tu método
        url: url + "index.php/Usuario/cargar_vistas_crea_usuario",// URL de tu método
        method: "GET",
        success: function(response) {
            // Inyectamos la vista cargada en el div
            //$('#vistaContainer').html(response);
        },
        error: function() {
            alert("Error al cargar la vista.");
        }
    });
    //$("#idModalCrearMiembro").modal();
    /*$('#idSelectCreaMiembroSuperior').empty(); //deben ir los campos
    $('#idSelectCreaMiembroInferior').empty();

    $.ajax({
        data: {},
        url: url + "index.php/cUnidad/cObtenerUnidadesSelect",
        type: "POST",
        dataType: "json",
        success: function(resp) {
            var sup = document.getElementById("idSelectCreaMiembroSuperior");
            var inf = document.getElementById("idSelectCreaMiembroInferior");
            var i = 0;

            while (i < resp.length) {
                var optionee = document.createElement('option');
                var optione2 = document.createElement('option');
                optionee.value = resp[i].id_unidad;
                optionee.text = resp[i].cod_sirh + " " + resp[i].descripcion;
                optione2.value = resp[i].id_unidad;
                optione2.text = resp[i].cod_sirh + " " + resp[i].descripcion;
                console.log(optionee.value);
                console.log(optionee.text);
                //console.log(resp.length);
                //$select.appendChild(option);
                sup.append(optionee);
                inf.append(optione2);
                i++;
            }
        }
    });*/
}