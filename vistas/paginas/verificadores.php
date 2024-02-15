<main id="main" class="main">

<div class="pagetitle">
  <h1>Padrón Municipal de Verificadores</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Funciones</li>
      <li class="breadcrumb-item active">Verificadores</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section">
    
  <div class="row">
       <div class="col-lg-12">

       <div class="card">
       <div class="card-header">
       <h7 class="card-title">Alta del padron.</h7><br>
       </div>
          <div class="card-body">
             
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                Agregar verificador.
              </button>
            <br><br>
              <table id="verificadores_table" name="vareificadores_table" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                                         
                                        <thead>
                                        <tr  style=" width: 1%; white-space: wrap;">
                                        <th style=" width: 1%;">#</th>
                                            <th class="small">Municipio</th>
                                            <th class="small">Unidad Economica</th>
                                            <th class="small">Telefono titular Unidad E</th>
                                            <th class="small">Telefono Quejas y Denuncias</th>
                                            <th class="small">Nombre Verificador</th>
                                            <th class="small">Url Verificador</th>
                                            <th class="small">Alta</th>
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

<!-- Modal de alta del Padron -->

<div class="modal fade" id="basicModal" name="basicModal" tabindex="-1">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Agregar Verificador</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     
                        

<div class="card">
        <div class="card-body">
          <h5 class="card-title">Completa el Siguiente Formulario</h5>

          <!-- Floating Labels Form -->
          <form id="verifform" name="verifform" data-parsley-validate="">
            <input type="hidden" id="usuact" name="usuact" value="<?php echo $_SESSION['uactivo'];?>">
          <div class="row">
            <div class="col-md-6">
              
              <label for="mpioverif" class="form-label small"><br>Nombre del Municipio:</label>
                <select class="form-select" id="mpioverif" name="mpioverif"aria-label="Municipio" data-parsley-required>
                  <option selected ></option>
                  <option value="Huixquilucan">Huixquilucan</option>
                  <option value="Otros">Otros</option>
                </select>  
             
            </div>

            <div class="col-md-6">
              <label for="altaUE" class="form-label small">Nombre de la unidad economica que tiene a su cargo plantilla de verificadores e inspectores:</label>
              <input type="text" class="form-control" id="altaUE" name="altaUE" placeholder="Unidad economica" required>
            </div>
            </div>
            <div class="row">
            <div class="col-md-6">
              <label for="altaUE" class="form-label small">Nombre del titular de la  unidad economica que tiene a su cargo plantilla de verificadores e inspectores:</label>
              <input type="text" class="form-control" id="altatitularUE" name="altatitularUE" placeholder="Titular de Unidad economica" required>
            </div>
            <div class="col-md-6">
              <label for="altatelua" class="form-label small">Teléfono del titular de la unidad administrativa a cargo:</label>
              <input type="text" class="form-control" id="altatelua" name="altatelua" placeholder="Teléfono de Titular" required>
            </div>
            </div>
            <div class="row">
            <div class="col-md-6">
              <label for="altatelcontr" class="form-label small">Teléfono del titular de la contraloria interna municipal para realizar quejas o denuncias:</label>
              <input type="text" class="form-control" id="altatelcontr" name="altatelcontr" placeholder="Teléfono quejas o denuncias" required>
            </div>
            <div class="col-md-6">
              <label for="nombverif" class="form-label small"><br>Nombre del verificador o inspector:</label>
              <input type="text" class="form-control" id="nombverif" name="nombverif" placeholder="Nombre completo" required>
            </div>
            </div>
            <div class="col-md-6">
              <label for="gafverif" class="form-label small">Imagen del gafete del verificador o inspector "vigente":</label>
              <input class="form-control" type="file" id="gafverif" name="gafverif" accept="image/gif,image/jpeg,image/jpg,image/png" required>
            </div>
            </div>
    </div>
            </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                      <button type="button" class="btn btn-primary agrgrverif">Gurdar</button>
                    </div>
                    </form><!-- End floating Labels Form -->
                  </div>
                </div>
              </div><!-- End Basic Modal-->
<!-- Modal de Detalle Padron -->

<div class="modal fade detallemodal" id="basicModal2" name="basicModal2" tabindex="-1">
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

              

              <!-- Modal de Modificación del Padron -->

<div class="modal fade modifica_verificdor" id="basicModal3" name="basicModal3" tabindex="-1">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Modificar Verificador</h5>
                            <button type="button" class="btn-close cierramodif" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
          <div class="modal-body">
                     
                        

                            <div class="card">
                                    <div class="card-body">
                                      <h5 class="card-title">Completa el Siguiente Formulario</h5>

                                      <!-- Floating Labels Form -->
                                      <form id="verifformupd" name="verifformupd" data-parsley-validate="">
                                        <input type="hidden" class="usuact" id="usuact" name="usuact" value="<?php echo $_SESSION['uactivo'];?>">
                                                  <div class="row">
                                                        <div class="col-md-6">
                                                          
                                                          <label for="mpioverifupd" class="form-label small"><br>Nombre del Municipio:</label>
                                                            <select class="form-select" id="mpioverifupd" name="mpioverifupd"aria-label="Municipio" data-parsley-required>
                                                              <option selected ></option>
                                                              <option value="Huixquilucan">Huixquilucan</option>
                                                              <option value="Otros">Otros</option>
                                                            </select>  
                                                        
                                                        </div>

                                                          <div class="col-md-6">
                                                            <label for="altaUEupd" class="form-label small">Nombre de la unidad economica que tiene a su cargo plantilla de verificadores e inspectores:</label>
                                                            <input type="text" class="form-control" id="altaUEupd" name="altaUEupd" placeholder="Unidad economica" required>
                                                          </div>
                                                  </div>
                                                  <div class="row">
                                                          <div class="col-md-6">
                                                            <label for="altatitularUEupd" class="form-label small">Nombre del titular de la  unidad economica que tiene a su cargo plantilla de verificadores e inspectores:</label>
                                                            <input type="text" class="form-control" id="altatitularUEupd" name="altatitularUEupd" placeholder="Titular de Unidad economica" required>
                                                          </div>
                                                          <div class="col-md-6">
                                                            <label for="altateluaupd" class="form-label small">Teléfono del titular de la unidad administrativa a cargo:</label>
                                                            <input type="text" class="form-control" id="altateluaupd" name="altateluaupd" placeholder="Teléfono de Titular" required>
                                                          </div>
                                                  </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                              <label for="altatelcontrupd" class="form-label small">Teléfono del titular de la contraloria interna municipal para realizar quejas o denuncias:</label>
                                                              <input type="text" class="form-control" id="altatelcontrupd" name="altatelcontrupd" placeholder="Teléfono quejas o denuncias" required>
                                                            </div>
                                                            <div class="col-md-6">
                                                              <label for="nombverifupd" class="form-label small"><br>Nombre del verificador o inspector:</label>
                                                              <input type="text" class="form-control" id="nombverifupd" name="nombverifupd" placeholder="Nombre completo" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                              <label for="gafverifupd" class="form-label small">Imagen del gafete del verificador o inspector "vigente":</label>
                                                              <input class="form-control" type="file" id="gafverifupd" name="gafverifupd" accept="image/gif,image/jpeg,image/jpg,image/png" required>
                                                              <input class="form-control" type="hidden" id="tokenverupd" name="tokenverupd" value="">
                                                            </div>
                                                        </div>
                                    </div>
                            </div>
            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary cierramodif" data-bs-dismiss="modal">Cerrar</button>
                                              <button type="button" class="btn btn-primary modifverifupd">Actualizar</button>
                                            </div>
                    </form><!-- End floating Labels Form -->
                  </div>
                </div>
</div><!-- End Basic Modal--></div></div>