<?php

    include 'conn.php';
    include_once '_autenticar.php';

    if ($_POST) {

        $msg = $_POST['msg'];
        $id = $_POST['id'];

        try {
            
            $sql = $conn -> prepare('
            insert into mensagem (
                ID_UsuarioA_Mensagem, ID_UsuarioB_Mensagem, mensagem
            ) values (
                :ID_UsuarioA_Mensagem, :ID_UsuarioB_Mensagem, :mensagem
            )
            ');

            $sql -> execute(array(
                ':ID_UsuarioA_Mensagem' => $_SESSION['idUsuarioLogin'],
                ':ID_UsuarioB_Mensagem' => $id,
                ':mensagem' => $msg,
            ));



        } catch (PDOException $error) {

            $error -> getMessage();

        }

    }
    
    
    
    


?>