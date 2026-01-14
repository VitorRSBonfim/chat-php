<?php 

    include 'conn.php';
    include '_autenticar.php';
    
    try {
      
      
        $sql = $conn->prepare('select ID_UsuarioA_Mensagem, ID_UsuarioB_Mensagem, Mensagem, Data_Mensagem, Nome_Usuario, user_ProfilePic, msg_type_indentificator from Mensagem join usuario where ID_UsuarioA_Mensagem = '.$idUsuarioSessao.' and ID_UsuarioB_Mensagem = '.$_POST['id'].' and ID_usuario = '.$idUsuarioSessao.' or 
        ID_UsuarioB_Mensagem = '.$idUsuarioSessao.' and ID_UsuarioA_Mensagem = '.$_POST['id'].' and ID_usuario = '.$_POST['id'].' ORDER BY Data_Mensagem ASC ');
        
        $sql->execute();
        

        echo json_encode($sql -> fetchAll(PDO::FETCH_ASSOC));
        
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }

    /*


    try {
        $sql = $conn->query('select ID_UsuarioA_Mensagem, ID_UsuarioB_Mensagem, Mensagem, Data_Mensagem from Mensagem where ID_UsuarioA_Mensagem = 1 and '.$_POST['id'].' = ID_UsuarioB_Mensagem or 1 = ID_UsuarioB_Mensagem and '.$_POST['id'].' = ID_UsuarioA_Mensagem');




        foreach($sql as $linha){

            echo '
                
                <p> '.$linha.' </p>
                
            ';
             
        }

    } catch (PDOException $error) {

        $error -> getMessage();

    }

    */

?>
