<?php 
    session_start();
    include_once "../conexao.php";
    $categoria = $_POST['categoriaBanner'];
    $inputTv = $_POST['inputTv'];
    $id_unidade = $_SESSION['unidade_id'];

    $mensagem = 'Cadastrado com sucesso!';
    $erro = 'Erro ao cadastrar categoria';
    
    $sql = "INSERT INTO categoria_banner(categoria,position,unidade_id) VALUES ('$categoria','$inputTv','$id_unidade')";
    $query = mysqli_query($conn, $sql);
   
    if ($query) {
        $_SESSION['msg'] = $mensagem;
        header('Location: ../../view/addCategoriaBanner.php');
    }else{
        $_SESSION['erro'] = $erro;
        header('Location: ../../view/addCategoriaBanner.php');
    }       



?>