$(document).ready(function () {
    tablaDispositivos();
});

function tablaDispositivos() {
    tdispositivo = $("#tblDispositivos").DataTable({
        'Paging': true,
        'info': true,
        'filter': true,
        'stateSave': true,
        'ajax': {
            "url": baseurl + "cdispositivo/getDispositivos",
            "type": "POST",
            "data": {
            },
            dataSrc: '',
        },
        'columns': [
            { data: 'IdDispositivo' },
            { data: 'Marca' },
            { data: 'Modelo' },
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
                        '<li><a href="' + baseurl + 'cimpresora/detalles/' + row.IdDispositivo + '">Detalles</a></li>' +
                        '<li><a href="#" title="Modificar Datos" data-toggle="modal" data-target="#modalDispositivo" onclick="selImpresora(\'' + row.IdDispositivo + '\',\'' + row.Marca + '\',\'' + row.Modelo + '\');">Modificar</a></li>' +
                        '</ul>' +
                        '</div>' +
                        '</span>';
                }
            }
        ],
        "order": [[0, "asc"]],
    });

}

selImpresora = function (id, marca, modelo) {
    $('#txtidDispositivo').val(id);
    $('#txtmodeloDispositivo').val(modelo);
    $('#txtmarcaDispositivo').val(marca);
}
vaciarModalDispositivo = function () {
    $("#txtidDispositivo").val('0');
    $("#txtmarcaDispositivo").val('');
    $("#txtmodeloDispositivo").val('');
}

$('#guardarDispositivo').click(function () {
    var marcaD = $('#txtmarcaDispositivo').val();
    var modeloD = $('#txtmodeloDispositivo').val();
    var idD = $('#txtidDispositivo').val();

    var method = '';

    if (idD == 0) { method = 'cdispositivo/guardarDispositivo' } else { method = 'cdispositivo/actualizarDispositivo' }

    $.post(baseurl + method,
        {
            idDispositivo: idD,
            marcaDispositivo: marcaD,
            modeloDispositivo: modeloD,
        },
        function (data) {
            if (data != null) {
                $('#modalImpresora').modal('hide');
                $('#txtidImp').val(0);
                $('#txtmodeloImp').val('');
                $('#txtmarcaImp').val('');

                tdispositivo.destroy();
                tablaDispositivos();
            } else {
                alert('Error, intente nuevamente');
            }
        });
});