import Notas from './api/notas.js';
document.addEventListener('DOMContentLoaded', function (e) {
    e.preventDefault();
    const ranking = new Notas();
    let data = ranking.getNotas();
    console.log(data);
    
})