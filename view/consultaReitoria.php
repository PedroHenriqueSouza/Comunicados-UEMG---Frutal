<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Comunica Uemg</title>
  
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
  </script>
    <link href="../img/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icom" />

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
 
</head>


<body id="page-top">
  
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
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item " style="position: relative;">
        <a class="nav-link collapsed"  href="consultaUsuario.php?banner=<?php echo $nome_banner; ?>" >
        <i class="fas fa-users"></i>
          <span >Usuários</span>
        </a>       
      </li>

      <li class="nav-item " style="position: relative;">
      <a class="nav-link collapsed"  href="bannerReitoria.php" >      
          <i class="fas fa-images"></i>
          <span >Banner</span>
        </a>
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
              <a class="nav-link dropdown-toggle" href="inicioReitoria.php" id="userDropdown" role="button">
                <span class="mr-2 d-none d-lg-inline  small" style="color: #FFFFFF" title="Voltar"><i class="fas fa-arrow-left"></i></span>                
              </a>
            </li>

          </ul>

        </nav>      
<?php include_once "../funcoes/conexao.php";?>

<section class="content">
  <div class="container-fluid">
    <div class="col-12 text-center my-5">
        <h1 style="font-weight: 330; color:#4F4F4F"> Usários cadastrados</h1>
        <h2 style="font-weight:200; color:#A9A9A9;font-size:25px">(Os usuários listados têm acesso ao controle de banners da reitoria)</h2>
        
        <?php
if (isset($_SESSION["msg"])) {
    echo '
      <div class="alert alert-success"role="alert">' . $_SESSION["msg"] . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    unset($_SESSION["msg"]);
}
if (isset($_SESSION["erro"])) {
    echo '
      <div class="alert alert-danger"role="alert">' . $_SESSION["erro"] . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
    ;
    unset($_SESSION["erro"]);
}

if (isset($_SESSION["erroSenha"])) {
    echo '
      <div class="alert alert-danger"role="alert">' . $_SESSION["erroSenha"] . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
    ;
    unset($_SESSION["erroSenha"]);
}

?>

  <table class="table mt-5">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Usuário</th>
      <th scope="col">Senha</th>
      <th scope="col">Ação</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        $sql = "SELECT * from usuario WHERE accessLevel= '1' ";
        $executa = mysqli_query($conn, $sql);
        
        while ($dados = mysqli_fetch_assoc($executa)) {
            echo "<tr> <td>"; 
            echo  $dados['user'];
            echo "</td><td>"; 
            echo str_replace($dados['pass'],"*","*******");
            ?>
            </td>            
                  <td> 
                    <button class='btn btn-primary mr-3' title='Excluir usuário' data-toggle='modal' data-target='#modalExcluirUsuario<?php echo $dados['id']; ?>' type='button'><i class='fas fa-user-times'></i></button>
                    <button class='btn btn-primary mr-3' title='Editar usuário' data-toggle='modal' data-target='#modalEditarUsuario<?php echo $dados['id']; ?>' type='button'><i class='fas fa-user-edit'></i></button>               
                  </td>   
                </tr>

<div class="modal" tabindex="-1" role="dialog" id="modalExcluirUsuario<?php echo $dados['id']; ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Deseja realmente excluir esse usuário?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p> Este usuário não terá mais acesso ao sistema!</p>
                <p>Usuário: <?php echo $dados['user']; ?></p>
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-primary text-white" href="../funcoes/reitoria/excluiUsuario.php?id=<?php echo $dados['id']; ?>">Sim</a>
                <a type="button" class="btn btn-secondary text-white" data-dismiss="modal">Não</a>
            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="modalEditarUsuario<?php echo $dados['id']; ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Deseja Editar as credenciais deste usuário?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form id="form" method="post" action="../funcoes/reitoria/editaUsuario.php?id=<?php echo $dados['id']; ?>">
                <div class="form-group">
                        <label for="user" class="col-form-label">Usuário:</label>
                        <input type="text" class="form-control" id="user" name="user" placeholder="<?php echo $dados['user']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="pass" class="col-form-label">Senha:</label>
                        <input type="password" class="form-control" id="pass" name="pass">
                    </div>
                <hr>
                <p>Para editar, insira a senha atual: </p>
                <div class="form-group">
                        <label for="passAtual" class="col-form-label">Senha Atual:</label>
                        <input type="password" class="form-control" id="passAtual" name="passAtual">
                    </div>        
               
            </div>
            <div class="modal-footer">     
                <button type="submit" class="btn btn-primary">Sim</button>
            </form>           
                <a type="button" class="btn btn-secondary text-white" data-dismiss="modal">Não</a>
            </div>
            
        </div>
    </div>
</div>
    <?php    
      }
    ?>   
    
    </tbody>
    </table>
    </div>
  </div>
</section>

<script src="../vendor/jquery/jquery.min.js"></script>
   <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</body>
</html>