$(document).ready(function () {
    tablaUsuario();
    cboLugares();
});

function cboLugares() {
    $.post(
        baseurl + "/clugar/getLugares",
        {},
        function (data) {
            var c = JSON.parse(data);
            $.each(c, function (i, item) {
                $('#cbolugar').append('<option value="' + item.IdUbicacion + '">' + item.Nombre + '</option>');
            });
        });
}

function tablaUsuario() {
    tusuario = $("#tblusuarios").DataTable({
        'Paging': true,
        'info': true,
        'filter': true,
        'stateSave': true,
        "bFilter": true,
        "bLengthChange": true,
        'ajax': {
            "url": baseurl + "cusuario/getUsuarios",
            "type": "POST",
            "data": {
            },
            dataSrc: '',
        },
        'columns': [
            { data: 'idusuario' },
            { data: 'nombre' },
            { data: 'usuario' },
            { data: 'password' },
            { data: 'rol' },
            { data: 'ubicacion' },
            { data: 'idubicacion' },
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
                        '<li><a href="#" title="Modificar Datos" data-toggle="modal" data-target="#modalUsuario" onclick="_selModalUsuario(\'' + row.idu + '\',\'' + row.nombreu + '\',\'' + row.usuariou + '\',\'' + row.passu + '\',\'' + row.ubicacionu + '\');">Modificar</a></li>' +
                        '</ul>' +
                        '</div>' +
                        '</span>';
                }
            }
        ],
        'columnDefs': [
            {
                'targets': [4],
                render: function (data, type, row) {
                    if (data == 0) {
                        return '<span class="label label-primary">Usuario</span>'
                    } else if (data == 1) {
                        return '<span class="label label-danger">Administrador</span>'
                    }
                }
            },
            {
                'targets': [6],
                'visible': false,

            }
        ],
        "order": [[0, "asc"]],
    });
}

_selModalUsuario = function (id, nombre, usuario, password, ubicacion) {
    $('#txtidUsuario').val(id);
    $('#txtNombre').val(nombre);
    $('#txtUsuario').val(usuario);
    $('#txtPassword').val('');
    $('#cbolugar').val(ubicacion);
}

vaciarModalUsuario = function () {
    $('#txtidUsuario').val('0');
    $('#txtNombre').val('');
    $('#txtUsuario').val('');
    $('#txtPassword').val('');
    $('#cbolugar').val('');
}

$('#guardarUsuario').click(function () {
    var idU = $('#txtidUsuario').val();
    var nombreU = $('#txtNombre').val();
    var usuarioU = $('#txtUsuario').val();
    var passU = $('#txtPassword').val();
    var ubicacionU = $('#cbolugar').val();

    var method = '';
    if (idU == 0) { method = 'cusuario/guardarUsuario' } else { method = 'cusuario/actualizarUsuario' }

    $.post(baseurl + method,
        {
            idUsuario: idU,
            nombreUsuario: nombreU,
            usuarioUsuario: usuarioU,
            passwordUsuario: passU,
            ubicacionUsuario: ubicacionU
        },
        function (data) {
            if (data != null) {
                $("#modalUsuario").modal('hide');

                tusuario.destroy();
                tablaUsuario();
                console.log(data);
            } else {
                alert('Error, intente nuevamente');
            }
        });
});