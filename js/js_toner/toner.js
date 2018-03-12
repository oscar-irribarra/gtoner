$(document).ready(function () {
    tablaToner();
});

function tablaToner() {
    ttoner = $("#tblToner").DataTable({
        'Paging': true,
        'info': true,
        'filter': true,
        'stateSave': true,
        "bFilter": true,
        "bLengthChange": true,
        'ajax': {
            "url": baseurl + "ctoner/getToners",
            "type": "POST",
            "data": {
            },
            dataSrc: '',
        },
        'columns': [
            { data: 'idtoner' },
            { data: 'marca' },
            { data: 'modelo' },
            { data: 'categoria' },
            { data: 'ubicacion' },
            { data: 'stock' },
            { data: 'idcategoria' },
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
                        '<li><a href="#" title="Modificar Datos" data-toggle="modal" data-target="#modalToner" onclick="_selToner(\'' + row.idtoner + '\',\'' + row.marca + '\',\'' + row.modelo + '\',\'' + row.idcategoria + '\');">Modificar</a></li>' +
                        '</ul>' +
                        '</div>' +
                        '</span>';
                }
            }
        ],
        'columnDefs': [
            {
                'targets': [6],
                'visible': false,
            }
        ],
        "order": [[0, "asc"]],
    });
}

_selToner = function (id, marca, modelo, categoria) {
    $("#txtidToner").val(id);
    $("#txtMarca").val(marca);
    $("#txtModelo").val(modelo);
    $("#cbocategoria").val(categoria);
}

vaciarModalToner = function () {
    $("#txtidToner").val('0');
    $("#txtMarca").val('');
    $("#txtModelo").val('');
    $("#cbocategoria").val('');
}


$('#guardarToner').click(function () {
    var idT = $('#txtidToner').val();
    var marcaT = $('#txtMarca').val();
    var modeloT = $('#txtModelo').val();
    var categoriaT = $('#cbocategoria').val();
    var method = '';
    if (idT == 0) { method = 'ctoner/guardarToner' } else { method = 'ctoner/actualizarToner' }
    $.post(baseurl + method,
        {
            idToner: idT,
            marcaToner: marcaT,
            modeloToner: modeloT,
            categoriaToner: categoriaT
        },
        function (data) {
            if (data != null) {
                $("#modalToner").modal('hide');
                ttoner.destroy();
                tablaToner();
                console.log(data);
            }
        });
});