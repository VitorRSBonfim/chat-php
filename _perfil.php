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

    <div class="container-fluid" style="overflow-x: hidden;">

        <div class="row p-0">

            <div class=" col-1"></div>
            <div class=" col-1 Menu">

                <?php

                    include_once 'Menu.php';

                ?>

            </div>
            
            <div class="col-sm-11 p-0">

                

            <!-- Modal -->
            

                <div class="row p-0" style="display: flex;">
                    <form action=""  method="post" enctype="multipart/form-data" onsubmit="return false;" name="_perfil" id="_perfil">
                        <div class="col-sm-12 TelaPerfil text-center">

                            <label class="IMGpergil" for="IMGicon">
                                <input type="file" id="IMGicon" name="IMGicon" style="visibility: hidden;">
                            </label>

                            
                            
                            <div class="nomePerfil">
                                <?php
                                    include_once 'conexao.php';
                                    try{
                                        $sql = $conn->query('
                        
                                            select nome_usuario from usuario where id_usuario = '.$_SESSION['idUsuarioLogin'].'
                        
                                        ');
                                        if($sql->rowCount()>0){
                                            foreach($sql as $linha){
                                                echo'
                
                                                <p>@'.$linha[0].'</p>

                                                ';
                                            }
                        
                                        }
                                    }catch(PDOException $erro){
                                        $erro->getMessage();
                                    }
                                ?>
                            </div>
                        </div>
                    </form>

                    <?php

                        $arquivo = $_FILES['IMGicon'];

                        try{

                            $sql = $conn->prepare('
                            
                                update usuario set
                                img_usuario = :img_usuario
                                where id_usuario = '.$_SESSION['idUsuarioLogin'].'

                            ');


                        }catch(PDOException $erro){

                            $erro->getMessage();

                        }

                    ?>

                </div>

                <div class="row p-4">
                    
                    <div class="col-sm-3 p-4 CardPerfil ">

                        <h3>Projetos</h3>

                        <?php

                            try{

                                $sql = $conn->query('
                                
                                    select  nome_projeto from projeto
                                    inner join itemProjeto 
                                    where ID_usuario_Projeto = '.$_SESSION['idUsuarioLogin'].' and ((select count(id_itemProjeto) from itemprojeto where id_projeto_itemprojeto = projeto.id_projeto) = 0) group by id_projeto

                                ');

                                if($sql->rowCount()>0){

                                    foreach($sql as $linha){

                                        echo'
                                        
                                            <h4 style="padding-top:20px;">'.$linha[0].'</h4>

                                        ';

                                    }

                                }


                            }catch(PDOException $erro){

                                $erro->getMessage();

                            }

                        ?>

                    </div>

                    <div class="col-sm-1"> <!-- gamb --> </div>

                    <div class="col-sm-4 p-4 text-center CardPerfil ">

                        <h3>Sobre mim</h3>

                        <?php

                            try{

                                $sql = $conn->query('
                                
                                    select OBS_Usuario from usuario where ID_Usuario = '.$_SESSION['idUsuarioLogin'].'

                                ');

                                if($sql->rowCount()>0){

                                    foreach($sql as $linha){

                                        echo'
                                        
                                            <h4 style="padding-top:20px;word-break: break-word;">'.$linha[0].'</h4>

                                        ';

                                    }

                                }


                            }catch(PDOException $erro){

                                $erro->getMessage();

                            }

                        ?>

                        <div class="col-sm-12 text-end">
                            <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <img src="imagens/caneta.png" alt="">
                            </button>
                        </div>

                        <form action="_perfil.php" method="post">
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel" style="color:black;">tyaltalasasda</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="_perfil.php" method="post">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <p><label for="DescricaoUsuario" style="color:black;">descrição do usuario</label></p>
                                                <textarea rows="3" name="DescricaoUsuario" id="DescricaoUsuario" autocomplete="off" class="form-control"></textarea>
                            
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">fechar</button>
                                    <button class="btn btn-primary" name="btnConcluir" id="btnConcluir" formaction="_perfil.php">concluir</button>
                                </div>
                                </div>
                            </div>
                            </div>
                        </form>

                        <?php

                            if(isset($_POST['btnConcluir'])){

                                try{

                                    $sql = $conn->prepare('
                                    
                                        update usuario set

                                        obs_usuario=:obs_usuario
                                        where id_usuario = '.$_SESSION['idUsuarioLogin'].'
                                
                                    
                                    ');

                                    $sql->execute(array(
                                    
                                        ':obs_usuario'=>$_POST['DescricaoUsuario']
                                    
                                    ));

                                    if($sql->RowCount()>0){

                                        echo '<script>window.location.assign("_perfil.php")</script>';

                                    }

                                }catch(PDOException $erro){

                                    $erro->getMessage();

                                }

                            }

                        ?>

                    </div>

                    <div class="col-sm-1"> <!-- gamb --> </div>

                    <div class="col-sm-3 p-4 CardPerfil ">

                        <h3>Amigos</h3>

                        <?php

                            try{

                                $sql = $conn->query('
                                
                                    select  nome_projeto from projeto
                                    inner join itemProjeto 
                                    where ID_usuario_Projeto = '.$_SESSION['idUsuarioLogin'].' and ((select count(id_itemProjeto) from itemprojeto where id_projeto_itemprojeto = projeto.id_projeto) = 0) group by id_projeto

                                ');

                                if($sql->rowCount()>0){

                                    foreach($sql as $linha){

                                        // echo'
                                        
                                        //     <h4 style="padding-top:20px;">'.$linha[0].'</h4>

                                        // ';

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

    </div>
    
    <script src="js/bootstrap.js"></script>

</body>

</html>