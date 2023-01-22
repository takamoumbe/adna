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
              <h1 class="m-0">Versements</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo base_url("#"); ?>">Modifier</a></li>
                <li class="breadcrumb-item active">Versements</li>
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
                <h3 class="card-title">Modifier Versement</h3>
              </div>

              <!-- form start -->
              <form method="POST" action="<?php echo base_url("versementUpdate") ?>">

                <div class="card-body row">
                  <div class="form-group col-md-12">
                    <label for="engagement">Matricule Versement</label>
                    <input type="hidden" name="idVers"  value="<?php echo $versements[0]->idVers;?>">
                    <input type="text" readonly onkeypress="return onlyNumberKey(event)" name="MatriculeVersement"  class="form-control bg-white" id="paroisienSplit" placeholder="Entrer le montant du Versement de cet Engagement....." value="<?php echo $versements[0]->matriculeVers;?>" >
                  </div>

                  <div class="form-group col-md-6">
                    <label for="date_versement">Date Versement</label>
                    <input type="date" readonly name="date_versement" class="form-control bg-white" id="date_versement" placeholder="Entrer le prénom du paroisien....." value="<?php echo $versements[0]->date_versement ?>">
                    <?php echo form_error('date_versement', '<div class="text-danger">', '</div>'); ?>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="evenement">Evènement du Versement</label>
                    <select class="form-control select2bs4 select2-danger" id="evenement" name="evenement" style="width: 100%;">
                      <option>culte</option>
                    </select>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="evenement">Montant Versé</label>
                    <input type="text" name="montant" onkeypress="return onlyNumberKey(event)" class="form-control" id="montant" placeholder="Entrer le montant du Versement de cet Engagement....." minlength="3" autocomplete="off" value="<?php echo $versements[0]->montantVersement ?>">
                  </div>

                  <div class="form-group  col-md-6">
                    <label for="paroisien" class="col-md-12">Paroisien Concerné</label>
                    <input type="text" name="paroisien" readonly onkeypress="return onlyNumberKey(event)" class="form-control bg-white" id="paroisien" placeholder="Entrer le montant du Versement de cet Engagement....."  value="<?php echo strtoupper($versements[0]->nom).' '.ucfirst($versements[0]->prenom) ?>">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="button" id="submit-association" class="btn btn-primary">
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
    function onlyNumberKey(evt) {
      var ASCIICode = (evt.which) ? evt.which : evt.keyCode
      if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
      return true;
    }
  </script>
  
  <script>
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  </script>


  <script>
    $('#submit-association').on('click',function(e){
      e.preventDefault();
      var form = $(this).parents('form');
      Swal.fire({
        title: "Etes vous sur?",
        text: "Souhaitez vous vraiment modifié ce versement ?",
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
            text: "Requete de modification en cour de traitement.",
            showSpinner: true,
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
