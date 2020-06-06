<?php
include_once "conexao.php";
session_start();

$login = $_POST['user'];
$senha = $_POST['pass'];
$_SESSION['login'] = $login;

$result_usuario = "SELECT * FROM usuario WHERE user = '$login' AND pass = '$senha'  LIMIT 1";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$resultado = mysqli_fetch_assoc($resultado_usuario);
$_SESSION['unidade_id'] = $resultado['unidade_id'];

if (isset($resultado)) { 
    if($resultado['accessLevel'] == 1)
        header('Location: ../view/inicioReitoria.php?login=' . $_SESSION['login'] . '');    
    else
        header('Location: ../view/inicioUnidade.php?login=' . $_SESSION['login'] . ''); 
} else {
    echo "<script language='javascript' type='text/javascript'>window.location.href='../view/login.php?l=Usuário ou senha Inválido!';</script>";
}
