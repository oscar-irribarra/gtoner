$(document).ready(function(){
    tablaEntradas();
});

function tablaEntradas() {
    tablaentrada = $("#tblEntrada").DataTable({
        'Paging': true,
        'info': true,
        'filter': true,
        'stateSave': true,
        'ajax': {
            "url": baseurl + "centrada/getEntradas_dep",
            "type": "POST",
            "data": {
            },
            dataSrc: '',
        },
        'columns': [
            { data: 'idsalidas' }, 
            { data: 'origens'},
            { data: 'departamentos' },
            { data: 'modelos'},
            { data: 'cantidads'},            
            { data: 'fechas' },        
        ],
        "order": [[0, "asc"]],

    });

}