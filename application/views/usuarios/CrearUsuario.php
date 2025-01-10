      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <div class="content-header">
              <div class="container-fluid">
                  <div class="row mb-2">
                      <div class="col-sm-12">
                          <h1 class="m-0">Crear Usuario</h1>
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
                                  NUEVO USUARIO
                              </div>
                          </div>    
                            <form action="<?php echo site_url('new'); ?>" method="POST">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingresa tu nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Apellido</label>
                                <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Ingresa tu nombre apellido" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Correo Electrónico</label>
                                <input type="email" class="form-control" name="correo" id="correo" placeholder="Ingresa tu correo electrónico" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Ingresa una contraseña" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Crear Cuenta</button>
                            </form>
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
                        <td>${usuario.password}</td>
                    `;
                });

                // Inicializamos DataTable
                $('#idTablaUsuarios').DataTable();
            })
            .catch(error => {
                console.error('Error al obtener los datos:', error);
            });

        });
    </script>