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
              <h1 class="m-0">Associations</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo base_url("associations"); ?>">Ajouter</a></li>
                <li class="breadcrumb-item active">Associations</li>
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
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title"><b>Nouvelle Association</b></h3>
              </div>

              <!-- form start -->
              <form method="POST" action="<?php echo base_url("associationCreate") ?>" id="form-id">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nom">Nom Association</label>
                    <input type="text" name="nom" class="form-control" id="nom" placeholder="Entrer le nom de l'association......" autocomplete="off">
                    <?php echo form_error('nom', '<div class="text-danger">', '</div>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="sigle">Sigle Association</label>
                    <input type="text" name="sigle" class="form-control" id="sigle" placeholder="Entrer le nom de l'association....." autocomplete="off">
                    <?php echo form_error('sigle', '<div class="text-danger">', '</div>'); ?>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="button" id="submit-association" class="btn btn-primary">
                    Enregistrer <i class="fa fa-save ml-1"></i>
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
    $('#submit-association').on('click',function(e){
      e.preventDefault();
      var form = $(this).parents('form');
      Swal.fire({
        title: "Etes vous sur?",
        text: "Souhaitez vous vraiment enregistré cette association ?",
        type: "warning",
        allowOutsideClick: false,
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Oui, je le souhaite!",
        closeOnConfirm: false
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire({
            title:"Traitement",
            text: "Requete en cour de traitement.",
            showClass:{
              popup:"animate__animated animate__bounceIn"
            },
            allowOutsideClick: false,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Okey, merci!",
            preConfirm: () => {
              Swal.showLoading()
              return new Promise((resolve) => {
                setTimeout(() => {
                  resolve(true)
                }, 3000)
              })
            }
          }).then((result) => {
            if (result.isConfirmed) {
              form.submit();
            }
          })
        }
      });
    });
  </script>
</body>
</html>
