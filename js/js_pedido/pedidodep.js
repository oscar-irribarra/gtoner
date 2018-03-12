$(document).ready(function () {
    tablaPedido();
});

function tablaPedido() {
    tabla = $("#tblpedidos").DataTable({
        'Paging': true,
        'info': true,
        'filter': true,
        'stateSave': true,
        'ajax': {
            "url": baseurl + "cpedido/getPedidos_Dep",
            "type": "POST",
            "data": {
            },
            dataSrc: '',
        },
        'columns': [
            { data: 'idpedido' },
            { data: 'fechapedido' },
            { data: 'cantidadpedido' },
            { data: 'modelotoner' },
            { data: 'nombredep' },
            { data: 'ubicaciondep' },
            { data: 'estadopedido' },

        ],
        'columnDefs': [
            {
                'targets': [6],
                'data': 'estadopedido',
                render: function (data, type, row) {
                    if (data == 0) {
                        return '<button class="label label-danger" data-toggle="modal" data-target="#modalConfirmacion" onclick="selPedido(\'' + row.idpedido + '\');">Entregar</button>';
                    } else if (data == 1) {
                        return '<span class="label label-success">Entregado</span>'
                    }
                }
            }
        ],

        "order": [[0, "asc"]],
    });
}
selPedido = function (idpedido) {
    $('#txtidConfirmacion').val(idpedido);
}
$('#entregarPedido').click(function () {
    var idP = $('#txtidConfirmacion').val();
    var confirmacion = $('#txtsiconfirmacion').val();
    if (confirmacion == 'Sí') {
        $.post(baseurl + 'cpedido/entregarPedido',
            {
                idPedido: idP,
            },
            function (data) {
                if (data != null) {
                    $('#txtsiconfirmacion').val('');
                    $('#modalConfirmacion').modal('hide');
                    tabla.destroy();
                    tablaPedido();
                    console.log(data);
                }
            });
    }
});