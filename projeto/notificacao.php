
<?php 



    include 'conn.php';
    include '_autenticar.php';
    $cont = 0;

    try {

        $id = $_POST['idUserint'];
    
        $sql = $conn->prepare('select distinct Nome_Usuario, ID_Usuario from usuario join itemAmizade where ID_UsuarioA_itemAmizade = '.$id.' and ID_UsuarioB_itemAmizade = ID_Usuario and status_itemAmizade = "P"  or ID_UsuarioB_itemAmizade = '.$id.' and ID_UsuarioA_itemAmizade = ID_Usuario and status_itemAmizade = "P"


  ');
        
        $sql->execute();
        

        echo json_encode($sql -> fetchAll(PDO::FETCH_ASSOC));
        
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }

?>



