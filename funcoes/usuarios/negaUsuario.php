<?php
session_start();
include_once "../conexao.php";
$id = $_GET['id'];
$nome_banner = $_GET['banner'];

$sql = "UPDATE solicitacadsatro SET estado = 0, status = 1 WHERE id = '$id'";

$executa = mysqli_query($conn, $sql);
$mensagem = 'Permissão alterada com sucesso!';

$erro = 'Erro ao tentar alterar as permissões!';

if (mysqli_affected_rows($conn) > 0) {
    $_SESSION['msg'] = $mensagem;
    header('Location: ../../view/consultaUsuario.php?banner='
        . $nome_banner . '');
} else {
    $_SESSION['erro'] = $erro;
    header('Location: ../../view/consultaUsuario.php?banner='
        . $nome_banner . '');
}