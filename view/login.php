<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title class="img-logo">Comunica UEMG </title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/login.css">
  <link href="../img/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icom" />

  <script>
  $(document).ready(function() {
    $('.login-info-box').fadeOut();
    $('.login-show').addClass('show-log-panel');
  });


  $('.login-reg-panel input[type="radio"]').on('change', function() {
    if ($('#log-login-show').is(':checked')) {
      $('.register-info-box').fadeOut();
      $('.login-info-box').fadeIn();

      $('.white-panel').addClass('right-log');
      $('.register-show').addClass('show-log-panel');
      $('.login-show').removeClass('show-log-panel');

    } else if ($('#log-reg-show').is(':checked')) {
      $('.register-info-box').fadeIn();
      $('.login-info-box').fadeOut();

      $('.white-panel').removeClass('right-log');

      $('.login-show').addClass('show-log-panel');
      $('.register-show').removeClass('show-log-panel');
    }
  });
  </script>
</head>


<body>

  <div class="login-reg-panel">

    <div class="register-info-box">
      <!-- <div>
            <span class="img-logo"> </span>
    </div>
     -->
      <h2>Comunica UEMG</h2>

      <h6> Ainda não é cadatrado?<a href="solicitaCadastro.php"
          style="color: white;text-decoration: underline;">&nbsp;Solicite seu cadastro </a> </h6>
    </div>

    <div class="white-panel">
      <div class="login-show">
        <h2>Entrar</h2>
        <form action="../funcoes/verificaLogin.php" method="post">
          <input type="text" placeholder="Nome de Usuario" name="user">
          <input type="password" placeholder="Senha" name="pass">
          <input type="submit" value="Entrar">
          <a href="">Esqueceu sua senha?</a>
        </form>
      </div>
      <div style="color:red;">
        <?php
if (isset($_GET['l'])) {
    echo $_GET['l'];
}
?>
      </div>

    </div>
  </div>

</body>

</html>