import Api from './api.js';
class Notas{
    constructor() {
        this.URL_BASE = "http://localhost/Rop/nota/listaFinal";
    }

    async getNotas(){
        let items = await(Api.getAll(this.URL_BASE));
        let ranking = items.sort((a,b) =>(b.promedio > a.promedio) ? 1 : -1);
        let nombres = items.map(items => items.estudiante);
        let proms = items.map(items => items.promedio);
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
			if (firstPoint !== undefined)
				alert(label + ": " + value);
		};
    }
}
export default Notas;