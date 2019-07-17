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
}

export default new Api;