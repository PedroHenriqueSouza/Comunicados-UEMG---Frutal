

<?php 
    $dir = $_POST['banner'];
    $nome_banner = $_POST['nomebanner'];
    
          if (is_dir($dir)) {

              $iterator = new \FilesystemIterator($dir);

              if ($iterator->valid()) {

                  $di = new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS);
                  $ri = new RecursiveIteratorIterator($di, RecursiveIteratorIterator::CHILD_FIRST);

                  foreach ( $ri as $file ) {

                      $file->isDir() ?  rmdir($file) : unlink($file);
                  }
              }
          } 
          echo 1;
        //header('Location: ../view/uploadImagem.php?banner='.$nome_banner.'') 
?>