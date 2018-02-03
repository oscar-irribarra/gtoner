$.post(
    baseurl+"/ccategoria/getCategorias",
    {},
    function(data){
        var c = JSON.parse(data);
        $.each(c,function(i,item)
        {
            $('#cbocategorias').append('<option value="'+item.IdCategoria+'">'+item.Nombre+'</option>');
        });
    });