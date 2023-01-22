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
              <h1 class="m-0">Gestionnaire</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo base_url("#"); ?>">Modifier</a></li>
                <li class="breadcrumb-item active">Gestionnaire</li>
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
                <h3 class="card-title">Modifier Informations Gestionnaire</h3>
              </div>

              <!-- form start -->
              <form method="POST" action="<?php echo base_url("gestionnaireUpdate") ?>">
                <div class="card-body row">

                  <div class="form-group col-md-6 col-12">
                    <label for="nom">Nom Paroisien</label>
                    <input type="hidden" name="idGest" value="<?php echo $gestionnaires[0]->idGest;?>">
                    <select class="form-control select2bs4" name="paroisien" style="width: 100%;">
                      <option selected value="<?php echo $gestionnaires[0]->paroisien;?>">
                        <?php echo $gestionnaires[0]->nom.' '.$gestionnaires[0]->prenom;?>
                      </option>
                      <?php foreach($paroissiens as $result) : ?>
                      <option value="<?php echo $result->idParois;?>"><?php echo $result->nom.' '.$result->prenom;?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6 col-12">
                    <label for="sigle">Fonctions Gestionnaire</label>
                    <select class="form-control select2bs4" name="fonction" style="width: 100%;">
                      <option selected>
                        <?php echo $gestionnaires[0]->fonction;?>
                      </option>
                      <option>administrateur</option>
                      <option>president du commite finance</option>
                      <option>pasteur</option>
                      <option>pasteur assistant</option>
                      <option>assistant</option>
                    </select>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="login">Login Gestionnaire</label>
                    <input type="text" name="login" class="form-control bg-white" readonly id="login" placeholder="Entrer le login du gestionnaire....." autocomplete="off" value="<?php echo $gestionnaires[0]->login;?>">
                    <?php echo form_error('login', '<div class="text-danger">', '</div>'); ?>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="password">Password Paroisien</label>
                    <input type="text" name="password" class="form-control bg-white" readonly id="password" placeholder="Entrer le password du gestionnaire....." autocomplete="off"  value="<?php echo $gestionnaires[0]->password;?>">
                    <?php echo form_error('password', '<div class="text-danger">', '</div>'); ?>
                  </div>

                  <div class="form-group col-md-12 col-12">
                    <label for="accreditations">Accréditations Gestionnaire</label>
                    <select class="form-control select2bs4" multiple="multiple" name="accreditations" id="accreditations" data-placeholder="Selectionnez les accréditations de cegestionnaire" style="width: 100%;">
                      <option value="0">Toutes les autorisations</option>
                      <option value="1">Accréditation de Lecture</option>
                      <option value="3">Accréditation de Modification</option>
                      <option value="5">Accréditation d'enregistrement</option>
                      <option value="7">Accréditation de suppression</option>
                    </select>
                    <?php echo form_error('accreditations', '<div class="text-danger">', '</div>'); ?>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary col-12 col-md-2">
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
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  </script>
</body>
</html>
