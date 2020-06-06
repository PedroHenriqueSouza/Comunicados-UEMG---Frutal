<?php
session_start();
include_once '../conexao.php';
$id = $_GET['id'];

$sql = "DELETE FROM usuario WHERE id = '$id'";
$query = mysqli_query($conn, $sql);
$mensagem = 'Excluido com sucesso!';
$erro = 'Erro ao excluir usuário';

if ($query) {
    $_SESSION['msg'] = $mensagem;
    header('Location: ../../view/consultaReitoria.php');
} else {
    $_SESSION['erro'] = $erro;
    header('Location: ../../view/consultaReitoria.php');
}