<?php

    if(isset($_POST['btnCriarProjGP'])){

        include_once 'conexao.php';

        try{

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

                ':nome_projeto' =>$_POST['NomeProjetoGP'],
                ':data_projeto' =>$_POST['DataProjetoGp'],
                ':OBS_Projeto' =>$_POST['DescricaoProjetoGP'],
                ':ID_Usuario_Projeto' =>$_SESSION['idUsuarioLogin']

            ));

            if($sql->RowCount()>0){

                $IDproj = $conn->lastInsertId();

            }

            $sql = $conn->prepare('

                insert into itemProjeto
                (

                    ID_Projeto_ItemProjeto,ID_Grupo_ItemProjeto

                )
                values
                (

                    :projeto_ItemProjeto,:grupo_ItemProjeto

                )
            
            ');

            $sql->execute(array(

                ':projeto_ItemProjeto' => $IDproj,
                ':grupo_ItemProjeto' => $_GET['idGrupo']

            ));

            if($sql->rowCount()>0){

                echo '<script>window.location.assign("TelaGrupo.php?idGrupo='.$_GET['idGrupo'].'")</script>';

            }


        }catch(PDOException $erro){

            $erro->getMessage();

        }

    }

?>