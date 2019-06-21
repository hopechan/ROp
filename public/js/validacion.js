window.addEventListener('load', iniciar);
function validar()
{
    alert('hola');
}
 function iniciar()
 {
    document.getElementById('ok').addEventListener('click', validar);
 }