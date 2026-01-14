<?php

    if(isset($_POST['sair'])) {
        session_destroy();
        header("location:../autenticacao/login.php");
    }

?>