$(document).on('click', ".btn-UpdUsu", function(e) {
    //alert("Aqui se actiav el evento form datos usuario");
    var idupdverif = $(this).attr("id_verifupd");
    var datos = new FormData();
    //alert("El id de el acta es = " + idconst);
    datos.append("idVerDet", idupdverif);

       $.ajax({
        url: "ajax/updverif_ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success:function (respuesta) {
         
            //console.log(respuesta);


            $('#mpioverifupd').val(respuesta['municipio_verificador']);
            $('#altaUEupd').val(respuesta['unidad_eco_verificador']);
            $('#altatitularUEupd').val(respuesta['titularue_verificadores']);
            $('#altateluaupd').val(respuesta['tel_titular_ue_verificador']);
            $('#altatelcontrupd').val(respuesta['tel_contraloria_verificador']);
            $('#nombverifupd').val(respuesta['nombre_completo_verificador']);
            $('#tokenverupd').val(respuesta['token_verificador']);

            
               
             
        }

    })

   
})
