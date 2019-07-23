window.addEventListener('load', cargarfx);

function cargarfx()
{
    var divtabla = document.getElementById('tabla');
    var year = document.getElementById('param').value;
    var url = 'http://localhost/Rop/nota/neonotas/'+ year;
    console.log(url);
    fetch(url)
    .then(tabla =>tabla.text())
    .then(tabloide =>{
            divtabla.innerHTML= `${tabloide}`;
            accion();
    })
}

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
        var contendor = document.getElementById('algo');
        var elementos = formulario.elements;
        formulario.addEventListener('submit', function(evento){
        evento.preventDefault();
            //alert('vamos super bien, formulario N° ' + idFrm);
            var datos = new FormData(formulario);
            fetch('http://localhost/Rop/nota/agregarNota', {
                method: 'POST',
                body: datos
            }).then(res => res.text())
            .then(respuesta => {
                    contendor.innerHTML = `${respuesta}`;
                    
            })
   })
    }
}

     