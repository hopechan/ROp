window.addEventListener('load', recargar);
//window.addEventListener('load', paginacion);

//reload
function recargar(){
    var peticion = new XMLHttpRequest();
    peticion.onreadystatechange=function(){
        if (this.readyState==4) {
            document.getElementById('tabla-estu').innerHTML=this.responseText;
            asignarEventos();
        }
    };
                pag=1;
                peticion.open('GET', 'ver?pagina='+pag);
                peticion.send();
}

function recargarx2(pag){
    var peticion = new XMLHttpRequest();
    peticion.onreadystatechange=function(){
        if (this.readyState==4) {
            document.getElementById('tabla-estu').innerHTML=this.responseText; 
            asignarEventos();
        }
    };
    peticion.open('GET', 'ver?pagina='+pag);
                peticion.send();
}

function asignarEventos(){
    var btnEditar = document.getElementsByClassName('actu');
    var btnEliminar = document.getElementsByClassName('elim');

    for (let i= 0; i < btnEditar.length; i++) {
        btnEditar[i].addEventListener('click', actualizar);
        btnEliminar[i].addEventListener('click', eliminar);
    }
}

function eliminar(){
    const data = this.dataset.id;
    httpRequest("http://localhost/Rop/estudiante/eliminar/" + data, function () {
        recargar();
        M.toast({html: 'Estudiante eliminado correctamente!', classes: 'red accent-4 rounded white-text'});                   
    })

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

function actualizar(){
    const data = this.dataset.id;
    var peticion = new XMLHttpRequest();
    peticion.onreadystatechange=function(){
        if (this.readyState==4) {
            document.getElementById('frm').innerHTML=this.responseText;
            recargar();
        }
    };
    peticion.open('GET', 'subeditar/'+data);
    peticion.send();
}
