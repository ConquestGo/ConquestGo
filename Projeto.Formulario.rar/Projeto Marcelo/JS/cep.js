var CEP = document.getElementById('cep');
var Mensage_Error_CEP = document.getElementById('MessageError_singing_cep');

function CEP_input(){
    CEP.value = CEP.value.replace(/\D/g,'');
    if(CEP.value.length >= 8){
        CEP.value = CEP.value.slice(0,8);
        CEP.value = CEP.value.replace(/^(\d{5})(\d{3})/,'$1 - $2');
        Mensage_Error_CEP.style.display = 'none';
    }
    else{
        Mensage_Error_CEP.style.display = 'block';
        Mensage_Error_CEP.textContent = 'O Cep deve ser valido';
    }
} 

CEP.addEventListener('input',CEP_input);
