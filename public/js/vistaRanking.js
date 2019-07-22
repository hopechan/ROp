import TablaRanking from './api/tablaRanking.js';
document.addEventListener('DOMContentLoaded', function (e) {
    e.preventDefault();
    const ranking = new TablaRanking();
    let data = ranking.getNotas();
})