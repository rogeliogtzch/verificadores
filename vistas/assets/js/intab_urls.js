tabla = $('#urls_table').DataTable({
    "bProcessing": true,
    "bLengthChange": false,
    "bAutoWidth": true,
    "ajax": "ajax/listarurls_ajax.php",
    "src":"",
    "columns": [
        { mData: '#' }, 
       
        { mData: 'url de verifiación' },
        { mData: 'Nombre del Verificador/Inspector' },
        { mData: 'Acciones' }
              
    ],
    retrieve: true,
    dom: 'Blfrtip',
    "pageLength": 10,
    "order": [[0, "asc"]],
    buttons: [
        {
            extend: 'excelHtml5',
            text: 'EXCEL'
        },
       
        {
            extend: 'pdfHtml5',
            text: 'PDF',
            exportOptions: {
                columns: [ 0,1,2 ]
            }
        }
    ],
    "columnDefs": [
        {
            
            "visible": true,
            "searchable": true,
        }
    ],
    "language": {
        "sProcessing": "",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "searchPlaceholder": "Escribe aquí para buscar..",
        "sUrl": "",
        "sInfoThousands": ",",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
});