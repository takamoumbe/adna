<!-- head.php -->
<?php include 'vendors/includes/head.php'; ?>

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
                <li class="breadcrumb-item">
                  <a href="<?php echo base_url("gestionnairesListe"); ?>">Listing</a>
                </li>
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
                <h3 class="card-title">Liste des Gestionnaires</h3>
              </div>

              <!-- form start -->
              <div class="card-body">
                <br>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr class="text-center">
                      <th>N°</th>
                      <th>Nom & Prénoms</th>
                      <th>Association</th>
                      <th>Adresse</th>
                      <th>Contact</th>
                      <th>Attribut</th>
                      <th>Statut Paroissial</th>
                      <th class="col-md-2">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $id = 1;
                    foreach($gestionnaires as $result) : 
                      ?>
                      <tr class="text-center">
                        <td><?php echo $id; ?></td>
                        <td><?php echo strtoupper($result->nom). ' '. ucfirst($result->prenom); ?></td>
                        <td><?php echo ucfirst($result->sigleAssociation); ?></td>
                        <td><?php echo ucfirst($result->adresse); ?></td>
                        <td><?php echo $result->telephone1; ?></td>
                        <td><?php echo ucfirst($result->fonction ); ?></td>
                        <td><?php echo ucfirst($result->categorie); ?></td>
                        <td>
                          <center>
                            <div class="btn-group">
                              <button type="button" class="btn btn-ligth" onclick="deleteGest('<?php echo $result->idGest ?>', '<?php echo $result->nom.' '.$result->prenom ?>')">
                                <i class="fa fa-trash"></i>
                              </button>
                              <a href="<?php echo base_url("gestionnaireEdit/".$result->idGest) ?>" class="btn btn-ligth" >
                                <i class='fa fa-edit'></i>
                              </a>
                              </button>
                            </div>
                          </center>
                        </td>
                      </tr>
                      <?php 
                      $id++;
                    endforeach; 
                    ?>
                  </tbody>
                  <tfoot>
                    <tr class="text-center">
                      <th>N°</th>
                      <th>Nom & Prénoms</th>
                      <th>Association</th>
                      <th>Adresse</th>
                      <th>Contact</th>
                      <th>Attribut</th>
                      <th>Statut Paroissial</th>
                      <th class="col-md-2">Actions</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
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

    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    function deleteGest(userId, nom) {
      Swal.fire({
        title: "Etes vous sur?",
        html: "Voulez vous supprimé le gestionnaire <b>"+ nom +"</b> ?",
        allowOutsideClick: false,
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Oui, je le souhaite!",
        cancelButtonText: "Annuler",
        closeOnConfirm: false
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire({
            title:"Félicitations",
            html: "Le gestionnaire <b>"+ nom +"</b> a bien été supprimé.",
            showClass:{
              popup:"animate__animated animate__bounceIn"
            },
            allowOutsideClick: false,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Okey, merci!",
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                url: window.location = "<?php echo base_url('gestionnaireDelete/')?>" + userId,
                type: "PUT",
                dataType: "JSON",
              });
            }
          })
        }
      });
    }
  </script>
</body>
</html>
