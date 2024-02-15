//***************************************************/
/*          POST UA                        */
//***************************************************/
$(document).on('click', ".btn-eliminarVerificador", function(e) {
    
    var iddelverif = $(this).attr("id_verifelimina");
    var idmod = $(".usuact").val();
    var datos = new FormData();
    //alert("El id de el acta es = " + idconst);
    datos.append("idVerDel", iddelverif);
    datos.append("idusuact", idmod);
    /////////////////////////////swal///////////////////////
    Swal.fire({
        title: 'Está a punto de eliminar un verificador del sistema!',
        text: "Revisa bien los datos antes de continuar!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger m-l-10',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, Eliminar!'
    }).then(resultado => {
        
        if (resultado.value) {
           
            
        $.ajax({
            url: "ajax/elimina_ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(respuesta) {
                if (respuesta == "OKDEL") {
                  
                    toastr.options = {
                        "closeButton": true,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                      }
                      toastr.success("Exito!! , El verificador se elimino correctamente.!");

                   //aqui se recarga el Data Table
                   cargaverificador();
                   tabla.ajax.reload();
                   //Fin recarga Datatable
                } else {
                    toastr.options = {
                        "closeButton": true,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                      }
                      toastr.error("Error!! , Hubo un error al procesar, intente nuevamente.!");
                    }
            }
        })
            
    }
        else{

           }
         })//fin  then swall*/

         

        
})

function cargaverificador(){
    var tabla = $('#verificadores_table').DataTable({
        "bProcessing": true,
        "bLengthChange": false,
        "bAutoWidth": true,
        "ajax": "ajax/listarverificador_ajax.php",
        "src":"",
        "columns": [
            { mData: '#' }, 
            { mData: 'Unidad Administrativa' },
            { mData: 'Nombre del Verificador/Inspector' },
            { mData: 'url de verifiación' },
            { mData: 'Alta' },
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
                text: 'PDF'
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
    tabla.ajax.reload();
    }
