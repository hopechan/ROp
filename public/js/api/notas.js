import Api from './api.js';
class Notas{
    constructor() {
        this.URL_BASE = "http://localhost/Rop/nota/";
        var estudiantes = {};
        var promedios = [];
        var nombres = [];
    }
//`\n${idestudiante} ${estudiante} ${materia} ${promedio}`
    async getNotas(tipo){
        let items = await(Api.getAll(`${this.URL_BASE}${tipo}`));
        //let datos = items.map(({idestudiante,estudiante,materia,promedio}) => ).join('');
        //const obtenerPromPorId = array => array.filter(({idestudiante}) => idestudiante == 1)
        const datos = items.map(item => item.estudiante);
        console.log(datos);
    }


}

export default Notas;