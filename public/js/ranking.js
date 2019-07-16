import Notas from './api/notas.js';
document.addEventListener('load', function (e) {
    const ranking = new Notas();
    let data = ranking.getNotas();
})