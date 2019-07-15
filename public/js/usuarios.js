window.addEventListener('DOMContentLoaded', function () {
    var btnLogin = document.getElementById('btnLogin');
    btnLogin.addEventListener('submit', login);
});
function login() {
    console.log('holi desde js');
    fetch('http://localhost/Rop/main/logIn',{
        method : 'POST',
        headers:{
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        mode : 'same-origin',
        credentials: 'same-origin',
        body: `txtEmail=${document.querySelector('#txtEmail')}&txtPassword=${document.querySelector('#txtPassword')}`
    })
    .then(response => response.json())
    .then(json => console.log(json));
}