var CPF = document.getElementById('cpf');
var Mensage = document.getElementById('MessageError_singing_cpf');
function cpf_input(){
    CPF.value = CPF.value.replace(/\D/g,'');
    if( CPF.value.length > 11){
        CPF.value = CPF.value.slice(0,11);
        CPF.value = CPF.value.replace(/^(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3 - $4');
        Mensage.style.display = 'none';
    }else{
        Mensage.textContent = 'O Cpf deve ser Valido deve ter 11 Caracteres ';
    }
}
CPF.addEventListener('input',cpf_input);


