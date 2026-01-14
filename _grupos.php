<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PurpleBase</title>

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="style.css">


</head>

<body>

    <?php include_once("_autenticar.php");?>

    <div class="container-fluid">

        <div class="row p-0">
            
            <div class=" col-1"></div>
            <div class=" col-1 Menu">

                <?php

                    include_once 'Menu.php';

                ?>

            </div>

            <div class="col-11 p-0">
                
                <div class="row header">

                    <div class="col-sm-10">

                        <form action="_grupos.php" method="post" class="HeaderHome">

                            <div class="col-sm-9">
                                <div class="info">
                                    <h3>Grupos</h3>
                                    <!-- Button trigger modal -->
                                    
                                    <button type="button" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Criar grupo
                                    </button>

                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">

                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Criar Grupo!</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                            <div class="modal-body">

                                                <?php

                                                    include_once 'criarGrupo.php';

                                                ?>

                                                <?php

                                                    include_once 'cadastrarGrupo.php';

                                                ?>
                                               
                                            </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <button class="btn btn-primary"  name="btnCriarGP" id="btnCriarGP" formaction="_grupos.php">Criar</button>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </form>

                    </div>

                    <div class="col-sm-2 InfoLogin">

                        <p>ID: <?=$idUsuarioSessao?><br>
                        nome: <?=$nomeUsuarioSessao?><br>
                        </p>
                
                        <a href="_logoff.php" class="btn btn-danger">Sair</a>
                
                    </div>

                </div>

                <div class="row p-0 m-0">

                    <?php

                        include_once 'conexao.php';

                        try{

                            $sql = $conn->query('
                            
                                select grupo.*,itemGrupo.ID_Usuario_ItemGrupo,itemGrupo.ID_Grupo_ItemGrupo from grupo
                                inner join
                                    itemGrupo
                                on grupo.ID_Grupo = itemGrupo.ID_Grupo_ItemGrupo where itemGrupo.ID_Usuario_ItemGrupo = '.$_SESSION['idUsuarioLogin'].'

                            ');

                            if($sql->rowCount()>0){

                                foreach($sql as $linha){

                                    echo '<div class="col-sm-4 p-4 text-center">';

                                    echo '<div class="cartao p-4 mb-4" style="position:relative">
                                        <form action="_grupos.php" method="post">
                                                <h3>
                                                '.$linha[3].
                                                '
                                                </h3>
                                                <h5>
                                                '.$linha[4].
                                                '</h5>
                                                <p>'.$linha[0].'</p>
                                                <p>'.$linha[5].'</p>
                                                <h3><a href="TelaGrupo.php?idGrupo='.$linha[0].' "class="btn btn-light">></a></h3>
                                                <input type="number" name="IDgp" style="display:none;" value="'.$linha[0].'">
                                                
                                            </div>
                                        </form>
                                    ';

                                    echo '</div>';

                                }

                            }

                        }catch(PDOException $erro){

                            $erro->getMessage();

                        }

                
                    ?>

                </div>

            </div>

        </div>

    </div>

    
    
    <script src="js/bootstrap.js"></script>

</body>

</html>