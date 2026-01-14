<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../system/index.html">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="Solicitações.css">
    
    <!--Estilo para as classes criadas dentro do php -->

    

    <title>PB</title>
</head>
<body>
    
    <?php 


      include_once 'enviarMensagem.php';


      
    ?>

    
    <p id="idUser" style="display: none;" >
      <?php 
        echo $idUsuarioSessao;
      ?>
    </p>
    
    
    <div class="container-pag">

      
      
      <div class="menu-side" id="menu-side">
        
        <nav>

          <ul class="ul-usuario">

            <div>
              <button id="btnAbrir" >
                <i class="bi bi-list"></i>
              </button>
            </div>

            <li>

              <i class="bi bi-person-circle"></i>

              <p  style="color: white;" >
                
              </p>
            </li>
          </ul>

          <ul class="links-sidebar">

            <div>
              <li>
                <p class="a" href="">
                  <i class="bi bi-house"></i>
                  <p>
                    Inicio
                  </p>
                </p>
              </li>
              <li>
                <p  class="a" id="notf-abrir">
                  <i class="bi bi-app-indicator"></i>
                  <p>
                    Caixa de Entrada
                  </p>
                </p>
              </li>
              
              

              
            </div>

            

          </ul>
        </nav>
        
      </div>

      <div class="conteudo">

    
        
      <div class="conteudo-php" id="conteudo-php">

        <div class="container papis vh-100  p-3" id="notf-container">
          <ul id="pai-notf">
              
          </ul>
          
      </div>
      </div>

          <div class="container-chat" id="container-chat">
            <div class="menu" id="menu">

              <div class="pai-itens-amigos">

                <div class="pai-btnMostrarAmigos" >
                  <button id="btnMostrarAmigos">Amigos</button>
                </div>

              </div>         
              
              <div>
                <p>Mensagens Diretas</p>
              </div>

              <div class="lista-amigos" id="lista-amigos">


                  <?php
                      include_once 'buscarAmigos.php';
                  ?>


              </div>
            </div>
            <div class="chat-pai" id="chat-pai">
              
              <button  class="btn-oppen" id="btn-oppen">
                <i id="oppen-menu" class="bi bi-caret-right"></i>
              </button>

              <div class="pai-header" id="container-amigos" >
                <div class="header">
                  <nav >
                    <ul class="ul-header-amigos">
                      <li class="li-header-amigos">
                        <p>
                          Amigos
                        </p>
                        <i class="bi bi-person-lines-fill"></i>
                      </li>
                      <li class="li-header-amigos">
                        <p id="todosAmigos" >
                          Todos
                        </p>
                      </li>
                      <li class="li-header-amigos">
                        <p>
                          <button id="btnAddAmigo" >Adicionar Amigo</button>
                        </p>
                      </li>
                    </ul>
                  </nav>
                </div>
                <div id="pai-amigos" style="margin-left: 70px;">
                  <?php
                    include 'buscarAmigos.php';
                  ?>
                </div>

                <div class="pai-pesquisar">
                <div class="pai-search" id="pai-busca">
                    <div style="display: flex;" ><input class="search" autocomplete="off" type="text" id="search"><i id="search-icon" class="bi bi-search"></i></div>
                    <div  id="pai-users">

                    </div>
                  </div>
                </div>

              </div>

              <div id="bg"  >
                <div class="chat-with" id="chat-with">
                    <div style="width: auto; height: auto; " ><img class="perfil-icon" id="perfil-icon" src="../../images/495-4952535_create-digital-profile-icon-blue-user-profile-icon.png" alt="" srcset=""></div>
                    <p id="nome" ></p>
                </div>
              </div>
                
              <div >
                <div class="chat" id="chat"></div>
                <div class="form-msg" id="form-msg" >
                    <form id="kk" >
                      <div class="itens"  >
                        <input type="text" id="msg" placeholder="Digite uma mensagem" autocomplete="off" required>
                        <button class="btn-submit" id="btn-submit" ><i class="bi bi-send-fill"></i></button>
                      </div>
                    </form>
                </div>
              </div>

            </div>

          </div>

        </div>

      </div>
      
    </div>

    <script src="script.js"></script>
    <script src="js/jquery-3.7.1.js"></script>
    <script src="js/script.js"></script>  
    
</body>
</html>