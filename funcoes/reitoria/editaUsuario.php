<?php 
    session_start();
    include_once '../conexao.php';
    $user = $_POST['user'];
    $pass = $_POST['pass'];  
    $passAtual = $_POST['passAtual'];
    $id = $_GET['id'];

    $mensagem = 'Editado com sucesso!';
    $erro = 'Erro ao editar usuário';
    $erroSenha = 'Campo senha não coincide com a atual';

    $select = "SELECT * from usuario WHERE id='$id'";
    $executa = mysqli_query($conn, $select);
    $dados = mysqli_fetch_assoc($executa);

    if($passAtual == $dados['pass']){

        $sql = "UPDATE usuario SET user='$user', pass='$pass' WHERE id='$id'";
        $update = mysqli_query($conn, $sql);
    
         if ($update) {
            $_SESSION['msg'] = $mensagem;
                header('Location: ../../view/consultaReitoria.php');
         }else{
            $_SESSION['erro'] = $erro;
                header('Location: ../../view/consultaReitoria.php');
         }
    
    }else{
        $_SESSION['erroSenha'] = $erroSenha;
        header('Location: ../../view/consultaReitoria.php');
    }
?>