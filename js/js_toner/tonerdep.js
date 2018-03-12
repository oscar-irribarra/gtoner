$(document).ready(function(){
    tablaToner();
});

function tablaToner() {
    tablatoner = $("#tblToner").DataTable({
        'Paging': true,
        'info': true,
        'filter': true,
        'stateSave': true,
        "bFilter": true,
        "bLengthChange": true,
        'ajax': {
            "url": baseurl + "ctoner/getTonerTodos_dep",
            "type": "POST",
            "data": {
            },
            dataSrc: '',
        },
        'columns': [
            { data: 'idtoner' },
            { data: 'marcatoner' },
            { data: 'modelotoner' },
            { data: 'categoriatoner' },            
            { data: 'ubicaciontoner' },
            { data: 'stocktoner' },
            { data: 'idcategoriatoner'},
        ],        
        'columnDefs': [
            {
                'targets': [6],
                'visible': false,
              
            }
        ],        
        'columnDefs': [
            {
                'targets': [4],
                'visible': false,              
            }
        ],
        "order": [[0, "asc"]],
    });
}