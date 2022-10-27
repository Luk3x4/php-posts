const btn = document.querySelector('.links span');
const nav = document.querySelector('nav');

btn.addEventListener('click', () =>{
    nav.classList.toggle('active');
})