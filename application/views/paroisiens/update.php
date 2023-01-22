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
              <h1 class="m-0">Paroissiens</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo base_url("#"); ?>">Modifier</a></li>
                <li class="breadcrumb-item active">Paroissiens</li>
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
                <h3 class="card-title"><b>Modifier Informations Paroissien</b></h3>
              </div>

              <!-- form start -->
              <form method="POST" action="<?php echo base_url("paroisienUpdate") ?>" id="form-id">

                <div class="card-body row">
                  <div class="form-group col-md-6">
                    <label for="association">Nom Association</label>
                    <input type="hidden" readonly name="idParois" value="<?php echo $paroissiens[0]->idParois;?>">
                    <select class="form-control select2bs4" id="association" name="association" style="width: 100%;">
                      <option selected value="<?php echo $paroissiens[0]->association;?>">
                        <?php echo $paroissiens[0]->nomAssociation. " (".$paroissiens[0]->sigleAssociation.") "; ?>
                      </option>
                      <?php foreach($associations as $result) : ?>
                        <option value="<?php echo $result->idAssocia;?>"><?php echo $result->nom. " (".$result->sigle.") "; ?></option>
                      <?php endforeach; ?>
                    </select>
                    <?php echo form_error('nom', '<div class="text-danger">', '</div>'); ?>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="sexe">Sexe</label>
                    <select class="form-control select2 select2-danger" id="sexe" name="sexe" style="width: 100%;">
                      <option selected><?php echo $paroissiens[0]->sexe;?></option>
                      <option>Masculin</option>
                      <option>Feminin</option>
                    </select>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="categorie">Catégorie</label>
                    <select class="form-control select2 select2-danger text-capitalize" id="categorie" name="categorie" style="width: 100%;">
                      <option selected><?php echo $paroissiens[0]->categorie;?></option>
                      <option>ancien</option>
                      <option>diacre</option>
                      <option>menbre</option>
                    </select>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="sigle">Ancien Matricule</label>
                    <input type="text" name="ancienMatricule" class="form-control" id="ancienMatricule" placeholder="Entrer l'ancien matricule du paroisien....." autocomplete="off" maxlength="5" value="<?php echo $paroissiens[0]->ancienMatricule;?>">
                    <?php echo form_error('ancienMatricule', '<div class="text-danger">', '</div>'); ?>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="sigle">Nom</label>
                    <input type="text" name="nom" class="form-control" id="sigle" placeholder="Entrer le nom du paroisien....." autocomplete="off" value="<?php echo $paroissiens[0]->nom;?>">
                    <?php echo form_error('nom', '<div class="text-danger">', '</div>'); ?>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="prenom">Prénom</label>
                    <input type="text" name="prenom" class="form-control" id="prenom" placeholder="Entrer le prénom du paroisien....." autocomplete="off" value="<?php echo $paroissiens[0]->prenom;?>">
                    <?php echo form_error('prenom', '<div class="text-danger">', '</div>'); ?>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="date_naiss">Date Naissance</label>
                    <input type="date" name="date_naiss" class="form-control" id="date_naiss" placeholder="Entrer le nom du paroisien....." value="<?php echo $paroissiens[0]->date_naiss;?>">
                    <?php echo form_error('date_naiss', '<div class="text-danger">', '</div>'); ?>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="lieu_naiss">Lieu Naissance</label>
                    <input type="text" name="lieu_naiss" class="form-control" id="lieu_naiss" placeholder="Entrer le prénom du paroisien....." autocomplete="off" value="<?php echo $paroissiens[0]->lieu_naiss;?>">
                    <?php echo form_error('lieu_naiss', '<div class="text-danger">', '</div>'); ?>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="telephone1">Téléphone</label>
                    <input type="text" name="telephone1" onkeypress="return onlyNumberKey(event)" class="form-control" id="telephone1" placeholder="Entrer le prénom du paroisien....." maxlength="9" autocomplete="off" value="<?php echo $paroissiens[0]->telephone1;?>">
                    <?php echo form_error('telephone1', '<div class="text-danger">', '</div>'); ?>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Entrer le prénom du paroisien....." autocomplete="off" value="<?php echo $paroissiens[0]->email;?>">
                    <?php echo form_error('email', '<div class="text-danger">', '</div>'); ?>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="adresse">Adresse</label>
                    <input type="text" name="adresse" class="form-control text-capitalize" id="adresse" placeholder="Entrer le prénom du paroisien....." autocomplete="off" value="<?php echo $paroissiens[0]->adresse;?>">
                    <?php echo form_error('adresse', '<div class="text-danger">', '</div>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="date_adhesion">Date D'adhésion</label>
                    <input type="date" name="date_adhesion" class="form-control" id="date_adhesion" placeholder="Entrer le prénom du paroisien....." value="<?php echo $paroissiens[0]->date_adhesion.date('-m-d') ?>">
                    <?php echo form_error('date_adhesion', '<div class="text-danger">', '</div>'); ?>
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
    $('#submit-association').on('click',function(e){
      e.preventDefault();
      var form = $(this).parents('form');
      Swal.fire({
        title: "Etes vous sur?",
        text: "Souhaitez vous vraiment modifier ce paroissien ?",
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
            text: "La modifications des informations de ce paroissien et en cour de traitement.",
            showClass:{
              popup:"animate__animated animate__bounceIn"
            },
            allowOutsideClick: false,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Okey, merci!",
          }).then((result) => {
            if (result.isConfirmed) {
              form.submit();
            }
          })
        }
      });
    });
  </script>

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

</body>
</html>
