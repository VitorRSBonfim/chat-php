<?php

    include_once('conn.php');

    if($_POST){

        try{

            $sql = $conn->query("
                select * from usuario where
                Email_usuario = '".$_POST['email']."'
                and
                senha_usuario = '".$_POST['senha']."'

            ");

            if($sql->rowCount()==1){

                foreach($sql as $linha){

                    session_start();
                    $_SESSION['idUsuarioLogin'] = $linha[0];
                    $_SESSION['nomeUsuarioLogin'] = $linha[1];
                    header('location:_chat.php');

                }
                

            }else{


                $mensagem = "Usuário ou senha inválida";

            }

        }catch(PDOException $erro){

            $erro ->getMessage();

        }

    }

?>