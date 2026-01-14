<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PurpleBase</title>

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="chat.css">
    <link rel="stylesheet" href="Solicitações.css">

</head>

<body>



    <div class="container-fluid" style="overflow-x: hidden;">

        <div class="row p-0">

            <div class=" col-1"></div>
            <div class=" col-1 Menu">

                

                <?php

                    include_once 'Menu.php';

                ?>

                <p id="idUser" style="display: none;" >
                    <?php 
                       include '_autenticar.php'; 
                        echo $idUsuarioSessao;
                    ?>
                </p>

            </div>
            
            <div class="col-sm-11 p-0">
            <div >
                <div class="container papis vh-100  p-3" id="notf-container">
                    <ul id="pai-notf">
                        
                    </ul>
                </div>
                
            </div>

        </div>

    </div>
    
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery-3.7.1.js"></script>
    <script src="js/script.js"></script>
            

</body>

</html>