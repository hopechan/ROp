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
        Highcharts.chart('container', {
            chart:{
                type: 'column'
            },
            title :{
                text: 'TOP Ranking Oportunidades'
            },
            yAxis:{
                title:{
                    text: 'Promedio'
                }
            },
            xAxis:{
                categories:nombres
            },
            legend:{
                enable:false
            },
            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> de nota<br/>'
            },
            series:[{
                name: "Estudiante",
                colorByPoint: true,
                data: proms
            }]
        });
        return ranking;
    }
}
export default Notas;