<!--   Core JS Files   -->
<script src="{{ asset('backEnd') }}/js/core/jquery.3.2.1.min.js"></script>
<script src="{{ asset('backEnd') }}/js/core/popper.min.js"></script>
<script src="{{ asset('backEnd') }}/js/core/bootstrap.min.js"></script>

<!-- jQuery UI -->
<script src="{{ asset('backEnd') }}/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="{{ asset('backEnd') }}/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="{{ asset('backEnd') }}/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


<!-- Chart JS -->
<script src="{{ asset('backEnd') }}/js/plugin/chart.js/chart.min.js"></script>

<!-- jQuery Sparkline -->
<script src="{{ asset('backEnd') }}/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Circle -->
<script src="{{ asset('backEnd') }}/js/plugin/chart-circle/circles.min.js"></script>

<!-- Datatables -->
<script src="{{ asset('backEnd') }}/js/plugin/datatables/datatables.min.js"></script>

<!-- Bootstrap Notify -->
<script src="{{ asset('backEnd') }}/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

<!-- jQuery Vector Maps -->
<script src="{{ asset('backEnd') }}/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ asset('backEnd') }}/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

<!-- Sweet Alert -->
<script src="{{ asset('backEnd') }}/js/plugin/sweetalert/sweetalert.min.js"></script>

<!-- Atlantis JS -->
<script src="{{ asset('backEnd') }}/js/atlantis.min.js"></script>

<!-- Atlantis DEMO methods, don't include it in your project! -->
<script src="{{ asset('backEnd') }}/js/setting-demo.js"></script>
<script src="{{ asset('backEnd') }}/js/demo.js"></script>
<script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
<script>
    $('#lineChart').sparkline([102, 109, 120, 99, 110, 105, 115], {
        type: 'line',
        height: '70',
        width: '100%',
        lineWidth: '2',
        lineColor: 'rgba(255, 255, 255, .5)',
        fillColor: 'rgba(255, 255, 255, .15)'
    });

    $('#lineChart2').sparkline([99, 125, 122, 105, 110, 124, 115], {
        type: 'line',
        height: '70',
        width: '100%',
        lineWidth: '2',
        lineColor: 'rgba(255, 255, 255, .5)',
        fillColor: 'rgba(255, 255, 255, .15)'
    });

    $('#lineChart3').sparkline([105, 103, 123, 100, 95, 105, 115], {
        type: 'line',
        height: '70',
        width: '100%',
        lineWidth: '2',
        lineColor: 'rgba(255, 255, 255, .5)',
        fillColor: 'rgba(255, 255, 255, .15)'
    });

    $('#basic-datatables').DataTable({});

    CKEDITOR.replace('editor');
    $(function() {
        var timeout = 5000;
        $('.alert').delay(timeout).fadeOut(300);
    });
</script>
