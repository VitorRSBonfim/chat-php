<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
    <script src="https://kit.fontawesome.com/0d3d66d530.js" crossorigin="anonymous"></script>
</head>
<body>
    
    <div class="container"> <!-- Container pai, todo formulario está aqui dentro -->
        <div class="btnForm"> <!-- Div para os botões do indice do formulario e sua cor -->
            <div class="corBtn"></div>
            <button id="btnLogin">Login</button>
            <button id="btnRegistrar">Registrar</button>
        </div>

        <form action="_logar.php" id="Login" method="post"> <!--Formulario de login-->
            <input type="text" name="email" placeholder="Email" required>
            <i class="fa-solid fa-user"></i> <!--icone-->
            <input type="password" name="senha" placeholder="Senha" required>
            <i class="fa-solid fa-lock"></i> <!--icone-->
            <div class="divCheck"> <!--Div para checkbox-->
                <input type="checkbox" name="checkboxLogin">
                <span>Manter-me Conectado</span>
            </div>
            <button type="submit" name="btnEnviarLogin" formaction="_logar.php">Entrar</button> <!--Botão enviar-->
        </form>

        <form action="login.php" method="post" name="frmRegis" id="Registrar">
            <div class="agrupar">
                <input type="text" name="Nome" placeholder="Nome" required>
                <i class="fa-solid fa-user"></i> <!--icone-->
                <input type="text" name="Sobrenome" placeholder="Sobrenome" required>
            </div>
            <input type="text" name="Email" placeholder="Email" required>
            <i class="fa-solid fa-envelope"></i> <!--icone-->
            <div class="agrupar">
                <input type="password" name="Senha" placeholder="Senha" required>
                <i class="fa-solid fa-lock iconsenha2"></i> <!--icone-->
                <input type="password" name="Senha2" placeholder="Repita a Senha" required>
            </div>
            <input placeholder="Nascimento" name="Nasc" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date" required />
            <div class="divCheck"> <!--Div para checkbox-->
                <input type="checkbox" name="checkboxLogin">
                <span>Li e aceito os termos de serviço</span>
            </div>
            <button type="submit" name="btnRegistrar">Registrar</button> <!--Botão Registrar-->
        </form>
    </div>

    <script src="login.js"></script>

<?php

    if(isset($_POST['btnRegistrar'])) {

        include_once('conexao.php');

        /* Criando array alphabet para comparação em loop for nice! :) */

        $alphabetArray = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

        $nome=$_POST['Nome']. " " .$_POST['Sobrenome'];
        $email=$_POST['Email'];
        $senha=$_POST['Senha'];
        $nasc=$_POST['Nasc'];
        $nomeArray = $_POST['nome'];
        $customUserPath = "";

        for ($i = 0; ; $i++) {
            if ($nomeArray == $alphabetArray[$i]) {
                $customUserPath = "src/users_img/global_user_img/" . $alphabetArray[$i] . ".png";
                break;
            }
        }

        /*
            $str = "Pedro";
            $str_array = str_split($str);
            print_r($str_array[0]);
        */

        try {
            $sql = $conn->prepare
            ('
                insert into usuario
                (Nome_usuario,Email_usuario, user_ProfilePic,Senha_usuario,Nasc_usuario)
                values(:Nome_usuario,:Email_usuario, :user_ProfilePic,:Senha_usuario,:Nasc_usuario)
            ');

            $sql->execute(array(
                ':Nome_usuario'=>$nome,
                ':Email_usuario'=>$email,
                ':user_ProfilePic'=>$customUserPath,
                ':Senha_usuario'=>$senha,
                ':Nasc_usuario'=>$nasc
            ));

            if($sql->rowCount()>0){
                $mensagem ='<p>Cadastro Realizado Com Sucesso</p> -'.$sql->rowCount();
                echo "<script>Dados cadastrados com sucesso</script>";
                header('Location:login.php');
            }
        } catch (PDOException $erro) {
           echo $erro-> getMessage();
        }
    }

?>  

</body>
</html>