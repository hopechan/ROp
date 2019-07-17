window.addEventListener('load',listener);

function listener(){
    document.getElementById('tipe-form').addEventListener('submit',vacio);
}
const botones = document.querySelectorAll(".btndrop");

botones.forEach(boton => {

    boton.addEventListener("click", function () {
        const id = this.dataset.id;

        const confirm = window.confirm("¿Deseas eliminar la nota?");
        if (confirm) {
            //solicitud AJAX
            httpRequest("http://localhost/Rop/nota/eliminarNota/" + id, function () {
                //console.log(this.responseText);
                const tbody = document.querySelector("#tbody-id");
                const fila  = document.querySelector("#fila-"+ id);
                if(this.responseText=="si"){
                tbody.removeChild(fila);
                M.toast({html: 'Nota eliminada correctamente!', classes: 'green rounded white-text'});  
                }else{
                M.toast({html: 'Nota no eliminada!', classes: 'red accent-4 rounded white-text'});
                }
            });
        }
        
    });
});

function httpRequest(url, callback){
    const http = new XMLHttpRequest();
    http.open("GET", url);
    http.send();

    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200){
            callback.apply(http);
        }else{
        }
    }
}

function vacio(e){
   var estudiante=document.getElementById('estudiante').value;
   var materia=document.getElementById('materia').value;
   var nota_p1=document.getElementById('nota_p1').value;
if (estudiante==="") {
    e.preventDefault();
    M.toast({html: 'El estudiante no puede estar vacio!!', classes: 'red accent-4 rounded white-text'});
    return false;
}
if (materia==="") {
    e.preventDefault();
    M.toast({html: 'La materia no puede estar vacia!!', classes: 'red accent-4 rounded white-text'});
    return false;
}
if (nota_p1==="") {
    e.preventDefault();
    M.toast({html: 'La nota de el periodo 1 no puede estar vacia!!', classes: 'red accent-4 rounded white-text'});
    return false;
}
if (nota_p1<0) {
    e.preventDefault();
    M.toast({html: 'La nota de el periodo 1 no puede ser menor a 0!!', classes: 'red accent-4 rounded white-text'});
    return false;
}
if(nota_p1>10){
    e.preventDefault();
    M.toast({html: 'La nota de el periodo 1 no puede ser mayor a 10!!', classes: 'red accent-4 rounded white-text'});
    return false;
}
}