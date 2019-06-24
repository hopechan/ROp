$(document).ready(function(){
    $('#formulario').submit(function(){
        var nombre = document.getElementById('nombre').value;
    var apellido = document.getElementById('apellido').value;
    var fecha_nacimiento = document.getElementById('fecha').value;
    var telefono = document.getElementById('tel').value;
    var email = document.getElementById('mail').value;
    var anio = document.getElementById('anio').value;
    var direccion = document.getElementById('dir').value;
    var centro_escolar = document.getElementById('ce').value;
    var seccion = document.getElementById('seccion').value;

    if (nombre == '' || apellido == '' || fecha_nacimiento == '' || telefono == '' || email == '' || anio == '' || direccion == '' || centro_escolar == '' || seccion == '') {
                alert('Por favor complete todos los campos');
                return false;
            }    
    })
})

