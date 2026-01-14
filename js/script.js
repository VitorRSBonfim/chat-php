
let chatFilhos = document.getElementById('chat')
let idUser = document.getElementById('idUser').innerHTML;

const btnAbrir = document.getElementById('btnAbrir');
let amigoID = document.getElementById('idAmigo');
let amigoNome = document.getElementById('nome');
let msg = document.getElementById('msg');
let btnEnviarMSG = document.getElementById('btnMsg');
let listaUsuarios = document.getElementById('usuarios-hide');
let btnAbrirUsuarios = document.getElementById('btnAbrirUsuarios')




function abrirAmigos() {
    listaUsuarios.classList.toggle("oppen");
}




//console.log(idUser);
//console.log(typeof(idUser))
idUserint = parseInt(idUser);
//console.log(typeof(idUserint))
//console.log("YOur user is" + idUser)

$(document).ready(function(){

    $("#lista-amigos ul li").find("p").click(function(){
        
        id = $(this).attr("id");
        let nome = $(this).text();
        let nomeSp = nome.trim()
        let upp = nomeSp.toUpperCase()
        console.log(nomeSp[0])
        let srcImg = $("#lista-amigos ul li").find("img").attr('src');
        console.log(srcImg)
        let campoNome = $("#chat-with #nome");
        // let campoImg = $('#chat-with #perfil-icon')
        //console.log("AAAAAAAAAAAAAAA" + img)
        buscarMensagens();
        // alert(id);
        $("#chat").empty();
       
        var letras = nome.split("");
        console.log(letras)
        console.log(nome.trim())
        
        //console.log(nome.charAt(0));
        let fr = $(nome).first()
        
        campoNome.text(nome);
        $('#chat-with #perfil-icon').attr('src', srcImg);
        $("#form-msg").show();
        
        $("#chat-with").show();

        $("#perfil-icon").show();

        $("#bg").show();

        $("#chat-pai").show();

        

        
        /*

        let chat = $("#chat").height();

        alert("Height of div: " + $("#chat").height());
        $("#chat").scrollTo(0, chat);

        */

    });


    /* Usuarios "MouseEnter and" */

    $(".pai-search").find("input").focus(function () {

        tamanhoStr = $("#search").length;

        setInterval(() => {

            if ( tamanhoStr < $("#search").val().length) {

                $("#pai-users").empty();

                nome = $("#search").val();
                indexId = nome.indexOf("#");
                nomeId = nome.substring(indexId + 1);
                
                
                tamanhoStr = $("#search").val().length;
                

                $.ajax({
                    type: "POST",
                    url: "buscarUsuarios.php",
                    data: {nome: nome},
                    dataType: "Json",
                    success: function (response) {
                        for ( i = 0; i < tamanhoStr; i++) {
    
                            $("#pai-users").append(`<p  id="${response[i].ID_Usuario}" >${response[i].Nome_Usuario}</p> <button style="background-color: none;" id="${response[i].Nome_Usuario}" ><i class="bi bi-person-plus-fill"></i></button>`)
    
                            //console.log(response[i].Nome_Usuario );
                        }
                    }
                });

            } else if (tamanhoStr > $("#search").val().length) {

                $("#pai-users").empty();

                nome = $("#search").val();

                indexId = nome.indexOf("#");
                console.log(nome.substring(indexId + 1));
                nomeId = nome.substring(indexId + 1);

                tamanhoStr = $("#search").val().length;

                $.ajax({
                    type: "POST",
                    url: "buscarUsuarios.php",
                    data: {nome: nome},
                    dataType: "Json",
                    success: function (response) {
                        for ( i = 0; i < tamanhoStr; i++) {
    
                            $("#pai-users").append(`<p style="display: flex;" id="${response[i].ID_Usuario}">${response[i].Nome_Usuario}</p> <button style="background-color: none;" id="${response[i].Nome_Usuario}" ><i class="bi bi-person-plus-fill"></i></button> `)

                           
    
                            //console.log(response[i].Nome_Usuario + response[i].ID_Usuario);
                        }
                    }
                });

                
            }

            

            //console.log(tamanhoStr)

        }, 500);
        


    
    })

    $(".pai-search").find("input").blur(function () {

        //console.log ("saas")
    
    })

   

});    



/* pegando posição atual do scroll em set interval de .5s */
const chatScroll = document.getElementById("chat")

let scrPos = null

function getScrollTOp () {
    setInterval(() => {
        scrPos = chatScroll.scrollTop
        console.log("Posição atual é " + scrPos)
    }, 1000);
}

/* pegando tamanho scroll */

let scrHeigth = null


function getScrrolSize () {
    setInterval(() => {
        scrHeigth = chatScroll.scrollHeight
        console.log(scrHeigth)
    }, 1000);    
}



/* gettinh scroll position from the chat element */



//setInterval(() => {
//    console.log("BUNDAAAAA")
//}, 500);


/** */




function buscarMensagens() {

    console.log(`asdasdasd`)

    $.ajax({
        
        url: "buscarMensagenstst.php",
        method: "POST",     
        dataType: "Json",
        data: {id: id},
        
        success: function (response) {
            console.log(response)
            
            console.log(msg);

            console.log(response.length);
            console.log(response)

            for ( i = 0; i < response.length; i++) {

                if (response[i].msg_type_indentificator == "r" && response[i].ID_UsuarioA_Mensagem == idUserint && response[i].ID_UsuarioB_Mensagem == id ) {
                    $("#chat").append(`
                    <div class="pai-me">
                        <div class="bg-me-img" onclick="saudar()" >


                            <img  class="img-me" src="${response[i].Mensagem}"  />
                        
                            <p class="hora"> ${(response[i].Data_Mensagem).substring(11)}</p>
                        </div>
                        
                    </div>

                    <script>
                    function saudar() {
                        alert('Abrir imagem em div FULL FIZED ON THE SCREEN');
                    }
                    </script>

                    `); 
                } else if (response[i].msg_type_indentificator == "r" && response[i].ID_UsuarioA_Mensagem == id && response[i].ID_UsuarioB_Mensagem == idUserint) {
                    $("#chat").append(`
                    <div class="pai-not-me">
                        <div class="bg-not-me-img" onclick="saudar()" >


                            <img  class="img-me" src="${response[i].Mensagem}"  />
                        
                            <p class="hora"> ${(response[i].Data_Mensagem).substring(11)}</p>
                        </div>
                        
                    </div>

                    <script>
                    function saudar() {
                        alert('Abrir imagem em div FULL FIZED ON THE SCREEN');
                    }
                    </script>

                    `); 
                } else {
                    if ( response[i].ID_UsuarioA_Mensagem == idUserint && response[i].ID_UsuarioB_Mensagem == id ) {

                    $("#chat").append(`
                    <div class="pai-me">
                        <div class="bg-me" >
                        

                            <p class="p-me" >${response[i].Mensagem}</p>
                        
                            <p class="hora"> ${(response[i].Data_Mensagem).substring(11)}</p>
                        </div>
                        
                    </div>
                    `); 
                       
                } else if (response[i].ID_UsuarioA_Mensagem == id && response[i].ID_UsuarioB_Mensagem == idUserint) {
                    $("#chat").append(`
                    <div class="pai-not-me" >
                        <div class="bg-not-me" >
                            <p class="p-not-me" >${response[i].Mensagem}</p>
                            <p class="hora"> ${(response[i].Data_Mensagem).substring(11)}</p>
                        </div>
                    </div>

                    `); 
                }   
                }
                
                
                
             
            }

            
            

            let chat = document.getElementById("chat")
            chat.scrollTop = chat.scrollHeight
            getScrrolSize();
            
            getScrollTOp();
            contDb = response.length;
            console.log(contDb)

            // 

            let temp = 0;

            

            

            setInterval(() => {


                if (chat.scrollHeight > 0 & temp == 0) {
                    console.log("HAS SCROLL ACTVATE")
                    chat.scrollTop = chat.scrollHeight
                    temp = 1
                    console.log("TEMP ACT" + temp)
                } 
                
                $.ajax({
                    type: "POST",
                    url: "buscarMensagenstst.php",
                    data: {id: id},
                    dataType: "Json",
                    success: function (response) {

                        console.log(contDb)
                        console.log(idUserint)
                        

                        if ( response.length > contDb ) {

                            

                            if ( response[contDb].ID_UsuarioA_Mensagem == idUserint && response[contDb].ID_UsuarioB_Mensagem == id ) {

                                $("#chat").append(`
                                <div class="pai-me">
                                    <div class="bg-me" >
                                        <p class="p-me" >${response[contDb].Mensagem}</p>
                                    
                                        <p class="hora"> ${(response[contDb].Data_Mensagem).substring(11)}</p>
                                    </div>
                                    
                                </div>
                                `); 
                                   
                            } else if (response[contDb].ID_UsuarioA_Mensagem == id && response[contDb].ID_UsuarioB_Mensagem == idUserint) {
                                $("#chat").append(`
                                <div class="pai-not-me" >
                                    <div class="bg-not-me" >
                                        <p class="p-not-me" >${response[contDb].Mensagem}</p>
                                        <p class="hora"> ${(response[contDb].Data_Mensagem).substring(11)}</p>
                                    </div>
                                </div>
            
                                `); 
                            }
                            

                            contDb = response.length;
                            
                            let chat = document.getElementById(`chat`)

                            if (chat.scrollTop + 440 < (chat.scrollHeight) * 0.80) {
                                console.log("ta acima")
                            } else {
                                
                                //let chat = document.getElementById("chat")
                                console.log("TAMANHO ALTERADO " + chat.scrollHeight)
                                chat.scrollTop = chat.scrollHeight
                            }
                            
                        }
     
                            
                    }
                    
                });

            }, 500);

        },

    })       


}



const formmsg = document.getElementById('kk')

function clsForm() {
    document.getElementById('kk').reset()
}

$('#form-msg').submit(function(e){ // Pegando todo o form usando Jquery e atribuindo uma função no submit

    /* Limpando input MSG após submit */
    
    

    e.preventDefault(); // Cancelando a ação padrão (refresh da pag)

    msg = $('.msgc').val(); // Pegando elemento e depois o value de input com id == "msg" 
    console.log(msg);

    $.ajax({
        type: "POST",
        url: "enviarMensagem.php",
        data: {msg: msg, id: id},
        
        success: function (response) {
            //console.log(response)
            clsForm()
            //window.alert("aaa")
        }
        
    });
    
    
    
    

})





// Pegando Mensagens

/*

setInterval(() => {
    //console.log('a')
}, 1000);

*/




/* Abrindo de acordo com click */

/*

$(document).ready(function() {

    $("#chat-abrir").click(function () {

        


    }) 

})

*/

/*  Pegando Notificações */




$(document).ready(function() {

    


    $.ajax({
        type: "POST",
        url: "notificacao.php",
        data: {idUserint: idUserint},
        dataType: "Json",
        success: function (response) {
            for ( i = 0; i < response.length; i++ ) {
                $("#pai-notf").append(`<li> 
                                            <div class="container not w-75 p-5 mb-5 mt-3 " id="pai-${response[i].ID_Usuario}">
                                                <div style="display: flex; flex-direction: column;" class="txtnot">
                                                    <p>${response[i].Nome_Usuario}</p>
                                                    <div style="display: flex;">
                                                    <div class="Line-13"></div>
                                                    <p>Te enviou um pedido de amizade!</p>
                                                    </div>
                                                </div>
                                                
                                                <div class="simounao">
                                                    <button onclick="mostrarIdAdd(${response[i].ID_Usuario})" type="button" class=" btn-aceitar" id="${response[i].ID_Usuario}"  >Aceitar</button>
                                                    <button onclick="mostrarIdDel(${response[i].ID_Usuario})" type="button" class=" btn-recusar" id="${response[i].ID_Usuario}"  >Recusar</button>
                                                </div>
                                            </div>
                                        </li>`
                );
                console.log(response[i].Nome_Usuario)
                var contNotf = response.length;
                console.log(contNotf);
            }

            setInterval(() => {
                $.ajax({
                    type: "POST",
                    url: "notificacao.php",
                    data: {idUserint: idUserint},
                    dataType: "Json",
                    success: function (response) {

                        if (response.length > contNotf) {
                            console.log("Nova notificação")
                            $("#pai-notf").append(`<li> 
                                            <div class="container not w-75 p-5 mb-5 mt-3 " id="pai-${response[contNotf].ID_Usuario}">
                                                <div style="display: flex; flex-direction: column;" class="txtnot">
                                                    <p>${response[contNotf].Nome_Usuario}</p>
                                                    <div style="display: flex;">
                                                    <div class="Line-13"></div>
                                                    <p>Te enviou um pedido de amizade!</p>
                                                    </div>
                                                </div>
                                                
                                                <div class="simounao">
                                                    <button onclick="mostrarIdAdd(${response[contNotf].ID_Usuario})" type="button" class=" btn-aceitar" id="${response[contNotf].ID_Usuario}">Aceitar</button>
                                                    <button onclick="mostrarIdDel(${response[contNotf].ID_Usuario})" type="button" class=" btn-recusar" id="${response[contNotf].ID_Usuario}" >Recusar</button>
                                                </div>
                                            </div>
                                        </li>`
                            );
                        } 

                        contNotf = response.length;
                        $("#chat-notf").empty();

                    }
                });
            }, 1000);

        }


    })


})

function mostrarIdDel (id) {

    console.log(id);

    $.ajax({
        type: "POST",
        url: "recusarSolicitacaoAmigo.php",
        data: {idAmigo: id, idUser: idUserint},
        dataType: "Json",
        success: function (response) {
            console.log("Success")

            $("#pai-" + id).remove();

        }
    });

}

function mostrarIdAdd (id) {

    console.log(id);

    $.ajax({
        type: "POST",
        url: "aceitarSolicitacaoAmigo.php",
        data: {idAmigo: id, idUser: idUserint},
        dataType: "Json",
        success: function (response) {
            console.log("Success")

            $("#pai-" + id).remove();

        }
    });


}

/* abrir / fechar menu lateral */

const toggleOpenClose = document.getElementById("btnToggle")
const menu = document.getElementById("menu-t")

const showF = document.getElementById("btnMostrarAmigos")
const menuF = document.getElementById("menuF")

toggleOpenClose.addEventListener('click', () => {
  menu.classList.toggle('menu-open'); // Alterna a visibilidade
});

showF.addEventListener('click', () => {
    menuF.classList.toggle('menuFop');
})


/* Amigos HAHAHAHAHAH */

let bntMostrarPesquisaAmg = document.getElementById("btnAddAmigo");
let mostrarListaAmigos = document.getElementById("todosAmigos");
let listaAmigos = document.getElementById("pai-amigos");
let addAmigo = document.getElementById("btnAddAmigo");
let listaUsers = document.getElementById("pai-busca");

mostrarListaAmigos.onclick = function () { 
    listaAmigos.classList.toggle("oppen")
}

addAmigo.onclick = function () {
    listaUsers.classList.toggle("oppen")
}

/* */

let btnShowChat = document.getElementById("chat-abrir");
let btnShowNotf = document.getElementById("notf-abrir");

let containerAmigos = document.getElementById("container-amigos")
let containerChat = document.getElementById("container-chat");
let containerNotf = document.getElementById("notf-container");

let btnMostrarListaAmizade = document.getElementById("btnMostrarAmigos");


 
btnMostrarListaAmizade.onclick = function () {
    containerAmigos.classList.toggle("oppen")
}

/* Tratando scrll automatico da tela */





/* Conteudo responsivo */




