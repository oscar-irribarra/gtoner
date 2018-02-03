$.post(
    baseurl+"cdepartamento/getDepartamentos",
    {},
    function(data){
        var c = JSON.parse(data);
        $.each(c,function(i,item)
        {
            $('#cbodepartamentos').append('<option value="'+item.IdDepartamento+'">'+item.Lugar+' '+item.Nombre+'</option>');
        });
    });
    
$('#cbodepartamentos').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;

    $("#cbotoner").html('<option value="">Seleccione...</option>');
    $.post(
        baseurl + "ctoner/getToner_departamento",
        {
            'iddepartamento' :  valueSelected
        },
        function (data) {
            var c = JSON.parse(data);
            $.each(c, function (i, item) {
                $('#cbotoner').append('<option value="' + item.tidtoner + '">' + item.tmarca + ' ' + item.tmodelo + '</option>');
            });
        });
});