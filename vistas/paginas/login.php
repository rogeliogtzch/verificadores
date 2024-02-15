<div class="container">

<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

        <div class="d-flex justify-content-center py-4">
          <a href="principal" class="logologin d-flex align-items-center w-auto">
            <img src="vistas/assets/img/2022.png" alt=""><br/>
          </a>
        </div><!-- End Logo -->
        <div class="card mb-3">

          <div class="card-body">

            <div class="pt-4 pb-2">
              <h5 class="card-title text-center pb-0 fs-4">Inicia Sesion</h5>
              <p class="text-center small">Ingresa email y pasword para continuar</p>
            </div>

            <form class="needs-validation was-validated" novalidate="">

              <div class="col-12">
                <label for="yourUsername" class="form-label">usuario</label>
                <div class="input-group has-validation">
                  <span class="input-group-text" id="inputGroupPrepend">@</span>
                  <input type="mail" name="username" class="form-control usuario" id="yourUsername" required>
                  <div class="invalid-feedback">Por favor ingresa tu nombre de usuario.</div>
                </div>
              </div>

              <div class="col-12">
                <label for="yourPassword" class="form-label">Password</label>
                <input type="password" name="passwword" class="form-control contrasena" id="yourPassword" required>
                <div class="invalid-feedback">Por favor ingresa tu password!</div>
              </div>
              <div class="col-12">
                <button class="btn btn-primary w-100 btn-inicio" type="button">Login</button>
              </div>
              <div class="col-12">
                
              </div>
              <div class="col-12">
                
              </div>
            </form>

          </div>
        </div>

        <div class="credits">
          Diseñado por <a href="principal">DGA/SS/DI</a>
        </div>
<?php //echo crypt("123456", '$2a$07$tsjloi76rd45VCR56709DGASSDIVERFIF08/2022$');?>
<br>
<?php //echo $passhash = hash('sha256',uniqid());?>
      </div>
    </div>
  </div>

</section>

</div>