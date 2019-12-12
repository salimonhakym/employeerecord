<?php
   $pagename = 'Employee Records';
    include_once 'config.php';
    $pagetitle = "Employee Records";
    $sqlQuery = "SELECT * FROM employee";
    $sqlStatement = $conn->query($sqlQuery);
    require_once INCLUDE_PATH .'/layouts/admin/header.php';
    require_once INCLUDE_PATH .'/layouts/admin/sidebar.php';

?>

        <!-- Page Content -->
        <!-- ************************************************************************ -->

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <br>
        <h4 class="text-left">Employee Data Records</h4>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="addemploy.php"class="btn btn-sm btn-primary">Add New Records <i class="fa fa-user-plus"></i></a>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table text-center table-striped table-sm">
        <thead>
            <tr>
                <th>Employee ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Email</th>
                <th>Qualification</th>
                <th>Salary</th>
                <th>Date of Birth</th>
                <th>Date Joineed</th>
                <th colspan="3">Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php  if($sqlStatement->num_rows > 0){
                while($row = $sqlStatement->fetch_assoc()){
                    echo '<tr><td>';
                    echo 'EMP000'. $row['emp_id'];
                    echo '</td><td>';
                    echo $row['first_name'];
                    echo '</td><td>';
                    echo $row['last_name'];
                    echo '</td><td>';
                    echo $row['email'];
                    echo '</td><td>';
                    echo $row['age'];
                    echo '</td><td>';
                    echo $row['qualif'];
                    echo '</td><td>';
                    echo $row['salary'];
                    echo '</td><td>';
                    echo $row['dob'];
                    echo '</td><td>';
                    echo $row['date_joined'];
                    echo '</td><td>';
                    echo '<a href="#" class="btn btn-primary"><i class="fa fa-edit"></i></a></td><td>';
                    echo '<a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a></td></tr>';
                    
                }
            }  ?> 
        </tbody>
        </table>
      </div>
        <!-- ************************************************************************ -->
<?php require_once INCLUDE_PATH .'/layouts/admin/footer.php'; ?>