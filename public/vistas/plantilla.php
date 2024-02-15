<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Padron de Verificadores| Control Interno</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <!-- App favicon -->
    <link rel="shortcut icon" href="vistas/assets/images/favicon.ico">

    <!-- ========================== -->
    <!--            CSS             -->
    <!-- ========================== -->
<!-- Favicons -->
<link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="vistas/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vistas/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="vistas/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="vistas/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="vistas/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="vistas/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="vistas/assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="vistas/assets/vendor/toastr/toastr.css" rel="stylesheet">

    <!-- DataTables -->
    <link href="vistas/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="vistas/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">

    <!-- Responsive datatable examples -->
    <link href="vistas/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">

  <!-- Template Main CSS File -->
  <link href="vistas/assets/css/style.css" rel="stylesheet">
  <link href="vistas/assets/vendor/parsleyjs/parsley.css" rel="stylesheet">
 
      <!-- end container-fluid -->
      
</head>

<body  data-topbar="colored" class="toggle-sidebar">
<header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="<?php echo $ruta?>" class="logo d-flex align-items-center">
    <img src="vistas/assets/img/H2022.png" alt="">
    <span class="d-none d-lg-block">Verificadores</span>
  </a>
  
</div><!-- End Logo -->


<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">

    <li class="nav-item d-block d-lg-none">
      
      </a>
    </li><!-- End Search Icon-->

    <li class="nav-item dropdown pe-3">
    <div class="d-flex align-items-right justify-content-between">
  <a href="http://www.huixquilucan.gob.mx/" class="logo d-flex align-items-center">
    <img src="vistas/assets/img/2022.png" alt="">
    
  </a>
  
</div><!-- End Logo -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        

      </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->

  </ul>
</nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<main id="main" class="section">
<section class="section">
    
  <div class="row">
       <div class="col-lg-12">

       <div class="card">
       <div class="card-header">
       <h7 class="card-title">Padrón de Verificadores.</h7><br>
       </div>
          <div class="card-body">
             
             
              <table id="verificadores_public_table" name="vareificadores_table" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                                         
                                        <thead>
                                        <tr  style=" width: 1%; white-space: wrap;">
                                        <th style=" width: 1%;">#</th>
                                            <th class="small">Municipio</th>
                                            <th class="small">Unidad Economica</th>
                                            <th class="small">Telefono titular Unidad E</th>
                                            <th class="small">Telefono Quejas y Denuncias</th>
                                            <th class="small">Nombre Verificador</th>
                                            <th class="small">Url Verificador</th>
                                            <th class="small">Acciones</th>
                                            
                                          
                                        </thead>
                                        <tbody style="width: 1%; white-space: wrap;">

                                        </tbody>
                                    </table>
         
          </div>

      
       </div>
     

    </div>
  </div>
</section>

</main>


              <!--    SECCION DE MODALES -->

                <!-- Modal de Detalle Padron -->

<div class="modal fade detallemodal modalDetalleUsu" id="basicModal" name="basicModal" tabindex="-1">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Detalle del Verificador</h5>
                            <button type="button" class="btn-close cierradetalle" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
      <div class="modal-body">
                     
                        

        <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Información del Verificador</h5>

                  <!-- Floating Labels Form -->
                  <form id="verifform" name="verifform" data-parsley-validate="">
                  <input type="hidden" id="usuact" name="usuact" value="<?php echo $_SESSION['uactivo'];?>">
                  <div class="row">
                    <div class="col-md-6">

                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title text-center">Gafete de verificador</h5>
                            <span ><img id="gafete_card" class="mx-auto d-block" style="height:188px;width:200px" src="" ></span>
                        </div>
                        </div>
                    </div>
                
                    <div class="col-md-6">

                      <div class="card">
                          <div class="card-body">
                            <h5 class="card-title text-center">QR de verificador</h5>
                          <span ><img id="qr_card" class="mx-auto d-block" width="60%"src="" ></span>
                          </div>
                      </div>

                    </div>
                  </div>
                    <div class="row">
                  
                        <div class="col-md-6">
                            
                        <label for="MpioUEdet" class="form-label small">Municipio:</label>
                            <input type="text" class="form-control" id="MpioUEdet" name="MpioUEdet" placeholder="Municipio" value="" readonly>
                        
                          
                          </div>

                        <div class="col-md-6">
                          <label for="altaUEdet" class="form-label small">Unidad Economica:</label>
                          <input type="text" class="form-control" id="altaUEdet" name="altaUEdet" placeholder="Unidad economica" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                          <label for="altatitularUEdet" class="form-label small">Titular de la U.E.:</label>
                          <input type="text" class="form-control" id="altatitularUEdet" name="altatitularUEdet" placeholder="Titular de Unidad economica" readonly>
                        </div>
                        <div class="col-md-6">
                          <label for="altateluadet" class="form-label small">Teléfono del titular de la U.E.:</label>
                          <input type="text" class="form-control" id="altateluadet" name="altateluadet" placeholder="Teléfono de Titular" readonly>
                        </div>
                    </div>
                    <div class="row">
                          <div class="col-md-6">
                            <label for="altatelcontrdet" class="form-label small">Teléfono quejas o denuncias:</label>
                            <input type="text" class="form-control" id="altatelcontrdet" name="altatelcontrdet" placeholder="Teléfono quejas o denuncias" readonly>
                          </div>
                          <div class="col-md-6">
                            <label for="nombverifdet" class="form-label small">Nombre del verificador:</label>
                            <input type="text" class="form-control" id="nombverifdet" name="nombverifdet" placeholder="Nombre completo" readonly>
                          </div>
                    </div>
                    
              </div>
            </div>


    </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary cierradetalle" data-bs-dismiss="modal">Cerrar</button>
                        
                        </div>
                    </form><!-- End floating Labels Form -->
                  </div>
                </div>
</div><!-- End Basic Modal--></div>

     
              


              <!--    FIN SECCION DE MODALES  -->
              </body>


<!-- Vendor JS Files -->




<script src="vistas/assets/libs/jquery/jquery.min.js"></script>
  <script src="vistas/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vistas/assets/libs/metismenu/metisMenu.min.js"></script>
  <script src="vistas/assets/libs/simplebar/simplebar.min.js"></script>
  <script src="vistas/assets/libs/node-waves/waves.min.js"></script>
  


<script src="vistas/assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="vistas/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vistas/assets/vendor/chart.js/chart.min.js"></script>
<script src="vistas/assets/vendor/echarts/echarts.min.js"></script>
<script src="vistas/assets/vendor/quill/quill.min.js"></script>

<script src="vistas/assets/vendor/tinymce/tinymce.min.js"></script>
<script src="vistas/assets/vendor/php-email-form/validate.js"></script>
<script src="vistas/assets/vendor/toastr/toastr.min.js"></script>

<!-- Template Main JS File -->

<script src="vistas/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="vistas/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

<script src="vistas/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="vistas/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
  <script src="vistas/assets/libs/jszip/jszip.min.js"></script>
  <script src="vistas/assets/libs/pdfmake/build/pdfmake.min.js"></script>
  <script src="vistas/assets/libs/pdfmake/build/vfs_fonts.js"></script>
  <script src="vistas/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="vistas/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="vistas/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
  <!-- Responsive examples -->
  <script src="vistas/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="vistas/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

  <script src="vistas/assets/vendor/parsleyjs/parsley.min.js"></script>
<!-- Template Main JS File -->
<script src="vistas/assets/js/main.js"></script>
 <!-- Js custom -->
 
 <script src="vistas/assets/js/intab_usuarios.js"></script>
 <script src="vistas/assets/js/intab_urls.js"></script>
 <script src="vistas/assets/js/acciones_detalle.js"></script>
 


              <!--    FIN SECCION DE MODALES  -->

              <?php $request = @$_GET["token"];  
              if ($request==null){
               
              }else{

               $listado=Urls::ctrMostrarVerifqr($request);
                
               //echo var_dump($listado);?>

              <!-- Modal de Detalle Padron -->

<div class="modal fade  modalDetalleUrlqr"id="basicModalurlqr" name="basicModalurlqr" tabindex="-1">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Información del Verificador</h5>
                            <button type="button" class="btn-close cierradetalleqr" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
      <div class="modal-body">
                     
                        

        <div class="card">
                <div class="card-body">
                                  
                  <section class="section contact">

<div class="row gy-4">

  <div class="col-xl-6">

    <div class="row">
      <div class="col-lg-6">
        <div class="info-box card">
          <i class="bi bi-geo-alt"></i>
          <h3>Municipio:</h3>
          <p><?php echo $listado["municipio_verificador"];?><br>Unidad Économica:<?php echo $listado["unidad_eco_verificador"];?><br>Telefono: <?php echo $listado ["tel_titular_ue_verificador"];?> </p>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="info-box card">
          <i class="bi bi-telephone"></i>
          <h3>Quejas y Denuncias</h3>
          <p><br><br><?php echo $listado["tel_contraloria_verificador"];?><br><br></p>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="info-box card">
          <i class="bi bi-person"></i>
          <h3>Nombre</h3>
          <p><?php echo $listado ["nombre_completo_verificador"];?></p>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="info-box card">
          <i class="bi bi-bullseye"></i>
          <h3>Vistas</h3>
          <p><br><?php echo $listado ["conteo_vistas_verificador"];?></p>
        </div>
      </div>
    </div>

  </div>

  <div class="col-xl-6">
    <div class="card p-2">
    <img id="gafete_card" class="mx-auto d-block" style="height:100%;width:100%;" src="/verificadores/<?php echo $listado["ruta_imagen_verificador"];?>">
    </div>

  </div>

</div>

</section>


                
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary cierradetalleqr" data-bs-dismiss="modal">Cerrar</button>
                        
                        </div>
                    
                  </div>
            </div>


</div><!-- End Basic Modal--></div>
</div>
</div>

             

<?php
               echo "
               <script type='text/javascript'>
               $('.modalDetalleUrlqr').modal('show');

               $('.cierradetalleqr').click(function(){
                //
                var element = document.getElementById('basicModalurlqr'); 
                if (element) element.click();
                $('.modalDetalleUrlqr').modal('hide')
            
              });


               </script>";


                


              }
              ?> 

 
</html>