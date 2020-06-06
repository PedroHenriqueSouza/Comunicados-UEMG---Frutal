 <!-- Page Wrapper -->
 <div id="wrapper" style="position: absolute; width: 100%">

<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion " style="background-color:#2e5064"  id="accordionSidebar" >

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="far fa-file-image"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Comunica Uemg</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Banners
  </div>



  <!-- Nav Item - Utilities Collapse Menu -->
  <li class="nav-item " style="position: relative;">
    <a class="nav-link collapsed"  href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
      <i class="fas fa-images"></i>
      <span >Cadastrar</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="addCategoriaBanner.php">Banners</a>
        <a class="collapse-item" href="addImagemBanner.php">Imagens</a> 
      </div>
    </div>
  </li>
    <!-- Nav Item - Pages Collapse Menu -->
   <li class="nav-item ">
    <a class="nav-link" href="listarBanner.php">
      <i class="far fa-eye"></i>
      <span>Visualizar</span></a>
  </li>


 
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow"style="background-color: #2e5064">

      <!-- Sidebar Toggle (Topbar) -->
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>

     

      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
          <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-search fa-fw"></i>
          </a>
          <!-- Dropdown - Messages -->
          <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
            <form class="form-inline mr-auto w-100 navbar-search">
              <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button class="btn btn-primary" type="button">
                    
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>


        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="inicioUnidade.php" id="userDropdown" role="button">
            <span class="mr-2 d-none d-lg-inline  small" style="color: #FFFFFF" title="Voltar"><i class="fas fa-arrow-left"></i></span>                
          </a>          
          
        </li>

      </ul>

    </nav>