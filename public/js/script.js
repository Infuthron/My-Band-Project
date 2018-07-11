let stairs = document.querySelectorAll('.stairs a');

for (let i=0; i<stairs.length; i++) {
    stairs[i].addEventListener('click', (e)=> e.preventDefault());
}