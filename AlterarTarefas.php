<?php

// ['btoPendente']

    if(isset($_POST['btoPendente'])){

        try{

            $sql = $conn->prepare('
            
                update tarefa set
                Status_Tarefa=:status_tarefa
                where ID_Tarefa = '.$_POST['IDtar']

            );
            $sql->execute(array(

                ':status_tarefa' => 'ANDAMENTO'

            ));

            echo '<script>window.location.assign("Main.php")</script>';

        }catch(PDOException $erro){

            $erro->getMessage();

        }

    }

    if(isset($_POST['btoPendenteGP'])){

        try{

            $sql = $conn->prepare('
            
                update tarefa set
                Status_Tarefa=:status_tarefa
                where ID_Tarefa = '.$_POST['IDtar']

            );
            $sql->execute(array(

                ':status_tarefa' => 'ANDAMENTO'

            ));

            echo '<script>window.location.assign("TelaGrupo.php?idGrupo='.$_GET['idGrupo'].'")</script>';

        }catch(PDOException $erro){

            $erro->getMessage();

        }

    }

    if(isset($_POST['btoAndamento'])){

        try{

            $sql = $conn->prepare('
            
                update tarefa set
                Status_Tarefa=:status_tarefa
                where ID_Tarefa = '.$_POST['IDtar']

            );
            $sql->execute(array(

                ':status_tarefa' => 'CONCLUIDA'

            ));

            echo '<script>window.location.assign("Main.php")</script>';

        }catch(PDOException $erro){

            $erro->getMessage();

        }

    }

    if(isset($_POST['btoAndamentoGP'])){

        try{

            $sql = $conn->prepare('
            
                update tarefa set
                Status_Tarefa=:status_tarefa
                where ID_Tarefa = '.$_POST['IDtar']

            );
            $sql->execute(array(

                ':status_tarefa' => 'CONCLUIDA'

            ));

            echo '<script>window.location.assign("TelaGrupo.php?idGrupo='.$_GET['idGrupo'].'")</script>';

        }catch(PDOException $erro){

            $erro->getMessage();

        }

    }

    if(isset($_POST['btoConcluida'])){

        try{

            $sql = $conn->prepare('
            
                update tarefa set
                Status_Tarefa=:status_tarefa
                where ID_Tarefa = '.$_POST['IDtar']

            );
            $sql->execute(array(

                ':status_tarefa' => 'INATIVA'

            ));

            echo '<script>window.location.assign("Main.php")</script>';

        }catch(PDOException $erro){

            $erro->getMessage();

        }

    }

    if(isset($_POST['btoConcluidaGP'])){

        try{

            $sql = $conn->prepare('
            
                update tarefa set
                Status_Tarefa=:status_tarefa
                where ID_Tarefa = '.$_POST['IDtar']

            );
            $sql->execute(array(

                ':status_tarefa' => 'INATIVA'

            ));

            echo '<script>window.location.assign("TelaGrupo.php?idGrupo='.$_GET['idGrupo'].'")</script>';

        }catch(PDOException $erro){

            $erro->getMessage();

        }

    }

?>