window.addEventListener('load', recargar);

//reload
function recargar(){
    var peticion = new XMLHttpRequest();
    peticion.onreadystatechange=function(){
        if (this.readyState==4) {
            document.getElementById('tabla-estu').innerHTML=this.responseText;
            //asignarEventos();
            console.log('texto');
        }
    };
    peticion.open('GET', 'ver', true);
    peticion.send();
    // document.querySelector('#boton').addEventListener('click', paginacion);
}

// function asignarEventos(){
//     document.getElementById('btn').addEventListener('click', accion);

//     var btnElim = document.getElementsByClassName('delete');

//     for(var i=0; i<btnElim.length; i++){
//         btnElim[i].addEventListener('click', eliminar);
//     }
// }

function paginacion(pag){
    //const pag = this.dataset.id;
    console.log(pag);
    httpRequest('http://localhost/Rop/estudiante/ver/'+pag);
}

function httpRequest(url){
    const http = new XMLHttpRequest();
    http.open('GET', url);
    http.send();
}


