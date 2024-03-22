@include('template')
    <!-- ======== Preloader =========== -->
    <div class="overlay"></div>
    <!-- ======== main-wrapper start =========== -->
    <main>
      <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                <div class="d-flex justify-content-center py-4">
                  <a href="index.html" class="logo d-flex align-items-center w-auto">
                    <span class="d-none d-lg-block">GStreaming</span>
                  </a>
                </div><!-- End Logo -->

                <div class="card mb-3">

                  <div class="card-body">

                    <form class="row g-3 needs-validation" method="POST" action="{{ route('login') }}">
                      @csrf
                      <div class="col-12">
                        <label for="yourUsername" class="form-label">Correo</label>
                        <div class="input-group has-validation">
                          <span class="input-group-text" id="inputGroupPrepend">@</span>
                          <input type="text" name="username" class="form-control" id="yourUsername" required>
                          <div class="invalid-feedback">Please enter your username.</div>
                        </div>
                      </div>

                      <div class="col-12">
                        <label for="yourPassword" class="form-label">Contraseña</label>
                        <input type="password" name="password" class="form-control" id="yourPassword" required>
                        <div class="invalid-feedback">Please enter your password!</div>
                      </div>
                      <div class="col-12">
                        <button class="btn btn-primary w-100" type="submit">Login</button>
                      </div>
                    </form>

                  </div>
                </div>

              </div>
            </div>
          </div>

        </section>

      </div>
  </main>

  <style>
    .login {
      margin: 10% auto;
      width: 300px;
    }
      .login-screen {
      background-color: #FFF;
      padding: 20px;
      border-radius: 5px
      }

      .app-title {
      text-align: center;
      color: #777;
      }

      .login-form {
      text-align: center;
      }
      .control-group {
      margin-bottom: 10px;
      }

      input {
      text-align: center;
      background-color: #ECF0F1;
      border: 2px solid transparent;
      border-radius: 3px;
      font-size: 16px;
      font-weight: 200;
      padding: 10px 0;
      width: 250px;
      transition: border .5s;
      }

      input:focus {
      border: 2px solid #3498DB;
      box-shadow: none;
      }

      .btn {
        border: 2px solid transparent;
        background: #3498DB;
        color: #ffffff;
        font-size: 16px;
        line-height: 25px;
        padding: 10px 0;
        text-decoration: none;
        text-shadow: none;
        border-radius: 3px;
        box-shadow: none;
        transition: 0.25s;
        display: block;
        width: 250px;
        margin: 0 auto;
      }

      .btn:hover {
        background-color: #205172;
        color: white;
      }

      .login-link {
        font-size: 12px;
        color: #444;
        display: block;
        margin-top: 12px;
      }
  </style>