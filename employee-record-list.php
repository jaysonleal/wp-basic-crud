<?php
  
function record_employee_list() {

?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <div class="wrap">
        <h2>EMPLOYEE RECORD LIST</h2>
        <div class="metabox-holder">
            <div class="postbox">
                <br>
                <a href="<?php echo admin_url('admin.php?page=record_employee_create'); ?>">
                    <button type="button" class="btn btn-outline-success btn-sm float-sm-right mr-3 ">
                    <i class="fa fa-plus-circle"></i> Add New
                    </button>
                </a>
          
        <?php
        global $wpdb;
        $table_name = $wpdb->prefix . "employee";

        $rows = $wpdb->get_results("SELECT * from $table_name");
        ?>

        <table  id="empList" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>FIRST</th>
                    <th>MIDDLE</th>
                    <th>LAST</th>
                    <th>BIRTHDAY</th>                
                    <th>AGE</th>
                    <th>CONTACT</th>
                    <th>ADDRESS</th>
                    <th>EDIT</th>
                </tr> 
            </thead>
            <tbody>
            <?php foreach ($rows as $row) { ?>
                <tr>
                    <td><?php echo $row->id; ?></td>
                    <td><?php echo $row->firstname; ?></td>
                    <td><?php echo $row->middlename; ?></td>
                    <td><?php echo $row->lastname; ?></td>
                    <td><?php echo $row->birthday; ?></td>
                    <td><?php echo $row->age; ?></td>
                    <td><?php echo $row->contact; ?></td>
                    <td><?php echo $row->address; ?></td>
                    <td><a class="btn btn-outline-secondary btn-sm" 
                           href="<?php echo admin_url('admin.php?page=record_employee_update&id=' . $row->id); ?>">
                           <i class="fa fa-pencil" aria-hidden="true"></i> EDIT</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

    <!-- DataTable option -->
    <script>
        $(document).ready( function () {
            $('#empList').DataTable({
            responsive : true,
            paging: true,
            ordering: true,
            searching: true
            } );     
        } );
    </script>
<?php
}
?>