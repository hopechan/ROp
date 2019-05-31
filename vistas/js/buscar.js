import ControlData from "./controlData.js";
class Busquedas{
    constructor(){
        this.url_base = "/Rop/controlador/buscar.php";
    }

    async buscar(tabla, busqueda){
        //console.log(`${tabla} ${busqueda}`);
        const resultado = await ControlData.getDatos(`${this.url_base}?tabla=${tabla}&busqueda=${busqueda}`);
        console.log(resultado);
    }
}
export default Busquedas;
