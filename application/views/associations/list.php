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
                <li class="breadcrumb-item">
                  <a href="<?php echo base_url("associationsListe"); ?>">Listing</a>
                </li>
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
                <h3 class="card-title">
                  <b>Liste des Association</b>
                </h3>
              </div>

              <!-- form start -->
              <div class="card-body">
                <br>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr class="text-center">
                      <th>ID</th>
                      <th>Nom</th>
                      <th>Sigle</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $id = 1;
                    foreach($associations as $result) : 
                      ?>
                      <tr>
                        <td class="text-center"><?php echo $id; ?></td>
                        <td><?php echo $result->nom; ?></td>
                        <td class="text-center"><?php echo $result->sigle; ?></td>
                        <td>
                          <center>
                            <div class="btn-group">
                              <button type="button" class="btn btn-ligth d-none" onclick="delete_association('<?php echo $result->idAssocia ?>', '<?php echo $result->nom ?>')">
                                <i class="fa fa-trash"></i>
                              </button>
                              <a href="<?php echo base_url("associationEdit/".$result->idAssocia) ?>" class="btn btn-ligth" >
                                <i class='fa fa-edit'></i>
                              </a>
                              <button type="button" class="btn btn-ligth d-none" onclick="reload_association('<?php echo $result->idAssocia ?>', '<?php echo $result->nom ?>')">
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
                    <tr>
                      <th colspan ="3"></th>
                      <th class="text-center" id="recordTotal"></th>
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
    $(document).ready( function () {
      var table = $("#example1").DataTable({
        "responsive": true, 
        "lengthChange": false, 
        "autoWidth": false,
        orderCellsTop: true,
        fixedHeader: true,
        paging : true,
        "buttons": ["copy", "csv", "excel", "print", "colvis"],

        drawCallback: function () {
          var api = this.api();
          var sum = 0;
          var formated = 0;
          $(api.column(0).footer()).html('Total Associations');
          sum = api.column(1, {page:'current'}).data().count();
          $(api.column(3).footer()).html(sum);
          
        }
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });




    function delete_association(userId, nom) {
      Swal.fire({
        title: "Etes vous sur?",
        text: "Souhaitez vous vraiment supprimé cette association ?",
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
            text: "L'association "+ nom +" a bien été supprimé.",
            showClass:{
              popup:"animate__animated animate__bounceIn"
            },
            allowOutsideClick: false,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Okey, merci!",
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                url: window.location = "<?php echo base_url('associationDelete/')?>" + userId,
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
        text: "Souhaitez vous vraiment réactivé cette association ?",
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
            text: "L'association "+ nom +" a bien été réactivée.",
            showClass:{
              popup:"animate__animated animate__bounceIn"
            },
            allowOutsideClick: false,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Okey, merci!",
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                url: window.location = "<?php echo base_url('associationReload/')?>" + userId,
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
