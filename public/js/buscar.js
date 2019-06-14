const URL_BASE = "http://localhost/Rop/nota/",
        dtFiltro = document.getElementById('filtro');

function filtrar(filtro, callback) {
    let data = `filtro=${filtro}`;
    xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", `${URL_BASE}filtrar/${filtro}`);
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(`${URL_BASE}filtrar/${filtro}`);
            var response = JSON.parse(xmlhttp.responseText);
            console.log(response);
        }
    };
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
    xmlhttp.send(data);
}

document.addEventListener('keypress', function (e) {  
    txtFiltro = document.getElementById("txtFiltro").value;
    console.log(txtFiltro);
    filtrar(txtFiltro, function () { 
        console.log(this.responseText);
     });
})