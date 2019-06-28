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

        if (nombre == '') {
            M.toast({html: "El campo nombre no puede quedar vacío", classes: "red accent-4 rounded white-text"});
            return false;
        }
        if (apellido == '') {
            M.toast({html: "El campo apellido no puede quedar vacío", classes: "red accent-4 rounded white-text"});
            return false;
        }
        if (fecha_nacimiento == '') {
            M.toast({html: "El campo fecha no puede quedar vacío", classes: "red accent-4 rounded white-text"});
            return false;
        }
        if (telefono == '') {
            M.toast({html: "El campo teléfono no puede quedar vacío", classes: "red accent-4 rounded white-text"});
            return false; 
        }
        if (email == '') {
            M.toast({html: "El campo e-mail no puede quedar vacío", classes: "red accent-4 rounded white-text"});
            return false;
        }
        if (anio == '') {
            M.toast({html: "El campo año no puede quedar vacío", classes: "red accent-4 rounded white-text"});
            return false;
        }
        if (direccion == '') {
            M.toast({html: "El campo dirección no puede quedar vacío", classes: "red accent-4 rounded white-text"});
            return false; 
        }
        if (centro_escolar == '') {
            M.toast({html: "El campo Centro Escolar no puede quedar vacío", classes: "red accent-4 rounded white-text"});
            return false;
        }
        if (seccion == '') {
            M.toast({html: "El campo sección no puede quedar vacío", classes: "red accent-4 rounded white-text"});
            return false;
        }
    })
})

