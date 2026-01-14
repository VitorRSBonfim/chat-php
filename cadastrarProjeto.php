<?php

    

    if(isset($_POST['btnCriarProj'])){

        include_once 'conexao.php';

        try{

            $mensagem = "";

            $sql = $conn->prepare('
                insert into projeto
                (
                    nome_projeto,data_projeto,
                    OBS_Projeto,ID_Usuario_Projeto
                )
                values
                (
                    :nome_projeto,:data_projeto,
                    :OBS_Projeto,:ID_Usuario_Projeto
                        
                )
            ');

            $sql->execute(array(

                ':nome_projeto' =>$_POST['NomeProjeto'],
                ':data_projeto' =>$_POST['DataProjeto'],
                ':OBS_Projeto' =>$_POST['DescricaoProjeto'],
                ':ID_Usuario_Projeto' =>$_POST['IDusuario']
                    
            ));

            if($sql->rowCount() > 0){

                $mensagem = 'Cadastro realizado com sucesso - '.$sql->rowCount();
        
                $mensagem = $mensagem.'<p>ID GERADO:'.$conn->lastInsertId().'</p>';
        
                $ID = $conn->lastInsertId();

            }
        
        }catch(PDOException $erro){

            $mensagem = $erro->getMessage();

        }
    
    }

?>