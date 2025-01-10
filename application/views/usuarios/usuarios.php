      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <div class="content-header">
              <div class="container-fluid">
                  <div class="row mb-2">
                      <div class="col-sm-12">
                          <h1 class="m-0">Listado de Usuarios</h1>
                      </div><!-- /.col -->
                      <div class="col-sm-6">
                          <ol class="breadcrumb float-sm-left">
                              <!-- <li><i class="fa fa-cogs" aria-hidden="true"></i>Configuracion</li> -->
                              <!-- <li><i class="fa fa-th-large" aria-hidden="true"></i>Color</li>
                              <li class="breadcrumb-item"><a href="#">Home</a></li> -->
                              <li class="breadcrumb-item active">Usuarios</li>
                          </ol>

                      </div><!-- /.col -->

                      <div class="col-lg-12">
                          <div class="page-header" style="border-bottom: 1px solid #b9b9b9;"></div>
                          <a href="<?php echo base_url(); ?>index.php/cVistas" class="btn btn-success mt-4 mb-4">Crear Nuevo Usuario</a>
                          <!-- <button type="button" class="btn btn-success mt-4 mb-4" onclick="cargarModalCrearMiembro()">
                              <i class="fas fa-users nav-icon"></i> Nuevo Usuario</button> -->
                          <div class="page-header" style="border-bottom: 1px solid #b9b9b9;"></div>
                      </div>
                  </div>
              </div><!-- /.container-fluid -->
          </div>
          <!-- /.content-header -->

          <!-- Main content -->
          <!-- <div class="content">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-lg-12">
                          <section class="panel">
                              <header class="panel-heading"><i class="fa fa-th-large" aria-hidden="true"></i> Color
                              </header>
                              <div class="table-responsive">
                                  <table class="table table-hover" style="font-size: 10pt;" id="TablaColor">
                                      <thead>
                                          <tr>
                                              <th><i class="fa fa-qrcode" aria-hidden="true"></i> N°</th>
                                              <th><i class="fa fa-address-card" aria-hidden="true"></i> Descripción</th>
                                              <th><i class="fa fa-adjust" aria-hidden="true"></i> Estado</th>
                                              <th><i class="fa fa-cog" aria-hidden="true"></i> Acción</th>
                                          </tr>
                                      </thead>
                                  </table>
                              </div>
                          </section>
                      </div>
                  </div>
                  
              </div>
          </div> -->
          <div class="content">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-lg-12">
                          <div class="card card-primary">
                              <div class="card-header">
                                  <h3 class="card-title">Listado de Usuarios</h3>
                              </div>
                          </div>    
                          <div class="table-responsive">
                              <table id="idTablaUsuarios" class="table table-hover" style="font-size: 11pt;">
                                  <thead>
                                      <th>ID</th>
                                      <th>NOMBRE</th>
                                      <th>APELLIDO</th>
                                      <th>CORREO</th>
                                  </thead>
                                  <tbody>
                                    <!-- Aquí se cargarán los datos -->
                                </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
                  <!-- /.row -->
              </div><!-- /.container-fluid -->
          </div>
          <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <script>
        
       $(document).ready(function() {

         // Utilizando fetch para obtener los datos de la API
         fetch('https://677fdbab0476123f76a8718e.mockapi.io/apiutal/v1/usuarios/')
            .then(response => response.json()) // Convertimos la respuesta a JSON
            .then(data => {
                // Accedemos a los datos de los usuarios y los insertamos en la tabla
                let tableBody = document.querySelector('#idTablaUsuarios tbody');
                
                // Recorremos la data y llenamos la tabla
                data.forEach(usuario => {
                    let row = tableBody.insertRow();
                    row.innerHTML = `
                        <td>${usuario.id}</td>
                        <td>${usuario.nombre}</td>
                        <td>${usuario.apellido}</td>
                        <td>${usuario.correo}</td>
                    `;
                });

                // Inicializamos DataTable
                $('#idTablaUsuarios').DataTable();
            })
            .catch(error => {
                console.error('Error al obtener los datos:', error);
            });

        /*$('#idTablaUsuarios').DataTable({
                "ajax": {
                    //"url": "https://677fdbab0476123f76a8718e.mockapi.io/apiutal/v1/usuarios",  // URL de la API que proporciona los datos
                    "url": url + 'list',  // URL de la API que proporciona los datos
                    "type": "GET",  // Método HTTP (GET para obtener los datos)
                    "dataSrc": function (json) {
                        // Este callback transforma la respuesta JSON antes de pasarla al DataTable
                        return json;  // La respuesta es un array de usuarios
                    }
                },
                "columns": [
                    { "data": "id" },     
                    { "data": "nombre" },
                    { "data": "apellido" }, 
                    { "data": "correo" },
                    { "data": "password" }  
                ]
            });*/
            /*$('#idTablaUsuarios').DataTable({
                "processing": true, // Indica que se están procesando los datos
                "serverSide": true, // Indica que los datos se obtienen del servidor
                "ajax": {
                    "url": "<?php //echo base_url('list'); ?>", // Aquí usamos la ruta definida en routes.php
                    "type": "GET",
                    "dataSrc": function (json) {
                        return json.data; // Usar "data" que contiene los registros
                    }
                },
                "columns": [
                    { "data": "id" },
                    { "data": "nombre" },
                    { "data": "apellido" },
                    { "data": "correo" },
                    { "data": "password" }
                ]
            });*/
        });
    </script>