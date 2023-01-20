<!-- head.php -->
<?php include 'vendors/includes/head.php'; ?>

<?php 
if ($this->session->flashdata('message')){
  echo $this->session->flashdata('message');
}
?>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <?php include 'vendors/includes/preloader.php'; ?>

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
      </ul>
    </nav>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">

      <!-- Branding Logo -->
      <?php include 'vendors/includes/brandring.php'; ?>
      

      <!-- Sidebar.php -->
      <?php include 'vendors/includes/sidebar.php'; ?>
    </aside>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Engagements</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo base_url("#"); ?>">Modifier</a></li>
                <li class="breadcrumb-item active">Engagements</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="col-md-12">

            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Modifier Engagement</h3>
              </div>

              <!-- form start -->
              <form method="POST" action="<?php echo base_url("engagementUpdate") ?>">
                <div class="card-body row">
                  <div class="form-group col-md-6 col-12">
                    <label for="nom">Nom Paroisien</label>
                    <input type="hidden" name="idEngagement" value="<?php echo $engagements->idEngagement;?>">
                    <input type="text" readonly class="form-control bg-white" name="paroisien" value="<?php echo $engagements->nomParoisien.' '.$engagements->prenomParoisien;?>">
                    <input type="hidden" readonly class="form-control bg-white" name="paroisien" value="<?php echo $engagements->paroisien;?>">
                  </div>

                  <div class="form-group col-md-6 col-12">
                    <label for="sigle">Type Engagement</label>
                    <select class="form-control select2bs4" name="type" style="width: 100%;">
                      <option selected><?php echo $engagements->type;?></option>
                      <option>dîme</option>
                      <option>cotisations de construction</option>
                      <option>Offrandes des recoltes</option>
                    </select>
                  </div>
                  
                  <div class="form-group col-md-6 col-12">
                    <label for="date_debut">Date de début d'engagements</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="far fa-calendar-alt"></i>
                        </span>
                      </div>
                      <input type="date" class="form-control float-right" name="date_debut" id="date_debut" value="<?php echo $engagements->date_debut;?>">
                    </div>
                    <?php echo form_error('date_debut', '<div class="text-danger">', '</div>'); ?>
                  </div>
                  
                  <div class="form-group col-md-6 col-12">
                    <label for="montant">Montant Engagement</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="far fa-money-bill-alt"></i>
                        </span>
                      </div>
                      <input type="text" class="form-control float-right" onkeypress="return onlyNumberKey(event)" name="montant" id="montant" minlength="3" value="<?php echo $engagements->montant;?>">
                    </div>
                    <?php echo form_error('montant', '<div class="text-danger">', '</div>'); ?>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">
                    Modifier <i class="fa fa-save ml-1"></i>
                  </button>
                </div>
              </form>
            </div>
          </div>
          
        </div>
      </section>
      <!-- /.content -->
    </div>
  </div>
  <!-- ./wrapper -->



  <!-- javascript.php -->
  <?php include 'vendors/includes/javascript.php'; ?>

  <script>
    // select2
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Date range picker
    $('#reservation').daterangepicker()


    function onlyNumberKey(evt) {
      var ASCIICode = (evt.which) ? evt.which : evt.keyCode
      if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
      return true;
    }
  </script>
</body>
</html>
