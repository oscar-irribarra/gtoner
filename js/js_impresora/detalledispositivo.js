$(document).ready(function () {
    tablaDispToner();
});

function tablaDispToner() {
    var idD = $('#idDispositivo').val();
    tdisptoner = $("#tblDispToner").DataTable({
        'Paging': false,
        'info': false,
        'filter': false,
        'stateSave': false,
        "bFilter": false,
        "bLengthChange": false,
        'ajax': {
            "url": baseurl + "cdispositivo/getDispToner",
            "type": "POST",
            "data": {
                'IdDipositivo': idD
            },
            dataSrc: '',
        },
        'columns': [
            { data: 'IdDispTon' },
            { data: 'Marca' },
            { data: 'Modelo' },
            {
                'orderable': true,
                render: function (data, type, row) {
                    return '<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#_modalConfirmacion" onclick="_selDispTon(\'' + row.IdDispTon + '\');">X</button>';
                }
            }
        ],
        "order": [[0, "asc"]],
    });
}

_selDispTon = function (IdDispTon) {
    $('#txtIdDispTon').val(IdDispTon);
}

$('#guardarDispTon').click(function () {
    var idD = $('#idDispositivo').val();
    var idT = $('#cboToner').val();
    $.post(baseurl + 'cdispositivo/guardarDispTon',
        {
            idToner: idT,
            idDispositivo: idD
        },
        function (data) {
            if (data != null) {
                $("#modal_AsignarDispTon").modal('hide');
                $('#cbocategorias').val('');
                $('#cboToner').val('');

                tdisptoner.destroy();
                tablaDispToner();
                $.toast('' + data);
            } else {
                $.toast('Error Intente Nuevamente');
            }
        });
});

$('#eliminarDispTon').click(function () {
    var idImpTon = $('#txtIdDispTon').val();
    var confirmacion = $('#txtConfirmacion').val();
    if (confirmacion == 'Sí') {
        $.post(baseurl + 'cdispositivo/eliminarDispTon',
            {
                idImpTon: idImpTon,
            },
            function (data) {
                if (data != null) {
                    $("#_modalConfirmacion").modal('hide');
                    $('#txtConfirmacion').val('');

                    tdisptoner.destroy();
                    tablaDispToner();
                    $.toast('' + data);
                } else {
                    $.toast('Error Intente Nuevamente');
                }
            });
    }
});

$('#cbocategoria').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;

    $("#cboToner").html('<option value="">Seleccione...</option>');
    $.post(
        baseurl + "ctoner/getToner",
        {
            'idCategoria': valueSelected
        },
        function (data) {
            var c = JSON.parse(data);
            $.each(c, function (i, item) {
                $('#cboToner').append('<option value="' + item.IdToner + '">' + item.Modelo + '</option>');
            });
        });
});
