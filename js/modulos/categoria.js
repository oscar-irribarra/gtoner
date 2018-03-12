$(document).ready(function () {
    cboCategoria();
});

function cboCategoria(){
$.post(
    baseurl + "/ccategoria/getCategorias",
    {},
    function (data) {
        var c = JSON.parse(data);
        $.each(c, function (i, item) {
            $('#cbocategoria').append('<option value="' + item.IdCategoria + '">' + item.Nombre + '</option>');
        });
    });
}