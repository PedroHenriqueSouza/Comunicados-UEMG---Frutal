<?php
session_start();
$nomeBanner = $_GET['banner'];
$_SESSION['banner'] = $nomeBanner;
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
  <title>Comunica Uemg</title>
  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
  </script>
    <link href="../img/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icom" />

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <script>
  function Mudarestado(autorizado, negado, pendente) {

    if (autorizado && document.getElementById('autorizado').style.display === 'block') {
      document.getElementById('autorizado').style.display = 'none';
      document.getElementById('negado').style.display = 'none';
      document.getElementById('pendente').style.display = 'none';
    } else if (autorizado && document.getElementById('autorizado').style.display === 'none') {
      document.getElementById('autorizado').style.display = 'block';
      document.getElementById('negado').style.display = 'none';
      document.getElementById('pendente').style.display = 'none';
    }

    if (negado && document.getElementById('negado').style.display === 'block') {
      document.getElementById('autorizado').style.display = 'none';
      document.getElementById('negado').style.display = 'none';
      document.getElementById('pendente').style.display = 'none';
    } else if (negado && document.getElementById('negado').style.display === 'none') {
      document.getElementById('autorizado').style.display = 'none';
      document.getElementById('negado').style.display = 'block';
      document.getElementById('pendente').style.display = 'none';
    }

    if (pendente && document.getElementById('pendente').style.display === 'block') {
      document.getElementById('autorizado').style.display = 'none';
      document.getElementById('negado').style.display = 'none';
      document.getElementById('pendente').style.display = 'none';
    } else if (pendente && document.getElementById('pendente').style.display === 'none') {
      document.getElementById('autorizado').style.display = 'none';
      document.getElementById('negado').style.display = 'none';
      document.getElementById('pendente').style.display = 'block';
    }

  }
  </script>
</head>
<?php include_once "sidebar.php";?>
<?php include_once "../funcoes/conexao.php";?>

<section class="content">
  <div class="container-fluid">
    <!-- Content Row -->
    <div class="row">

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <a href="#" onclick="Mudarestado(true, false, false)">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Usuários Autorizados</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                    <?php include "../funcoes/usuarios/numeroPermitidos.php"?>
                  </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-users fa-2x text-gray-300"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <a href="#" onclick="Mudarestado(false, true, false)">
                  <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Usuários Negados</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                    <?php include "../funcoes/usuarios/numeroNegados.php"?>
                  </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-user-times fa-2x text-gray-300"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <a href="#" onclick="Mudarestado(false, false, true)">
                  <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Usuários Pendentes</div>
                  <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                        <?php include "../funcoes/usuarios/numeroPendentes.php"?>
                      </div>
                    </div>

                  </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-user-plus fa-2x text-gray-300"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
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
?>
    <div class="col-xl-12 col-md-6 mb-4">
      <?php
include_once "userAutorizado.php";
include_once "userNegado.php";
include_once "userPendente.php";
?>
    </div>
  </div>
</section>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js "></script>
<script>
$(document).ready(function() {
  $('#listarUsuarioAutorizado').DataTable({
    "processing": true,
    "serverSide": true,
    "ajax": {
      "url": "../funcoes/usuarios/listarUsuariosAutorizados.php",
      "type": "POST"
    }
  });

  $('#listarUsuarioNegado').DataTable({
    "processing": true,
    "serverSide": true,
    "ajax": {
      "url": "../funcoes/usuarios/listarUsuariosNegados.php",
      "type": "POST"
    } 
  });

  $('#listarUsuarioPendente').DataTable({
    "processing": true,
    "serverSide": true,
    "ajax": {
      "url": "../funcoes/usuarios/listarUsuariosPendentes.php",
      "type": "POST"
    } 
  });
});
</script>
</html>