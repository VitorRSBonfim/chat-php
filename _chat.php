<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
    <title>PurpleBase</title>

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="chat.css">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=send" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=attach_file_add" />

</head>

<body>






    <div class="container-fluid" style="overflow-x: hidden;">

        <div class="row p-0">

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
                          
                          <div class="menu" id="menu-t">
                            
                            <div class="pai-itens-amigos">
              
                              <div class="pai-btnMostrarAmigos" >
                                <button style="    border-radius: 2px;
                                  background-color: azure;
                                  padding: 5px;" id="btnMostrarAmigos">Amigos</button>
                                </div>

                              <button id="btnToggle" class="btnT">></button>
              
                            </div>         
                            <!--
                            <div class="dMsg">
                              <p>Mensagens Diretas</p>
                            </div>
                        -->

                            <div class="lista-amigos" id="lista-amigos">
              
              
                                <?php
                                    include_once 'buscarAmigos.php';
                                ?>
              
              
                            </div>
                          </div>
                          <div class="chat-pai" id="chat-pai">
                            
                            <div class="tst" id="menuF">
                              <h1>Amigos</h1>
                            </div>
              
                            <div class="pai-header" id="container-amigos" >
                              
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
              
                            <div id="bg" class="header-chat-with" >
                              <div class="chat-with" id="chat-with">
                                  <img class="perfil-icon" id="perfil-icon" src="" alt="" srcset="">
                                  <p id="nome" ></p>
                              </div>
                            </div>
                              
                            <div >
                              <div class="chat" id="chat"></div>
                              <div class="form-msg" id="form-msg" >
                                
                                  <form id="kk" >

                                    <div class="itens"  >
                                      
                                      <input type="text" id="msg" class="msgc" placeholder="Digite uma mensagem" autocomplete="off" required>

                                      
                                      
                                      <button class="btn-submit" id="btn-submit" >
                                        
                                          <span class="material-symbols-outlined">
                                            send
                                          </span>
                                        
                                      </button>



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