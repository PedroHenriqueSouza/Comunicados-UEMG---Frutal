<?php 

    $imagem = $_GET['imagem'];
    $banner = $_GET['banner'];
    $id_banner = $_GET['id_banner'];
    if (file_exists($imagem)) 
    {
        unlink($imagem);
        header("Location: ../view/uploadImagem.php?banner=$banner&id_banner=$id_banner");

    }
    else
    {
        header("Location: ../view/uploadImagem.php?banner=$banner&id_banner=$id_banner"); 
    }
    
    
?>