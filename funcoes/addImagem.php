<?php   
    //   $nome_banner = $_POST['banner'];
    //   $_UP['pasta'] = '../documentos/' . $nome_banner . '/';   
    
    //   $imagens = glob(   $_UP['pasta']. "*.png");
    //   // fazer echo de cada imagem
    //   foreach($imagens as $imagem){
    //     echo '<img src="'.$imagem.'" style="width: 100px;height: 100px;border: 1px solid #000;"/>';
    //   }
   
      $id = $_POST['id'];


for($i=1;$i<=$id;$i++){
    echo '<label>Sub opção '.$i.'</label>';
}
?>