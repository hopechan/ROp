import Notas from './api/notas.js';
document.addEventListener('DOMContentLoaded', function (e) {
    e.preventDefault();
    const ranking = new Notas();
    let data = ranking.rankingDiezPorCiento();
    console.log(data);
})