import Notas from './api/notas.js';
document.addEventListener('DOMContentLoaded', function (e) {
    e.preventDefault();
    const CCGK = new Notas();
    CCGK.getNotas('CCGK');
})