<!-- head.php -->
<?php include 'vendors/includes/head.php'; ?>

<body class="hold-transition login-page">
  <div class="wrapper">

    <!-- Preloader -->
    <?php include 'vendors/includes/preloader.php'; ?>


    <!-- Content Wrapper. Contains page content -->
    <div class="mt-5">

      <!-- Main content -->
      <section class="content">
        <div class="error-page justify-content-center align-items-center">
          <h1 class="headline text-warning"><b>404</b></h1>

          <div class="error-content">
            <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>
            <p>
              Désolé mais, il semblerait que cette page soit en maintenance.
              <a href="<?php echo base_url("Home"); ?>">Retourner à l'acceuil</a>. Pour plus d'informations veillez contacter le services client ou votre webmaster.
            </p>
          </div>
          <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
      </section>
      <!-- /.content -->
    </div>
  </div>
  <!-- ./wrapper -->


  <!-- javascript.php -->
  <?php include 'vendors/includes/javascript.php'; ?>
</body>
</html>
