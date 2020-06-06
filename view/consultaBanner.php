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
  <div class="col-12 text-center my-5">
    <h1 style="font-weight: 330; color:#4F4F4F">Imagens Banner</h1>
    <h2 style="font-weight:200; color:#A9A9A9;font-size:25px">(Estas são as categoria cadastradas nesta unidade)</h2>
    <div class="row">

    <div class="col-12">

      <form class="form-inline mb-3 ">
        <input class="form-control ml-5" type="search" placeholder="Buscar..." id="buscanome" onkeyup="buscarCategoriaBanner(this.value)">
      </form>

      <div class="row" id="resultado">

      <?php      
        $sqlID = "SELECT * FROM unidade WHERE unidades = '$nomeBanner'";
        $pesquisa = mysqli_query($conn, $sqlID);
        $dado = mysqli_fetch_assoc($pesquisa);

        $unidade = $dado['id'];
        $sql = "SELECT * FROM categoria_banner WHERE unidade_id = $unidade";
        $consulta = mysqli_query($conn, $sql);

        while ($dados = mysqli_fetch_assoc($consulta)) {
          ?>
          <form action="post" class="col-5">
            <input type="hidden" name="id_banner" value="<?php echo $dados['id']; ?>">
            <input type="hidden" name="banner" value="<?php echo $nomeBanner; ?>">
            <input type="hidden" name="nome" value="<?php echo $dados['categoria']; ?>">
            <button type="submit" class="btn  ml-5 mb-3" formaction="consultaImagem.php" style="width: 100%;background-color: #3b6e8f; color: #FFFFFF"><?php echo $dados['categoria']; ?></button>
          </form>
        <?php } ?>

      </div>

    </div>

  </div>

</div>
</body>
</html>