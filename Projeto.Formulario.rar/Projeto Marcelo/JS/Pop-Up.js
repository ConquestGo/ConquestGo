var link = document.querySelector('.modal-link');
var overlay = document.querySelector('.overlay');
var modal = document.querySelector('.modal');

function Link(event){
    event.preventDefault();
    overlay.style.display = 'block';
    modal.style.display = 'block';
}
function Overlay(){
    overlay.style.display = 'none';
    modal.style.display = 'none';
}

link.addEventListener('click', Link);
overlay.addEventListener('click', Overlay);