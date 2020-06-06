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
        <a class="nav-link collapsed"  href="consultaReitoria.php" >
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


        <?php include_once "../funcoes/conexao.php"; ?>


  <?php
  $nome_banner = "reitoria";
  $id_banner = "1";
  $caminho = '../documentos/' . $nome_banner . '/';
  $img = glob($caminho . '*{jpg,png,gif}', GLOB_BRACE);
  $contador = count($img);
  $numImagem = 1;
  if ($contador == $numImagem) {
    $disabled = 'disabled';
  } else {
    $disabled = "";
  }
  ?>
  <div class="col-12 text-center my-5">
    <h1 style="font-weight: 330; color:#4F4F4F">Imagens Banner</h1>
    <h2 style="font-weight:200; color:#A9A9A9;font-size:25px">(A Imagem que você escolher irá aparecer parar todas as unidades!)</h2>
    <div class="row mt-5">
      <div class="col-12">
        <form method="POST" enctype="multipart/form-data" class="ml-4 mb-3" onsubmit="Checkfiles(this)">
          <div class="fileUpload btn " style="background-color: #3b6e8f; color: #FFFFFF">
            <input type="file" id="nome_arquivo" name="arquivo" <?php echo $disabled; ?> accept="image/png, image/jpeg">
            <span class="nome_arquivo"></span>
          </div>
          <input type="submit" class="btn  ml-2" name="botao" style="background-color: #3b6e8f; color: #FFFFFF" <?php echo $disabled; ?> value="Enviar" onClick="history.go(0)">
          <?php
          $unidade = "1";
          $_UP['pasta'] = '../documentos/' . $nome_banner . '/';

          if (isset($_POST['botao'])) {
            $arq = $_FILES['arquivo']['name'];
            $arq = str_replace("", "_", $arq);
            $arq = str_replace("ç", "c", $arq);
            if (file_exists("../documentos/$arq")) {
              $a = 1;
              while (file_exists("../documentos/[$a}$arq")) {
                $a++;
              }
              $arq = "[" . $a . "]" . $arq;
            }
            if (is_dir($_UP['pasta'])) {
              if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $arq)){
              $sql = "INSERT INTO caminho_imagem(caminho,nome_imagem,unidade_id,categoria_id) VALUES ('$_UP[pasta]','$arq','$unidade','$id_banner')";
              $query = mysqli_query($conn, $sql);
                echo "<script> window.location.href=window.location.href </script>";}

              else
                echo "Não possível realizar o upload! ";
            } else {
              mkdir($_UP['pasta'], 0777);

              if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $arq)){
                $sql = "INSERT INTO caminho_imagem(caminho,nome_imagem,unidade_id,categoria_id) VALUES ('$_UP[pasta]','$arq','$unidade','$id_banner')";
                $query = mysqli_query($conn, $sql);
                echo "<script> window.location.href=window.location.href </script>";}
              else
                echo "Não possível realizar o upload! ";
            }
          }
          ?>
        </form>

        <?php

$caminho = '../documentos/' . $nome_banner . '/';
$img = glob($caminho . '*{jpg,png,gif}', GLOB_BRACE);
$contador = count($img);

$loopHorizontal = 1;

?>
<form id="ExcluirImg" class="ml-4">
  <div class="form-row" style="justify-content:left;margin-top:50px;margin-left: 10px;">
<?php

    if($contador == 0){
      echo "<div style='margin: 0 auto;color: FireBrick;font-weight: bold;'>
                <p>Ainda não foram cadastrados imagens para a Reitoria!</p>
            </div>";
    }   

  for ($i = 0; $i < $contador; $i++) {
    echo "   
      <div class='modal fade' id='excluirImagem$i' role='dialog'>
        <div class='modal-dialog modal-md'>
          <div class='modal-content'>
            <div class='modal-body'>
                <p> Deseja mesmo remover esta imagem?</p>
            </div>
            <div class='modal-footer'>
              <a class='btn btn-danger' href='../funcoes/apagarImagemReitoria.php?imagem=" . $img[$i] . "&banner=" . $nome_banner . "&id_banner=" . $id_banner . "'>Sim, eu quero!</a>
              <button type='button' data-dismiss='modal' class='btn btn-primary ml-auto'>Ops! Não quero!</button>
              </div>
          </div>
        </div>
      </div>";         

    if ($contador <= $loopHorizontal) {

      echo "
<div id='mostrarImagem' class='form-row ' style='display: block;border-radius: 5px;margin-right: 4.5rem'>          
<a data-toggle='modal' data-target='#excluirImagem$i' class='imagem fechar'> <img  src='$img[$i]' style='width:150px;height: 150px;border-width: 6px;border-style: dashed;border-color: #428bca;' /> </a>
</div>
";
    } else if ($contador = $loopHorizontal) {
      echo "       
  <div id='mostrarImagem' class='form-row ml-4' style='width: 150px; height: 150px;display: block;border-radius: 5px;align-items: center;margin-right: 2%;'>          
  <a data-toggle='modal' data-target='#excluirImagem$i' class='imagem fechar'> <img  src='$img[$i]' style='width:150px;height: 150px;border-width: 6px;border-style: dashed;border-color: #428bca;' /> </a>
</div>
";
    }
  }

    ?>
  </div>
</form>
<form method="POST" id="excluirTodasImagens">
  <input type="hidden" name="banner" value="<?php echo $caminho; ?>">
  <input type="hidden" name="nomebanner" value="<?php echo $nome_banner; ?>">
  <input class="btn float-right my-5  mr-5" type="button" value="Salvar" style="background-color: #3b6e8f; color: #FFFFFF; width: 110px;" data-toggle="modal" data-target="#salvar" />
</form>



<div class="modal fade" id="salvar" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-body">
        <p> Salvo com sucesso!</p>
      </div>
      <div class="modal-footer">               
          <button type="button" class="btn" style="background-color: #3b6e8f; color: #FFFFFF" id="salvar" onclick="window.location.href='bannerReitoria.php';">Ok</button>          
      </div>
    </div>
  </div>
</div>





<div class="modal fade" id="confirmar" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-body">
        <p> DESEJA REALMENTE EXCLUIR A IMAGEM?</p>
      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-primary mr-auto">Cancelar</button>
        <button type="button" class="btn btn-danger" id="excluirButton">Excluir</button>
      </div>
    </div>
  </div>
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