class Api{
     async getAll(url) {
        let data = await(fetch(url)
        .then(respuesta => {
            console.log(respuesta)
            return respuesta.json()
        })
        .catch(error => {
            console.log("Hubo un error " + error)
        })
        )
        return data;
    }
    
     getProm() {
        fetch(`${URL_BASE}test`)
            .then(res=>res.json())
            .then(res => res.map(promedio => promedio.promedio))
            .then(promedios => test(promedios))
            .catch(error =>{console.log(`Ha ocurrido un error ${error}`)})
    }
}

export default new Api;