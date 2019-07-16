window.addEventListener('DOMContentLoaded', function () {
    console.log('I´m In');
    var btnLogin = document.getElementById('btnLogin');
    btnLogin.addEventListener('click', login);
});

function login() {
    console.log('holi desde js');
    console.log(`txtEmail=${document.querySelector('#txtEmail').value}&txtPassword=${document.querySelector('#txtPassword').value}`);
    fetch('http://localhost/Rop/main/logIn',{
        method : 'POST',
        headers:{
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        mode : 'same-origin',
        credentials: 'same-origin',
        body: `txtEmail=${document.querySelector('#txtEmail').value}&txtPassword=${document.querySelector('#txtPassword').value}`
    })
    .then(response =>  response.text())
    .then(pagina =>{
        console.log(pagina);
        let web = document.querySelector('html');
        web.innerHTML = pagina;
    })
    .catch(e => console.error(`Ocurrio un error: ${e}`));
}