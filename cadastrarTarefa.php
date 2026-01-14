<?php

    if(isset($_POST['btnCriarTare'])){

        include_once 'conexao.php';

        try{

            $mensagem = "";

            $sql = $conn->prepare('
                insert into tarefa
                (
                    ID_Usuario_Tarefa,ID_Projeto_Tarefa,
                    Nome_Tarefa,dataInicio_Tarefa,OBS_Tarefa
                )
                values
                (

                    :ID_Usuario_Tarefa,:ID_Projeto_Tarefa,
                    :Nome_Tarefa,:dataInicio_Tarefa,:OBS_Tarefa
                        
                )
            ');

            $sql->execute(array(

                ':ID_Usuario_Tarefa' =>$_POST['IDusuarioTarefa'],
                ':ID_Projeto_Tarefa' =>$_POST['NomeProjetoTarefa'],
                ':Nome_Tarefa' =>$_POST['NomeTarefa'],
                ':dataInicio_Tarefa' =>$_POST['DataTarefa'],
                ':OBS_Tarefa' =>$_POST['DescricaoTarefa']
                    
            ));

            if($sql->rowCount() > 0){

                $mensagem = 'Cadastro realizado com sucesso - '.$sql->rowCount();
        
                $mensagem = $mensagem.'<p>ID GERADO:'.$conn->lastInsertId().'</p>';
        
                $ID = $conn->lastInsertId();

                echo '<script>window.location.assign("Main.php")</script>';
                 
            }
        
        }catch(PDOException $erro){

            $mensagem = $erro->getMessage();

        }
    
    }

?>