window.addEventListener('load', accion);

function accion()
{
    var btnGuardar = document.getElementsByClassName('guardar');
    var btnEditar = document.getElementsByClassName('editar');
    for (let i = 0; i < btnGuardar.length; i++) {
        btnGuardar[i].addEventListener('click', getNumero);
        btnEditar[i].addEventListener('click', editar);
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

    function editar(){
        let idFrm = this.id;
        let formulario = document.getElementById(idFrm);
        formulario.nota_p1.disabled = false;
        formulario.nota_p2.disabled = false;
        formulario.nota_p3.disabled = false;
        formulario.nota_p4.disabled = false;
        var btn = formulario.getElementsByTagName('button')[0];
        console.log(btn);
    }
}

