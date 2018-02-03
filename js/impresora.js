$(document).ready(function () {  
    cargar_tabla_ton_asignado();
    cargar_tabla_datos_impresora();
});

$.post(
    baseurl + "/cdepartamento/getDepartamentos",
    {},
    function (data) {
        var c = JSON.parse(data);
        $.each(c, function (i, item) {
            $('#cboDepartamento').append('<option value="' + item.IdDepartamento + '">(' + item.Lugar + ') ' + item.Nombre + '</option>');
        });
    });

$("form").on("submit", function (e) {
    e.preventDefault();
    $.ajax({
        type: $(this).attr('method'),
        url: $(this).attr('action'),
        data: $(this).serialize(),
        success: function (data) {            
            table.destroy();
            table2.destroy();
            cargar_tabla_ton_asignado();            
            cargar_tabla_datos_impresora();
            $("form").trigger("reset");
        },
        error: function (xhr, exception) {

        }
    });
});

function cargar_tabla_ton_asignado() {
    table2 = $("#tbl_Toner_asignados").DataTable({
        'Paging': false,
        'info': false,
        'filter': false,
        'stateSave': false,
        "bFilter": false,
        "bLengthChange": false,
        'ajax': {
            "url": baseurl + "cimpresora/gettonerasignado",
            "type": "POST",
            "data": {
                'idtoner': $("#id_imp").val()
            },
            dataSrc: '',
        },
        'columns': [
            { data: 'IdImpTon' },
            { data: 'Marca' },
            { data: 'Modelo' },
            {
                'orderable': true,
                render: function (data, type, row) {
                  return '<button class="btn btn-danger" >X</button>';
                }
            }
        ],
        "order": [[1, "asc"]],
    });
}

function cargar_tabla_datos_impresora() {
    table = $("#tbl_Datos_impresora").DataTable({
        'Paging': true,
        'info': true,
        'filter': true,
        'stateSave': true,
        'ajax': {
            "url": baseurl + "cimpresora/getdatosimpresoras",
            "type": "POST",
            "data": {
                'idimpresora': $("#id_imp").val()
            },
            dataSrc: '',
        },
        'columns': [
            { data: 'iddatosimp' },
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
                            '<li><a href="#" title="Asignar a departamento" data-toggle="modal" data-target="#modalAignarADepartamento" onclick="selasignarimpresora(\'' + row.iddatosimp + '\');">Asignar a departamento</a></li>' +
                            '<li><a href="#" title="Modificar Datos" data-toggle="modal" data-target="#modalModificardatosimp" onclick="seldatosimpresora(\'' + row.iddatosimp + '\',\'' + row.serie + '\',\'' + row.nfactura + '\',\'' + row.fechacompra + '\');">Modificar</a></li>' +
                            '<li><a href="#" title="Asignar a departamento" data-toggle="modal" data-target="#">Ver Asignacion</a></li>' +
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
                            '<li><a href="#" title="Modificar Datos" data-toggle="modal" data-target="#modalModificardatosimp"  onclick="seldatosimpresora(\'' + row.iddatosimp + '\',\'' + row.serie + '\',\'' + row.nfactura + '\',\'' + row.fechacompra + '\');">Modificar</a></li>' +
                            '<li><a href="#" title="Asignar a departamento" data-toggle="modal" data-target="#">Ver Asignacion</a></li>' +
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
        "order": [[1, "asc"]],

    });

}

selasignarimpresora = function (iddatosimp) {
    $('#id_impresora').val(iddatosimp);
}

seldatosimpresora = function (id, serie, nfactura, fechacompra) {
    $("#Mid_imp").val(id);
    $("#Mtxtserie").val(serie);
    $("#Mtxtnfactura").val(nfactura);
    $("#Mtxtfecha").val(fechacompra);
}

