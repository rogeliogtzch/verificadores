<main id="main" class="main">

<div class="pagetitle">
  <h1>Parón Municipal de Verificadores</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Funciones</li>
      <li class="breadcrumb-item active">urls</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section">
    
  <div class="row">
       <div class="col-lg-12">

       <div class="card">
       <div class="card-header">
       <h7 class="card-title">Listado de urls.</h7><br>
       </div>
          <div class="card-body">
            <br><br>
              <table id="urls_table" name="urls_table" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                                         
                                        <thead>
                                        <tr  style=" width: 1%; white-space: wrap;">
                                        <th style=" width: 1%;">#</th>
                                        
                                        <th class="small">url de verifiación</th>
                                            <th class="small">Nombre del Verificador/Inspector</th>
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


<!-- Modal de Detalle Padron -->

<div class="modal fade modalDetalleUrl" id="basicModal" name="basicModal" tabindex="-1">
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
                  <input type="hidden" class= "uactdesurl" id="usuact" name="usuact" value="<?php echo $_SESSION['uactivo'];?>">
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

              