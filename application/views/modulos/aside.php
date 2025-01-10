  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
          <img src="<?php echo base_url()?>assets/dist/img/logo-utalca.jpg" alt="AdminLTE Logo"
              class="brand-image img-circle" style="opacity: .8">
          <span class="brand-text font-weight-light">UNIV. DE TALCA</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-item">
                      <a href="<?php echo base_url(); ?>me/"<?php echo $this->session->userdata('id_user');?> class="nav-link">
                          <i class="nav-icon fas fa-user"></i>
                          <p>
                              Mis Datos
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="<?php echo base_url(); ?>list" class="nav-link">
                          <i class="fas fa-list nav-icon"></i>
                          <p>
                              Listado Usuarios
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="<?php echo base_url(); ?>delete/12" class="nav-link">
                          <i class="fas fa-trash nav-icon"></i>
                          <p>
                              Dar de Baja Mi Usuario
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="<?php echo base_url(); ?>logout" class="nav-link">
                          <i class="fas fa-sign-out-alt nav-icon"></i>
                          <p>
                              Cerrar Sesión
                          </p>
                      </a>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>