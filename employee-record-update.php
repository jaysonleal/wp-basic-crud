<?php
  
function record_employee_update() {
    global $wpdb;
    $table_name = $wpdb->prefix . "employee";
    $id = $_GET["id"];
    $firstname = $_POST["firstname"];
    $middlename = $_POST["middlename"];
    $lastname = $_POST["lastname"];
    $age = $_POST["age"];
    $birthday = $_POST["birthday"];
    $bday = date('Y-m-d', strtotime($birthday));
    $contact = $_POST["contact"];
    $address = $_POST["address"];
    //update data
    if (isset($_POST['update'])) {
        $wpdb->update(
            // database table name
            $table_name,
            // data input
            array('firstname' => $firstname,
                  'middlename' => $middlename,
                  'lastname' => $lastname,
                  'age' => $age,
                  'birthday' => $bday,
                  'contact' => $contact,
                  'address' => $address),
            // where 
            array('ID' => $id),
            // data format 
            array('%s' ,
                  '%s' , 
                  '%s' , 
                  '%d' , 
                  '%s' ,
                  '%d' , 
                  '%s'),
            // where format 
            array('%d') 
        );
    }
    // delete data
    else if (isset($_POST['delete'])) {
        $wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id = %d", $id));
    }
    // selecting value to update data
    else {	
        $empRecord = $wpdb->get_results($wpdb->prepare("SELECT * from $table_name where id=%d", $id));
        foreach ($empRecord as $e) {
            $fname = $e->firstname;
            $mname = $e->middlename;
            $lname = $e->lastname;
            $biday = $e->birthday;
            $edad = $e->age;
            $cnum = $e->contact;
            $tirahan = $e->address;
        }
    }

?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <?php if ($_POST['delete']) { ?>

    <div class="updated"><p>Delete Employee Record</p>
        <a href="<?php echo admin_url('admin.php?page=record_employee_list') ?>">
            &laquo; Back to Employee Record List
        </a>
    </div>

    <?php } else if ($_POST['update']) { ?>

    <div class="updated"><p>Update Employee Record</p>
        <a href="<?php echo admin_url('admin.php?page=record_employee_list') ?>">
            &laquo; Back to Employee Record List
        </a>
    </div>

    <?php } else { ?>

    <div class="wrap">
    <h2>Employee Record</h2>
        <div class="metabox-holder">
            <div class="postbox">
            <form style="width:50%; margin: auto;" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                <br>
                <h3>Update or Delete Employee Record Details</h3>
                <table class="table table-striped table-bordered" style="width:100%">
                    <tr>
                        <th>ID: </th>
                        <td><?php echo $_GET['id']; ?></td>
                    </tr>
                    <tr>
                        <th>Firstname: </th>
                        <td><input type="text" name="firstname" class="form-control" value="<?php echo $fname; ?>"/></td>
                    </tr>
                    <tr>
                        <th>Middlename: </th>
                        <td><input type="text" name="middlename" class="form-control" value="<?php echo $mname; ?>"/></td>
                    </tr>
                    <tr>
                        <th>Lastname: </th>
                        <td><input type="text" name="lastname" class="form-control" value="<?php echo $lname; ?>"/></td>
                    </tr>
                    <tr>
                        <th>Birthday: </th>
                        <td><input type="text" name="birthday" id="datePick" class="form-control" value="<?php echo $biday; ?>"/></td>
                    </tr>
                    <tr>
                        <th>Age: </th>
                        <td><input type="text" name="age" class="form-control" value="<?php echo $edad; ?>"/></td>
                    </tr>
                    <tr>
                        <th>Contact No.: </th>
                        <td><input type="text" name="contact" class="form-control" value="<?php echo $cnum; ?>"/></td>
                    </tr>
                    <tr>
                        <th>Address: </th>
                        <td><input type="text" name="address" class="form-control" value="<?php echo $tirahan; ?>"/></td>
                    </tr>
                </table>
                    <button type='submit' name="update" value='Save' class='btn btn-sm btn-outline-success float-left mr-3'>
                    <i class="fa fa-check"></i> Update
                    </button>

                    <button type='submit' name="delete" value='Delete' class='btn btn-sm float-none btn-outline-danger' onclick="return confirm('Are you sure want to delete?')">
                        <i class="fa fa-trash"></i> Delete
                    </button>
                    <button name="back" type="submit" class="btn btn-sm btn-outline-primary float-right">
                        <i class="fa fa-chevron-circle-left"></i>
                    <a href="<?php echo admin_url('admin.php?page=record_employee_list') ?>">BACK</a></button>
                    <br><br>
            </form>
        <?php } ?>  
            </div>
        </div>
    </div>    

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <!-- Flatpickr option -->
    <script>
        $('#datePick').datepicker({
            uiLibrary: 'bootstrap4',
            dateFormat: "Y-m-d"
        });
    </script>

<?php } ?>