
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


$(document).ready(function(){

    $("#lista-amigos ul li").find("p").click(function(){
        
        
        

        id = $(this).attr("id");
        let nome = $(this).text();
        let campoNome = $("#chat-with #nome");

        buscarMensagens();//alert(id)
        $("#chat").empty();

        //console.log(id);
        //console.log(nome);

        campoNome.text(nome);


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




function buscarMensagens() {

    $.ajax({
        
        url: "buscarMensagenstst.php",
        method: "POST",     
        dataType: "Json",
        data: {id: id},
        
        success: function (response) {
            
            //console.log(msg);

            ////console.log(response.length);
            ////console.log(response)

            for ( i = 0; i < response.length; i++) {
                
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
            
            contDb = response.length;
            console.log(contDb)

            // 

            

            setInterval(() => {
                
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
                        }
     
                       
                    }
                });

            }, 500);

        },

    })       


}

$('#form-msg').submit(function(e){ // Pegando todo o form usando Jquery e atribuindo uma função no submit

    e.preventDefault(); // Cancelando a ação padrão (refresh da pag)

    msg = $('#msg').val(); // Pegando elemento e depois o value de input com id == "msg" 
    //console.log(msg);

    $.ajax({
        type: "POST",
        url: "enviarMensagem.php",
        data: {msg: msg, id: id},
        
        success: function (response) {
            //console.log(response)
           
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




/* Conteudo responsivo */




