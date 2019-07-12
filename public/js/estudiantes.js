//funcion que al cargar la pagina utiliza el metodo fetch para traer la vista principal
window.addEventListener('load', traer);
function traer(){
    var contenedor = document.querySelector('#root');
    fetch('http://localhost/ROp/views/estudiantes/main.php')
    .then(data =>data.text())
    .then(texto =>{
        contenedor.innerHTML=`${texto}`
    }).catch(e =>console.error('Te mamaste el codigo karnal'));

    //funcionalidad del formulario modal matricula
    var formulario = document.getElementById('formulario');
    var toast = document.getElementById('toast');
    formulario.addEventListener('submit', function(evento){
            evento.preventDefault();
            //console.log('hola');
            var datos = new FormData(formulario);
            //console.log(datos.get('seccion'));
            fetch('http://localhost/ROp/estudiante/insert', {
                method: 'POST',
                body: datos
            })
        .then(res =>res.text())
        .then( respuesta =>{
                toast.innerHTML= respuesta ;
            
        })
    })
}

