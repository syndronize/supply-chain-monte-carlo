<!-- datepicker -->

<!-- Bootstrap 4 -->
<script src="{{('/')}}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="{{('/')}}plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{('/')}}plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{('/')}}plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{('/')}}plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{('/')}}plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{('/')}}plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{('/')}}plugins/jszip/jszip.min.js"></script>
<script src="{{('/')}}plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{('/')}}plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{('/')}}plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{('/')}}plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{('/')}}plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="{{('/')}}dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{('/')}}dist/js/demo.js"></script>
<!-- Icon -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="//unpkg.com/autonumeric"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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

<!-- CKEDITOR -->
<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>

<!-- EXT CKEDITOR -->
<script>
    // Replace the <textarea id="konten"> with a CKEditor 4
    // instance, using default configuration.
    CKEDITOR.replace('contohckeditor');
</script>

