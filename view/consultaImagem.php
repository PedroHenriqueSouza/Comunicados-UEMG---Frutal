<?php
session_start();
$nomeBanner = $_GET['banner'];
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
 
</head>
<body id="page-top">
  
<?php include_once "sidebar.php";?>
<?php include_once "../funcoes/conexao.php";?>
<?php
$sql = "SELECT * FROM unidade WHERE unidades = '$nomeBanner'";
$consulta = mysqli_query($conn, $sql);
$dados = mysqli_fetch_assoc($consulta);  
$id_banner = $dados['id'];
?>

  <div class="col-12 text-center my-5">
    <h1 style="font-weight: 330; color:#4F4F4F">Imagens Banner</h1>
    <h2 style="font-weight:200; color:#A9A9A9;font-size:25px">(Estas são as imagens cadastradas nesta unidade)</h2>

<form id="ExcluirImg" class="ml-4">
  <div class="form-row" style="justify-content:left;margin-top:50px;margin-left: 10px;">
  <?php
    $sql = "SELECT * FROM caminho_imagem WHERE unidade_id = '$id_banner'";
    $consulta = mysqli_query($conn, $sql);
    $dados = mysqli_fetch_assoc($consulta); 

    $caminho = $dados['caminho'];
    $img = glob($caminho . '*{jpg,png,gif}', GLOB_BRACE);
    $contador = count($img);

    if($contador == 0){
      echo "<div style='margin: 0 auto;color: FireBrick;font-weight: bold;'>
                <p>Ainda não foram cadastrados imagens neste banner!</p>
            </div>";                                                                                                                                                                       
    }else{   
 ?>
      <div id='mostrarImagem' class='form-row ml-4' style='width: 150px; height: 150px;display: block;border-radius: 5px;align-items: center;margin-right: 2%;'>          
    <a > <img  src='<?php echo $dados['caminho'].$dados['nome_imagem']; ?>' style='width:150px;height: 150px;border-width: 6px;border-style: dashed;border-color: #000000;' /> </a>
   </div>
<?php } ?>
</form>

</body>
</html>