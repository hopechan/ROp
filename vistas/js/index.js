import Busquedas from "./buscar.js";
document.addEventListener('DOMContentLoaded', 
    function (event) { 
        console.log("Im in");
        var busqueda = document.querySelector("#txtBusqueda");
        busqueda.addEventListener('keyup', function (event) { 
            event.preventDefault();
            //console.log(busqueda.value);
            const inst = new Busquedas();
            inst.buscar("estudiante", busqueda.value)                                                                                                                                         
         })
})
