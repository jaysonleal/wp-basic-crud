<?php

//function to create a new record 
function record_employee_create() {
    $id = $_POST["id"];
    $firstname = $_POST["firstname"];
    $middlename = $_POST["middlename"];
    $lastname = $_POST["lastname"];
    $age = $_POST["age"];
    $birthday = $_POST["birthday"];
    $bday1 = date('Y-m-d', strtotime($birthday));
    $contact = $_POST["contact"];
    $address = $_POST["address"];
    //insert
    if (isset($_POST['insert'])) {
        global $wpdb;
        $table_name = $wpdb->prefix . "employee";

        $wpdb->insert(
                //table
                $table_name,
                //data to be input in the database 
                array('firstname' => $firstname,
                  'middlename' => $middlename,
                  'lastname' => $lastname,
                  'age' => $age,    
                  'birthday' => $bday1,
                  'contact' => $contact,
                  'address' => $address),
                // data format 
                array('%s' , 
                      '%s' , 
                      '%s' , 
                      '%d' , 
                      '%s' , 
                      '%d' , 
                      '%s')
        );
        $message.="New Employee Added!";
    }
?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <div class="wrap">
        <h2>Add New Employee</h2>
        <div class="metabox-holder">
            <div class="postbox">
                <?php if (isset($message)): ?><div class="updated"><p><?php echo $message; ?></p></div><?php endif; ?>
                <br>
                <form style="width:50%; margin: auto;" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                    <table class="table table-striped table-bordered" style="width:90%">
                        <tr>
                            <th>First name:</th>
                            <td><input type="text" name="firstname"  class="form-control" value="<?php echo $firstname; ?>" placeholder="Firstname"/></td>
                        </tr>
                        <tr>    
                            <th>Middle name:</th>
                            <td><input type="text" name="middlename"  class="form-control" value="<?php echo $middlename; ?>" placeholder="Middlename"/></td>
                        </tr>
                        <tr>    
                            <th>Last name:</th>
                            <td><input type="text" name="lastname"  class="form-control" value="<?php echo $lastname; ?>" placeholder="Lastname"/></td>
                        </tr>
                        <tr>    
                            <th>Age:</th>
                            <td><input type="text" name="age"  class="form-control" value="<?php echo $age; ?>" placeholder="Age"/></td>
                        </tr>
                        <tr>    
                            <th>Birthday:</th>
                            <td><input type="text" data-provide="datepicker" id="datePicker" name="birthday" value="<?php echo $birthday; ?>"placeholder="YYYY/MM/DD" data-input/></td>
                        </tr>
                        <tr>    
                            <th>Contact No.:</th>
                            <td><input type="text" name="contact"  class="form-control" value="<?php echo $contact; ?>" placeholder="Contact No."/></td>
                        </tr>
                        <tr>    
                            <th>Address:</th>
                            <td><input type="text" name="address"  class="form-control" value="<?php echo $address; ?>" placeholder="Address"/></td>
                        </tr>
                    </table>
                    <button name="insert" type="submit" class="btn btn-outline-success" value="Save"><i class="fa fa-save"></i> SAVE</button>
                    <button name="back" type="submit" class="btn btn-outline-primary"><i class="fa fa-chevron-circle-left"></i>
                     <a href="<?php echo admin_url('admin.php?page=record_employee_list') ?>">
                     BACK  </a></button>
                </form>   
                <br>   
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
        $('#datePicker').datepicker({
            uiLibrary: 'bootstrap4',
            dateFormat: "Y-m-d"
        });
    </script>

    <?php
}