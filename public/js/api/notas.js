import Api from './api.js';
class Notas{
    constructor() {
    }

    diezPorCiento(arreglo){
        let filtro = Math.round(arreglo.length/10);
        if (filtro === 0) {
            return arreglo.length;
        } else {
            return filtro;
        }
    }

    tabla(datos){
        let tbody = document.getElementById('class2017');
        console.log(tbody);
        let i = 1;
        let vacio = '';
        let limpiar = datos.filter(e => e.estudiante !== vacio);
        limpiar.forEach(dato => {
            var tr = document.createElement('tr');
            
            tr.innerHTML = `
                <td>#${i}</td>
                <td>${dato.estudiante}</td>
                <td><span >${dato.promedio}</span></td>`;
            tbody.appendChild(tr);
            i++;
        });
    }

    async rankingDiezPorCiento(){
        let items = await(Api.getAll(`http://localhost/Rop/nota/listaFinal`));
        let filtro = items.filter((obj, pos, arr) => {
            return arr.map(mapObj => mapObj.estudiante).indexOf(obj.estudiante) == pos;
        });
        let ranking = filtro.sort((a,b) =>(b.promedio > a.promedio) ? 1 : -1).filter(e => e.estudiante !== '');
        console.log(ranking);
        
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
                responsive: true,
                legend:{display:false},
                title:{
                    display: true,
                    text: "Top Ranking Oportunidades"
                },
                scales:{
                    yAxes:[{
                        display: true,
                        ticks: {
                            suggestedMin: 0, 
                            suggestedMax: 10,    // minimum will be 0, unless there is a lower value.
                            // OR //
                            beginAtZero: true ,
                            stepSize: 0.5  // minimum value will be 0.
                        }
                    }]
                }
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
        this.tabla(ranking);
    }
}
export default Notas;