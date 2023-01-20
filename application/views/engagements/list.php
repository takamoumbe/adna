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
                <li class="breadcrumb-item">
                  <a href="<?php echo base_url("associationsListe"); ?>">Listing</a>
                </li>
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
                <h3 class="card-title">Liste des Engagements</h3>
              </div>

              <!-- form start -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr class="text-center">
                      <th>ID</th>
                      <th>Matricule</th>
                      <th>Paroisien</th>
                      <th>Type Enagement</th>
                      <th>Date Début</th>
                      <th>Date Fin</th>
                      <th>Montant</th>
                      <th>statut</th>
                      <th class="col-md-2">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $id = 1;
                    foreach($Engagements as $result) : 
                      ?>
                      <tr class="text-center">
                        <td class="text-center"><?php echo $id; ?></td>
                        <td><?php echo $result->matriculEngag; ?></td>
                        <td class="text-capitalize"><?php echo $result->nomParoisien.' '.$result->prenomParoisien; ?></td>
                        <td class="text-capitalize"><?php echo $result->type; ?></td>
                        <td><?php echo $result->date_debut; ?></td>
                        <td class="text-center"><?php echo $result->date_fin; ?></td>
                        <td class="text-center"><?php echo number_format($result->montant).' fcfa'; ?></td>
                        <td class="text-center"><?php echo $result->statut; ?></td>
                        <td>
                          <center>
                            <div class="btn-group">
                              <button type="button" class="btn btn-ligth" onclick="delete_association('<?php echo $result->idEngagement ?>', '<?php echo $result->nomParoisien.' '.$result->prenomParoisien ?>')">
                                <i class="fa fa-trash"></i>
                              </button>
                              <a href="<?php echo base_url("engagementEdit/".$result->idEngagement) ?>" class="btn btn-ligth" >
                                <i class='fa fa-edit'></i>
                              </a>
                              <button type="button" class="btn btn-ligth" onclick="reload_association('<?php echo $result->idEngagement ?>', '<?php echo $result->nomParoisien.' '.$result->prenomParoisien ?>')">
                                <i class='fa fa-recycle'></i>
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
                      <th>ID</th>
                      <th>Matricule</th>
                      <th>Paroisien</th>
                      <th>Type Enagement</th>
                      <th>Date Début</th>
                      <th>Date Fin</th>
                      <th>Montant</th>
                      <th>statut</th>
                      <th>Actions</th>
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

    function delete_association(userId, nom) {
      Swal.fire({
        title: "Etes vous sur?",
        text: "Souhaitez vous vraiment supprimé cet engagement ?",
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
            text: "L'engagement du paroisien "+ nom +" a bien été supprimé.",
            showClass:{
              popup:"animate__animated animate__bounceIn"
            },
            allowOutsideClick: false,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Okey, merci!",
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                url: window.location = "<?php echo base_url('engagementDelete/')?>" + userId,
                type: "PUT",
                dataType: "JSON",
              });
            }
          })
        }
      });
    }


    function reload_association(userId, nom) {
      Swal.fire({
        title: "Etes vous sur?",
        text: "Souhaitez vous vraiment réactivé cet engagement ?",
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
            text: "L'engagement du paroisien "+ nom +" a bien été réactivé.",
            showClass:{
              popup:"animate__animated animate__bounceIn"
            },
            allowOutsideClick: false,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Okey, merci!",
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                url: window.location = "<?php echo base_url('engagementReload/')?>" + userId,
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
