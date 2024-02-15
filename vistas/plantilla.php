<?php
    session_start();
    $ruta = ControladorRuta::ctrRuta();
    date_default_timezone_set("America/Mexico_City");

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Padron de Verificadores| Control Interno</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
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
  <link href="vistas/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
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

<body data-layout="detached" data-topbar="colored">

<?php if (!isset($_SESSION["iniciarSesion"])){

include "paginas/login.php";

?>

<?php } else{ ?>

    <div class="container-fluid">
        <!-- Begin page -->
        <div id="layout-wrapper">

            <?php include 'paginas/modulos/header.php';
                  include 'paginas/modulos/navegacion.php';
            ?>

            <div class="main-content">

                <!-- ====================================================== -->
                <!--                LISTA DE PAGINAS INTERNAS               -->
                <!-- ====================================================== -->


                <?php
            
                    if(isset($_GET["pagina"])){

                        if($_GET["pagina"] == "principal" ||
                        $_GET["pagina"] == "contacto" ||
                        $_GET["pagina"] == "verificadores" ||     
                        $_GET["pagina"] == "faq" ||                    
                        $_GET["pagina"] == "usuarios" ||
                        $_GET["pagina"] == "perfil" ||
                        $_GET["pagina"] == "urls" ||
                        $_GET["pagina"] == "salir"
                        
                        ) {

                            include "paginas/".$_GET["pagina"].".php";

                            } else {

                            include "paginas/error404.php";

                            }

                        } else {

                            include "paginas/principal.php";

                        }
            
                        include 'paginas/modulos/footer.php';
                ?>



            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

    </div>


    <?php } ?>
</body>


  <!-- Vendor JS Files -->
 
  


  <script src="vistas/assets/libs/jquery/jquery.min.js"></script>
  <script src="vistas/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vistas/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vistas/assets/libs/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="vistas/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="vistas/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="vistas/assets/libs/node-waves/waves.min.js"></script>
    

  
  <script src="vistas/assets/vendor/apexcharts/apexcharts.min.js"></script>
  
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
   <script src="vistas/assets/js/login.js"></script>
   <script src="vistas/assets/js/intab_usuarios.js"></script>
   <script src="vistas/assets/js/intab_urls.js"></script>
   <script src="vistas/assets/js/añadeverif.js"></script>
   <script src="vistas/assets/js/detalle_verif.js"></script>
   <script src="vistas/assets/js/upd_verif.js"></script>
   <script src="vistas/assets/js/disable_verif.js"></script>
   <script src="vistas/assets/js/detalle_url.js"></script>
   <script src="vistas/assets/js/disable_url.js"></script>
   <script src="vistas/assets/js/principal.js"></script>
   
  

      


</html>