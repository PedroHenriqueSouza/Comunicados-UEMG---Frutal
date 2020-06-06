
  <style>
    .img-logo{
	background-image: url(../img/UEMG-Logo.png);
	background-repeat: no-repeat;

	height: 40px;
	width: 132px;
	display: block;
	background-size: contain;
	color: transparent;

	margin-top: -9px;
}
  </style>

  <!-- Page Wrapper -->
  <div id="wrapper" style="position: absolute; width: 100%">

    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion " style="background: rgba(60, 110, 143, 0.96);"  id="accordionSidebar" >

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="inicioReitoria.php">
            <span class="img-logo">UEMG </span>         
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        <?php 
            $nome_banner = $_GET['banner'];
            echo $nome_banner;   
        ?>
      </div>

  

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item " style="position: relative;">
        <a class="nav-link collapsed"  href="consultaUsuario.php?banner=<?php echo $nome_banner; ?>" >
        <i class="fas fa-users"></i>
          <span >Usuários</span>
        </a>       
      </li>

      <li class="nav-item " style="position: relative;">
      <a class="nav-link collapsed"  href="consultaBanner.php?banner=<?php echo $nome_banner; ?>" >       
          <i class="fas fa-images"></i>
          <span >Banners</span>
        </a>
      
      </li>
       


     
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow"style=" background: rgba(60, 110, 143, 0.96);">

         

         

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

            

          </ul>

        </nav>
      

        <script src="../vendor/jquery/jquery.min.js"></script>
   <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>


    