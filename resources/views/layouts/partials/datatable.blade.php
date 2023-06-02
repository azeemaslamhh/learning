  
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script>
    var objTable;
    var objRow;
    $(document).ready(function () {
        objTable = $('#example1').dataTable({
            "aoColumnDefs": [{"bSortable": false, "aTargets": [0]}],
            "bProcessing": true,
            "bServerSide": true,
            "aaSorting": [[0, "DESC"]],
            "sPaginationType": "full_numbers",
            "sAjaxSource": "{{ route('get.userts') }}",
            language: {
            },
            "fnServerParams": function (aoData) {
                aoData.push({"name": "status", "value": $("#status").val()});
            },
            "aLengthMenu": [[20, 50, 100, 500], [20, 50, 100, 500]]
        });
    });
</script>