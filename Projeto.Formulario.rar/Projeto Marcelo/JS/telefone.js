var Telefone = document.getElementById('telefone');
var Mensage_Erro_Telefone = document.getElementById('MessageError_singing_telefone');

function Telefone_input(){
    Telefone.value = Telefone.value.replace(/\D/g,'');
    if(Telefone.value.length >= 11){
        Telefone.value = Telefone.value.slice(0,11);
        Telefone.value = Telefone.value.replace(/^(\d{2})(\d{5})(\d{4})/ , '($1) $2 - $3');
        Mensage_Erro_Telefone.style.display = 'none';
    }
    else{
        Mensage_Erro_Telefone.style.display = 'block';
        Mensage_Erro_Telefone.textContent = 'O telefone deve ter o DD do Pais Ex: (61)';
    }
}

Telefone.addEventListener('input', Telefone_input);