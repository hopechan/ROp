$(document).ready(function () {
    var URL = "http://localhost/Rop/";
    console.log('Im in');
    console.log(`${URL}controllers/nota.php`);
    //load_data();

    function load_data(filtro) {
        $.ajax({
            type: "post",
            url: `${URL}controllers/nota.php`,
            data: "{filtro:filtro}",
            success: function (data) {
                console.log(`${URL}controllers/nota.php`);
                $('#tabla').html(data);
            }
        });
    }

    $("#txtFiltro").keyup(function () { 
        var busqueda = $(this).val();
        if (busqueda != '') {
            console.log(busqueda);
            //load_data(busqueda);
        } else {
            load_data();
        }
    });
});