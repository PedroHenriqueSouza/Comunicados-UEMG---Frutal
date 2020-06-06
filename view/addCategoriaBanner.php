<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Banner</title>
    <link href="../img/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icom" />

    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    
    <script> 
        function excluirModal() {
            $('#excluirModal').modal('show');
            event.preventDefault();
        }

        function editarModal() {
            $('#editarModal').modal('show');
            event.preventDefault();
        }

        function vincularImagens() {
            $('#vincularImagens').modal('show');
            event.preventDefault();
        }
    </script>
   

</head>

<body id="page-top">
<?php include_once "sideBarUnidade.php"; ?>
<?php include_once "../funcoes/conexao.php"; ?>


<div class="col-12 text-center my-5">
    <h1 style="font-weight: 330; color:#4F4F4F">Cadastro de Banners</h1>
    <div class="row mt-5">
        <div class="col-12">
            <form method="post" id="cadCatBanner" action="../funcoes/categoriaBanner/cadastrarCategoria.php">
                <div class="form-row" style="width: 90%; padding:1%; margin:auto">
                    <div class="form-group text-left col-sm-6 ">
                        <label for="Banner">Banner:</label>
                        <input type="text" class="form-control" maxlength="50" minlength="5" name="categoriaBanner" id="banner" placeholder="Digite o nome do banner" required="">
                    </div>
                </div>
                <div class="form-row" style="width: 90%; padding:1%; margin:auto">
                    <div class="form-group text-left col-sm-6  ">
                        <label for="inputTv">Posição da TV:</label>
                        <select id="inputTv" class="form-control" name="inputTv">                          
                            <option >Horizontal</option>
                            <option >Vertical</option>
                        </select>
                    </div>
                </div>

                <div class="form-row" style="width: 90%;padding:1%;  margin:auto">
                    <div class="col-sm-6">
                        <button type="submit" class="btn" style="float:right;background-color:#3b6e8f;color: #FFFFFF">Cadastrar</button>
                    </div>
                </div>
            </form>

<?php
    if (isset($_SESSION["msg"])) {
        echo '
        <div class="alert alert-success"role="alert">' . $_SESSION["msg"] . '
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>';
        unset($_SESSION["msg"]);
    }
    if (isset($_SESSION["erro"])) {
        echo '
        <div class="alert alert-danger"role="alert">' . $_SESSION["erro"] . '
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>'
        ;
        unset($_SESSION["erro"]);
    }
?>

            <div class="table-responsive" style="width: 90%; padding:1%; margin:20px auto">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead">
                        <th class="text-center  text-light" style="background-color:#3b6e8f"> Banners</th>
                        <th class="text-center  text-light" style="background-color:#3b6e8f"> Posição</th>
                        <th class="text-center  text-light" style="background-color:#3b6e8f"> Ações</th>
                    </thead>

                    <?php
                    $sql = "SELECT * FROM categoria_banner WHERE id != 1";
                    $consulta = mysqli_query($conn, $sql);
                    while ($dados = mysqli_fetch_assoc($consulta)) {
                        echo "<tbody>";
                        echo "<tr>";
                        echo "<td>" . $dados['categoria'] . "</td>";
                        echo "<td>" . $dados['position'] . "</td>";
                        echo "<td>";

                        ?>
                        <form>
                            <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                            <button type="submit" style="cursor: pointer;" data-toggle="modal" data-target="#editarModal<?php echo $dados['id']; ?>" onclick="editarModal()" class=" mr-4" formaction="#"><i class="fas fa-pen-square text-primary" title="Editar" aria-hidden="true"></i></button>
                            <button type="submit" style="cursor: pointer;" data-toggle="modal" data-target="#excluirModal<?php echo $dados['id']; ?>" onclick="excluirModal()"><i class="fa fa-trash text-primary" title="Excluir" aria-hidden="true"></i></button>
                            <button type="submit" style="cursor:pointer; margin-left:23px" data-toggle="modal" data-target="#vincularModal<?php echo $dados['id'] ?>" onclick="vincularImagens()"><i class="fas fa-image text-primary" aria-hidden="true" title="Vincular"></i></button>
                        </form>
                        </td>
                        </tr>
                        </tbody>

                        <div class="modal fade" id="excluirModal<?php echo $dados['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <div class="d-flex">
                                    <h5 class="modal-title" id="exampleModalLabel">Tem certeza que deseja excluir esta categoria de Banner</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>                                                                          
                                    </div>
                                    <h6 class="modal-title">Todas as imagens vinculadas a esta categoria serão perdidas</h6>
                                    <div class="modal-footer" style=" background: transparent;border: none;">                                       
                                        <form>
                                            <a class="btn btn-danger mr-auto" type="submit" href="../funcoes/categoriaBanner/excluiCategoria.php?id=<?php echo $dados['id']; ?>">Sim, eu quero!</a>
                                            <button class="btn btn-primary" type="button" data-dismiss="modal">Ops! Não quero!</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="vincularModal<?php echo $dados['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tem certeza que deseja vincular imagens a este Banner?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-footer">
                                        <form>
                                            <button class="btn btn-secondary mr-auto" type="button" data-dismiss="modal">Ops! Não quero!</button>
                                            <a class="btn btn-primary" href="../view/uploadImagem.php?banner=<?php echo $dados['categoria']; ?>">Sim, eu quero!</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="editarModal<?php echo $dados['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Alterar Nome do Banner</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="../funcoes/categoriaBanner/editarCategoria.php">
                                            <?php
                                                $Id = $dados['id'];
                                                $sql2 = "SELECT * FROM curso WHERE id='$Id'";
                                                $consulta2 = mysqli_query($conn, $sql2);
                                                ?>
                                            <div class="form-row" style="width: 90%; padding:1%; margin:auto">
                                                <div class="form-group text-left col-sm-12">
                                                    <label for="recipient-name" class="col-form-label">Alterar:</label>
                                                    <input type="text" class="form-control" id="nome_banner" name="nome_banner" placeholder="<?php echo $dados['categoria']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-row" style="width: 90%; padding:1%; margin:auto">
                                                <div class="form-group text-left col-sm-6  ">
                                                    <label for="inputTv">Posição da TV:</label>
                                                    <select id="inputTv" class="form-control" name="editaPosition">
                                                        <option >Vertical</option>
                                                        <option >Horizontal</option>
                                                    </select>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                                        <input type="hidden" name="categoria_banner" value="<?php echo $dados['categoria']; ?>">
                                        <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Fechar</button>
                                        <button type="submit" class="btn btn-primary">Alterar</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>


<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../js/sb-admin-2.min.js"></script>


</body>
</html>

