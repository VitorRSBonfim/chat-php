<?php 

    $host="127.0.0.1";
    $bd="PurpleBase";
    $user="workbench";
    $pass="123456";

    try
    {
        // Conexão
        $conn = new PDO("mysql:dbname=$bd;host=$host", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("set names utf8");

        echo "done";
    }
    catch(PDOException $erro)
    {
        echo $erro->getMessage();
    }


?>