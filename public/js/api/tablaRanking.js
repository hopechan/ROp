import Api from './notas';
class TablaRanking{
    constructor(){
    }

    async getNotas(){
        let items = await(Api.getAll(`http://localhost/Rop/nota/listaFinal`));
        let filtro = items.filter((obj, pos, arr) => {
            return arr.map(mapObj => mapObj.estudiante).indexOf(obj.estudiante) == pos;
        });
        let ranking = filtro.sort((a,b) =>(b.promedio > a.promedio) ? 1 : -1);
        let tblRanking = document.querySelector('#tblRanking');
        let tabla = document.createElement('table');
        for (let index = 0; index < ranking.length; index++) {
            var row = document.createElement('tr');
            for (let j = 0; j < array.length; j++) {
                const element = array[j];
                
            }
        }
    }
}

export default TablaRanking;


