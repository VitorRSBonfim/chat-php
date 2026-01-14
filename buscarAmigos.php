<?php

    include 'conn.php';

    try{
    
        $sql = $conn->query("select distinct ID_usuario, Nome_usuario, user_ProfilePic from usuario join itemAmizade where ID_usuario = ID_UsuarioA_itemAmizade and $idUsuarioSessao = ID_UsuarioB_itemAmizade or ID_usuario = ID_UsuarioB_itemAmizade and Status_itemAmizade = 'A' and $idUsuarioSessao = ID_UsuarioA_itemAmizade and ID_Usuario <> $idUsuarioSessao and Status_itemAmizade = 'A'
        ");

        

        $cont = 0;
        $firstId = 0;

        if($sql->rowCount()>0){
            

            foreach($sql as $linha){


                echo '

                    <ul class="ul-amg" >
                        <li class="li-amg">
                            <img style="width: 50px; border-radius: 50%;" src="'.$linha[2].'"/>
                            <p id="'.$linha[0].'" class="amg"  >

                                '.$linha[1].' 
                            </p>
                           
                        </li>
                    </ul>
                    
                    ';
            }

        }

    }catch(PDOException $erro){

        $erro ->getMessage();

    }

?>

