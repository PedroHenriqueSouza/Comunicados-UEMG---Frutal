<?php 
	
    include_once "conexao.php";
    $unidade = $_POST['user'];
    
    if(!$conn->query("INSERT INTO unidade(unidades) VALUES ('$unidade')")) die ('Os dados não foram inseridos');
        header('Location: ../view/inicioReitoria.php'); 	
    


	
			
?>