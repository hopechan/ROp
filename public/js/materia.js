let tblMaterias = document.querySelector("#tblMaterias");
let dtMaterias = new DataTable(tblMaterias);
const botones = document.querySelectorAll(".btndrop");

botones.forEach(boton => {

    boton.addEventListener("click", function () {
        const id = this.dataset.id;

        const confirm = window.confirm("¿Deseas eliminar la materia?");
        if (confirm) {
            //solicitud AJAX
            httpRequest("http://localhost/Rop/materia/eliminarMateria/" + id, function () {
                //console.log(this.responseText);
                    const tbody = document.querySelector("#tbody-id");
                const fila  = document.querySelector("#fila-"+ id);
                if(this.responseText=="si"){
                tbody.removeChild(fila);
                M.toast({html: 'Materia eliminada correctamente!', classes: 'green rounded white-text'});  
                }else{
                M.toast({html: 'Materia no eliminada!', classes: 'red accent-4 rounded white-text'});
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

document.getElementById('btn').addEventListener('click',vacio);

function vacio(){
    var idtipo=document.getElementById('idtipo').value;
    var materia=document.getElementById('materia').value;
if (idtipo==="") {
    M.toast({html: 'El tipo no puede estar vacio!!', classes: 'red accent-4 rounded white-text'});
    return false;
}
if (materia==="") {
    M.toast({html: 'La materia no puede estar vacia!!', classes: 'red accent-4 rounded white-text'});
    return false;
}
}