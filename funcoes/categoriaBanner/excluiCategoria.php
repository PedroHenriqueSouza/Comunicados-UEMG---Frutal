<?php 
session_start();
include_once "../conexao.php"; 

$id = $_GET['id'];	
$mensagem = 'Excluido com sucesso!';
$erro = 'Erro ao excluir categoria';
        
$sql = "DELETE FROM categoria_banner WHERE id='$id'";
$update = mysqli_query($conn, $sql);		    

if($update){
    $_SESSION['msg'] = $mensagem;
    header('Location: ../../view/addCategoriaBanner.php');
}else {
    $_SESSION['erro'] = $erro;
    header('Location: ../../view/addCategoriaBanner.php');
}


?>