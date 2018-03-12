$(document).ready(function () {
    tablaDepartamentos();
    tablaUbicaciones();
    tablaImpdep();
});

function tablaImpdep() {
    tablaimpresoradep = $("#tblImpdep").DataTable({
        'Paging': true,
        'info': true,
        'filter': true,
        'stateSave': true,
        'ajax': {
            "url": baseurl + "cdepartamento/getImpDep",
            "type": "POST",
            "data": {
                'idDepartamento': $("#iddepartamento").val(),
            },
            dataSrc: '',
        },
        'columns': [
            { data: 'idimpdep' },
            { data: 'marca' },
            { data: 'modelo' },
            { data: 'serie' },
            {
                'orderable': true,
                render: function (data, type, row) {
                    return '<span class="text-center">' +
                        '<div class="dropdown">' +
                        '<button class="btn btn-default dropdown-toggle" type="button" id="drowndownmenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">' +
                        'Acciones' +
                        '<span class="caret"></span>' +
                        '</button>' +
                        '<ul class="dropdown-menu pull-right" aria-labelledby="drowndownmenu1">' +
                        '<li><a href="#" title="Consumo" data-toggle="modal" data-target="#modalConsumoImpresora" onclick="_selSerieimpConsumo(\'' + row.serie + '\');">Ver Consumo</a></li>' +
                        '</ul>' +
                        '</div>' +
                        '</span>';
                }
            }

        ],
        "order": [[0, "asc"]],

    });
}

_selSerieimpConsumo = function (serieimpresora) {
    $.post(baseurl + "cimpresora/getConsumoToner",
        {
            'idserie': serieimpresora,
        },
        function (data) {
            if (data != null) {
                var html = '';
                $.each(JSON.parse(data), function (i, item) {
                    html += '<b> Consumo ' + i + ' = ' + item + '</b><br/>';
                });
                $('#posts').html(html);
                console.log(data);
            }
        });
}

function tablaDepartamentos() {
    tdepartamentos = $("#tblDepartamentos").DataTable({
        'Paging': true,
        'info': true,
        'filter': true,
        'stateSave': true,
        'ajax': {
            "url": baseurl + "cdepartamento/getDepartamento",
            "type": "POST",
            "data": {
                'idUbicacion': $('#idUbicacion').val(),
            },
            dataSrc: '',
        },
        'columns': [
            { data: 'IdDepartamento' },
            { data: 'Nombre' },
            {
                'orderable': true,
                render: function (data, type, row) {
                    if (row.nombredep == 'Bodega') {
                        return '<span class="text-center"></span>';
                    } else {
                        return '<span class="text-center">' +
                            '<div class="dropdown">' +
                            '<button class="btn btn-default dropdown-toggle" type="button" id="drowndownmenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">' +
                            'Acciones  ' +
                            '<span class="caret"></span>' +
                            '</button>' +
                            '<ul class="dropdown-menu pull-right" aria-labelledby="drowndownmenu1">' +
                            '<li><a href="#" title="Modificar Datos" data-toggle="modal" data-target="#modalDepartamento" onclick="_selDepartamento(\'' + row.IdDepartamento + '\',\'' + row.Nombre + '\');">Modificar</a></li>' +
                            '<li><a href="' + baseurl + 'cdepartamento/detalles/' + row.IdDepartamento + '">Detalles</a></li>' +
                            '</ul>' +
                            '</div>' +
                            '</span>';
                    }
                }
            }

        ],

        "order": [[0, "asc"]],

    });

}

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
                        '<li><a href="#" title="Modificar Datos" data-toggle="modal" data-target="#modalUbicacion" onclick="_selUbicacion(\'' + row.IdUbicacion + '\',\'' + row.Nombre + '\');">Modificar</a></li>' +
                        '<li><a href="#" title="" data-toggle="modal" data-target="#modalModificardatosimp" >Desasignar</a></li>' +
                        '<li><a href="' + baseurl + 'cdepartamento/detalles/' + row.IdUbicacion + '">Detalles</a></li>' +
                        '</ul>' +
                        '</div>' +
                        '</span>';
                }
            }

        ],
        "order": [[0, "asc"]],

    });

}

_selUbicacion = function (idub, nombreub) {
    $('#txtidUbicacion').val(idub);
}

_selDepartamento = function (iddep, nombredep, lugardep) {
    $('#txtidDepartamento').val(iddep);
    $('#txtnombre').val(nombredep);
}

vaciarModalDepartamento = function () {
    $('#txtidDepartamento').val('0');
    $('#txtnombre').val('');
}

$('#guardarDepartamento').click(function () {
    var idD = $('#txtidDepartamento').val();
    var nombreD = $('#txtnombre').val();
    var lugarD = $('#idUbicacion').val();
    var method = '';

    if (idD == 0) { method = 'cdepartamento/guardarDepartamento' } else { method = 'cdepartamento/actualizarDepartamento' }

    $.post(baseurl + method,
        {
            idDepartamento: idD,
            nombreDepartamento: nombreD,
            lugarDepartamento: lugarD
        },
        function (data) {
            if (data != null) {
                $('#modalDepartamento').modal('hide');
                $('#txtidDepartamento').val(0);
                $('#txtnombre').val('');

                tdepartamentos.destroy();
                tablaDepartamentos();

                $.toast('' + data);
            }
        });
});




