
<!-- jQuery -->
<script src="<?php echo base_url(); ?>vendors/plugins/jquery/jquery.min.js"></script>

<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>vendors/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>vendors/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- ChartJS -->
<script src="<?php echo base_url(); ?>vendors/plugins/chart.js/Chart.min.js"></script>

<!-- Sparkline -->
<script src="<?php echo base_url(); ?>vendors/plugins/sparklines/sparkline.js"></script>

<!-- JQVMap -->
<script src="<?php echo base_url(); ?>vendors/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url(); ?>vendors/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

<!-- jQuery Knob Chart -->
<script src="<?php echo base_url(); ?>vendors/plugins/jquery-knob/jquery.knob.min.js"></script>

<!-- daterangepicker -->
<script src="<?php echo base_url(); ?>vendors/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>vendors/plugins/daterangepicker/daterangepicker.js"></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url(); ?>vendors/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Summernote -->
<script src="<?php echo base_url(); ?>vendors/plugins/summernote/summernote-bs4.min.js"></script>

<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>vendors/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- Select2 -->
<script src="<?php echo base_url(); ?>vendors/plugins/select2/js/select2.full.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="<?php echo base_url(); ?>vendors/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>vendors/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>vendors/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>vendors/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>vendors/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>vendors/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>vendors/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>vendors/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>vendors/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>vendors/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>vendors/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>vendors/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- InputMask -->
<script src="<?php echo base_url(); ?>vendors/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>vendors/plugins/inputmask/jquery.inputmask.min.js"></script>

<!-- date-range-picker -->
<script src="<?php echo base_url(); ?>vendors/plugins/daterangepicker/daterangepicker.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>vendors/dist/js/adminlte.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>vendors/dist/js/pages/dashboard.js"></script>

<script>
  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>