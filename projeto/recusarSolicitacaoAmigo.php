
<?php 



    include 'conn.php';
    include '_autenticar.php';
    $cont = 0;

    try {

        $id = $_POST['idAmigo'];
        $idUser = $_POST['idUser'];
    
    
        $sql = $conn->prepare('update itemAmizade
        set status_itemAmizade = "B"
        where ID_UsuarioA_itemAmizade = '.$idUser.' and ID_UsuarioB_itemAmizade = '.$id.' or ID_UsuarioB_itemAmizade = '.$idUser.' and ID_UsuarioA_itemAmizade = '.$id.'

  ');
        
        $sql->execute();
        

        echo json_encode($sql -> fetchAll(PDO::FETCH_ASSOC));
        
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }

?>
