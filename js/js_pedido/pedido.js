$(document).ready(function () {
    tablaPedidos();
});

function tablaPedidos() {
    tpedidos = $("#tblpedidos").DataTable({
        'Paging': true,
        'info': true,
        'filter': true,
        'stateSave': true,
        'ajax': {
            "url": baseurl + "cpedido/getPedidos",
            "type": "POST",
            "data": {
            },
            dataSrc: '',
        },
        'columns': [
            { data: 'idpedido' },
            { data: 'fecha' },
            { data: 'cantidad' },
            { data: 'toner' },
            { data: 'departamento' },
            { data: 'ubicacion' },
            { data: 'estado' },

        ],
        'columnDefs': [
            {
                'targets': [6],
                render: function (data, type, row) {
                    if (data == 0) {
                        return '<button class="label label-danger" data-toggle="modal" data-target="#modalEntregarPedido" onclick="_selPedido(\'' + row.idpedido + '\');">Entregar</button>';
                    } else if (data == 1) {
                        return '<span class="label label-success">Entregado</span>'
                    }
                }
            }
        ],

        "order": [[0, "asc"]],
    });
}

_selPedido = function (idpedido) {
    $('#txtidPedido').val(idpedido);
}

$('#entregarPedido').click(function () {
    var idP = $('#txtidPedido').val();
    var confirmacion = $('#txtConfirmacion').val();
    if (confirmacion == 'Sí') {
        $.post(baseurl + 'cpedido/entregarPedido',
            {
                idPedido: idP,
            },
            function (data) {
                if (data != null) {
                    $('#txtConfirmacion').val('');
                    $('#modalEntregarPedido').modal('hide');           
                    tpedidos.destroy();
                    tablaPedidos();
                    console.log(data);
                    $.toast(''+data);
                }
            });
    }
});