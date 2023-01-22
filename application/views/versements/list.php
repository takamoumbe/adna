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
                        <label for="min">Année Minimale</label>
                        <input type="date" name="min" class="form-control" id="min" placeholder="Année Minimale....." autocomplete="off" maxlength="4">
                      </div>

                      <div class="form-group col-md-3 col-12">
                        <label for="max">Année Maximale</label>
                        <input type="date" name="max" class="form-control" id="max" placeholder="Année Maximale....." autocomplete="off" maxlength="4">
                      </div>

                      <div class="form-group col-md-3 col-12">
                        <label for="periode">Période</label>
                        <select class="form-control select2bs4 text-capitalize" id="periode" name="periode" style="width: 100%;">
                          <option value="01/10-31/12">1 <sub>er</sub> Trimestre</option>
                          <option value="01/01-31/03">2 <sub>ème</sub> Trimestre</option>
                          <option value="01/04-31/06">3 <sub>ème</sub> Trimestre</option>
                          <option value="01/07-30">4 <sub>ème</sub> Trimestre</option>
                        </select>
                      </div>

                      <div class="form-group col-md-3 col-12">
                        <label for="annee">Année</label>
                        <select class="form-control select2bs4 text-capitalize" id="annee" name="annee" style="width: 100%;">
                          <option>2015</option>
                          <option>2016</option>
                          <option>2017</option>
                          <option>2018</option>
                          <option>2019</option>
                          <option>2020</option>
                          <option>2021</option>
                          <option>2022</option>
                          <option selected>2023</option>
                          <option>2024</option>
                          <option>2025</option>
                          <option>2026</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr class="text-center">
                      <th>N°</th>
                      <th>Matricule Versement</th>
                      <th>Noms & Prénom</th>
                      <th>Montant Versé</th>
                      <th>Montant Restant</th>
                      <th>Montant Initial</th>
                      <th>Evènement</th>
                      <th>Type Eng</th>
                      <th>Association</th>
                      <th>Date Versement</th>
                      <th class="col-md-1">Actions</th>
                    </tr>
                  </thead>
                  <?php  
                    function Soustraction($montantVerse, $montantInitial) {
                      $result = $montantInitial - $montantVerse;
                      if ($result < 0) {
                        $result = 0;
                      }
                      return $result;
                    }
                  ?>
                  <tbody>
                    <?php 
                    $id = 1;
                    foreach($versements as $result) : 
                      ?>
                      <tr class="text-center">
                        <td class="text-center"><?php echo $id; ?></td>
                        <td><?php echo $result->matriculeVers; ?></td>
                        <td><?php echo strtoupper($result->nom).' '.ucfirst($result->prenom); ?></td>
                        <td><?php echo $result->montantVersement; ?></td>
                        <td><?php echo Soustraction($result->montantVersement, $result->montantEngagementInitial); ?></td>
                        <td><?php echo $result->montantEngagementInitial; ?></td>
                        <td><?php echo $result->evenement; ?></td>
                        <td><?php echo $result->type; ?></td>
                        <td><?php echo $result->sigleAssociation; ?></td>
                        <td><?php echo $result->date_versement; ?></td>
                        <td>
                          <center>
                            <div class="btn-group">
                              <button type="button" class="btn btn-ligth" onclick="updateVersement('<?php echo $result->idVers ?>', '<?php echo $result->matriculeVers; ?>')">
                                <i class='fa fa-edit'></i>
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
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
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
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  </script>

  <script>
    $(document).ready(function () {
      $('#annee').on('change', function() {
        var annee = $('#periode option').val();
        annee = annee.split("-");
        var maxDate = annee[0]+'/'+$('#annee option').val();
        var minDate = annee[1]+'/'+$('#annee option').val();
        
        $.fn.dataTable.ext.search.push(
          function (settings, data, dataIndex) {
            var startDate = new Date(data[9]);
            if (minDate == null && maxDate == null) return true;
            if (minDate == null && startDate <= maxDate) return true;
            if (maxDate == null && startDate >= minDate) return true;
            if (startDate <= maxDate && startDate >= minDate) return true;
            return false;
          }
        );
      });
    });
     

    $(document).ready(function () {
      $.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
          var min = $('#min').datepicker('getDate');
          var max = $('#max').datepicker('getDate');
          var startDate = new Date(data[9]);
          if (min == null && max == null) return true;
          if (min == null && startDate <= max) return true;
          if (max == null && startDate >= min) return true;
          if (startDate <= max && startDate >= min) return true;
          return false;
        }
      );

      $('#min').datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true });
      $('#max').datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true });

      $('#example1 tfoot th').each(function () {
        var title = $(this).text();
        $(this).html('<input type="text" class="form-control select2bs4" placeholder="Search ' + title + '" />');
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

        initComplete: function () {
          this.api().columns(6).every(function () {
            var column = this;
            var select = $("<select class='form-control'><option value=''></option></select>").appendTo($(column.footer()).empty()).on('change', function () {
              var val = $.fn.dataTable.util.escapeRegex($(this).val());

              column.search(val ? '^' + val + '$' : '', true, false).draw();
            });

            column.data().unique().sort().each(function (d, j) {
              select.append('<option value="' + d + '">' + d + '</option>');
            });
          });


          this.api().columns(7).every(function () {
            var column = this;
            var select = $("<select class='form-control'><option value=''></option></select>").appendTo($(column.footer()).empty()).on('change', function () {
              var val = $.fn.dataTable.util.escapeRegex($(this).val());

              column.search(val ? '^' + val + '$' : '', true, false).draw();
            });

            column.data().unique().sort().each(function (d, j) {
              select.append('<option value="' + d + '">' + d + '</option>');
            });
          });


          this.api().columns(8).every(function () {
            var column = this;
            var select = $("<select class='form-control'><option value=''></option></select>").appendTo($(column.footer()).empty()).on('change', function () {
              var val = $.fn.dataTable.util.escapeRegex($(this).val());

              column.search(val ? '^' + val + '$' : '', true, false).draw();
            });

            column.data().unique().sort().each(function (d, j) {
              select.append('<option value="' + d + '">' + d + '</option>');
            });
          });
        },
      });
      table.buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#min, #max').change(function () {
        table.draw();
      });
    });


    function updateVersement(userId, matricule) {
      Swal.fire({
        title: "Etes vous sur?",
        text: "Souhaitez vous vraiment modifié ce versement ?",
        allowOutsideClick: false,
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Oui, je le souhaite!",
        cancelButtonText: "Annuler",
        closeOnConfirm: false
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire({
            title:"Traitement",
            html: "Modification du versement  <b>"+ matricule +"</b> en cours.",
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
              $.ajax({
                url: window.location = "<?php echo base_url('versementEdit/')?>" + userId,
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
