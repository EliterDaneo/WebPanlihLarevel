    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{ asset('backEnd') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('backEnd') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('backEnd') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('backEnd') }}/dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{ asset('backEnd') }}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="{{ asset('backEnd') }}/plugins/raphael/raphael.min.js"></script>
    <script src="{{ asset('backEnd') }}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="{{ asset('backEnd') }}/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="{{ asset('backEnd') }}/plugins/chart.js/Chart.min.js"></script>

    <!-- DataTables  & Plugins -->
    <script src="{{ asset('backEnd') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('backEnd') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('backEnd') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('backEnd') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('backEnd') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('backEnd') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('backEnd') }}/plugins/jszip/jszip.min.js"></script>
    <script src="{{ asset('backEnd') }}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('backEnd') }}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('backEnd') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('backEnd') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('backEnd') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- Summernote -->
    <script src="{{ asset('backEnd') }}/plugins/summernote/summernote-bs4.min.js"></script>

    <script>
        $(function() {
            $("#basic-datatables").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#basic-datatables_wrapper .col-md-6:eq(0)');
        });
        $('#summernote').summernote()
    </script>

    
