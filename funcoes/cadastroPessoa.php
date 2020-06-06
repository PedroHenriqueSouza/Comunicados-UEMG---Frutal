<?php 
    include_once "conexao.php";

    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $setor = $_POST['setor'];
    $unidade = $_POST['unidade'];
    $descricao = $_POST['descricao'];   
    $tipo = $_POST['tipo'];

    $sqlProc ="SELECT * FROM unidade WHERE unidades='$unidade'";
    $consulta = mysqli_query($conn,$sqlProc); 
    $dados = mysqli_fetch_assoc($consulta);
    $id_unidade = $dados['id'];
    

 
     $sql = "INSERT INTO solicitacadsatro(nome,sobrenome,cpf,email,setor,unidade_id,descricao,tipo,status,estado) VALUES ('$nome','$sobrenome','$cpf','$email','$setor','$id_unidade', '$descricao','$tipo','0','0')";
     $query = mysqli_query($conn, $sql);
    
     if ($query) {
        echo 1;
     }else{
        echo 2;
     }       

    


  


?>