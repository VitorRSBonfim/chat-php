var formlogin = document.querySelector('#Login')
var formregistrar = document.querySelector('#Registrar')
var btncolor = document.querySelector('.corBtn')

document.querySelector('#btnLogin').addEventListener('click', () => {
    formlogin.style.left = "25px"
    formregistrar.style.left = "450px"
    btncolor.style.left = "0px"
})

document.querySelector('#btnRegistrar').addEventListener('click', () => {
    formlogin.style.left = "-450px"
    formregistrar.style.left = "25px"
    btncolor.style.left = "110px"
})