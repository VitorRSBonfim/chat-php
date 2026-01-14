
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

            <div class="col-11">

                <div class="col-12 p-3 mt-3 mb-3 TelaGrupo">

                    <?php 

                        include_once 'conexao.php';

                        try{

                            $sql = $conn->query('

                            select grupo.*,itemGrupo.ID_Usuario_ItemGrupo,itemGrupo.ID_Grupo_ItemGrupo from grupo
                            inner join
                                itemGrupo
                            on grupo.ID_Grupo = itemGrupo.ID_Grupo_ItemGrupo where itemGrupo.ID_Grupo_ItemGrupo = '.$_GET['idGrupo'].' and tipo_grupo = "Estudos"

                            ');

                            if($sql->rowCount()>0){

                                foreach($sql as $linha){

                                    echo'
                                    
                                        <div class="row " style="display: flex;">

                                            <div class="col-sm-3 ">
                                        
                                                <h1>'.$linha[3].'</h1>
                                                
                                            </div>

                                            <div class="col-sm-3" style="display:flex;">
                                                
                                                <div ><img src="imagens/ensino.png"></div>
                                                <h2 style="padding-left: 10px;padding-top: 8px;">'.$linha[4].'</h2>
                                            
                                            </div>

                                            <div class="col-sm-6 ItemGrupo" style="display: flex; text-align: end; justify-content: end;">
                                        
                                                <a href="_grupos.php" style="display: flex; text-decoration: none; color: black;">
                                                    
                                                    <h2>voltar</h2>
                                                    <div ><img src="imagens/voltarIcon.png"></div>
                                                
                                                </a>
                                            
                                            </div>

                                            <div class="col-sm-12 pt-3">

                                                <h5>descrição do grupo:</h5>
                                                <p>'.$linha[5].'</p>

                                            </div>

                                        </div>

                                    ';

                                }

                            }

                            $sql = $conn->query('

                            select grupo.*,itemGrupo.ID_Usuario_ItemGrupo,itemGrupo.ID_Grupo_ItemGrupo from grupo
                            inner join
                                itemGrupo
                            on grupo.ID_Grupo = itemGrupo.ID_Grupo_ItemGrupo where itemGrupo.ID_Grupo_ItemGrupo = '.$_GET['idGrupo'].' and tipo_grupo = "Empresarial"

                            ');

                            if($sql->rowCount()>0){

                                foreach($sql as $linha){

                                    echo'
                                    
                                        <div class="row " style="display: flex;">

                                            <div class="col-sm-3 ">
                                        
                                                <h1>'.$linha[3].'</h1>
                                                
                                            </div>

                                            <div class="col-sm-3" style="display:flex;">
                                        
                                                <div ><img src="imagens/empresa.png"></div>
                                                <h2 style="padding-left: 10px;padding-top: 8px;">'.$linha[4].'</h2>
                                            
                                            </div>

                                            <div class="col-sm-6 ItemGrupo" style="display: flex; text-align: end; justify-content: end;">
                                        
                                                <a href="_grupos.php" style="display: flex; text-decoration: none; color: black;">
                                                    
                                                    <h2>voltar</h2>
                                                    <div ><img src="imagens/voltarIcon.png"></div>
                                                
                                                </a>
                                            
                                            </div>

                                            <div class="col-sm-12 pt-3">

                                                <h5>descrição do grupo:</h5>
                                                <p>'.$linha[5].'</p>

                                            </div>

                                        </div>

                                    ';

                                }

                            }

                            $sql = $conn->query('

                            select grupo.*,itemGrupo.ID_Usuario_ItemGrupo,itemGrupo.ID_Grupo_ItemGrupo from grupo
                            inner join
                                itemGrupo
                            on grupo.ID_Grupo = itemGrupo.ID_Grupo_ItemGrupo where itemGrupo.ID_Grupo_ItemGrupo = '.$_GET['idGrupo'].' and tipo_grupo = "Geral"

                            ');

                            if($sql->rowCount()>0){

                                foreach($sql as $linha){

                                    echo'
                                    
                                        <div class="row " style="display: flex;">

                                            <div class="col-sm-3 ">
                                        
                                                <h1>'.$linha[3].'</h1>
                                                
                                            </div>

                                            <div class="col-sm-3" style="display:flex;">

                                                <div ><img src="imagens/geral.png"></div>
                                                <h2 style="padding-left: 10px;padding-top: 8px;">'.$linha[4].'</h2>
                                            
                                            </div>

                                            <div class="col-sm-6 ItemGrupo" style="display: flex; text-align: end; justify-content: end;">
                                        
                                                <a href="_grupos.php" style="display: flex; text-decoration: none; color: black;">
                                                    
                                                    <h2>voltar</h2>
                                                    <div ><img src="imagens/voltarIcon.png"></div>
                                                
                                                </a>
                                            
                                            </div>

                                            <div class="col-sm-12 pt-3">

                                                <h5>descrição do grupo:</h5>
                                                <p>'.$linha[5].'</p>

                                            </div>

                                        </div>

                                    ';

                                }
                            }

                        }catch(PDOException $erro){

                            $erro ->getMessage();

                        }

                    ?>

                    <div class="row">
                        <div class="col-sm-9">
                            <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Criar projeto
                            </button>
                            <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                                Criar Tarefa
                            </button>
                        
                        </div>
                        <div class="col-sm-3" >
                            <form action="TelaGrupo.php?idGrupo=<?=$_GET['idGrupo']?>" method="post">
                            
                                <div class="info">
                                    <p>
                                        <button class="btn btn-light" formaction="TelaGrupo.php?idGrupo=<?=$_GET['idGrupo']?>" name="BTOFiltro" id="BTOFiltro" style="margin-right: 30px;">&#128269;</button>
                                    </p>
                                    <div class="filtro">
                                        <select class="form-select" name="filtroTXTGP" id="filtroTXTGP">
                                            <option value="" disabled selected>filtrar tarefas...</option>
                                            <option value="TODAS">todas</option>
                                            <option value="PENDENTE">pendente</option>
                                            <option value="ANDAMENTO">andamento</option>
                                            <option value="CONCLUIDA">concluidas</option>
                                            <?php
                                                include_once('conexao.php');
                                                $sql = $conn->query('
                                                select Projeto.* from Projeto
                                                inner join itemprojeto where ID_Usuario_PROJETO = '.$_SESSION['idUsuarioLogin'].'
                                                and ((select count(id_itemprojeto) from itemprojeto where id_PROJETO_itemprojeto = projeto.id_projeto) = 1) group by id_projeto
                        
                                                ');
                                                try {
                                                    foreach ($sql as $linha) {
                                                        echo "<option value='$linha[0]'>$linha[3]</option>";
                                                    }
                                                } catch (PDOException $erro) {
                                                    $mensagem = $erro->getMessage();
                                                }
                        
                                            ?>
                                        </select>
                                    </div>
                                </div>
                           </form>
                        </div> 
                    </div>

                        <form action="TelaGrupo.php?idGrupo=<?=$_GET['idGrupo']?>" method="post">
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Criar projeto para o grupo!</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <?php
                                                include_once 'CriarProjetoGrupo.php';
                                            ?>
                                            <?php
                                                include_once 'CadastrarProjetoGrupo.php';
                                            ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button  class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                            <button name="btnCriarProjGP" id="btnCriarProjGP" formaction="TelaGrupo.php?idGrupo=<?=$_GET['idGrupo']?>" class="btn btn-primary">Criar Projeto</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <form action="TelaGrupo.php?idGrupo=<?=$_GET['idGrupo']?>" method="post">
                        
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel1">Criar Tarefa para o grupo!</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <?php

                                                include_once 'CriarTarefaGrupo.php';

                                            ?>
                                            <?php

                                                include_once 'CadastrarTarefaGrupo.php';

                                            ?>
                                            
                                        </div>
                                        <div class="modal-footer">

                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                            <button name="btnCriarTareGP" id="btnCriarTareGP" formaction="TelaGrupo.php?idGrupo=<?=$_GET['idGrupo']?>" class="btn btn-primary">Criar</button>

                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                        </form>

                    <div class="col-sm-12">

                        <div class="row p-0 m-0">

                            <?php

                                if(!isset($_POST['BTOFiltro'])){
                                    try{

                                        $sql= $conn->query('
                                
                                        select tarefa.*,itemTarefa.ID_Tarefa_itemTarefa,itemTarefa.ID_Grupo_itemTarefa,Projeto.Nome_projeto from tarefa
                                        inner join Projeto
                                        on projeto.ID_projeto = ID_Projeto_Tarefa
                                        inner join itemTarefa
                                        on tarefa.ID_tarefa = itemTarefa.ID_Tarefa_itemTarefa where itemTarefa.ID_Grupo_itemTarefa = '.$_GET['idGrupo'].'
                                        and Status_Tarefa = "PENDENTE"
                                
                                        ');
                                        echo '<div class="col-sm-4 p-4 text-center">';
                                        echo '<h1 style="display:none;">.</h1>';
                                        if($sql->rowCount()>0){
                                            $data = $linha[5];
                                            $data = substr($linha[5], 0, 10);
                                            $data = date("d/m/Y");
                                            foreach($sql as $linha){
                                            echo '
                                                <div class="cartao p-4 mb-4" style="position:relative">
                                                <form action="TelaGrupo.php?idGrupo='.$_GET['idGrupo'].'" method="post">
                                                    <h3 >
                                                    '.$linha[3].
                                                    '
                                                    <p class="pendente"></p>
                                                    </h3>
                                                    <h5>
                                                    '.$linha[10].
                                                    '</h5>
                                
                                                    <p>Fim da tarefa em: '.$data.'</p>
                                                    <p>'.$linha[6].'</p>
                                                    <p>'.$linha[7].'</p>
                                                    <h3><button class= "btn btn-danger" name="btoPendenteGP" id="btoPendenteGP">Finalizar</button></h3>
                                                    <input type="number" name="IDtar" style="display:none;" value="'.$linha[0].'">
                                
                                                    </div>
                                                </form>
                                            ';
                                            }
                                        }
                                        echo '</div>';
                                        $sql= $conn->query('
                                
                                        select tarefa.*,itemTarefa.ID_Tarefa_itemTarefa,itemTarefa.ID_Grupo_itemTarefa,Projeto.Nome_projeto from tarefa
                                        inner join Projeto
                                        on projeto.ID_projeto = ID_Projeto_Tarefa
                                        inner join itemTarefa
                                        on tarefa.ID_tarefa = itemTarefa.ID_Tarefa_itemTarefa where itemTarefa.ID_Grupo_itemTarefa = '.$_GET['idGrupo'].'
                                        and Status_Tarefa = "ANDAMENTO"
                                
                                        ');
                                        echo '<div class="col-sm-4 p-4 text-center">';
                                        echo '<h1 style="display:none;">.</h1>';
                                        if($sql->rowCount()>0){
                                            $data = $linha[5];
                                            $data = substr($linha[5], 0, 10);
                                            $data = date("d/m/Y");
                                            foreach($sql as $linha){
                                
                                                echo '
                                                <div class="cartao p-4 mb-4" style="position:relative">
                                                <form action="TelaGrupo.php?idGrupo='.$_GET['idGrupo'].'" method="post">
                                                    <h3 >
                                                    '.$linha[3].
                                                    '
                                                    <p class="andamento"></p>
                                                    </h3>
                                                    <h5>
                                                    '.$linha[10].
                                                    '</h5>
                                
                                                    <p>Fim da tarefa em: '.$data.'</p>
                                                    <p>'.$linha[6].'</p>
                                                    <p>'.$linha[7].'</p>
                                                    <h3><button class= "btn btn-warning" name="btoAndamentoGP" id="btoAndamentoGP">Finalizar</button></h3>
                                                    <input type="number" name="IDtar" style="display:none;" value="'.$linha[0].'">
                                
                                                    </div>
                                                </form>
                                                ';
                                
                                            }
                                        }
                                        echo '</div>';
                                        $sql= $conn->query('
                                
                                        select tarefa.*,itemTarefa.ID_Tarefa_itemTarefa,itemTarefa.ID_Grupo_itemTarefa,Projeto.Nome_projeto from tarefa
                                        inner join Projeto
                                        on projeto.ID_projeto = ID_Projeto_Tarefa
                                        inner join itemTarefa
                                        on tarefa.ID_tarefa = itemTarefa.ID_Tarefa_itemTarefa where itemTarefa.ID_Grupo_itemTarefa = '.$_GET['idGrupo'].'
                                        and Status_Tarefa = "CONCLUIDA"
                                
                                        ');
                                        echo '<div class="col-sm-4 p-4 text-center">';
                                        echo '<h1 style="display:none;">.</h1>';
                                        if($sql->rowCount()>0){
                                            $data = $linha[5];
                                            $data = substr($linha[5], 0, 10);
                                            $data = date("d/m/Y");
                                            foreach($sql as $linha){
                                
                                                echo '
                                                <div class="cartao p-4 mb-4" style="position:relative">
                                                <form action="TelaGrupo.php?idGrupo='.$_GET['idGrupo'].'" method="post">
                                                    <h3 >
                                                    '.$linha[3].
                                                    '
                                                    <p class="concluida"></p>
                                                    </h3>
                                                    <h5>
                                                    '.$linha[10].
                                                    '</h5>
                                
                                                    <p>Fim da tarefa em: '.$data.'</p>
                                                    <p>'.$linha[6].'</p>
                                                    <p>'.$linha[7].'</p>
                                                    <h3><button class= "btn btn-success" name="btoConcluidaGP" id="btoConcluidaGP">Finalizar</button></h3>
                                                    <input type="number" name="IDtar" style="display:none;" value="'.$linha[0].'">
                                
                                                    </div>
                                                </form>
                                                ';
                                            }
                                        }
                                        echo '</div>';
                                        if($_POST){
                                            include_once 'AlterarTarefas.php';
                                
                                        }
                                
                                    }catch(PDOException $erro){
                                        $erro->getMessage();
                                    }

                                }
                                if(isset($_POST['BTOFiltro'])){

                                    include_once 'FiltroTarefas.php';
                        
                                }
                            ?>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <script src="js/bootstrap.js"></script>
    
</body>

</html>