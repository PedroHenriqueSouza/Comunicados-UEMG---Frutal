  <?php session_start(); ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Banner</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../img/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icom" />

    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <script>
      function Checkfiles() {
        var fup = document.getElementById('nome_arquivo');
        var fileName = fup.value;
        var ext = fileName.substring(fileName.lastIndexOf('.') + 1);

        if (ext == "jpeg" || ext == "png") {
          return true;
        } else {
          return false;
        }
      }

      $(document).ready(function() {

        /// Quando usuário clicar em salvar será feito todos os passo abaixo
        $('#delete').click(function() {

          var dados = $('#excluirTodasImagens').serialize();
          $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '../funcoes/apagarTodasImagens.php',
            async: true,
            data: dados,
            success: function(response) {
              if (response == '1') {
                $('#confirm').modal('hide');
                $('#myModal').modal('show');

              } else {
                $('#myModal2').modal('show');
              }
            }
          });

          return false;
        });
      })
    </script>
    <style>
      .imagem {
        position: relative;
        display: inline-block;

      }

      .imagem:before {
        position: absolute;
        background: #d02727;
        color: #fff;
        padding: 4px;
        border-radius: 2px;
        top: 0px;
        right: 5px;
        font-size: 12px;
        font-family: arial;
        box-shadow: 0 0 5px #000;
      }

      .imagem.fechar:before {
        content: "X";
      }
    </style>


  </head>
<body>
  <?php include_once "sideBarUnidade.php"; ?>
  <?php include_once "../funcoes/conexao.php"; ?>


  <?php
  $nome_banner = $_GET['banner'];
  $id_banner = $_GET['id_banner'];
  $caminho = '../documentos/' . $nome_banner . '/';
  $img = glob($caminho . '*{jpg,png,gif}', GLOB_BRACE);
  $contador = count($img);
  $numImagem = 4;
  if ($contador == $numImagem) {
    $disabled = 'disabled';
  } else {
    $disabled = "";
  }
  ?>
  <div class="col-12 text-center my-5">
    <h1 style="font-weight: 330; color:#4F4F4F">Imagens Banner</h1>
    <h2 style="font-weight:200; color:#A9A9A9;font-size:25px">(Realize o upload das imagens para o banner)</h2>
    <div class="row mt-5">
      <div class="col-12">
        <form method="POST" enctype="multipart/form-data" class="ml-4 mb-3" onsubmit="Checkfiles(this)">
          <div class="fileUpload btn " style="background-color: #3b6e8f; color: #FFFFFF">
            <input type="file" id="nome_arquivo" name="arquivo" <?php echo $disabled; ?> accept="image/png, image/jpeg">
            <span class="nome_arquivo"></span>
          </div>
          <input type="submit" class="btn  ml-2" name="botao" style="background-color: #3b6e8f; color: #FFFFFF" <?php echo $disabled; ?> value="Enviar" onClick="history.go(0)">
          <?php
          $unidade = $_SESSION['unidade_id'];
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

$loopHorizontal = 4;

?>
<form id="ExcluirImg" class="ml-4">
  <div class="form-row" style="justify-content:left;margin-top:50px;margin-left: 10px;">
<?php
   $unidade = '1';
   $sql = "SELECT * FROM caminho_imagem WHERE unidade_id = $unidade";
   $consulta = mysqli_query($conn, $sql);
   $dados = mysqli_fetch_assoc($consulta);
  

    if($contador == 0){
      echo "<div style='margin: 0 auto;color: FireBrick;font-weight: bold;'>
                <p>Ainda não foram cadastrados imagens neste banner!</p>
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
              <a class='btn btn-danger' href='../funcoes/apagarImagem.php?imagem=" . $img[$i] . "&banner=" . $nome_banner . "&id_banner=" . $id_banner . "'>Sim, eu quero!</a>
              <button type='button' data-dismiss='modal' class='btn btn-primary ml-auto'>Ops! Não quero!</button>
              </div>
          </div>
        </div>
      </div>";         
      ?>
      <div id='mostrarImagem' class='form-row ml-4' style='width: 150px; height: 150px;display: block;border-radius: 5px;align-items: center;margin-right: 2%;'>          
    <a > <img  src='<?php echo $dados['caminho'].$dados['nome_imagem']; ?>' style='width:150px;height: 150px;border-width: 6px;border-style: dashed;border-color: #FF0000;' /> </a>
   </div>
   <?php
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
  <input class="btn btn-danger float-right my-5  mr-2" type="button" value="Excluir tudo" data-toggle="modal" data-target="#confirm" />         
</form>

<!-- Excluir - Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Imagens excluidas com sucesso!</h4>
      </div>
      <div class="modal-footer">
        <button class="text-white btn btn-info" type="button" onclick="history.go(0)">Voltar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="confirm" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-body">
        <p> Realmente deseja excluir todas as imagens?</p>
      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-primary mr-auto">Cancelar</button>
        <button type="button" class="btn btn-danger" id="delete">Excluir</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="salvar" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-body">
        <p> Salvo com sucesso!</p>
      </div>
      <div class="modal-footer">               
          <button type="button" class="btn" style="background-color: #3b6e8f; color: #FFFFFF" id="salvar" onclick="window.location.href='listarBanner.php';">Ok</button>          
      </div>
    </div>
  </div>
</div>



<!-- Erro ao excluir - Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Erro ao excluir as Imagens</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Voltar</button>
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
<!-- Excluir 1 imagem - Modal -->
<div class="modal fade" id="myModals" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Imagens excluidas com sucesso!</h4>
      </div>
      <div class="modal-footer">
        <button class="text-white btn btn-info" type="button" onclick="history.go(0)">Voltar</button>
      </div>
    </div>
  </div>
</div>

<!-- Erro ao excluir - Modal -->
<div class="modal fade" id="myModals2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Erro ao excluir as Imagens</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Voltar</button>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>

        <script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../js/sb-admin-2.min.js"></script>

       
</body>
  </html>