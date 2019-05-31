$(document).ready(function(){
vertipo();
let edit = false;
$('#tipe-form').submit(function(e){
    const postData = {
            name: $('#Tipo').val(),
            descripcion: $('#Descripcion').val(),
            id: $('#idtipo').val()
    };
    //ternario
    const url = edit == false ? 'agregartipo.php' : 'editarTipo.php';

    $.post(url, postData, function (response){
        vertipo();
       $('#tipe-form').trigger('reset')
       if(url=='agregartipo.php'){
        M.toast({html: "Se ha ingresado el elemento!", classes: "green rounded white-text"});
       }else{
        M.toast({html: "Se ha actualizado el elemento!", classes: "green rounded white-text"}); 
       }
       edit = false;
    });
    e.preventDefault();
});

function vertipo(){
    $.ajax({
        url: 'verTipo.php',
        type: 'GET',
        success: function (response) {
            let tipe = JSON.parse(response);
            let template = '';
            tipe.forEach(task=>{
                template += `
                <tr tipoid="${task.id}">
                   <td style="display:none;">${task.id}</td>
                   <td>${task.name}</td>
                   <td>${task.descripcion}</td>
                   <td>
                   <button class="borrarTipo btn-floating btn-large waves-effect waves-black btn-flat white-text red accent-4 btn"><i class="material-icons">delete</i></button>
                   <button href="#modal1" class="editarTipo modal-trigger btn-floating btn-large waves-effect waves-white btn-flat white-text grey darken-3 btn"><i class="material-icons">refresh</i></button>
                   </td>
                </tr>
                `
            });
            $('#tipe').html(template);
        }
   });
}

$(document).on('click', '.borrarTipo', function(){
     let element = $(this)[0].parentElement.parentElement;
     let id= $(element).attr('tipoid');
     $.post('borrarTipo.php', {id}, function(response){
        M.toast({html: "Se ha eliminado el elemento!", classes: "red accent-4 rounded white-text"});
        vertipo();
     })
});

$(document).on('click', '.editarTipo', function(){
    let element = $(this)[0].parentElement.parentElement;
    let id= $(element).attr('tipoid');
    $.post('tareatipo.php', {id}, function(response){
        const task = JSON.parse(response);
        $('#idtipo').val(task.id);
        $('#Tipo').val(task.name);
        $('#Descripcion').val(task.descripcion);
        edit = true;
    })
});
});