import Api from './api.js';
class Notas{
    constructor() {
        //URL_BASE = "http://localhost/Rop/";
    }

    diezPorCiento(arreglo){
        let filtro = Math.round(arreglo.length/10);
        if (filtro === 0) {
            return arreglo.length;
        } else {
            return filtro;
        }
    }

    async rankingDiezPorCiento(){
        let items = await(Api.getAll(`http://localhost/Rop/nota/listaFinal`));
        let filtro = items.filter((obj, pos, arr) => {
            return arr.map(mapObj => mapObj.estudiante).indexOf(obj.estudiante) == pos;
        });
        let ranking = filtro.sort((a,b) =>(b.promedio > a.promedio) ? 1 : -1);
        let diez = ranking.slice(0, this.diezPorCiento(ranking));
        let nombres = diez.map(items => items.estudiante);
        let proms = diez.map(items => items.promedio);
        let grafico = document.querySelector('#ranking');
        //lista.innerHTML = "Hola de js";
        let g = new Chart(grafico, {
            type: 'bar',
            data:{
                labels: nombres,
                datasets:[
                    {
                        label: "Promedio",
                        backgroundColor: ['#FF1000', '#808080', '#000000', '#FF0000', '#808080', '#000000', '#FF0000', '#808080', '#000000', '#FF0000'],
                        data:proms
                    }
                ]
            },
            options:{
                legend:{display:false},
                title:{
                    display: true,
                    text: "Top Ranking Oportunidades"
                },
            }
        });
        grafico.onclick = function(evt){
			var activePoints = g.getElementsAtEvent(evt);
			var firstPoint = activePoints[0];
			var label = g.data.labels[firstPoint._index];
			var value = g.data.datasets[firstPoint._datasetIndex].data[firstPoint._index];
            if (firstPoint !== undefined){
                let id = filtro.filter(item => item.estudiante == label).map(item => item.idestudiante);
                //http://localhost/Rop/estudiante/reportecxalumno/
                window.location = `http://localhost/Rop/estudiante/reportecxalumno/${id}`;
            }   
		};
    }

    async rankingCienPorCiento(){
        let items = await(Api.getAll(`http://localhost/Rop/nota/listaFinal`));
        let filtro = items.filter((obj, pos, arr) => {
            return arr.map(mapObj => mapObj.estudiante).indexOf(obj.estudiante) == pos;
        });
        let ranking = filtro.sort((a,b) =>(b.promedio > a.promedio) ? 1 : -1);
        let nombres = ranking.map(items => items.estudiante);
        let proms = ranking.map(items => items.promedio);
    }
}
export default Notas;