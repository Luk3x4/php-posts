const eye = document.querySelector('span');
const password = document.querySelector('[type="password"]')
let type = true;

eye.addEventListener('click', () =>{
    type = !type;
    if(type){
        password.type = 'password'
        eye.textContent = 'visibility_off';
    }else{
        password.type = 'text';
        eye.textContent = 'visibility';
    }
})