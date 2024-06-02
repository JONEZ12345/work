<?php

// Include Database Connection 
$locker = 1;
include_once('config/db.php');

// Check if allready logged in 
session_start(); 
if (isset($_SESSION['id'])) {
    header("Location:$dashboardPage");
}


// Register the user 
if (isset($_POST['register'])){
    $errorMsg = ""; 

    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $uniqueid = rand(); 
    $role = 'user';

    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "SELECT * FROM $tableAdmin WHERE email = '$email'";
    $execute = mysqli_query($con, $sql);

    // Check Email and Password and Aslo we check if user exist 
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMsg = "Email is not balid try again"; 
    }else if(strlen($password) < 6){
        $errorMsg = "Password sould be more then six digits";
    }else if($execute->num_rows == 1){
        $errorMsg = "This Email is allready exists";
    }else{
        // Insert user data to database 
        $query = "INSERT INTO $tableAdmin (uniqueid, first_name, last_name, email, password, role) VALUES 
        ('$uniqueid', '$firstname', '$lastname', '$email', '$password', '$role')";

        $result = mysqli_query($con, $query);

        if($result == true){
            header("Location:$loginPage");
        }else{
            $errorMsg = "Your are not registred.. Please Try Again!";
        }

    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    
<div class="container pb-2" style="margin-top:50px">
<div class="row">
  <div class="col-sm-3 col-md-4 col-lg-4"></div>
  <div class="col-sm-7 col-md-6 col-lg-4 border p-5 rounded" style="margin-top:20px">

  <?php
    // Print Error Message
    if (isset($errorMsg)) {
        echo 
        "<div class='alert alert-warning alert-dismissible fade show'>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        $errorMsg
        </div>";         
    }
?>


  <form action="" method="post">

  <div class="mb-3">
            <div class="row g-3">
                <div class="col">
                <label for="exampleInputEmail1" class="form-label">First Name</label>
                <input type="text" name="firstname" id="exampleInputEmail1"  class="form-control" placeholder="" aria-label="First name">
            </div>
                <div class="col">
                <label for="exampleInputEmail1" class="form-label">Last Name</label>
                <input type="text" name="lastname" id="exampleInputEmail1" class="form-control" placeholder="" aria-label="Last name">
                </div>
            </div>
        </div>


        
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        
        <div class="mb-3">
          <label for="exampleInputPassword" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword" aria-describedby="emailHelp">
        </div>

        <p>If you have account <a href="<?php echo $loginPage; ?>" >Login</a></p>

        <input type="submit" class="btn btn-primary" name="register" value="Register">
</form>

    </div>
    </div>
</div>

</body>
</html>