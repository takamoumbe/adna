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
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo base_url("Home"); ?>">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">

          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php echo $count_all_assiciation; ?></h3>
                  <p>Total Associations</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="<?php echo base_url("associationsListe"); ?>" class="small-box-footer">
                  Consulter D'avantage <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?php echo $count_all_paroisiens ?></h3>

                  <p>Total Paroisiens</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="<?php echo base_url("paroisienListe"); ?>" class="small-box-footer">
                  Consulter plus <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-secondary">
                <div class="inner text-white">
                  <h3><?php echo $count_all_engagement; ?></h3>

                  <p>Total Engagements</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="<?php echo base_url(); ?>" class="small-box-footer">Consulter plus <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3><?php echo $count_all_versement ?></h3>

                  <p>Versements</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="<?php echo base_url(); ?>" class="small-box-footer">Consulter plus <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>

          <!-- Section Paroisien -->
          <div class="card card card-success">
            <div class="card-header">
              <h3 class="card-title">Statistiques Des Paroisiens</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Total Paroisiens</span>
                      <span class="info-box-number"><?php echo number_format($count_all_paroisiens) ?></span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="fa  fa-user-check"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Paroisiens Actif</span>
                      <span class="info-box-number"><?php echo number_format($count_actif_paroisiens) ?></span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-secondary"><i class="fa fas fa-user-times"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Paroisiens Inactif</span>
                      <span class="info-box-number"><?php echo number_format($count_inactif_paroisiens) ?></span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-danger"><i class="fas fa-user-tie"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Total Gestionnaires</span>
                      <span class="info-box-number"><?php echo number_format($count_all_gestionnaire) ?></span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->



                <!-- liste des paroisiens -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr class="text-center">
                        <th>N°</th>
                        <th>Matricule Paroisien</th>
                        <th>Nom Paroisien</th>
                        <th>Sexe Paroisien</th>
                        <th>Nom Association</th>
                        <th>Sigle Association</th>
                        <th>Contact</th>
                        <th>Adresse</th>
                        <th>Date Adhésion</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $id = 1;
                      foreach($Paroisiens as $result) : 
                        ?>
                        <tr class="text-center">
                          <td><?php echo $id; ?></td>
                          <td><?php echo $result->matriculeParois; ?></td>
                          <td><?php echo strtoupper($result->nom).ucfirst(' '.$result->prenom); ?></td>
                          <td><?php echo $result->sexe; ?></td>
                          <td><?php echo $result->nomAssociation; ?></td>
                          <td><?php echo $result->sigleAssociation; ?></td>
                          <td ><?php echo number_format($result->telephone1); ?></td>
                          <td ><?php echo ucfirst($result->adresse); ?></td>
                          <td ><?php echo date('Y', strtotime($result->date_adhesion)); ?></td>
                        </tr>
                        <?php 
                        $id++;
                      endforeach; 
                      ?>
                    </tbody>
                    <tfoot>
                      <tr class="text-center">
                        <th>N°</th>
                        <th>Matricule Paroisien</th>
                        <th>Nom Paroisien</th>
                        <th>Sexe Paroisien</th>
                        <th>Nom Association</th>
                        <th>Sigle Association</th>
                        <th>Contact</th>
                        <th>Adresse</th>
                        <th>Date Adhésion</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>

            </div>
          </div>

          <!-- Section Paroisien -->
          <div class="card card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Statistiques Des Engagements</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-md-4 col-sm-6 col-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fa fa-bars"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Total Engagements</span>
                      <span class="info-box-number"><?php echo number_format($count_all_paroisiens) ?></span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-4 col-sm-6 col-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="fa fa-check"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Engagements Actif</span>
                      <span class="info-box-number"><?php echo number_format($count_actif_paroisiens) ?></span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-4 col-sm-6 col-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-secondary"><i class="fa fa-times"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Engagements Inactif</span>
                      <span class="info-box-number"><?php echo number_format($count_inactif_paroisiens) ?></span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->


                <!-- liste des engagements -->

                
                <div class="col-12 col-sm-12">
                  <div class="card card-ligth card-tabs">
                    <div class="card-header p-2 pt-2">
                      <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                        <li class="pt-2 px-3"><h3 class="card-title">Gestion Engagements : </h3></li>
                        <li class="nav-item">
                          <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Simple</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Engagements & Versements</a>
                        </li>
                      </ul>
                    </div>
                    <div class="card-body">

                      <!-- section juste les engagements -->
                      <div class="tab-content" id="custom-tabs-two-tabContent">
                        <div  
                        class="tab-pane fade show active" 
                        id="custom-tabs-two-home" 
                        role="tabpanel" 
                        aria-labelledby="custom-tabs-two-home-tab"
                        />
                        <div class="card card card-ligth">
                          <div class="card-header">
                            <h3 class="card-title">Filtrez les données en fonction de vos exideances</h3>

                            <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                              </button>
                            </div>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <div class="row">
                              <div class="form-group col-md-6">
                                <label for="date_versement" class="col-md-12 text-center">Rangement Engagements</label>
                                <div class="row">
                                  <div class="input-group col-md-6">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                      </span>
                                    </div>
                                    <input type="date" class="form-control float-right" id="daterangepickerVersMin">
                                  </div>
                                  <div class="input-group col-md-6">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                      </span>
                                    </div>
                                    <input type="date" class="form-control float-right" id="daterangepickerVersMax">
                                  </div>
                                </div>
                              </div>


                              <div class="form-group col-md-6">
                                <label for="date_versement" class="col-md-12 text-center">Rangement Versements</label>
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

                            <hr>

                            <div class="row">
                              <div class="form-group col-md-3">
                                <label>
                                  Nbre Paroisiens : <span id="totalParoisiens"></span>
                                </label>
                              </div>

                              <div class="form-group col-md-3">
                                <label>
                                  Nbre Enagegements : <span id="totalEngagements"></span>
                                </label>
                              </div>

                              <div class="form-group col-md-3">
                                <label>
                                  <span>Versements ($)</span> : <span id="montantVers" class="text-danger"></span>
                                </label>
                              </div>

                              <div class="form-group col-md-3">
                                <label>
                                  Engagements ($) : <span id="montantEngag" class="text-danger"></span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>

                        <hr>

                        <table id="engagement2" class="table table-bordered table-striped">
                          <thead>
                            <tr class="text-center">
                              <th>N°</th>
                              <th>Paroisien</th>
                              <th>Montant Eng</th>
                              <th>Montant Vers</th>
                              <th>Début Eng</th>
                              <th>Fin Eng</th>
                              <th>Date Vers</th>
                              <th>Type Eng</th>
                              <th>Association</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                            $id = 1;
                            for ($i=0; $i < count($simple_engagements_versements) ; $i++) { 
                              ?>
                              

                              
                              <tr class="text-center">
                                <td><?php echo $id; ?></td>
                                <td><?php echo strtoupper($simple_engagements_versements[$i]->nomParoisien).' '.ucfirst($simple_engagements_versements[$i]->prenomParoisien); ?></td>
                                <td><?php echo $simple_engagements_versements[$i]->montantEng; ?></td>
                                <td><?php echo $simple_engagements_versements[$i]->montantVers; ?></td>
                                <td><?php echo $simple_engagements_versements[$i]->date_debut; ?></td>
                                <td><?php echo $simple_engagements_versements[$i]->date_fin; ?></td>
                                <td><?php echo $simple_engagements_versements[$i]->date_versement; ?></td>
                                <td><?php echo $simple_engagements_versements[$i]->type; ?></td>
                                <td><?php echo $simple_engagements_versements[$i]->sigleAssociation; ?></td>
                              </tr>
                              <?php 
                              $id++;
                            } 
                            ?>
                          </tbody>
                          <tfoot>
                            <tr class="text-center">
                              <th>N°</th>
                              <th>Paroisien</th>
                              <th>Montant Eng</th>
                              <th>Montant Vers</th>
                              <th>Début Eng</th>
                              <th>Fin Eng</th>
                              <th>Date Vers</th>
                              <th>Type Eng</th>
                              <th>Association</th>
                            </tr>
                          </tfoot>
                        </table>
                      </div>


                      <!-- section engagements et versements -->
                      <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">

                        <table id="engagement3" class="table table-bordered table-striped">
                          <thead>
                            <tr class="text-center">
                              <th>N°</th>
                              <th>Paroisien</th>
                              <th>Montant Engagements</th>
                              <th>Montant Versements</th>
                              <th>Date Début</th>
                              <th>Date Fin</th>
                              <th>Appréciation</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                            function appreciations($montantV, $montantE){
                              if ($montantV < ($montantE * 0.25)) {
                                $result = "text-danger";
                              } 
                              else if ($montantV >= ($montantE * 0.25) and $montantV < ($montantE * 0.5)) {
                                $result = "text-warning";
                              }
                              else if ($montantV >= ($montantE * 0.5) and $montantV < ($montantE * 0.75)) {
                                $result = "text-secondary";
                              }
                              else if ($montantV >= ($montantE * 0.75) and $montantV < ($montantE)) {
                                $result = "text-success";
                              }
                              else if ($montantV >= ($montantE)) {
                                $result = "text-info";
                              }
                              return $result;
                            }

                            $id = 1;
                            for ($i=0; $i < count($engagements_versements) ; $i++) { 

                              ?>
                              

                              
                              <tr class="text-center">
                                <td><?php echo $id; ?></td>
                                <td><?php echo strtoupper($engagements_versements[$i]->nomParoisien).' '.ucfirst($engagements_versements[$i]->prenomParoisien); ?></td>
                                <td><?php echo number_format($engagements_versements[$i]->montantE); ?></td>
                                <td><?php echo number_format($engagements_versements[$i]->montantV); ?></td>
                                <td><?php echo $engagements_versements[$i]->date_debut; ?></td>
                                <td><?php echo $engagements_versements[$i]->date_fin; ?></td>
                                <td><span class="fa fa-star <?php echo appreciations($engagements_versements[$i]->montantV, $engagements_versements[$i]->montantE) ?>"></span></td>
                              </tr>
                              <?php 
                              $id++;
                            } 
                            ?>
                          </tbody>
                          <tfoot>
                            <tr class="text-center">
                              <th>N°</th>
                              <th>Paroisien</th>
                              <th>Montant Engagements</th>
                              <th>Montant Versements</th>
                              <th>Date Début</th>
                              <th>Date Fin</th>
                              <th>Appréciation</th>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                   </div>
                 </div>
                 <!-- /.card -->
               </div>
             </div>

           </div>

         </div>
       </div>

     </div><!-- /.container-fluid -->
   </section>
   <!-- /.content -->
 </div>
</div>
<!-- ./wrapper -->



<!-- javascript.php -->
<?php include 'vendors/includes/javascript.php'; ?>

<script>



  $(document).ready(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["csv", "excel", "pdf", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });



  $("#example2").DataTable({
    "responsive": true, "lengthChange": false, "autoWidth": false,
    "buttons": ["csv", "excel", "pdf", "colvis"]
  }).buttons().container();


  $(document).ready(function () {
    $.fn.dataTableExt.afnFiltering.push(
      function( oSettings, aData1, iDataIndex ) {
        var startDate1 = $('#daterangepickerEnagementMin').val();
        var endDate1 = $('#daterangepickerEnagementMax').val();
        var colValue1 = aData1[6]; 
        var dateValue1 = new Date(colValue1);

        var startDate = $('#daterangepickerVersMin').val();
        var endDate = $('#daterangepickerVersMax').val();
        var colValue = aData1[4]; 
        var dateValue = new Date(colValue);

        if ( startDate1 == "" && endDate1 == "" )
        {
          return true;
        }
        else if (startDate1 != null && endDate1 == "")
        {
          if(new Date(startDate1) <= dateValue1) {
            return true;
          }
        }
        else if ( startDate1 == "" && endDate1 != "")
        {
          if(dateValue1 <= new Date(endDate1)) {
            return true;
          }
        }
        else if (startDate1 != null && endDate1 != null)
        {
          if(new Date(startDate1) <= dateValue1 && dateValue1 <= new Date(endDate1)) {
            return true;
          }
        }

        if ( startDate == "" && endDate == "" )
        {
          return true;
        }
        else if (startDate != null && endDate == "")
        {
          if(new Date(startDate) <= dateValue) {
            return true;
          }
        }
        else if ( startDate == "" && endDate != "")
        {
          if(dateValue <= new Date(endDate)) {
            return true;
          }
        }
        else if (startDate != null && endDate != null)
        {
          if(new Date(startDate) <= dateValue && dateValue <= new Date(endDate)) {
            return true;
          }
        }
        return false;
      }
    );
    $('#daterangepickerVersMin').datetimepicker({ onChangeMonthYear: function () { table.draw(); }, changeMonth: true, changeYear: true });
    $('#daterangepickerVersMax').datetimepicker({ onChangeMonthYear: function () { table.draw(); }, changeMonth: true, changeYear: true });
    $('#daterangepickerEnagementMin').datetimepicker({ onChangeMonthYear: function () { table.draw(); }, changeMonth: true, changeYear: true });
    $('#daterangepickerEnagementMax').datetimepicker({ onChangeMonthYear: function () { table.draw(); }, changeMonth: true, changeYear: true });
      
    $('#engagement2 tfoot th').each(function () {
      var title = $(this).text();
      $(this).html('<input type="text" class="form-control dd" placeholder="Search ' + title + '" />');
    });

    // DataTable
    var table = $('#engagement2').DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      orderCellsTop: true,
      fixedHeader: true,
      "buttons": ["csv", "excel", "pdf", "colvis"],
      initComplete: function () {
        // Apply the search
        this.api()
        .columns()
        .every(function () {
          var that = this;

          $('input', this.footer()).on('keyup change clear', function () {
            if (that.search() !== this.value) {
              that.search(this.value).draw();
              let data = $('#engagement2'), sumVal = 0;

              for(var i = 1; i < data.rows.length; i++) {
                sumVal = sumVal + parseInt(data.rows[i].cells[3].innerHTML);
              }
              $('#montantEngag').html(sumVal);
              alert(sumVal);
            }
          });
        });
      },

      drawCallback : function ( row, data, start, end, display ) {
        var api = this.api(), data;

        // Remove the formatting to get integer data for summation
        var intVal = function ( i ) {
          return typeof i === 'string' ?
          i.replace(/[\$,]/g, '')*1 :
          typeof i === 'number' ?
          i : 0;
        };

        // Total over all pages
        total = api
        .column( 3 )
        .data()
        .reduce( function (a, b) {
          return intVal(a) + intVal(b);
        }, 0 );
       

        // Total over this page
        pageTotal = api
        .column( 3, { page: 'current'} )
        .data()
        .reduce( function (a, b) {
          return intVal(a) + intVal(b);
        }, 0 );

        // $('#totalParoisiens').html(pageTotal);
        // $('#montantEngag').html(total);
      }

    });
    $('#daterangepickerEnagementMin, #daterangepickerEnagementMax').change(function () {
      table.draw();
    });
    table.buttons().container().appendTo('#engagement2_wrapper .col-md-6:eq(0)');
  });


  $(document).ready(function () {
    $('#engagement3 tfoot th').each(function () {
      var title = $(this).text();
      $(this).html('<input type="text" class="form-control" placeholder="Search ' + title + '" />');
    });

    // DataTable
    var table = $('#engagement3').DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "buttons": ["csv", "excel", "pdf", "colvis"],
      initComplete: function () {

        // Apply the search
        this.api()
        .columns()
        .every(function () {
          var that = this;

          $('input', this.footer()).on('keyup change clear', function () {
            if (that.search() !== this.value) {
              that.search(this.value).draw();
            }
          });
        });
      },
    });
    table.buttons().container().appendTo('#engagement3_wrapper .col-md-6:eq(0)');
  });

  // select2
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })
  
</script>
</body>
</html>
