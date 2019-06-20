const URL_BASE = "http://localhost/Rop/nota/";

function obtenerNotas() {
    let respuesta = fetch(`${URL_BASE}test`)
        .then(res => {
            return res.text();
        })
        .then(function (data) { 
            console.log('Nota', data)
         })
        .catch(error =>{
            console.log("Hubo un error: " + error);
        });
}