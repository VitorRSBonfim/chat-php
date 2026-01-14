<?php

    if(isset($_POST['btnCriarTareGP'])){

        include_once 'conexao.php';

        try{

            $sql = $conn->prepare('
            
                insert into tarefa
                (

                    ID_Usuario_Tarefa,ID_Projeto_Tarefa,
                    Nome_Tarefa,DataFinal_Tarefa,OBS_Tarefa
                )
                values
                (

                    :ID_Usuario_Tarefa,:ID_Projeto_Tarefa,
                    :Nome_Tarefa,:DataFinal_Tarefa,:OBS_Tarefa
                        
                )

            ');

            $sql->execute(array(

                ':ID_Usuario_Tarefa' =>$_SESSION['idUsuarioLogin'],
                ':ID_Projeto_Tarefa' =>$_POST['NomeProjetoTarefaGP'],
                ':Nome_Tarefa' =>$_POST['NomeTarefaGP'],
                ':DataFinal_Tarefa' =>$_POST['DataTarefaGP'],
                ':OBS_Tarefa' =>$_POST['DescricaoTarefaGP']
                    
            ));

            if($sql->RowCount()>0){

                $IDtare = $conn->lastInsertId();

            }

            $sql = $conn->prepare('
            
                insert into itemTarefa
                (

                    ID_Grupo_itemTarefa,ID_Tarefa_itemTarefa

                )
                values
                (

                    :grupo_itemTarefa,:Tarefa_itemTarefa

                )
            
            ');

            $sql->execute(array(

                ':grupo_itemTarefa' =>$_GET['idGrupo'],
                ':Tarefa_itemTarefa' =>$IDtare

            ));

            if($sql->rowCount()>0){

                echo '<script>window.location.assign("TelaGrupo.php?idGrupo='.$_GET['idGrupo'].'")</script>';

            }

        }catch(PDOException $erro){

            $erro->getMessage();

        }

    }

?>