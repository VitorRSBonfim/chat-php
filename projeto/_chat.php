<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PurpleBase</title>

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="chat.css">

</head>

<body>



    <div class="container-fluid" style="overflow-x: hidden;">

        <div class="row p-0">

            <div class=" col-1"></div>
            <div class=" col-1 Menu">

                

                <?php

                    include_once 'Menu.php';

                ?>

            </div>
            
            <div class="col-sm-11 p-0">

                <p id="idUser" style="display: none;" >
                    <?php 
                       include '_autenticar.php'; 
                        echo $idUsuarioSessao;
                    ?>
                </p>
                  
                  
                  <div class="container-pag">
              
                    
                    
                  
                    <div class="conteudo">
              
                  
                      
                    <div class="conteudo-php" id="conteudo-php">
              
                   
                    </div>
              
                        <div class="container-chat" id="container-chat">
                          <div class="menu" id="menu">
              
                            <div class="pai-itens-amigos">
              
                              <div class="pai-btnMostrarAmigos" >
                                <button style="    border-radius: 2px;
    background-color: azure;
    padding: 5px;" id="btnMostrarAmigos">Amigos</button>
                              </div>
              
                            </div>         
                            
                            <div>
                              <p style="margin-left: 10px;" >Mensagens Diretas</p>
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
                              <div style="    background-color: darkgrey;" class="header">
                                <nav >
                                  <ul style="    align-items: center;" class="ul-header-amigos">
                                    <li class="li-header-amigos">
                                      <p >
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
                                        <button style="    padding: 20px;
    background: cyan;
    border-radius: 10px;" id="btnAddAmigo" >Adicionar Amigo</button>
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
              
                  

            </div>
            

        </div>

    </div>
    
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery-3.7.1.js"></script>
    <script src="js/script.js"></script>
            

</body>

</html>