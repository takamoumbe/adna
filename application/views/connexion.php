<!-- head.php -->
<?php include 'vendors/includes/head.php'; ?>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- logo -->
    <div class="login-logo">
      <a href=""><b>ADNA</b>LTE</a>
    </div>

    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg"></p>
        <form method="POST" action="<?php echo base_url("Home"); ?>">
          <div class="input-group mb-3">
            <input type="text" name="login" class="form-control" placeholder="ex : ">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fa fa-user-circle"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="*************">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-7">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Je le souhaite.
                </label>
              </div>
            </div>
            <div class="col-5">
              <button type="submit" class="btn btn-primary btn-block">
                Connexion <i class="fas fa-sign-in-alt ml-1"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

<!-- javascript.php -->
<?php include 'vendors/includes/javascript.php'; ?>

</body>
</html>
