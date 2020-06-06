<?php
include_once("../funcoes/conexao.php");
$unidade = $_GET['banner'];
$unidades = "SELECT * from unidade where unidades ='$unidade'";
$_executa = mysqli_query($conn, $unidades);

while($resultado = mysqli_fetch_assoc($_executa)){
    $idUnidade = $resultado['id'];
    $nomeUnidade = $resultado['unidades'];
    if ($nomeUnidade == $unidade) {
        $query = "SELECT COUNT(*) AS id from solicitacadsatro WHERE status = 1
        and estado = 0 and unidade_id = '$idUnidade'"; 
        $executa = mysqli_query($conn, $query);
        $quantidade = mysqli_fetch_assoc($executa);
        
    }
}echo $quantidade['id'];

