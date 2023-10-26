var Link_Login = document.querySelector('.link-Login');
var Link_Singin = document.querySelector('.link-Singin');
var Login_Formulario = document.querySelector('.container-Login');
var Singin_Formulario = document.querySelector('.container-Singin');
Link_Login.addEventListener('click', function(event){
    event.preventDefault();
    Singin_Formulario.style.opacity = '1';
    Singin_Formulario.style.left = '50%';
    Login_Formulario.style.opacity = '0';
    Login_Formulario.style.left = '-50%';
});
Link_Singin.addEventListener('click', function(event){
    event.preventDefault();
    Singin_Formulario.style.left = 'calc(-2 * 100%)';
    Singin_Formulario.style.opacity = '0';
    Login_Formulario.style.left = '50%';
    Login_Formulario.style.opacity = '1';
});