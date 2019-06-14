const URL_BASE = "http://localhost/Rop/nota/",
        dtFiltro = document.getElementById('filtro'),
        tabla = document.getElementById("tabla");

function filtrar(filtro, callback) {
    let data = `filtro=${filtro}`;
    xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", `${URL_BASE}filtrar/${filtro}`);
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            callback.apply(xmlhttp);
            var response = JSON.parse(xmlhttp.responseText);
        }
    };
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
    xmlhttp.send(data);
}

function llenarTabla(items) {
    let tbody = document.querySelector("#cuerpoTabla");
    tbody.innerHTML = "";
    for (let i = 0; i < items.length; i++) {
        let nuevaFila = tbody.insertRow(-1);
        let celda;
        celda = nuevaFila.insertCell(-1);
        celda.innerHTML = items[i].idestudiante;

        celda = nuevaFila.insertCell(-1);
        celda.innerHTML = items[i].idmateria;

        celda = nuevaFila.insertCell(-1);
        celda.innerHTML = items[i].nota;

    }
    //tabla.appendChild(tbody);
}

document.addEventListener('keypress', function () {  
    txtFiltro = document.getElementById("txtFiltro").value;
    console.log(txtFiltro);
    filtrar(txtFiltro, function () { 
        llenarTabla(JSON.parse(this.responseText));
        //console.log(JSON.parse(this.responseText));
     });
})