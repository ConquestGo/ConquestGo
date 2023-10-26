var Slash = document.getElementById('slash');
var Eye = document.getElementById('eye');
var Slash_sing = document.getElementById('slash_singin');
var Eye_sing = document.getElementById('eye_singin');
var PassWord = document.getElementById('password');
var PassWord_sing = document.getElementById('password_singin')
function Slash_Click(){
    Slash.style.display = 'none';
    Eye.style.display = 'block';
    PassWord.type = 'text';
}
function Eye_Click(){
    Eye.style.display = 'none';
    Slash.style.display = 'block';
    PassWord.type = 'password';
};
function Slash_Sing(){
    Slash_sing.style.display = 'none';
    Eye_sing.style.display = 'block';
    PassWord_sing.type = 'text';
}
function Eye_Sing(){
    Eye_sing.style.display = 'none';
    Slash_sing.style.display = 'block';
    PassWord_sing.type = 'password';
}
Slash.addEventListener('click', Slash_Click);
Eye.addEventListener('click', Eye_Click);
Slash_sing.addEventListener('click', Slash_Sing);
Eye_sing.addEventListener('click', Eye_Sing);