$(document).ready(function(){
    tablaUbicaciones();
});

function tablaUbicaciones() {
    tubicaciones = $("#tblUbicaciones").DataTable({
        'Paging': true,
        'info': true,
        'filter': true,
        'stateSave': true,
        'ajax': {
            "url": baseurl + "cubicacion/getUbicaciones",
            "type": "POST",
            "data": {
            },
            dataSrc: '',
        },
        'columns': [
            { data: 'IdUbicacion' },
            { data: 'Nombre' },
            {
                'orderable': true,
                render: function (data, type, row) {
                    return '<span class="text-center">' +
                        '<div class="dropdown">' +
                        '<button class="btn btn-default dropdown-toggle" type="button" id="drowndownmenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">' +
                        'Acciones  ' +
                        '<span class="caret"></span>' +
                        '</button>' +
                        '<ul class="dropdown-menu pull-right" aria-labelledby="drowndownmenu1">' +
                        '<li><a href="' + baseurl + 'cubicacion/detalles/' + row.IdUbicacion + '">Detalles</a></li>' +
                        '<li><a href="#" title="Modificar Datos" data-toggle="modal" data-target="#modalUbicacion" onclick="_selUbicacion(\'' + row.IdUbicacion + '\',\'' + row.Nombre + '\');">Modificar</a></li>' +
                        '</ul>' +
                        '</div>' +
                        '</span>';
                }
            }
        ],

        "order": [[0, "asc"]],
    });
}

_selUbicacion = function(id, nombre){
    $('#txtidUbicacion').val(id);
    $('#txtNombre').val(nombre);
}

vaciarModalUbicacion = function(){
    $('#txtidUbicacion').val('0');
    $('#txtNombre').val('');
}

$('#guardarUbicacion').click(function () {
    var idUb = $('#txtidUbicacion').val();   
    var nombreUb =  $('#txtNombre').val();
    var method = '';
    if (idUb == 0) { method = 'cubicacion/guardarUbicacion' } else { method = 'cubicacion/actualizarUbicacion' }

    $.post(baseurl + method,
        {
            idUbicacion: idUb,
            nombreUbicacion: nombreUb
        },
        function (data) {
            if (data != null) {
                $("#modalUbicacion").modal('hide');

                tubicaciones.destroy();
                tablaUbicaciones();
                $.toast(''+data);
                
            } else {
                $.toast('Error, intente nuevamente');
            }
        });
});