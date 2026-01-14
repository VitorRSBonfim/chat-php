<?php

    include 'conn.php';
    include_once("_autenticar.php");
    
    try{

        $sql = $conn->query('select distinct ID_Usuario, Nome_Usuario from Usuario join itemAmizade where ID_Usuario = ID_UsuarioA_itemAmizade and '.$idUsuarioSessao.' = ID_UsuarioB_itemAmizade or ID_Usuario = ID_UsuarioB_itemAmizade and Status_itemAmizade = "A" and '.$idUsuarioSessao.' = ID_UsuarioA_itemAmizade and ID_Usuario <> '.$idUsuarioSessao.' and Status_itemAmizade = "A"
        ');

        $cont = 0;
        $firstId = 0;

        if($sql->rowCount()>0){

            foreach($sql as $linha){

                if ($cont == 0) {
                    $firstId = $linha[0];
                }

                $cont += 1;

                echo '
                    
                    <ul class="ul-amg" >
                        <li class="li-amg">

                            <p id="'.$linha[0].'" class="amg"  >
                            
                                <img style="width: 50px; margin-left: 10px; border-radius: 50%;" src="imagens/favicon_io/495-4952535_create-digital-profile-icon-blue-user-profile-icon.png" alt="" srcset="">

                                '.$linha[1].' 
                            </p>
                           
                        </li>
                    </ul>
                    
                    ';
            }

        }else{

            $mensagem = "kk";

        }

    }catch(PDOException $erro){

        $erro ->getMessage();

    }

?>

