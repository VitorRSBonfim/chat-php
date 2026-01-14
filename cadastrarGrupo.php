<?php

    if(isset($_POST['btnCriarGP'])){

        include_once 'conexao.php';

        try{

            $sql = $conn->prepare('
            
                insert into grupo
                (

                    Nome_Grupo,tipo_grupo,OBS_Grupo

                )
                values
                (

                    :nome_grupo,:tipo_grupo,:OBS_grupo

                )
            
            ');

            $sql->execute(array(


                ':nome_grupo' =>$_POST['NomeGrupo'],
                ':tipo_grupo' =>$_POST['TipoGrupo'],
                ':OBS_grupo' =>$_POST['DescricaoGrupo']

            ));

            // $ID = $conn->lastInsertId();

            if($sql->RowCount()>0){


                $IDgp = $conn->lastInsertId();

                
            }
                
            $sql = $conn->prepare('

                insert into itemGrupo
                (

                    ID_Usuario_ItemGrupo,ID_Grupo_ItemGrupo

                )
                values
                (

                    :usuario_ItemGrupo,:grupo_ItemGrupo

                )
            
            ');

            $sql->execute(array(

                ':usuario_ItemGrupo' => $_SESSION['idUsuarioLogin'],
                ':grupo_ItemGrupo' => $IDgp

            ));

               

                // echo '<script>window.location.assign("_grupos.php")</script>';

        
        }catch(PDOException $erro){

            $erro->getMessage();

        }

    }

?>