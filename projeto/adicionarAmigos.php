
<?php 



    include 'conn.php';
    include '../autenticacao/_autenticar.php';
    $cont = 0;

    try {

        $id = $_POST['idUserint'];
    
        $sql = $conn->prepare('update itemAmizade 
        set Status_Amizade = "A"
        where ID_UsuarioA_itemAmizade = 2 and ID_UsuarioB_itemAmizade = 8 or ID_UsuarioA_itemAmizade = 8 and ID_UsuarioB_itemAmizade = 2 
        
        ');
        
        $sql->execute();
        

        echo json_encode($sql -> fetchAll(PDO::FETCH_ASSOC));
        
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }

?>



