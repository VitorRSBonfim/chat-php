<?php
// print_r($_POST);

    // a variavel de filtro esta sendo usada para pegar tanto o id do projeto como o status da tarefa do combo box
    if(isset($_POST['filtroTXT'])){

        $filtro = $_POST['filtroTXT'];

        if($filtro == "TODAS"){

            echo '<script>window.location.assign("Main.php")</script>';
    
        }

        if($filtro == "PENDENTE"){

            try{
    
                $sql = $conn->query('
                    
                select tarefa.*,Projeto.ID_Projeto,Projeto.nome_projeto from tarefa
                inner join itemTarefa
                inner join Projeto
                on tarefa.ID_Projeto_Tarefa = Projeto.ID_Projeto where ID_Usuario_Tarefa = '.$_SESSION['idUsuarioLogin'].' 
                and Status_Tarefa = "PENDENTE" and  ((select count(id_itemtarefa) from itemtarefa where id_tarefa_itemtarefa = tarefa.id_tarefa) = 0) group by id_tarefa
                    
                ');
    
                echo '<div class="col-sm-4 p-4 text-center">';
                echo '<h1>PENDENTE</h1><hr>';
    
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
    
            }catch(PDOException $erro){
    
                $erro->getMessage();
    
            }

        }

        if($filtro == "ANDAMENTO"){

            try{
    
                $sql = $conn->query('
                    
                select tarefa.*,Projeto.ID_Projeto,Projeto.nome_projeto from tarefa
                inner join itemTarefa
                inner join Projeto
                on tarefa.ID_Projeto_Tarefa = Projeto.ID_Projeto where ID_Usuario_Tarefa = '.$_SESSION['idUsuarioLogin'].' 
                and Status_Tarefa = "ANDAMENTO" and  ((select count(id_itemtarefa) from itemtarefa where id_tarefa_itemtarefa = tarefa.id_tarefa) = 0) group by id_tarefa
                    
                ');
    
                echo '<div class="col-sm-4 p-4 text-center">';
                echo '<h1>ANDAMENTO</h1><hr>';
    
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
    
            }catch(PDOException $erro){
    
                $erro->getMessage();
            }
    
        }

        if($filtro == "CONCLUIDA"){

            try{
    
                $sql = $conn->query('
                    
                select tarefa.*,Projeto.ID_Projeto,Projeto.nome_projeto from tarefa
                inner join itemTarefa
                inner join Projeto
                on tarefa.ID_Projeto_Tarefa = Projeto.ID_Projeto where ID_Usuario_Tarefa = '.$_SESSION['idUsuarioLogin'].' 
                and Status_Tarefa = "CONCLUIDA" and  ((select count(id_itemtarefa) from itemtarefa where id_tarefa_itemtarefa = tarefa.id_tarefa) = 0) group by id_tarefa
                    
                ');
    
                echo '<div class="col-sm-4 p-4 text-center">';
                echo '<h1>CONCLUIDA</h1><hr>';
    
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
                                    
                                </div>
                            </form>
                        ';
                    }
        
                }
    
                echo '</div>';
    
            }catch(PDOException $erro){
    
                $erro->getMessage();
            }
        }else{

            try{
    
                echo'<script>alert("testeee")</script>';

                // select apenas para buscar o titulo do projeto
    
                $sql = $conn-> query('
                
                    select * from projeto
                    inner join itemProjeto 
                    where ID_Projeto = '.$filtro.' and ((select count(id_itemProjeto) from itemprojeto where id_projeto_itemprojeto = projeto.id_projeto) = 0) group by id_projeto
    
                ');
    
                if($sql->rowCount()>0){
    
                    foreach($sql as $linha){
    
                        echo '<div class="col-sm-12 p-3 text-center">';
    
                        echo '<h3>'.$linha[3].'</h3>';
    
                        echo '</div>';
    
                    }
                
                }
    
    
                $sql = $conn-> query('
    
                select tarefa.*,Projeto.ID_Projeto,Projeto.nome_projeto from tarefa
                inner join
                    Projeto
                on tarefa.ID_Projeto_Tarefa = Projeto.ID_Projeto where ID_Usuario_Tarefa = '.$_SESSION['idUsuarioLogin'].'
                and Projeto.ID_Projeto = '.$filtro.' and Status_Tarefa = "PENDENTE" 
                
                ');
    
                
    
                if($sql->rowCount()>0){
    
                    echo '<div class="col-sm-4 p-4 text-center">';
    
                    foreach($sql as $linha){
    
                        $data = $linha[4];
                        $data = substr($linha[4], 0, 10);
                        $data = date("d/m/Y");
    
                        echo '<div class="cartao p-4 mb-4" style="position:relative">
                            <form action="Main.php" method="post">
                            
                                    <h3>
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
                    
                    echo '</div>';
    
                }
    
                $sql = $conn-> query('
    
                select tarefa.*,Projeto.ID_Projeto,Projeto.nome_projeto from tarefa
                inner join
                    Projeto
                on tarefa.ID_Projeto_Tarefa = Projeto.ID_Projeto where ID_Usuario_Tarefa = '.$_SESSION['idUsuarioLogin'].'
                and Projeto.ID_Projeto = '.$filtro.' and Status_Tarefa = "ANDAMENTO" 
                
                ');
    
                if($sql->rowCount()>0){
    
                    echo '<div class="col-sm-4 p-4 text-center">';
    
                    foreach($sql as $linha){
    
                        $data = $linha[4];
                        $data = substr($linha[4], 0, 10);
                        $data = date("d/m/Y");
    
                        echo '<div class="cartao p-4 mb-4" style="position:relative">
                            <form action="Main.php" method="post">
                            
                                    <h3>
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
                                    <h3><button class= "btn btn-warning" name="btoAndamento" id="btoAndamento">Iniciar</button></h3>
                                    <input type="number" name="IDtar" style="display:none;" value="'.$linha[0].'">
                                    
                                </div>
                            </form>
                        ';
    
                    }
    
                    echo '</div>';
    
                }
    
                $sql = $conn-> query('
    
                select tarefa.*,Projeto.ID_Projeto,Projeto.nome_projeto from tarefa
                inner join
                    Projeto
                on tarefa.ID_Projeto_Tarefa = Projeto.ID_Projeto where ID_Usuario_Tarefa = '.$_SESSION['idUsuarioLogin'].'
                and Projeto.ID_Projeto = '.$filtro.' and Status_Tarefa = "CONCLUIDA" 
                
                ');
    
                if($sql->rowCount()>0){
    
                    echo '<div class="col-sm-4 p-4 text-center">';
    
                    foreach($sql as $linha){
    
                        $status = $linha[7];
    
                        $data = $linha[4];
                        $data = substr($linha[4], 0, 10);
                        $data = date("d/m/Y");
    
                        echo '<div class="cartao p-4 mb-4" style="position:relative">
                            <form action="Main.php" method="post">
                            
                                <h3>
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
                                <h3><button class= "btn btn-success" name="btoConcluida" id="btoConcluida">Iniciar</button></h3>
                                <input type="number" name="IDtar" style="display:none;" value="'.$linha[0].'">
                                    
                                </div>
                            </form>
                        ';
    
                    }
    
                    echo '</div>';
    
                }

                $sql = $conn-> query('
    
                select tarefa.*,Projeto.ID_Projeto,Projeto.nome_projeto from tarefa
                inner join
                    Projeto
                on tarefa.ID_Projeto_Tarefa = Projeto.ID_Projeto where ID_Usuario_Tarefa = '.$_SESSION['idUsuarioLogin'].'
                and Projeto.ID_Projeto = '.$filtro.'
                
                ');

                if($sql->rowCount()==0){

                    echo'
                    
                        <div class="col-sm-12 text-center"><h3>nenhuma tarefa nesse projeto!</h3></div>
                    
                    ';

                }
    
                
    
            }catch(PDOException $erro){
    
                $erro->getMessage();
    
            } 

        }
    }
    if(isset($_POST['filtroTXTGP'])){

        $filtroGP = $_POST['filtroTXTGP'];

        if($filtroGP == "TODAS"){

            echo '<script>window.location.assign("TelaGrupo.php?idGrupo='.$_GET['idGrupo'].'")</script>';
    
        }
        
        if($filtroGP == "PENDENTE"){
    
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
                            <h3><button class= "btn btn-danger" name="btoPendenteGP" id="btoPendenteGP">Começar</button></h3>
                            <input type="number" name="IDtar" style="display:none;" value="'.$linha[0].'">
        
                            </div>
                        </form>
                    ';
                    }
                }
                echo '</div>';
    
        }

        if($filtroGP == "ANDAMENTO"){
    
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
    
        }

        if($filtroGP == "CONCLUIDA"){
    
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

                
    
        }else{

            try{
    
                echo'<script>alert("testeee")</script>';

                // select apenas para buscar o titulo do projeto
    
                $sql = $conn-> query('
                
                    select * from projeto
                    inner join itemProjeto 
                    where ID_Projeto = '.$filtroGP.' and ((select count(id_itemProjeto) from itemprojeto where id_projeto_itemprojeto = projeto.id_projeto) = 1) group by id_projeto
    
                ');
    
                if($sql->rowCount()>0){
    
                    foreach($sql as $linha){
    
                        echo '<div class="col-sm-12 p-3 text-center">';
    
                        echo '<h3>'.$linha[3].'</h3>';
    
                        echo '</div>';
    
                    }
                
                }
    
    
                $sql = $conn-> query('
    
                select tarefa.*,Projeto.ID_Projeto,Projeto.nome_projeto from tarefa
                inner join
                    Projeto
                on tarefa.ID_Projeto_Tarefa = Projeto.ID_Projeto where ID_Usuario_Tarefa = '.$_SESSION['idUsuarioLogin'].'
                and Projeto.ID_Projeto = '.$filtroGP.' and Status_Tarefa = "PENDENTE" 
                
                ');
    
                
    
                if($sql->rowCount()>0){
    
                    echo '<div class="col-sm-4 p-4 text-center">';
    
                    foreach($sql as $linha){
    
                        $data = $linha[4];
                        $data = substr($linha[4], 0, 10);
                        $data = date("d/m/Y");
    
                        echo '<div class="cartao p-4 mb-4" style="position:relative">
                            <form action="Main.php" method="post">
                            
                                    <h3>
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
                    
                    echo '</div>';
    
                }
    
                $sql = $conn-> query('
    
                select tarefa.*,Projeto.ID_Projeto,Projeto.nome_projeto from tarefa
                inner join
                    Projeto
                on tarefa.ID_Projeto_Tarefa = Projeto.ID_Projeto where ID_Usuario_Tarefa = '.$_SESSION['idUsuarioLogin'].'
                and Projeto.ID_Projeto = '.$filtroGP.' and Status_Tarefa = "ANDAMENTO" 
                
                ');
    
                if($sql->rowCount()>0){
    
                    echo '<div class="col-sm-4 p-4 text-center">';
    
                    foreach($sql as $linha){
    
                        $data = $linha[4];
                        $data = substr($linha[4], 0, 10);
                        $data = date("d/m/Y");
    
                        echo '<div class="cartao p-4 mb-4" style="position:relative">
                            <form action="Main.php" method="post">
                            
                                    <h3>
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
                                    <h3><button class= "btn btn-warning" name="btoAndamento" id="btoAndamento">Iniciar</button></h3>
                                    <input type="number" name="IDtar" style="display:none;" value="'.$linha[0].'">
                                    
                                </div>
                            </form>
                        ';
    
                    }
    
                    echo '</div>';
    
                }
    
                $sql = $conn-> query('
    
                select tarefa.*,Projeto.ID_Projeto,Projeto.nome_projeto from tarefa
                inner join
                    Projeto
                on tarefa.ID_Projeto_Tarefa = Projeto.ID_Projeto where ID_Usuario_Tarefa = '.$_SESSION['idUsuarioLogin'].'
                and Projeto.ID_Projeto = '.$filtroGP.' and Status_Tarefa = "CONCLUIDA" 
                
                ');
    
                if($sql->rowCount()>0){
    
                    echo '<div class="col-sm-4 p-4 text-center">';
    
                    foreach($sql as $linha){
    
                        $status = $linha[7];
    
                        $data = $linha[4];
                        $data = substr($linha[4], 0, 10);
                        $data = date("d/m/Y");
    
                        echo '<div class="cartao p-4 mb-4" style="position:relative">
                            <form action="Main.php" method="post">
                            
                                <h3>
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
                                <h3><button class= "btn btn-success" name="btoConcluida" id="btoConcluida">Iniciar</button></h3>
                                <input type="number" name="IDtar" style="display:none;" value="'.$linha[0].'">
                                    
                                </div>
                            </form>
                        ';
    
                    }
    
                    echo '</div>';
    
                }

                $sql = $conn-> query('
    
                select tarefa.*,Projeto.ID_Projeto,Projeto.nome_projeto from tarefa
                inner join
                    Projeto
                on tarefa.ID_Projeto_Tarefa = Projeto.ID_Projeto where ID_Usuario_Tarefa = '.$_SESSION['idUsuarioLogin'].'
                and Projeto.ID_Projeto = '.$filtroGP.'
                
                ');

                if($sql->rowCount()==0){

                    echo'
                    
                        <div class="col-sm-12 text-center"><h3>nenhuma tarefa nesse projeto!</h3></div>
                    
                    ';

                }
    
                
    
            }catch(PDOException $erro){
    
                $erro->getMessage();
    
            } 
    
        }
        
    }

?>