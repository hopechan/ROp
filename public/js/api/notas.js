import Api from './api.js';
class Notas{
    constructor() {
        this.URL_BASE = "http://localhost/Rop/nota/";
    }
//`\n${idestudiante} ${estudiante} ${materia} ${promedio}`
    async getNotas(tipo){
        let items = await(Api.getAll(`${this.URL_BASE}${tipo}`));
        //let datos = items.map(({idestudiante,estudiante,materia,promedio}) => ).join('');
        //const obtenerPromPorId = array => array.filter(({idestudiante}) => idestudiante == 1)
        var filtros = {};
        items.forEach( item => {
            let filtro = filtros[item.estudiante] = filtros[item.estudiante] || {};
        });
        console.log(items);      
        console.log(JSON.stringify(filtros));
        return filtros;
    }

}

export default Notas;