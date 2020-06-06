<?php 
    session_start();
    include_once "../conexao.php";
    $categoria = $_POST['nome_banner'];
    $inputTv = $_POST['editaPosition'];
    $id = $_POST['id'];
    
    $mensagem = 'Editado com sucesso!';
    $erro = 'Erro ao editar categoria/posição';

    $sql = "UPDATE categoria_banner SET categoria='$categoria', position='$inputTv' WHERE id='$id'";
    $update = mysqli_query($conn, $sql);
    
    if ($update) {
        $_SESSION['msg'] = $mensagem;
        header('Location: ../../view/addCategoriaBanner.php');
    }else{
        $_SESSION['erro'] = $erro;
        header('Location: ../../view/addCategoriaBanner.php');
    }     
?>