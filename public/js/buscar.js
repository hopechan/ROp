const URL_BASE = "http://localhost/Rop/nota/",
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

function getAll(callback) {
    xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", `${URL_BASE}get`);
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
    let tbody = document.querySelector("#tbody-id");
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

        celda = nuevaFila.insertCell(-1);
        celda.innerHTML = crearBoton(items[i].idnota, 'E');

        celda = nuevaFila.insertCell(-1);
        celda.innerHTML = crearBoton(items[i].idnota, 'B');
    }
}

function crearBoton(id, tipo) {
    if (tipo == 'E') {
        var btn = `<a class='right btn-floating btn-large waves-effect waves-white btn-flat white-text grey darken-3 btn modal-trigger' href='${URL_BASE}verNota/${id}'><i class="material-icons">refresh</i></a>`;
    }else{
        var btn = `<button class="left btn-floating btn-large waves-effect waves-black btn-flat white-text red accent-4 btn btndrop" data-id="${id}"><i class="material-icons">delete</i></button>`;
    }
    return btn;
}

document.addEventListener('keypress', function () {  
    txtFiltro = document.getElementById("txtFiltro").value;
    console.log(txtFiltro);
    filtrar(txtFiltro, function () { 
        if (txtFiltro == '') {
            console.log('el input esta vacio');
            getAll();
        } else {
            llenarTabla(JSON.parse(this.responseText));
        }
     });
})