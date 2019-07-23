window.addEventListener('load', cargar) //al cargar la pagina se cargara la funcion
var cuerpo = document.querySelector('#cuerpo') //aqui insertaremos las cosas
var frm = document.querySelector('#frm') //aqui insertaremos las cosas
var respuesta = document.querySelector('#respuesta') //aqui insertaremos las cosas

//funcion para cargar el contenido
function cargar() {
	fetch('Materia/tabla')
		.then(data => data.text())
		.then(texto => {
            cuerpo.innerHTML = texto
            accion()
        })
}

function accion() {
	btnEliminar = document.getElementsByClassName('Eliminar')

	for (var i = 0; i < btnEliminar.length; i++) {
		btnEliminar[i].addEventListener('click', eliminar)
		
	}
}

formulario = document.querySelector('#tipe-form')
formulario.addEventListener('submit', function (e) {
	e.preventDefault()

	var datos = new FormData(formulario)
	fetch('Materia/agregarMateria/', {
			method: 'POST',
			body: datos
		}).then(res => res.text())
		.then(texto => {
            respuesta = texto
            if(texto=="no"){
                M.toast({html: 'Materia no agregada!',classes: 'rounded red accent-4'})
                return false
            }else{
                cargar(),
                M.toast({html: 'Agregado con exito!',classes: 'rounded green'});
            }
		})
})

function eliminar() {
	fetch('Materia/eliminarMateria/' + this.value)
		.then(res => res.text())
		.then(texto => {
			respuesta = texto
            if(texto=="no"){
                M.toast({html: 'Materia no eliminada por que esta relacionada!',classes: 'rounded red accent-4'})
                return false
            }else{
                cargar(),
			M.toast({html: 'Eliminado con exito!',classes: 'rounded green'})
            }
		})
}

function editar() {
}




