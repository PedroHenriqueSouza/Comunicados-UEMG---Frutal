<!DOCTYPE html>
<html lang="pt">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Banner</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
  <!-- <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
  <link rel="stylesheet" type="text/css" href="../css/estilo.css">
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> -->

  <!-- FONTES -->
  <script type="text/javascript" src="../js/buscaCategoriaBanner.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans+SC:700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Signika+Negative:300" rel="stylesheet">
  <link href="../img/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icom" />
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <style>
  body {
    background-image: linear-gradient(rgba(254, 254, 254, 0.4), rgba(254, 254, 254, 0.4)), url('../img/uemgfrutal2.svg');
    background-repeat: no-repeat;
    background-size: cover;
    opacity: 1;
    filter: alpha(opacity=100);
  }
.dropdown-submenu {
  position: relative;
}

.dropdown-submenu .dropdown-menu {
  top: 0;
  left: 100%;
  margin-top: -1px;
}
  </style>

<script>
  $(document).ready(function(){
    $('.dropdown-submenu a.test').on("click", function(e){
      $(this).next('ul').toggle();
      e.stopPropagation();
      e.preventDefault();
    });
  });

  function Verificar()
{
 var tecla = window.event.keyCode;

 if (tecla==13) { event.keyCode=0; event.returnValue=false;}

 if (tecla==9) { event.keyCode=0; event.returnValue=false;}
}


</script>

</head>
<body onkeydown="Verificar()">
<?php include_once "../funcoes/conexao.php"; ?>


<div class="container no">
  <div class="col-12">

    <nav class="navbar navbar-inverse navbar-custom  navbar-fixed-top nav-color">
      <div class="container">



        <div class="navbar-header">
          <a href="inicioReitoria.php" class="navbar-brand">
            <span class="img-logo">UEMG </span>
          </a>

        </div>

        <div class="collapse navbar-collapse" id="barra-navegacao">
          

          <?php            
            $query = "SELECT COUNT(*) AS id from solicitacadsatro WHERE status = 0 and estado = 0";
            $executa = mysqli_query($conn, $query);
            $quantidade = mysqli_fetch_assoc($executa);
            
          ?>

          <ul class="nav navbar-nav navbar-right">
            <li class=''><a href="notificacoes.php">
                <i class="fas fa-envelope"></i>
                <span class="badge"><?php echo $quantidade['id']; ?></span>
              </a>
            </li>

            <li>
              <form class="form-inline">
                <div id="barra-pesquisa" class="input-group input-group-sm ">
                  <span class="input-group-addon" id="sizing-addon3"><button class="btn btn-pesquisa"
                      type="submit"><span id="icon-pesquisa"
                        class="glyphicon glyphicon-search"></span></button></span></span>
                  <input type="text" class="form-control" placeholder="Pesquise aqui..." aria-describedby="basic-addon1"
                    id="buscanome" onkeyup="buscarCategoriaBanner(this.value)">

                </div>
              </form>
            </li>


          <li class="dropdown">
          <a class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"href="notificacoes.php">
              <i class="fas fa-list-ul"></i>                              
          </a>
          <ul class="dropdown-menu">
            <li><a tabindex="-1" href="controleReitoria.php">Reitoria</a></li>
            <li class="dropdown-submenu">
              <a class="test" tabindex="-1" href="#">Unidades <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a tabindex="-1" href="#" data-toggle="modal" data-target="#cadastro">Cadastrar</a></li>
                <li><a tabindex="-1" href="#">Consultar</a></li>          
              </ul>
            </li>
            <li><a tabindex="-1" href="#" style="background-color: rgba(60, 110, 143, 0.96);color: white;" data-target="#sair" data-toggle="modal">Sair</a></li>
          </ul>
          </li>
        </div>  
      </ul>
    </div>
  </div>
</nav>

    <div class="row" style="margin-top:50px;" id="resultado">
      <div class="col-12">
        <?php
        $sql = "SELECT * FROM unidade WHERE id != 1 ORDER BY unidades";
        $consulta = mysqli_query($conn, $sql);

        while ($dados = mysqli_fetch_assoc($consulta)) {
          ?>
        <form class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 ">
          <input type="hidden" name="banner" class="" value="<?php echo $dados['unidades'];?>">
          <button type="submit" class="btn mb-3" formaction="adminUnidade.php"
            style="width: 100%; margin-bottom:15px;background-color: rgba(60, 110, 143, 0.96);color: white"><?php echo $dados['unidades']; ?>
          </button>

        </form>
        <?php } ?>
        </button>
      </div>

    </div>
  </div>
  <!-- Modal LogOUt -->
  <form class="modal fade" id="sair" method="post" action="../funcoes/logout.php">
    <div class="modal-dialog" id='teste'>

      <div class="modal-content">

        <div id="Logar" class="tab">

          <div class="modal-header" style="background-color: rgba(60, 110, 143, 0.96);">
            <button class="close" data-dismiss="modal"><span>&times;</span></button>
            <h4 class="modal-title" style="color: white"><span id="icon-login" class="glyphicon glyphicon-log-out"
                style="padding-right: 8px;color: white;"></span>Deseja mesmo sair?</h4>
          </div>

          

        </div>

        <!-- rodape -->
        <div class="modal-footer">
          <div class="col-md-12">
            <button class="btn-custom btn-logar" type="submit" style="min-width: 20%;">Sim!</button>
            <button class="btn-custom btn-danger" data-dismiss="modal" style="color:white">Ops, não quero!</button>
          </div>

        </div>

      </div>
    </div>
  </form>

<!-- Cadastro de Unidades -->
  <form class="modal fade" id="cadastro" method="post" action="../funcoes/cadastroUnidades.php">
    <div class="modal-dialog" id='teste'>

      <div class="modal-content">

        <div id="Logar" class="tab">

          <div class="modal-header" style="background-color: rgba(60, 110, 143, 0.96);">
            <button class="close" data-dismiss="modal"><span>&times;</span></button>
            <h4 class="modal-title" style="color: white"><span id="icon-login" class="glyphicon glyphicon-home"
                style="padding-right: 8px;color: white;"></span>Cadastrar Unidade</h4>


          </div>

          <div class="modal-body div-login">
            <div id="div-info" class="col-md-6">

              <p>Cadastre uma Unidade para ela ter acesso aos banners</p>

            </div>
            <div class="col-md-6" style="margin-bottom: 5px;">
              <div class="form-group">
                <label for="email"><span id="icon-email-pass" class="glyphicon glyphicon-home"></span>Unidade</label>
                <input id='email' type="text" class="form-login" id="campo_usuario" name="user" />

              </div>

            </div>



          </div>

        </div>

        <!-- rodape -->
        <div class="modal-footer">
          <div class="col-md-12">
            <button class="btn-custom btn-logar" type="submit">Cadastrar</button>
            <button class="btn-custom btn-cancelar" data-dismiss="modal">Cancelar</button>
          </div>

        </div>

      </div>
    </div>
  </form>

  

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  </body>

</html>