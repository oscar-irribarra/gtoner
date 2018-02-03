$.post(
    baseurl+"/ctoner/getTonerTodos",
    {},
    function(data){
        var c = JSON.parse(data);
        $.each(c,function(i,item)
        {
            $('#cbotoner').append('<option value="'+item.IdToner+'">('+item.Nombre+') '+item.Marca+' '+item.Modelo+'</option>');
        });
    });