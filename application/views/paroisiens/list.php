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
              <h1 class="m-0">Paroisiens</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                  <a href="<?php echo base_url("paroisienListe"); ?>">Listing</a>
                </li>
                <li class="breadcrumb-item active">Paroisiens</li>
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
                <h3 class="card-title"><b>Liste des Paroissiens</b></h3>
              </div>
              <!-- form start -->
              <div class="card-body">
                <br>
                <div class="card card card-ligth">
                  <div class="card-header">
                    <h3 class="card-title">Filtrez les données en fonction de vos exideances</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool mt-1" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>

                  <div class="card-body">
                    <div class="row">
                      <div class="form-group col-md-3 col-12">
                        <label for="min">Année d'adhésion Minimale</label>
                        <input type="text" name="min" class="form-control" id="min" placeholder="Année Minimale....." autocomplete="off" maxlength="4">
                      </div>

                      <div class="form-group col-md-3 col-12">
                        <label for="max">Année d'adhésion Maximale</label>
                        <input type="text" name="max" class="form-control" id="max" placeholder="Année Maximale....." autocomplete="off" maxlength="4">
                      </div>

                      <div class="form-group col-md-3 col-12">
                        <label for="categorie">Cat d'adhésionégorie</label>
                        <select class="form-control select2bs4 text-capitalize" id="categorie" name="categorie" style="width: 100%;">
                          <option>ancien</option>
                          <option>diacre</option>
                          <option>menbre</option>
                        </select>
                      </div>

                      <div class="form-group col-md-3 col-12">
                        <label for="max">Adresses</label>
                        <input type="text" name="max" class="form-control" id="max" placeholder="Année Maximale....." autocomplete="off" maxlength="4">
                      </div>

                      <div class="form-group col-md-3 col-12">
                        <label for="categorie">
                          Total Menbres : <span class="text-danger mx-3" id="totalMenbres"></span>
                        </label>
                      </div>

                      <div class="form-group col-md-3 col-12">
                        <label for="categorie">
                          Total Diacres : <span class="text-danger mx-3" id="totalDiacres"></span>
                        </label>
                      </div>

                      <div class="form-group col-md-3 col-12">
                        <label for="categorie">
                          Total Anciens : <span class="text-danger mx-3" id="totalAncienss"></span>
                        </label>
                      </div>

                      <div class="form-group col-md-3 col-12">
                        <label for="categorie">
                          Total Paroisien : <span class="text-danger mx-3" id="totalParoissiens"></span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>

                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr class="text-center">
                      <th>N°</th>
                      <th>Ancien Matricule</th>
                      <th>Matricule</th>
                      <th>Nom</th>
                      <th>Catégorie</th>
                      <th>Association</th>
                      <th>Contact</th>
                      <th>Email</th>
                      <th>Adresse</th>
                      <th>Date Adhésion</th>
                      <th>Statut</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $id = 1;
                    foreach($paroissiens as $result) : 
                      ?>
                      <tr class="text-center">
                        <td class="text-center"><?php echo $id; ?></td>
                        <td><?php echo $result->ancienMatricule; ?></td>
                        <td><?php echo $result->matriculeParois; ?></td>
                        <td><?php echo strtoupper($result->nom).' '.ucwords($result->prenom); ?></td>
                        <td><?php echo ucwords($result->categorie); ?></td>
                        <td ><?php echo $result->sigleAssociation; ?></td>
                        <td ><?php echo $result->telephone1; ?></td>
                        <td ><?php echo $result->email; ?></td>
                        <td ><?php echo ucwords($result->adresse); ?></td>
                        <td ><?php echo $result->date_adhesion; ?></td>
                        <td ><?php echo $result->statut; ?></td>
                        <td>
                          <center>
                            <div class="btn-group">
                              <button type="button" class="btn btn-ligth" onclick="deleteParoissien('<?php echo $result->idParois ?>', '<?php echo $result->nom." ".$result->prenom ?>')">
                                <i class="fa fa-trash"></i>
                              </button>
                              <button type="button" class="btn btn-ligth" onclick="updateParoissien('<?php echo $result->idParois ?>', '<?php echo $result->nom." ".$result->prenom ?>')">
                                <i class='fa fa-edit'></i>
                              </button>

                              <button type="button" class="btn btn-ligth" onclick="reloadParoissien('<?php echo $result->idParois ?>', '<?php echo $result->nom." ".$result->prenom ?>')">
                                <i class='fa fa-recycle'></i>
                              </button>

                              <button type="button" class="btn btn-ligth" onclick="consultParoissien('<?php echo $result->idParois ?>', '<?php echo $result->nom." ".$result->prenom ?>')">
                                <i class='fa fa-eye'></i>
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
    function onlyNumberKey(evt) {
      var ASCIICode = (evt.which) ? evt.which : evt.keyCode
      if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
      return true;
    }

    $.fn.dataTable.ext.search.push(
      function( settings, data, dataIndex ) {
        var min = $('#min').val() * 1;
        var max = $('#max').val() * 1;
        var age = parseFloat( data[3] ) || 0; 

        if ( ( min == '' && max == '' ) ||
          ( min == '' && age <= max ) ||
          ( min <= age && '' == max ) ||
          ( min <= age && age <= max ) )
        {
          return true;
        }
        return false;
      }
    );

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
          var totalMenbres = 0;
          var totalDiacres = 0;
          var totalAncienss = 0;

          var formated = 0;
          if (true) {}
          sum = api.column(1).data().count();

          for (var i = 0; i < sum; i++) {
            if (api.column(4).data(0)[i].toLowerCase() == 'menbre') {
              totalMenbres += 1;
            }
            if (api.column(4).data(0)[i].toLowerCase() == 'diacre') {
              totalDiacres += 1;
            }
            if (api.column(4).data(0)[i].toLowerCase() == 'ancien'){
              totalAncienss += 1;
              console.log(totalAncienss)
            }
          }
          $('#totalMenbres').text(totalMenbres);
          $('#totalDiacres').text(totalDiacres);
          $('#totalAncienss').text(totalAncienss);
          $('#totalParoissiens').text(sum);
        }
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

      $('#min, #max').keyup( function() {
        table.draw();
      });
    });



    function deleteParoissien(userId, nom) {
      Swal.fire({
        title: "Etes vous sur?",
        html: "Voulez vous désactivé le compte de <b>"+nom+"</b> ?",
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
            html: "Le compte de <b>"+nom+"</b> a bien été désactivé.",
            showClass:{
              popup:"animate__animated animate__bounceIn"
            },
            allowOutsideClick: false,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Okey, merci!",
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                url: window.location = "<?php echo base_url('paroisienDelete/')?>" + userId,
                type: "PUT",
                dataType: "JSON",
              });
            }
          })
        }
      });
    }

    function reloadParoissien(userId, nom) {
      Swal.fire({
        title: "Etes vous sur?",
        html: "Voulez réactivé le compte de <b>"+nom+"</b> ?",
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
            html: "Le compte de <b>"+nom+"</b> a bien été réactivée.",
            showClass:{
              popup:"animate__animated animate__bounceIn"
            },
            allowOutsideClick: false,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Okey, merci!",
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                url: window.location = "<?php echo base_url('paroisienReload/')?>" + userId,
                type: "PUT",
                dataType: "JSON",
              });
            }
          })
        }
      });
    }

    function consultParoissien(userId, nom) {
      Swal.fire({
        title: "Etes vous sur?",
        html: "Consuler les données de <b>"+nom+"</b> ?",
        allowOutsideClick: false,
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Oui, je le souhaite!",
        cancelButtonText: "Annuler",
        closeOnConfirm: false
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: window.location = "<?php echo base_url('paroisienView/')?>" + userId,
            type: "GET",
            dataType: "JSON",
          });
        }
      });
    }

    function updateParoissien(userId, nom) {
      Swal.fire({
        title: "Etes vous sur?",
        html: "Modifier les donnée de <b>"+nom+"</b> ?",
        allowOutsideClick: false,
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Oui, je le souhaite!",
        cancelButtonText: "Annuler",
        closeOnConfirm: false
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: window.location = "<?php echo base_url('paroisienEdit/')?>" + userId,
            type: "GET",
            dataType: "JSON",
          });
        }
      });
    }
  </script>
</body>
</html>
