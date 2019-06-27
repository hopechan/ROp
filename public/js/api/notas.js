import Api from './api.js';
class Notas{
    constructor() {
        this.URL_BASE = "http://localhost/Rop/nota/listaFinal";
    }

    async getNotas(){
        let items = await(Api.getAll(this.URL_BASE));
        items.forEach(item => {
            console.log(item.promedio);
        });

        let ranking = items.sort((a,b) =>(b.promedio > a.promedio) ? 1 : -1);
        console.log(ranking);
        return ranking;
    }
}

export default Notas;