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
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Liste des Engagements</h3>
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
                        <label for="categorie">
                          Total Paroissiens : <span class="text-danger mx-3" id="totalParoissiens"></span>
                        </label>
                      </div>

                      <div class="form-group col-md-3 col-12">
                        <label for="categorie">
                          Total Hommes : <span class="text-danger mx-3" id="totalHommes"></span>
                        </label>
                      </div>

                      <div class="form-group col-md-3 col-12">
                        <label for="categorie">
                          Total Femmes : <span class="text-danger mx-3" id="totalFemmes"></span>
                        </label>
                      </div>

                      <div class="form-group col-md-3 col-12">
                        <label for="categorie">
                          Montant Total : <span class="text-danger mx-3" id="totalMontant"></span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <br>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr class="text-center">
                      <th>N°</th>
                      <th>Matricule</th>
                      <th>Noms & Prénoms</th>
                      <th>Sexe</th>
                      <th>Association</th>
                      <th>Type Enagement</th>
                      <th>Montant</th>
                      <th class="col-md-2">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php  
                    $id = 1;
                    for ($i=0; $i < count($Engagements); $i++) { 
                      ?>
                      <tr class="text-center">
                        <td><?php echo $id; ?></td>
                        <td><?php echo $Engagements[$i]->matriculEngag; ?></td>
                        <td><?php echo strtoupper($Engagements[$i]->nom).' '.ucfirst($Engagements[$i]->prenom); ?></td>
                        <td><?php echo $Engagements[$i]->sexe; ?></td>
                        <td><?php echo $Engagements[$i]->sigle; ?></td>
                        <td><?php echo $Engagements[$i]->type; ?></td>
                        <td><?php echo $Engagements[$i]->montant; ?></td>
                        <td>
                          <button type="button" class="btn btn-ligth" onclick="updateParoissien('<?php echo $Engagements[$i]->idEngagement ?>', '<?php echo $Engagements[$i]->matriculEngag ?>', '<?php echo $Engagements[$i]->nom." ".$Engagements[$i]->prenom ?>')">
                            <i class='fa fa-edit'></i>
                          </button>
                        </td>
                      </tr>
                      <?php
                      $id++;  
                    }
                    ?>

                  </tbody>
                  <tfoot>
                    <tr class="text-center">
                      <th>N°</th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
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

    $(document).ready(function () {
      $('#example1 tfoot th').each(function () {
        var title = $(this).text();
        $(this).html('<input type="text" class="form-control" placeholder="Search ' + title + '" />');
      });

    // DataTable
      var table = $('#example1').DataTable({
        "responsive": true, 
        "lengthChange": false, 
        "autoWidth": false,
        "buttons": ["csv", "excel", "pdf", "colvis"],
        initComplete: function () {
          this.api().columns().every(function () {
            var that = this;
            $('input', this.footer()).on('keyup change clear', function () {
              if (that.search() !== this.value) {
                that.search(this.value).draw();
              }
            });
          });
        },

        drawCallback: function () {
          var api = this.api();
          var intVal = function ( i ) {
            return typeof i === 'string' ?
            i.replace(/[\$,]/g, '')*1 :
            typeof i === 'number' ?
            i : 0;
          };
          var sum = 0;
          var totalParoissiens = 0;
          var totalHommes = 0;
          var totalFemmes = 0;
          var totalMontant = 0;

          totalMontant = api.column( 6 ).data().reduce( function (a, b) {return intVal(a) + intVal(b);}, 0 );
          var formated = 0;
          sum = api.column(0).data().count();

          for (var i = 0; i < sum; i++) {
            if (api.column(3).data(2)[i].toLowerCase() == 'masculin') {
              totalHommes += 1;
            }
            if (api.column(3).data(2)[i].toLowerCase() == 'feminin') {
              totalFemmes += 1;
            }
          }
          $('#totalParoissiens').text(sum);
          $('#totalHommes').text(totalHommes);
          $('#totalFemmes').text(totalFemmes);
          $('#totalMontant').text(totalMontant);
        },
      });
      table.buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

    

    function updateParoissien(userId, matricule, nom) {
      Swal.fire({
        title: "Etes vous sur?",
        html: "Souhaitez vous vraiment modifier l'engagement <b>"+ matricule +"</b> de <b>"+nom+"</b> ?",
        allowOutsideClick: false,
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Oui, je le souhaite!",
        cancelButtonText: "Annuler",
        closeOnConfirm: false
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: window.location = "<?php echo base_url('engagementEdit/')?>" + userId,
            type: "GET",
            dataType: "JSON",
          });
        }
      });
    }
  </script>
</body>
</html>
