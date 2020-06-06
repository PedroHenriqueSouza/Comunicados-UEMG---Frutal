<html lang="pt-br">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Comunica UEMG</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="../img/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icom" />
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="../assets/css/gsdk-bootstrap-wizard.css" rel="stylesheet" />
    <link href="../assets/css/demo.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    
    <script>  $(document).ready(function() {

/// Quando usuário clicar em salvar será feito todos os passo abaixo
$('#finish').click(function() {
    var dados = $('#solicitaCadastro').serialize();
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: '../funcoes/cadastroPessoa.php',
        async: true,
        data: dados,
        success: function(response) {
            if (response == '1') {
                $('#myModal').modal('show');
            } else if (response == '2') {
                $('#myModal2').modal('show');
            } else {
                $('#myModal3').modal('show');
            }
        }
    });
    return false;
});
});

function mascara(i){
   
   var v = i.value;
   
   if(isNaN(v[v.length-1])){ // impede entrar outro caractere que não seja número
      i.value = v.substring(0, v.length-1);
      return;
   }
   
   i.setAttribute("maxlength", "14");
   if (v.length == 3 || v.length == 7) i.value += ".";
   if (v.length == 11) i.value += "-";

}

function limpa() {
if(document.getElementById('nome').value!="") {
document.getElementById('nome').value="";
document.getElementById('sobrenome').value="";
document.getElementById('cpf').value="";
document.getElementById('email').value="";
document.getElementById('setor').value="";
document.getElementById('textarea1').value="";

window.location.href = "login.php";
}
}

function limpa2() {
if(document.getElementById('nome').value!="") {
document.getElementById('nome').value="";
document.getElementById('sobrenome').value="";
document.getElementById('cpf').value="";
document.getElementById('email').value="";
document.getElementById('setor').value="";
document.getElementById('textarea1').value="";
}
}
    </script>
</head>

<body>    
<?php include_once "../funcoes/conexao.php"; ?>
<div class="image-container set-full-height" style="background-color: #3c6178;">

    <div class="container">
        <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="wizard-container">
                <div class="card wizard-card" data-color="orange" id="wizardProfile">
                    <form action="../funcoes/cadastroPessoa.php" method="post" id="solicitaCadastro">
                    	<div class="wizard-header">
                        	<h3>
                        	   <b>Comunica</b> UEMG <br>
                        	   <small>Solicite seu cadastro para controlar os banners de sua unidade!</small>
                        	</h3>
                    	</div>

						<div class="wizard-navigation">
							<ul>
	                            <li><a href="#about" data-toggle="tab">Sobre</a></li>
	                            <li><a href="#account" data-toggle="tab">Cargo</a></li>
	                            <li><a href="#address" data-toggle="tab">Unidade</a></li>
	                        </ul>
						</div>
                        <div class="tab-content">
                            <div class="tab-pane" id="about">
                              <div class="row">
                                  <h4 class="info-text"> Informe primeiramente seus dados pessoais!</h4>
                                  <div class="col-sm-5 col-sm-offset-1">
                                  <div class="form-group">
                                        <label>Nome <small>*</small></label>
                                        <input name="nome" id="nome" type="text" class="form-control" placeholder="" minlength="1" maxlength="50">
                                      </div>
                                  </div>
                                  <div class="col-sm-5">                                      
                                      <div class="form-group">
                                        <label> Sobrenome</label> <small>*</small></label>
                                        <input name="sobrenome" id="sobrenome" type="text" class="form-control" placeholder="." minlength="1" maxlength="255">
                                      </div>
                                  </div>
                                  <div class="col-sm-5 col-sm-offset-1">
                                  <div class="form-group">
                                        <label>CPF <small>*</small></label>
                                        <input name="cpf" id="cpf" type="text" class="form-control" placeholder="" id="cpf" maxlength="11" oninput="mascara(this)">
                                      </div>
                                  </div>
                                  <div class="col-sm-10 col-sm-offset-1">
                                      <div class="form-group">
                                          <label>Email <small>*</small></label>
                                          <input name="email" id="email" type="email" class="form-control" placeholder="">
                                      </div>                                              
                              </div>
                              </div>
                            </div>
                            <div class="tab-pane" id="account">
                                <h4 class="info-text"> Quem é você? </h4>
                                <div class="row">

                                    <div class="col-sm-10 col-sm-offset-1">
                                        <div class="col-sm-4">
                                            <div class="choice" data-toggle="wizard-checkbox">
                                                <input type="checkbox" name="tipo" id="tipo" value="estagiario">
                                                <div class="icon">
                                                    <i class="fas fa-user-graduate"></i>
                                                </div>
                                                <h6>Estagiário</h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="choice" data-toggle="wizard-checkbox">
                                                <input type="checkbox" name="tipo" value="professor">
                                                <div class="icon">
                                                <i class="fas fa-chalkboard-teacher"></i>
                                                </div>
                                                <h6>Professor</h6>
                                            </div>

                                        </div>
                                        <div class="col-sm-4">
                                            <div class="choice" data-toggle="wizard-checkbox">
                                                <input type="checkbox" name="tipo" value="servidor">
                                                <div class="icon">
                                                 <i class="fas fa-university"></i>
                                                </div>
                                                <h6>Servidor</h6>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane" id="address">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4 class="info-text"> Por que devo ter um cadastro? </h4>
                                    </div>                                 
                                    <div class="col-sm-7 col-sm-offset-1">
                                         <div class="form-group">
                                            <label>Unidade</label><br>
                                             <select name="unidade" class="form-control">
                                             <option selected>Selecione...</option>
                                                    <?php 

                                                    $sql = "SELECT * FROM unidade WHERE id != 1";
                                                    $consulta = mysqli_query($conn, $sql);

                                                    while ($dados = mysqli_fetch_assoc($consulta)) {

                                                        echo "<option>" . $dados['unidades'] . "</option>";
                                                    }
                                                    ?>
                                            </select>
                                          </div>
                                    </div>
                                </div>
                                <div class="row">                                   
                                    <div class="col-sm-10 col-sm-offset-1">
                                         <div class="form-group">
                                            <label>Setor: </label>
                                            <input type="text" class="form-control" placeholder="" id="setor" name="setor" minlength="1" maxlength="50">
                                          </div>
                                    </div>                                                                 
                                </div>
                                <div class="row">                                   
                                    <div class="col-sm-10 col-sm-offset-1">
                                         <div class="form-group">
                                            <label for="textarea1">Explique o motivo para ter um cadatro: </label>
                                            <textarea class="form-control" id="textarea1" rows="1" name="descricao"></textarea>
                                          </div>
                                    </div>                                                                 
                                </div>
                            </div>
                        </div>
                        <div class="wizard-footer height-wizard">
                            <div class="pull-right">
                            <input type='button' class='btn btn-cancela btn-fill btn-danger btn-wd btn-sm ' name='btn-cancela' id="btn-cancela" value='Cancelar' data-toggle="modal" data-target="#modalCancelar" />                                                                 

                                <input type='button' class='btn btn-next btn-fill  btn-wd btn-sm' name='next' value='Próximo' style='background-color: rgba(60, 110, 143, 0.96);border: 1px solid #3B6E8F'/>                               
                                <!-- <input type='submit' class='btn btn-finish btn-fill btn-warning btn-wd btn-sm' name='finish' value='Solicitar' /> -->
                            <button type='submit' class='btn btn-finish btn-fill btn-wd btn-sm' name='finish' onClick="limpa2()" id='finish' style='background-color: rgba(60, 110, 143, 0.96);border: 1px solid #3B6E8F'>Solicita Cadastro</button> 

                            </div>
                           
                            <div class="pull-left">
                                <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Voltar' />
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </form>
                </div>
            </div> 
        </div>
        </div>
    </div> 
<div class="modal" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">SOLICITAÇÃO REALIZADA COM SUCESSO!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>O Administrador irá avaliar seu cadastro.Você pode acompanhar todo processo pelo seu email!</p>
      </div>
      <div class="modal-footer">
      <a class="text-white btn btn-info" type="button" href="login.php" >Ok</a>
      </div>
    </div>
  </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="modalCancelar">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Deseja mesmo cancelar seu cadastro?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>     
      <div class="modal-footer">
      <a class="text-white btn btn-danger" type="button" href="#" onClick="limpa()">Sim, Eu Quero!</a>
      <a class="text-white btn btn-info" type="button" data-dismiss="modal">Ops, Não Quero!</a>
      </div>
    </div>
  </div>
</div>

        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Não foi possivel realizar seu cadastro! </h4>
              </div>
              <div class="modal-footer">
                <a class="text-white btn btn-info" type="button" href="login.php" >Voltar</a>
              </div>
            </div>
          </div>
        </div>

</div>

</body>

	<!--   Core JS Files   -->
	<script src="../assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="../assets/js/gsdk-bootstrap-wizard.js"></script>

	<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="../assets/js/jquery.validate.min.js"></script>

</html>
