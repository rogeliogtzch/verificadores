$(document).on('click', ".agrgrverif", function(e) {
    //alert("Aqui se actiav el evento form datos usuario");
    validaperfildatos();
    var validacion = $('#verifform').parsley().isValid();
    if(validacion == true){
       //accion si el formulario esta validado
       var formData = new FormData(document.getElementById("verifform"));
       //formData.append("dato", "valor");
            // alert("El form data trae :    " , formData);
       $.ajax({
        url: "ajax/altaverif_ajax.php",
        method: "POST",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(datos) {
            if (datos == "OK") {

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
                  toastr.success("Exito!! , datos agregados correctamente.!");
                  $('#basicModal').modal('hide')
                  cargaverificador();
                  document.getElementById("verifform").reset();
                  cargaverificador();
                      tabla.ajax.reload();


            }
            if (datos == "no") {
              
                toastr.options = {
                    "closeButton": true,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-center",
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
                  toastr.error("Hubo un error alprocesar los datos , revise e intente nuevamente.!");
                  

            }     


        }

    })


    }else{
        toastr.options = {
            "closeButton": true,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-center",
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
          toastr.error("Existe algun error en los datos, revise e intente nuevamente.!");
          



    }
    
})

/******************************************/
/*   valida form de alta + parsley        */
/******************************************/

function validaperfildatos() {
   
    $('#verifform').parsley().validate()
}


/******************************************/
/*   Verifica formulario de actualización */
/******************************************/


$(document).on('click', ".modifverifupd", function(e) {
    //alert("Aqui se actiav el evento form datos usuario");
    validaperfildatosupd();
    var validacion = $('#verifformupd').parsley().isValid();
    if(validacion == true){
       //accion si el formulario esta validado
       var formData = new FormData(document.getElementById("verifformupd"));
       //formData.append("dato", "valor");
            // alert("El form data trae :    " , formData);
       $.ajax({
        url: "ajax/updverif_ajax.php",
        method: "POST",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(datos) {
            if (datos = "OKUPD") {

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
                  toastr.success("Exito!! , datos modificados correctamente.!");
                  $('#basicModal3').modal('hide')
                  cargaverificador();
                  document.getElementById("verifformupd").reset();
                  cargaverificador();
                      tabla.ajax.reload();
                      var element = document.getElementById("basicModal3"); 
                      if (element) element.click();


            }
            if (datos == "no") {
              
                toastr.options = {
                    "closeButton": true,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-center",
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
                  toastr.error("Hubo un error alprocesar los datos , revise e intente nuevamente.!");
                  

            }     


        }

    })


    }else{
        toastr.options = {
            "closeButton": true,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-center",
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
          toastr.error("Existe algun error en los datos, revise e intente nuevamente.!");
          



    }
    
})
/******************************************/
/* Valida form de actualización + parsley */
/******************************************/

function validaperfildatosupd() {
   
    $('#verifformupd').parsley().validate()
}


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