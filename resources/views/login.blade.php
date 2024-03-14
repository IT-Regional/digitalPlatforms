@include('template')
    <!-- ======== Preloader =========== -->
    <div class="overlay"></div>
    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
        <div class="login">
        <div class="login-screen">
          <div class="app-title">
            <h3>Inicio de Sesion</h3>
          </div>
          <form method="POST" action="{{ route('login') }}" id="frm_login" class="frm_login">
                @csrf
                <div class="login-form">
                <div class="control-group">
                <input type="text" class="login-field" value="" placeholder="Correo" id="login-name" name="username">
                <label class="login-field-icon fui-user" for="login-name"></label>
                </div>

                <div class="control-group">
                <input type="password" class="login-field" value="" placeholder="password" id="login-pass" name="password">
                <label class="login-field-icon fui-lock" for="login-pass" ></label>
                </div>
                <button class="btn">
                    Entrar
                </button>
          </form>
          </div>
        </div>
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