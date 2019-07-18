window.addEventListener('load', function () {
    document.querySelector('#imprimir').addEventListener('click', imprimir);
    imprimir();
});

function imprimir() {
    window.print();
}
