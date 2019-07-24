window.addEventListener('load', accion);

function accion()
{
    var btnGuardar = document.getElementsByClassName('guardar');
    for (let i = 0; i < btnGuardar.length; i++) {
        btnGuardar[i].addEventListener('click', getNumero);
    }

    function getNumero()
    {
        var idFrm = this.value
        var formulario = document.getElementById(idFrm);
        formulario.addEventListener('submit', function(evento){
        evento.preventDefault();
            //alert('vamos super bien, formulario N° ' + idFrm);
            var datos = new FormData(formulario);
            fetch('http://localhost/Rop/nota/editarNota', {
                method: 'POST',
                body: datos
            })
            document.location.reload(true);
   })
    }

    

}

     