//funcion que al cargar la pagina utiliza el metodo fetch para traer la vista principal
window.addEventListener('load', traer);
function traer(){
    var contenedor = document.querySelector('#root');
    fetch('http://localhost/ROp/views/estudiantes/main.php')
    .then(data =>data.text())
    .then(texto =>{
        contenedor.innerHTML=`${texto}`
    }).catch(e =>console.error('Te mamaste el codigo karnal'));
}

