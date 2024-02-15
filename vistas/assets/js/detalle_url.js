$(document).on('click', ".btn-DetalleUrl", function(e) {
    //alert("Aqui se actiav el evento form datos usuario");
    var iddetverif = $(this).attr("tokenurl");
    var datos = new FormData();
    //alert("El id de el acta es = " + idconst);
    datos.append("idVerDet", iddetverif);

       $.ajax({
        url: "ajax/detalle_ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success:function (respuesta) {
         
            //console.log(respuesta);

                $('#MpioUEdet').val(respuesta['municipio_verificador']);
                $('#altaUEdet').val(respuesta['unidad_eco_verificador']);
                $('#altatitularUEdet').val(respuesta['titularue_verificadores']);
                $('#altateluadet').val(respuesta['tel_titular_ue_verificador']);
                $('#altatelcontrdet').val(respuesta['tel_contraloria_verificador']);
                $('#nombverifdet').val(respuesta['nombre_completo_verificador']);
                var urlgafete = respuesta['ruta_imagen_verificador'];
                $('#gafete_card').attr("src", urlgafete);
                var urlqr = respuesta['ruta_qr_verificador'];
                $('#qr_card').attr("src", urlqr);
             
        }

    })

   
})


/*FUNCIONES************* */
$(".cierradetalle").click(function(){
    //$("#basicModal2").modal('hide')
    var element = document.getElementById("basicModal"); 
    if (element) element.click();


  });