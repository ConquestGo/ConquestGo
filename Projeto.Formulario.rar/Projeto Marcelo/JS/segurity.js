input_password = document.getElementById('password');
input_password_singin = document.getElementById('password_singin');
MensageError = document.getElementById('MessageError');
MensageError_Singin = document.getElementById('MessageError_singing');
input_password.addEventListener('input', function(){
    var valor = input_password.value;
    if(valor.length > 8){
        input_password.value = valor.slice(0,8);
        MensageError.style.display = 'none';      
    }
    else{
        MensageError.textContent = 'A senha deve ter 8 caracteres';
    }
});
input_password_singin.addEventListener('input', function(){
    var value = input_password_singin.value;
    if(value.length > 8){
        input_password_singin.value = value.slice(0,8);
        MensageError_Singin.style.display = 'none';
    }
    else{
        MensageError_Singin.textContent = 'A senha deve ter 8 caracteres';
    }
});