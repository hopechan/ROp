
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