<?php 
$nome_banner = $_SESSION['banner'];
?>
<div class="modal" tabindex="-1" role="dialog" id="modalExcluirUsuario">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Deseja realmente excluir esse usuário?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Usuário:
          <? echo $dados['nome'] . ' ' . $dados['sobrenome'] ?>
        </p>
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-primary text-white"
          href="../funcoes/usuarios/excluiUsuario.php?banner=<? echo $nome_banner ?>&id=<? echo $dados['id'] ?>">Sim</a>
        <a type="button" class="btn btn-secondary text-white" data-dismiss="modal">Não</a>
      </div>
    </div>
  </div>
</div>