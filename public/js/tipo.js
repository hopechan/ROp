window.addEventListener('load',recargar);

//Metodo recargar
function recargar(){
    var peticion=new XMLHttpRequest();
    peticion.onreadystatechange=function(){
        if (this.readyState==4) {
            document.getElementById('tbody-id').innerHTML=this.responseText;
            asignarEventos();
        }
    };
    peticion.open('GET','tipo/recargar');
    peticion.send();
}
function asignarEventos(){
    document.getElementById('btn').addEventListener('click',accion);

    var btnEdit=document.getElementsByClassName('btnEditar');
    var btnElim=document.getElementsByClassName('btnEliminar');

    for(var i=0; i<btnEdit.length;i++){
        btnEdit[i].addEventListener('click',actualizar);
        btnElim[i].addEventListener('click',eliminar);
    }
}

function accion(){
var tipo=document.getElementById('Tipo').value;
var descripcion=document.getElementById('Descripcion').value;

if (tipo==="") {
    M.toast({html: 'La evaluación no puede estar vacia!!', classes: 'red accent-4 rounded white-text'});
    return false;
}
if (descripcion==="") {
    M.toast({html: 'La descripcion no puede estar vacia!!', classes: 'red accent-4 rounded white-text'});
    return false;
}
var peticion=new XMLHttpRequest();

    peticion.onreadystatechange=function(){
        if (this.readyState==4) {
            document.getElementById('tbody-id').innerHTML=this.responseText;
            recargar();
            limpiar();
        }
    };
    peticion.open('POST','tipo/agregarTipo');
    peticion.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    peticion.send('tipo='+tipo+'&descripcion='+descripcion);
    M.toast({html: 'Tipo agregado correctamente!', classes: 'green rounded white-text'});
    $('.modal').modal('close');
}

function actualizar(){
}

function eliminar(){
            const id = this.dataset.id;
    
            const confirm = window.confirm("¿Deseas eliminar el Tipo?");
            if (confirm) {
                //solicitud AJAX
                httpRequest("http://localhost/Rop/tipo/eliminarTipo/" + id, function () {
                    //console.log(this.responseText);
                    if(this.responseText=="si"){
                    recargar();
                    M.toast({html: 'Tipo eliminado correctamente!', classes: 'green rounded white-text'}); 
                    }else{
                    M.toast({html: 'Tipo no eliminado!', classes: 'red accent-4 rounded white-text'});
                    }
                });
            }
            
    
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
}

function limpiar(){
    document.getElementById('Tipo').value="";
    document.getElementById('Descripcion').value="";
}

