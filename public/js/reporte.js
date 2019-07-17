window.addEventListener('load', imprimir);

function imprimir() {
    var event = new KeyboardEvent("keydown", {
        code: 'control+p',
        keyCode: 80,
        charCode: 0
    });
    document.dispatchEvent(event);
}