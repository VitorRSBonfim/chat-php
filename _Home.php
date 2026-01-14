
<div class="row header">

    <div class="col-sm-10">

            <form action="Main.php" method="post" class="HeaderHome">

                <div class="col-sm-9">
                    <div class="info">
                        <h3>Area de trabalho</h3>
                        <!-- Button trigger modal -->
                        
                        <button type="button" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Criar Projeto
                        </button>
                        
                        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                            criar Tarefa
                        </button>
                    </div>
                </div>
                
                    <div class="col-sm-3 text-end" style="padding-right: 50px;">
                        <form action="Main.php" method="post">
                            <div class="info">
                                <p>
                                    <button class="btn btn-light" formaction="Main.php" name="BTOFiltro" id="BTOFiltro" style="margin-right: 30px;">&#128269;</button>
                                </p>
                                <div class="filtro">
                                    <select class="form-select" name="filtroTXT" id="filtroTXT">
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
                                            and ((select count(id_itemprojeto) from itemprojeto where id_PROJETO_itemprojeto = projeto.id_projeto) = 0) group by id_projeto
                        
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
                

                

                <!-- Modal -->
                <form action="Main.php" method="post">
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Criar Projeto!</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <?php
                    
                                        include_once 'criarProjeto.php';
                    
                                    ?>
                                    <?php
                                        include_once 'cadastrarProjeto.php';
                                    ?>
                                </div>
                                <div class="modal-footer">
                    
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                    <button class="btn btn-primary" name="btnCriarProj" id="btnCriarProj" formaction="Main.php">Criar</button>
                    
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </form>
            
                <!-- Button trigger modal -->
                
            <form action="Main.php" method="post" class="HeaderHome">
                <!-- Modal -->
                <div class="modal fade" id="exampleModal2" tabindex="0" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel2">Criar tarefas!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php
                
                            include_once 'criarTarefa.php';  
                              
                        ?>
                        <?php

                            include_once 'cadastrarTarefa.php';

                        ?>
                    </div>
                    <div class="modal-footer">
                        
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" name="btnCriarTare" id="btnCriarTare" formaction="Main.php">Criar</button>

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

<!-- '.$_SESSION['idUsuarioLogin'] -->

<div class="row p-0 m-0">

    <?php

        if(!isset($_POST['BTOFiltro'])){
            
            

            include_once 'conexao.php';
             
            try{
                $sql = $conn->query('
                
                select tarefa.*,Projeto.ID_Projeto,Projeto.nome_projeto from tarefa
                inner join itemTarefa
                inner join Projeto
                on tarefa.ID_Projeto_Tarefa = Projeto.ID_Projeto where ID_Usuario_Tarefa = '.$_SESSION['idUsuarioLogin'].' 
                and Status_Tarefa = "PENDENTE" and  ((select count(id_itemtarefa) from itemtarefa where id_tarefa_itemtarefa = tarefa.id_tarefa) = 0) group by id_tarefa
                
                ');

                echo '<div class="col-sm-4 p-4 text-center">';
                echo '<h1 style="display:none;">PENDENTE</h1><hr>';

                if($sql->rowCount()>0){

                  
                    foreach($sql as $linha){

                        $data = $linha[4];
                        $data = substr($linha[4], 0, 10);
                        $data = date("d/m/Y");

                        echo '<div class="cartao p-4 mb-4" style="position:relative">
                            <form action="Main.php" method="post">
                            
                                    <h3 >
                                    '.$linha[3].
                                    '
                                    <p class="pendente"></p>
                                    </h3>
                                    <h5>
                                    '.$linha[9].
                                    '</h5>
                                    <p>'.$linha[0].'</p>
                                    <p>Fim da tarefa em: '.$data.'</p>
                                    <p>'.$linha[6].'</p>
                                    <p>'.$linha[7].'</p>
                                    <h3><button class= "btn btn-danger" name="btoPendente" id="btoPendente">Iniciar</button></h3>
                                    <input type="number" name="IDtar" style="display:none;" value="'.$linha[0].'">
                                    
                                </div>
                            </form>
                        ';
                    }
                
                }

                echo '</div>';

                $sql = $conn->query('
                
                select tarefa.*,Projeto.ID_Projeto,Projeto.nome_projeto from tarefa
                inner join itemTarefa
                inner join Projeto
                on tarefa.ID_Projeto_Tarefa = Projeto.ID_Projeto where ID_Usuario_Tarefa = '.$_SESSION['idUsuarioLogin'].' 
                and Status_Tarefa = "ANDAMENTO" and  ((select count(id_itemtarefa) from itemtarefa where id_tarefa_itemtarefa = tarefa.id_tarefa) = 0) group by id_tarefa
                
                ');

                echo '<div class="col-sm-4 p-4 text-center">';
                echo '<h1 style="display:none;">ANDAMENTO</h1><hr>';

                if($sql->rowCount()>0){

                    foreach($sql as $linha){

                        $data = $linha[4];
                        $data = substr($linha[4], 0, 10);
                        $data = date("d/m/Y");

                        echo '<div class="cartao p-4 mb-4" style="position:relative">
                            <form action="Main.php" method="post">
                                    <h3 >
                                    '.$linha[3].
                                    '
                                    <p class="andamento"></p>
                                    </h3>
                                    <h5>
                                    '.$linha[9].
                                    '</h5>
                                    <p>'.$linha[0].'</p>
                                    <p>Fim da tarefa em: '.$data.'</p>
                                    <p>'.$linha[6].'</p>
                                    <p>'.$linha[7].'</p>
                                    <h3><button class= "btn btn-warning" name="btoAndamento" id="btoAndamento">Finalizar</button></h3>
                                    <input type="number" name="IDtar" style="display:none;" value="'.$linha[0].'">
                                    
                                </div>
                            </form>
                        ';
                    }
                
                }

                echo '</div>';

                $sql = $conn->query('
                
                select tarefa.*,Projeto.ID_Projeto,Projeto.nome_projeto from tarefa
                inner join itemTarefa
                inner join Projeto
                on tarefa.ID_Projeto_Tarefa = Projeto.ID_Projeto where ID_Usuario_Tarefa = '.$_SESSION['idUsuarioLogin'].' 
                and Status_Tarefa = "CONCLUIDA" and  ((select count(id_itemtarefa) from itemtarefa where id_tarefa_itemtarefa = tarefa.id_tarefa) = 0) group by id_tarefa
                
                ');

                echo '<div class="col-sm-4 p-4 text-center">';
                echo '<h1 style="display:none;">CONCLUIDO</h1><hr>';

                if($sql->rowCount()>0){

                   
                    foreach($sql as $linha){

                        $data = $linha[4];
                        $data = substr($linha[4], 0, 10);
                        $data = date("d/m/Y");

                        echo '<div class="cartao p-4 mb-4" style="position:relative">
                            <form action="Main.php" method="post">
                                    <h3 >
                                    '.$linha[3].
                                    '
                                    <p class="concluida"></p>
                                    </h3>
                                    <h5>
                                    '.$linha[9].
                                    '</h5>
                                    <p>'.$linha[0].'</p>
                                    <p>Fim da tarefa em: '.$data.'</p>
                                    <p>'.$linha[6].'</p>
                                    <p>'.$linha[7].'</p>
                                    <h3><button class= "btn btn-success" name="btoConcluida" id="btoConcluida">Apagar</button></h3>
                                    <input type="number" name="IDtar" style="display:none;" value="'.$linha[0].'">

                                </form>
                                    
                                </div>
                        ';
                    }
                
                }

                echo '</div>';

                if($_POST){

                    include_once 'AlterarTarefas.php';
                    
                }

            }catch(PDOException $erro){

                echo $erro ->getMessage();

            }

        } 
        if(isset($_POST['BTOFiltro'])){

            include_once 'FiltroTarefas.php';

        }
        
    ?>

    </div>