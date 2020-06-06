<?php include_once '../funcoes/conexao.php';

$id = $_GET['id'];

$sql = "DELETE FROM categoria_banner WHERE id='$id'";
$update = mysqli_query( $conn, $sql );

if ( $update ) {
    header( 'Location: ../view/addCategoriaBanner.php' );
} else {
    header( 'Location: ../view/inicio.php' );
}

?>