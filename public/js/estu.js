window.addEventListener('load', recargar);
//window.addEventListener('load', paginacion);

//reload
function recargar(){
    var peticion = new XMLHttpRequest();
    peticion.onreadystatechange=function(){
        if (this.readyState==4) {
            document.getElementById('tabla-estu').innerHTML=this.responseText;  
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
        }
    };
    peticion.open('GET', 'ver?pagina='+pag);
                peticion.send();
}