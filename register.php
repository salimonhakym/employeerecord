<?php
   $pagename = 'Add Employee';
    include_once 'config.php';
    require_once INCLUDE_PATH .'/layouts/admin/header.php';
    require_once INCLUDE_PATH .'/layouts/admin/sidebar.php';

    if(isset($_POST['submit'])){
        $sentFirstName = trim(filter_var($_POST['firstName'], FILTER_SANITIZE_STRING));
        $sentLastName = trim(filter_var($_POST['lastName'], FILTER_SANITIZE_STRING));
        $sentEmail = trim(filter_var($_POST['emailadd'], FILTER_SANITIZE_STRING));
        $sentQualification = trim(filter_var($_POST['qualification'], FILTER_SANITIZE_STRING));
        $sentSalary = trim(filter_var($_POST['salary'], FILTER_SANITIZE_STRING));
        $sentDob = trim(filter_var($_POST['dob'], FILTER_SANITIZE_STRING));
        $sentDate_joined = trim(filter_var($_POST['date_joined'], FILTER_SANITIZE_STRING));
        $sentAge = date("y-m-d") - ;
        
        $stmt = $conn->prepare("INSERT INTO employee (first_name, last_name, age, email, qualif, salary, dob, date_joined ) VALUES (?,?,?,?,?,?,?,?)");
        $stmt->bind_param('ssssssss', $sentFirstName, $sentLastName, $sentAge, $sentEmail, $sentQualification, $sentSalary, $sentDob, $sentDate_joined);
        $stmt->execute();
        
        if($stmt){
         echo 'details saved';
        }else{
        echo 'something weird happened';
        }
        echo "sentFirstName". $sentFirstName;
        echo "<br>sentLastName" . $sentLastName;
        echo "<br>sentEmail" . $sentEmail;
        echo "<br>sentQualification". $sentQualification;
        echo "<br>sentSalary" . $sentSalary;
        echo "<br>sentDob". $sentDob;
        echo "<br>sentDate_joined".$sentDate_joined;
        echo "sentAge" . $sentAge;

     }

?>

        <!-- Page Content -->
        <!-- ************************************************************************ -->
        <div class="card card-register mx-auto mt-5">
        <div class="card-header">Create Employee Record</div>
        <div class="card-body">
        <form action="register.php" method="post">
          <div class="form-group">
                <div class="form-row">
                        <div class="col-md-6">
                                <div class="form-label-group">
                                <input type="text" id="firstName" name="firstName" class="form-control" placeholder="First name" required="required" autofocus="autofocus">
                                <label for="firstName">First name</label>
                                </div>
                        </div>
                        <div class="col-md-6">
                                <div class="form-label-group">
                                <input type="text" id="lastName" name="lastName" class="form-control" placeholder="Last name" required="required">
                                <label for="lastName">Last name</label>
                                </div>
                        </div>
                </div>
           </div>
          <div class="form-group">
                <div class="form-label-group">
                        <input type="email" id="emailadd" name="emailadd" class="form-control" placeholder="Email address" required="required">
                        <label for="emailadd">Email address</label>
                </div>
          </div>
          <div class="form-group">
                <div class="form-row">
                        <div class="col-md-6">
                                <div class="form-label-group">
                                        <input type="text" id="qualification" name="qualification" class="form-control" placeholder="Qualification" required="required" autofocus="autofocus">
                                        <label for="qualification">Qualification</label>
                                </div>
                        </div>
                        <div class="col-md-6">
                                <div class="form-label-group">
                                        <input type="text" id="salary" name="salary" class="form-control" placeholder="Enter Salary" required="required">
                                        <label for="salary">Salary</label>
                                </div>
                        </div>
                </div>
          </div>
          <div class="form-group">
                <div class="form-row">
                        <div class="col-md-6">
                                <div class="form-label-group">
                                <input type="text" id="dob" name="dob" class="form-control" required="required">
                                <label for="dob">Date of Birth</label>
                                </div>
                        </div>
                        <div class="col-md-6">
                                <div class="form-label-group">
                                <input type="text" id="date_joined" class="form-control" name="date_joined" required="required">
                                <label for="date_joined">Date Joined</label>
                                </div>
                        </div>
                </div>
                </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block" name="submit">
              Add Employee
          </button>
        </form>
      </div>
    </div>
        <!-- ************************************************************************ -->
<?php require_once INCLUDE_PATH .'/layouts/admin/footer.php'; ?>