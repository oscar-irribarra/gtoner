$(document).ready(function () {
    cboUbicaciones();
    cboToner();
    tablaSalidas();
});

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
}

function cboToner() {
    $('#cboDepartamento').on('change', function (e) {
        var optionSelected = $("option:selected", this);
        var valueSelected = this.value;

        $("#cbotoner").html('<option value="">Seleccione...</option>');
        $.post(
            baseurl + "ctoner/getToner_departamento",
            {
                'iddepartamento': valueSelected
            },
            function (data) {
                var c = JSON.parse(data);
                $.each(c, function (i, item) {
                    $('#cbotoner').append('<option value="' + item.tidtoner + '">' + item.tmarca + ' ' + item.tmodelo + '</option>');
                });
            });
    });
}

function tablaSalidas() {
    tablasalida = $("#tblSalida").DataTable({
        'Paging': true,
        'info': true,
        'filter': true,
        'stateSave': true,
        'ajax': {
            "url": baseurl + "csalida/getSalidas",
            "type": "POST",
            "data": {
            },
            dataSrc: '',
        },
        'columns': [
            { data: 'sidsalida' },
            { data: 'sfecha' },
            { data: 'dlugarorigen' },
            { data: 'dlugar' },
            { data: 'dnombre' },            
            { data: 'tmodelo' },
            { data: 'scantidad' },
        ],
        "order": [[0, "asc"]],

    });

}

vaciarModalSalida = function () {
    $('#cboUbicacion').val('');
    $('#cboDepartamento').val('');
    $('#cbotoner').val('');
    $('#txtcantidad').val('1');
}

$('#guardarSalida').click(function () {
    var depS = $('#cboDepartamento').val();
    var tonerS = $('#cbotoner').val();
    var cantidadS = $('#txtcantidad').val();
    var ubS = $('#cboUbicacion').val();

    $.post(baseurl + 'csalida/guardarSalida',
        {
            departamentoSalida: depS,
            tonerSalida: tonerS,
            cantidadSalida: cantidadS,
            ubicacionSalida: ubS,
        },
        function (data) {
            if (data != null) {
                $("#modalSalida").modal('hide');

                tablasalida.destroy();
                tablaSalidas();
                $.toast(''+data);
                console.log(data);
            } else {
                $.toast('Error, intente nuevamente');
            }
        });
});