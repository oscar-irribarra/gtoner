$(document).ready(function () {
    cargar_tabla();
});

$.post(
    baseurl + "/cimpresora/getImpresoras",
    {},
    function (data) {
        var c = JSON.parse(data);
        $.each(c, function (i, item) {
            $('#cboimpresoras').append('<option value="' + item.IdImpresora + '">' + item.Marca + ' ' + item.Modelo + '</option>');
        });
    });

$("form").on("submit", function (e) {
    e.preventDefault();
    $.ajax({
        type: $(this).attr('method'),
        url: $(this).attr('action'),
        data: $(this).serialize(),
        success: function (data) {
            console.log(data);
            cargar_tabla();
        },
        error: function (xhr, exception) {

        }
    });
});

function cargar_tabla() {
    table = $("#tblimp_asignadas").DataTable({
        'Paging': true,
        'info': true,
        'filter': true,
        'stateSave': true,
        'ajax': {
            "url": baseurl + "cdepartamento/impresoras_asignadas",
            "type": "POST",
            "data": {
                'iddep': $("#divid").val()
            },
            dataSrc: '',
        },
        'columns': [
            { data: 'IdImpDep' },
            { data: 'Marca' },
            { data: 'Modelo' },
            { data: 'Serie' },
            {
                'orderable': true,
                render: function (data, type, row) {
                      return '<button class="btn btn-default dropdown-toggle" type="button" id="drowndownmenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">' +
                            'Acciones' +
                            '<span class="caret"></span>' +
                            '</button>' +
                            '<ul class="dropdown-menu pull-right" aria-labelledby="drowndownmenu1">' +
                            '<li><a href="#" title="Asignar a departamento" data-toggle="modal" data-target="#modalAignarADepartamento">Ver Consumo</a></li>' +
                            '<li><a href="#" title="Modificar Datos" data-toggle="modal" data-target="#modalModificardatosimp" >Desasignar</a></li>' +
                           '</ul>'                   
                }
            }

        ],
        "order": [[1, "asc"]],

    });

}





