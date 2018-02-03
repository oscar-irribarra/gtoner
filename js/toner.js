$('#cbocategorias').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;

    $("#cboToner").html('<option value="">Seleccione...</option>');
    $.post(
        baseurl + "ctoner/getToner",
        {
            'iddepartamento': valueSelected
        },
        function (data) {
            var c = JSON.parse(data);
            $.each(c, function (i, item) {
                $('#cboToner').append('<option value="' + item.IdToner + '">' + item.Marca + ' ' + item.Modelo + '</option>');
            });
        });
});
