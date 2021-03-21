<?php include_once('../_header.php'); ?>
<div class="box">
    <h1>Patient</h1>
        <h4>
            <small>Patient Data</small>
            <div class="pull-right">
                <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
                <a href="add.php" class="btn btn-success btn-xs"> Add Patient<i class="glyphicon glyphicon-plus"></i></a>
            </div>
        </h4>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="patients">
                <thead>
                    <tr>
                        <th>ID Number</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th><i class="glyphicon glyphicon-cog"></i></th>
                    </tr>
                </thead>
            </table>
        </div>
    <script>
        $(document).ready(function() {
        $('#patients').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "patient_data.php",
        //scrollY : '250px' ,
        dom : 'Bfrtip' ,
        buttons : [
            {
                extend :'pdf',
                orientation : 'portrait',
                pageSize : 'Legal',
                title : 'Patient Data',
                download : 'open'
            },
            'csv','excel','print','copy'
        ],
        columnDefs : [
            {
                "searchable" : false,
                "orderable" : false,
                "targets" : 5,
                "render" : function(data, type, row) {
                    var btn = "<center><a href=\"edit.php?id="+data+"\" class=\"btn btn-warning btn-xs\"><i class=\"glyphicon glyphicon-edit\"></i></a> <a href=\"del.php?id="+data+"\" onclick=\"return confirm('You sure want to delete this data?')\" class=\"btn btn-danger btn-xs\"><i class=\"glyphicon glyphicon-trash\"></i></a></center>";
                    return btn;
                }
            }
        ]
    } );
} );
    </script>
</div>
<?php include_once('../_footer.php'); ?>    