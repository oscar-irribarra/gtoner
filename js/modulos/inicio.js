$(document).ready(function () {
    // $.toast({
    //     heading: 'Success',
    //     icon: 'success',
    //     text: 'Use the predefined ones, or specify a custom position object.',
    //     position: 'top-right',
    //     stack: false
    // })
});



$('#guardarPedido').click(function () {
    var serieImp = $('#txtSerie').val();
    var modeloT = $("input[name='opciones']:checked").val(); 
    var confirmacionsi = $('#txtConfirmacion').val();

    if(confirmacionsi == 'Si' ){  

    $.post(baseurl + 'cpedido/guardarPedido',
        {
            serieImpresora: serieImp,
            categoriaToner: modeloT,
        },
        function (data) {
            if (data != null) {
                $('#modalConfirmacion').modal('hide');
                $('#txtSerie').val('');
                $('#txtConfirmacion').val('');
                console.log(data);
                $.toast(''+data);
            } else {
                alert('Error, intente nuevamente');
            }
        });
    }else{
        $.toast('Error Confirmacion ;(, Intente Nuevamente')
    }
});


$('#btningresar').click(function () {
    var usuario = $('#txtUsuario').val();
    var contraseña = $("#txtContraseña").val(); 

    $.post(baseurl + 'cinicio/validarUsuario',
        {
            usuarioLogin: usuario,
            passLogin: contraseña,
        },
        function (data) {
            if (data != null) {      
                console.log(data);
                $.toast(''+data);
                location.reload();
            } else {
                $.toast('Error, intente nuevamente');
            }
        });
   
});

