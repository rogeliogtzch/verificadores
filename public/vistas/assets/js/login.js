$(".btn-inicio").click(function() {
   
    $('form').on('submit', function(e) {
        // validation code here

        e.preventDefault();
    });
    //alert("Si se ejecurta el js");
    var Usuario = $(".usuario").val();
    var Contrasena = $(".contrasena").val();
    var datos = new FormData();
    datos.append("usuario", Usuario);
    datos.append("contrasena", Contrasena);
    $.ajax({
        url: "ajax/p_login_ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(datos) {
            if (datos == "OK") {


                window.location.assign("http://localhost/verificadores/principal");


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
                  toastr.error("Datos de acceso incorectos , revise e intenete nuevamente.!");
                  

            }
            if (datos == "vacio") {
             
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
                  toastr.error("Los datos de acceso no pueden ser vacios!");


            }


        }

    })
})

/*************************************************/
/*  Recupera el Password                        */
/***********************************************/

$(".recpasswd").click(function() {
    $('.recpasswd').prop('disabled', true);
    $('form').on('submit', function(e) {
        // validation code here

        e.preventDefault();
    });
    var mailrec = $(".mailrec").val();
    
    var datos = new FormData();
    datos.append("mailrec", mailrec);
    
    $.ajax({
        url: "ajax/p_recpass_ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(datos) {
            if (datos == "OK") {
                $('.recpasswd').prop('disabled', true);

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
                  toastr.success("El correo se envio a la direccion registrada.!");
                    //Se cierra elform de envio y se muestra el de confiramcion.
                    $('.frmrecpwd').hide();
                    $('#mailconf').text(mailrec);
                    $('.pwdconfirm').show();


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
                  toastr.error("Los datos de recuperacion proporcionado no existen o son incorrectos!");
                  $('.recpasswd').prop('disabled', false);

            }
            if (datos == "vacio") {
             
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
                  toastr.error("El correo no puede ser Vacio!");
                  $('.recpasswd').prop('disabled', false);

            }


        }

    })
})

/*************************************************/
/*  Restablece el Password                      */
/***********************************************/

$(".resetpasswd").click(function() {
    $('form').on('submit', function(e) {
        // validation code here
        $('.resetpasswd').prop('disabled', true);
        e.preventDefault();
    });
    var passwd1 = $(".nvopass1").val();
    var passwd2 = $(".nvopass2").val();
    var numusr = $(".id").val();
    var tok = $(".token").val();

    if(passwd1 !== passwd2){
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
          toastr.error("Las contraseñas no coinciden!");
          $('.resetpasswd').prop('disabled', false);
    }if(passwd1 == passwd2){

        //POSTCP

    var contnva = new FormData();
    contnva.append("dtaval1", passwd1);
    contnva.append("dtaval2", passwd2);
    contnva.append("numusr", numusr);
    contnva.append("tok", tok);
    
    $.ajax({
        url: "ajax/p_restablecepwd_ajax.php",
        method: "POST",
        data: contnva,
        cache: false,
        contentType: false,
        processData: false,
        success: function(confirmacion) {
                if(confirmacion == "OK"){

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
                            toastr.success("La contraseña se restablecio de forma correcta!!");
                                        $('.confnvapwd').hide();
                                        $('.pwdchangeok').show();

                } 
                
                if(confirmacion == "Etipo"){

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
                                toastr.warning("La contraseña que intentas ingresar tinen caracteres invalidos!!");
                                $('.resetpasswd').prop('disabled', false);
                }

                if(confirmacion == "error"){

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
                                toastr.danger("Erro interno al procesar solicitud llame a soporte!!");
                                $('.resetpasswd').prop('disabled', false);
    }







           
        }
          
    })

        //FINCP

  
       }
})