<?php

    include 'conn.php';
    include_once '_autenticar.php';

    if ($_POST) {        

        $msg = $_POST['msg'];
        $id = $_POST['id'];

        try {
            
            $sql = $conn -> prepare('
            insert into Mensagem (
                ID_UsuarioA_Mensagem, ID_UsuarioB_Mensagem, Mensagem, Nome_user
            ) values (
                :ID_UsuarioA_Mensagem, :ID_UsuarioB_Mensagem, :Mensagem, :Nome_user
            )
            ');

            $sql -> execute(array(
                ':ID_UsuarioA_Mensagem' => $_SESSION['idUsuarioLogin'],
                ':ID_UsuarioB_Mensagem' => $id,
                ':Mensagem' => $msg,
                ':Nome_user' => $_SESSION['nomeUsuarioLogin']
            ));



        } catch (PDOException $error) {

            $error -> getMessage();
            

        }

    }
    
    
    
    


?>