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
        url: "ajax/p_altaverif_ajax.php",
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

function validaperfildatos() {
   
    $('#verifform').parsley().validate()
}