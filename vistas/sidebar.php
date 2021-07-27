<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8;" />
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image" />
      </div>
      <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search" />
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class  with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="escritorio.php" class="nav-link ">
            <i class="nav-icon fas fa-desktop"></i>  
            <p>
              Escritorio
              <span class="right badge badge-danger">New</span>
            </p>
          </a>
        </li>
        <li class="nav-item menu-open">
          <a href="#" class="nav-link active">
            <i class="nav-icon fab fa-pagelines"></i>
            <p>
              Planta
              <i class="right fas fa-angle-left"></i>  
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="agregar_categoria.php" class="nav-link">
                <i class="fas fa-clipboard-list nav-icon"></i>
                <p>Agregar Categoria</p>  
              </a>
            </li>
            <li class="nav-item">
              <a href="agregar_colo.php" class="nav-link">
                <i class="fas fa-palette nav-icon"></i>  
                <p>Agregar Color</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="agregar_planta.php" class="nav-link active">
                <i class="fas fa-tree nav-icon"></i>  
                <p>Agregar Planta</p>
              </a>
            </li>
          </ul>
        </li>        
        
        <li class="nav-header">EXAMPLES</li>
        <li class="nav-item">
          <a href="../pages/calendar.php" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Usuario
              <span class="badge badge-info right">2</span> 
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/gallery.html" class="nav-link">
            <i class="nav-icon fas fa-store"></i> 
            <p>
              Empresa
            </p>
          </a>
        </li>
        
        <li class="nav-header">Exit</li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon far fa-circle text-danger"></i>
            <p class="text">Salir</p>
          </a>
        </li>
        
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>