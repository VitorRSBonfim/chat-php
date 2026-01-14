<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PurpleBase</title>

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
</head>

<body>

    <?php include_once("_autenticar.php"); ?>

    <div class="container-fluid">

        <div class="row p-0">
            
            <div class=" col-1"></div>
            <div class=" col-1 Menu">

                <?php

                    include_once 'Menu.php';

                ?>

            </div>

            <div class="col-11 p-0">
                
                <?php

                    include_once '_Home.php';

                ?>

            </div>

        </div>

    </div>

    <script src="js/bootstrap.js"></script>

</body>

</html>