$(document).ready(function () {
    tablaImpresoras();
});

function tablaImpresoras() {
    var idD = $('#idDispositivo').val();
    timpresoras = $("#tblImpresoras").DataTable({
        'Paging': true,
        'info': true,
        'filter': true,
        'stateSave': true,
        'ajax': {
            "url": baseurl + "cimpresora/getImpresoras",
            "type": "POST",
            "data": {
                'idDispositivo': idD
            },
            dataSrc: '',
        },
        'columns': [
            { data: 'idimpresora' },
            { data: 'serie' },
            { data: 'nfactura' },
            { data: 'fechacompra' },
            { data: 'estado' },
            {
                'orderable': true,
                render: function (data, type, row) {
                    if (row.estado == 0) {
                        return '<span class="pull-right">' +
                            '<div class="dropdown">' +
                            '<button class="btn btn-default dropdown-toggle" type="button" id="drowndownmenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">' +
                            'Acciones  ' +
                            '<span class="caret"></span>' +
                            '</button>' +
                            '<ul class="dropdown-menu pull-right" aria-labelledby="drowndownmenu1">' +
                            '<li><a href="#" title="Asignar a departamento" data-toggle="modal" data-target="#modalImpDep" onclick="_selImpDep(\'' + row.idimpresora + '\');">Asignar a departamento</a></li>' +
                            '<li><a href="#" title="Modificar Datos" data-toggle="modal" data-target="#modalImpresora" onclick="_selImpresora(\'' + row.idimpresora + '\',\'' + row.serie + '\',\'' + row.nfactura + '\',\'' + row.fechacompra + '\');">Modificar</a></li>' +

                            '</ul>' +
                            '</div>' +
                            '</span>';
                    } else if (row.estado == 1) {
                        return '<span class="pull-right">' +
                            '<div class="dropdown">' +
                            '<button class="btn btn-default dropdown-toggle" type="button" id="drowndownmenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">' +
                            'Acciones  ' +
                            '<span class="caret"></span>' +
                            '</button>' +
                            '<ul class="dropdown-menu pull-right" aria-labelledby="drowndownmenu1">' +
                            '<li><a href="#" title="Modificar Datos" data-toggle="modal" data-target="#modalImpresora"  onclick="_selImpresora(\'' + row.idimpresora + '\',\'' + row.serie + '\',\'' + row.nfactura + '\',\'' + row.fechacompra + '\');">Modificar</a></li>' +
                            '</ul>' +
                            '</div>' +
                            '</span>';
                    }
                }
            }

        ],
        'columnDefs': [
            {
                'targets': [4],
                'data': 'estado',
                render: function (data, type, row) {
                    if (data == 0) {
                        return '<span class="label label-danger">No Asignado</span>'
                    } else if (data == 1) {
                        return '<span class="label label-success">Asignado</span>'
                    }
                }
            }
        ],
        "order": [[0, "asc"]],

    });

}
//Crud Impresoras
_vaciarModalImpresora = function () {
    $("#txtidImpresora").val('0');
    $("#txtSerie").val('');
    $("#txtNfactura").val('');
    $("#txtFecha").val('');
}

_selImpresora = function (id, serie, nfactura, fechacompra) {
    $("#txtidImpresora").val(id);
    $("#txtSerie").val(serie);
    $("#txtNfactura").val(nfactura);
    $("#txtFecha").val(fechacompra);
}

$('#guardarImpresora').click(function () {
    var idD = $('#idDispositivo').val();
    var idI = $('#txtidImpresora').val();
    var serieI = $('#txtSerie').val();
    var nfacturaI = $('#txtNfactura').val();
    var fechaI = $('#txtFecha').val();

    var method = '';

    if (idI == 0) { method = 'cimpresora/guardarImpresora' } else { method = 'cimpresora/actualizarImpresora' }

    $.post(baseurl + method,
        {
            idImpresora: idI,
            serieImpresora: serieI,
            nfacturaImpresora: nfacturaI,
            fechaImpresora: fechaI,
            idDispositivo: idD
        },
        function (data) {
            if (data != null) {
                $('#modalImpresora').modal('hide');
                $('#txtidImpresora').val();
                $('#txtSerie').val('');
                $('#txtNfactura').val('');
                $('#txtFecha').val('');

                timpresoras.destroy();
                tablaImpresoras();
            } else {
                alert('Error, intente nuevamente');
            }
        });
});


//Asignar Impresoras a departamento
function cboUbicaciones() {
    $.post(
        baseurl + "/cdepartamento/getUbicaciones",
        {},
        function (data) {
            var c = JSON.parse(data);
            $.each(c, function (i, item) {
                $('#cboUbicacion').append('<option value="' + item.IdUbicacion + '">' + item.Nombre + '</option>');
            });
        });
}

$('#cboUbicacion').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;

    $("#cboDepartamento").html('<option value="">Seleccione...</option>');
    $.post(
        baseurl + "cdepartamento/getDepartamento",
        {
            'idubicacion': valueSelected
        },
        function (data) {
            var c = JSON.parse(data);
            $.each(c, function (i, item) {
                $('#cboDepartamento').append('<option value="' + item.iddep + '">' + item.nombredep + '</option>');
            });
        });
});

_selImpDep = function (iddatosimp) {
    $('#txtidDatosImpresora').val(iddatosimp);
    cboUbicaciones();
}

$('#guardarImpDep').click(function () {
    var idDepartamento = $('#cboDepartamento').val();
    var idImpresora = $('#txtidDatosImpresora').val();
    if (idDepartamento > 0) {
        $.post(baseurl + 'cimpresora/guardarImpDep',
            {
                idDepartamento: idDepartamento,
                idImpresora: idImpresora
            },
            function (data) {
                if (data != null) {
                    $("#modalImpDep").modal('hide');
                    $("#cboUbicacion").val('');
                    $("#cboDepartamento").val('');

                    timpresoras.destroy();
                    tablaImpresoras();
                    $.toast(''+data);
                } else {
                    $.toast('Error, intente nuevamente');
                }
            });
    } else {
        $.toast('Seleccione un departamento');
    }
});



