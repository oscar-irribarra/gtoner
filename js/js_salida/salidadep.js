$(document).ready(function(){
    tablaSalidas();
});

function tablaSalidas() {
    tablasalida = $("#tblSalida").DataTable({
        'Paging': true,
        'info': true,
        'filter': true,
        'stateSave': true,
        'ajax': {
            "url": baseurl + "csalida/getSalidas_dep",
            "type": "POST",
            "data": {

            },
            dataSrc: '',
        },
        'columns': [
            { data: 'sidsalida' },
            { data: 'sfecha' },
            { data: 'dlugarorigen' },
            { data: 'dnombre' },
            { data: 'tmodelo' },
            { data: 'scantidad' },
        ],
        "order": [[0, "asc"]],

    });

}