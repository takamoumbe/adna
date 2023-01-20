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
                <li class="breadcrumb-item">
                  <a href="<?php echo base_url("versementListe"); ?>">versementListe</a>
                </li>
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
                <h3 class="card-title">Liste des Versements</h3>
              </div>

              <!-- form start -->
              <div class="card-body">
                <div class="row card">
                  <div class="form-group col-md-12 p-3">
                    <label for="date_versement" class="col-md-12">Filtre des Versements</label>
                    <div class="row">
                      <div class="input-group col-md-6">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                        <input type="date" class="form-control float-right" id="daterangepickerEnagementMin">
                      </div>
                      <div class="input-group col-md-6">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                        <input type="date" class="form-control float-right" id="daterangepickerEnagementMax">
                      </div>
                    </div>
                  </div>
                </div>

                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr class="text-center">
                      <th>ID</th>
                      <th>Matricule Versement</th>
                      <th>Paroisien</th>
                      <th>Montant Vers</th>
                      <th>Date Vers</th>
                      <th>Evènement</th>
                      <th>Type Eng</th>
                      <th>Nom Groupe</th>
                      <th>Sigle Groupe</th>
                      <th class="col-md-1">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $id = 1;
                    foreach($versements as $result) : 
                      ?>
                      <tr class="text-center">
                        <td class="text-center"><?php echo $id; ?></td>
                        <td><?php echo $result->matriculeVers; ?></td>
                        <td><?php echo strtoupper($result->nomParoisien).' '.ucfirst($result->prenomParoisien); ?></td>
                        <td><?php echo $result->montantVers; ?></td>
                        <td><?php echo $result->date_versement; ?></td>
                        <td><?php echo $result->evenement; ?></td>
                        <td><?php echo $result->type; ?></td>
                        <td><?php echo $result->nomAssociation; ?></td>
                        <td><?php echo $result->sigleAssociation; ?></td>
                        <td>
                          <center>
                            <div class="btn-group">
                              <a href="<?php echo base_url("versementEdit/".$result->idVers) ?>" class="btn btn-ligth" >
                                <i class='fa fa-edit'></i>
                              </a>
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
                      <th></th>
                      <th>Total</th>
                      <th></th>
                      <th class="text-danger text-center"></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
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

    // $(document).ready(function () {
    //   $.fn.dataTableExt.afnFiltering.push(
    //     function( oSettings, aData1, iDataIndex ) {
    //       var startDate1 = $('#daterangepickerEnagementMin').val();
    //       var endDate1 = $('#daterangepickerEnagementMax').val();
    //       var colValue1 = aData1[6]; 
    //       var dateValue1 = new Date(colValue1);

    //       if ( startDate1 == "" && endDate1 == "" )
    //       {
    //         return true;
    //       }
    //       else if (startDate1 != null && endDate1 == "")
    //       {
    //         if(new Date(startDate1) <= dateValue1) {
    //           return true;
    //         }
    //       }
    //       else if ( startDate1 == "" && endDate1 != "")
    //       {
    //         if(dateValue1 <= new Date(endDate1)) {
    //           return true;
    //         }
    //       }
    //       else if (startDate1 != null && endDate1 != null)
    //       {
    //         if(new Date(startDate1) <= dateValue1 && dateValue1 <= new Date(endDate1)) {
    //           return true;
    //         }
    //       }
    //       return false;
    //     }
    //     );
    //   $('#daterangepickerEnagementMin').datetimepicker({ onChangeMonthYear: function () { table.draw(); }, changeMonth: true, changeYear: true });
    //   $('#daterangepickerEnagementMax').datetimepicker({ onChangeMonthYear: function () { table.draw(); }, changeMonth: true, changeYear: true });
    // });
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
