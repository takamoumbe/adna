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
                  <h3><?php echo $allAssociations[0]->totalAssociation ; ?></h3>
                  <p>Total Associations</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="<?php echo base_url("associationsListe"); ?>" class="small-box-footer">
                  Consulter plus <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?php echo  $allParoissiens[0]->totalParoissiens ?></h3>

                  <p>Total Paroisiens</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
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
                  <h3><?php echo $allEngagement[0]->totalEngagements; ?></h3>

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
                  <h3><?php echo $allVersement[0]->totalVersement; ?></h3>

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
          <div class="card card card-secondary">
            <div class="card-header">
              <h3 class="card-title">
                <b>Section Paroissiens</b>
              </h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">

              1- Total des Paroissiens par Association
              <hr>
              <div class="row">
                <?php 
                for ($i=0; $i < count($paroiAssocia); $i++) { 
                  $data = ['#3c8dbc', '#f56954', '#00a65a', '#00c0ef', '#932ab6'];
                  ?>
                  <div class="col-6 col-md-3 text-center">
                    <input type="text" class="knob" readonly value="<?php echo $paroiAssocia[$i]->totalParoissiens ?>" data-width="90" data-height="90" data-fgColor="<?php echo $data[rand(0, 4)] ?>">
                    <div class="knob-label mt-2"><b>Association <?php echo $paroiAssocia[$i]->sigle ?></b></div>
                  </div>
                <?php } ?>
              </div>
              <br>

              <hr>
              2- Total des Paroissiens par Catégorie
              <hr>
              <div class="row mt-2">
                <?php 
                for ($i=0; $i < count($paroiCateg); $i++) { 
                  $data = ['#3c8dbc', '#f56954', '#00a65a', '#00c0ef', '#932ab6'];
                  ?>
                  <div class="col-6 col-md-3 text-center">
                    <input type="text" class="knob" readonly value="<?php echo $paroiCateg[$i]->paroissienCategorie ?>" data-width="90" data-height="90" data-fgColor="<?php echo $data[rand(0, 4)] ?>">
                    <div class="knob-label mt-2"><b>Total <?php echo ucfirst($paroiCateg[$i]->categorie) ?></b></div>
                  </div>
                <?php } ?>
                <div class="col-6 col-md-3 text-center">
                  <input type="text" class="knob" readonly value="<?php echo $allGest ?>" data-width="90" data-height="90" data-fgColor="<?php echo $data[rand(0, 4)] ?>">
                  <div class="knob-label mt-2"><b>Gestionnaires</b></div>
                </div>
                <!-- ./col -->
              </div>
              <br>
              <hr>
              3- Total des Paroissiens par Genre
              <hr>
              <div class="row mt-2">
                <?php 
                for ($i=0; $i < count($paroiSexe); $i++) { 
                  $data = ['#3c8dbc', '#f56954', '#00a65a', '#00c0ef', '#932ab6'];
                  ?>
                  <div class="col-6 col-md-3 text-center">
                    <input type="text" class="knob" readonly value="<?php echo $paroiSexe[$i]->totalParoissiens ?>" data-width="90" data-height="90" data-fgColor="<?php echo $data[rand(0, 4)] ?>">
                    <div class="knob-label mt-2"><b>Sexe <?php echo ucfirst($paroiSexe[$i]->sexe) ?></b></div>
                  </div>
                <?php } ?>
                <!-- ./col -->
              </div>


              <!-- /.row -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
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
