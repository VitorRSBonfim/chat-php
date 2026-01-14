<?php 

    include 'conn.php';
    include '../autenticacao/_autenticar.php';

    try {

        $nome = $_POST['nome'];
 
      
        $sql = $conn->prepare("
        select  Nome_Usuario, ID_Usuario from usuario where Nome_Usuario like '%$nome%'");
        
        $sql->execute();
        

        echo json_encode($sql -> fetchAll(PDO::FETCH_ASSOC));
        
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }

?>