import Api from './api.js';
class Notas{
    constructor() {
        //URL_BASE = "http://localhost/Rop/";
    }

    async getNotas(){
        let items = await(Api.getAll(`http://localhost/Rop/nota/listaFinal`));
        let filtro = items.filter((obj, pos, arr) => {
            return arr.map(mapObj => mapObj.estudiante).indexOf(obj.estudiante) == pos;
        });
        let ranking = filtro.sort((a,b) =>(b.promedio > a.promedio) ? 1 : -1);
        let nombres = ranking.map(items => items.estudiante);
        let proms = ranking.map(items => items.promedio);
        let ids = ranking.map(items => items.idestudiante);
        let grafico = document.querySelector('#ranking');
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
                    text: "Top 10 Ranking Oportunidades"
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
                window.location = `http://localhost/Rop/estudiante/perfil/${id}`;
            }   
		};
    }

    armarGrafico(){
        
    }
}
export default Notas;