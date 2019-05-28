import Busquedas from "./buscar.js";
class Componente extends HTMLElement{
    constructor(){
        super();
        this.attachShadow({mode: 'closed'});
    }

    connectedCallback(){
        let accion = function(dato1, dato2){
            Busquedas.buscar(dato1, dato2);
        }
        var parametro = document.querySelector("#txtBusqueda");
        parametro.onkeyup = accion(this.getAttribute("tabla"), this.getAttribute("busqueda"));
    }

    attributeChangeCallback(){}

    disconectedCallback(){}
    
}
customElements.define("rop-buscar", Componente);
export default Componente;