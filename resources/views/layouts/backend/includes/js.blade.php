<script src="{{ asset('/') }}backend/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{ asset('/') }}backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('/') }}backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/') }}backend/dist/js/adminlte.js"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('/') }}backend/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('/') }}backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('/') }}backend/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('/') }}backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('/') }}backend/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('/') }}backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('/') }}backend/plugins/jszip/jszip.min.js"></script>
<script src="{{ asset('/') }}backend/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ asset('/') }}backend/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{ asset('/') }}backend/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('/') }}backend/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('/') }}backend/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Summernote -->
<script src="{{ asset('/') }}backend/plugins/summernote/summernote-bs4.min.js"></script>
<!-- CodeMirror -->
<script src="{{ asset('/') }}backend/plugins/codemirror/codemirror.js"></script>
<script src="{{ asset('/') }}backend/plugins/codemirror/mode/css/css.js"></script>
<script src="{{ asset('/') }}backend/plugins/codemirror/mode/xml/xml.js"></script>
<script src="{{ asset('/') }}backend/plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('/') }}backend/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="{{ asset('/') }}backend/plugins/raphael/raphael.min.js"></script>
<script src="{{ asset('/') }}backend/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="{{ asset('/') }}backend/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="{{ asset('/') }}backend/plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ asset('/') }}backend/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('/') }}backend/dist/js/pages/dashboard2.js"></script>
<!-- Toastr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"> </script>

<script>
    // success message popup notification
    @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}");
    @endif

    // info message popup notification
    @if(Session::has('info'))
    toastr.info("{{ Session::get('info') }}");
    @endif

    // warning message popup notification
    @if(Session::has('warning'))
    toastr.warning("{{ Session::get('warning') }}");
    @endif

    // error message popup notification
    @if(Session::has('error'))
    toastr.error("{{ Session::get('error') }}");
    @endif
</script>
{{--DataTable--}}
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

{{--DeleteAnyRow--}}
<script>
    function deleteRow(id) {
        event.preventDefault();
        var row = confirm('Are you want to delete this teacher??')

        if (row){
            document.getElementById('delete'+id).submit();
        }
    }
</script>

<!-- Page specific script -->
<script>
    $(function () {
        // Summernote
        $('#textEditor').summernote()

        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai"
        });
    })
</script>
