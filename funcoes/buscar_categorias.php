<?php include_once "conexao.php"; 

// Recebe o valor enviado
$valor = $_GET['valor'];

// Procura titulos no banco relacionados ao valor
$sql ="SELECT * FROM unidade WHERE unidades LIKE '%".$valor."%'";
$consulta = mysqli_query($conn,$sql); 
// Exibe todos os valores encontrados

while ($noticias = mysqli_fetch_assoc($consulta)) {
	
	$id = $noticias['id'];
	$nome = $noticias['unidades'];

	echo  "       
	<div class='row' style='margin-top:50px;' id='resultado'>
    <div class='col-12'> 
		<form class='col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 '>
			<input type='hidden' name='banner' value='$nome'>
			<button type='submit' class='btn mb-3' formaction='adminUnidade.php' style='width: 100%; margin-bottom:15px;background-color: rgba(60, 110, 143, 0.96);color: white'>$nome</button>              
		</form>
	</div>
	</div>
	        ";
}
 
// Acentuação
header("Content-Type: text/html; charset=ISO-8859-1",true);

?>