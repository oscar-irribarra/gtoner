$(document).ready(function(){
    tablaEntradas();
    cboToner();
});

function cboToner(){
$.post(
    baseurl + "/ctoner/getToners",
    {},
    function (data) {
        var c = JSON.parse(data);
        $.each(c, function (i, item) {
            $('#cbotoner').append('<option value="' + item.idtoner + '">(' + item.categoriatoner + ') ' + item.marcatoner + ' ' + item.modelotoner + '</option>');
        });
    });
}

function tablaEntradas() {
    tablaentrada = $("#tblEntrada").DataTable({
        'Paging': true,
        'info': true,
        'filter': true,
        'stateSave': true,
        'ajax': {
            "url": baseurl + "centrada/getEntradas",
            "type": "POST",
            "data": {
            },
            dataSrc: '',
        },
        'columns': [
            { data: 'IdEntrada' },
            { data: 'Modelo' },
            { data: 'Cantidad' },
            { data: 'Fecha' },
        ],
        "order": [[0, "asc"]],

    });

}

selEntrada = function(id, toner, cantidad){
    $('#txtidEntrada').val(id);
    $('#cbotoner').val(toner);
    $('#txtcantidad').val(cantidad);
}

vaciarModalEntrada = function(){
    $('#txtidEntrada').val('0');    
    $('#cbotoner').val('');
    $('#txtcantidad').val('');
}

$('#guardarEntrada').click(function () {
    var idEn = $('#txtidEntrada').val();
    var tonerEn = $('#cbotoner').val();
    var cantidadEn = $('#txtcantidad').val();
    
    if (tonerEn > 0) {
        $.post(baseurl + 'centrada/guardarEntrada',
            {
                idEntrada: idEn,
                tonerEntrada: tonerEn,
                cantidadEntrada: cantidadEn
            },
            function (data) {
                if (data != null) {
                    $("#modalEntrada").modal('hide');

                    tablaentrada.destroy();
                    tablaEntradas();
                } else {
                    alert('Error, intente nuevamente');
                }
            });
    } else {
        alert('Seleccione un toner');
    }
});