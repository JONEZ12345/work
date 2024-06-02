<?php

// Include Database Connection 
$locker = 1;
include_once('config/db.php');

// Check if allready logged in 
session_start(); 
if (!isset($_SESSION['id'])) {
    header("Location:$loginPage");
}

$id = $_SESSION['id'];

$query = "SELECT * FROM $tableAdmin WHERE id = '$id'";
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) == 1){
    while ($row = mysqli_fetch_assoc($result)) {
       $id_database = $row['id']; 
       $uniqueid_datbase = $row['uniqueid'];
       $first_name_database = $row['first_name'];
       $last_name_database = $row['last_name'];
       $role_database = $row['role'];
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>



<div class="container-fluid p-5">
    <div class="row">
        <div class="col">


        <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Hello Dear <?php echo $first_name_database . " " . $last_name_database; ?></h5>
            <p class="card-text">Your role is <?php echo $role_database; ?></p>
            <a href="<?php echo $logoutPage; ?>" class="btn btn-primary">Logout</a>
        </div>
        </div>



        </div>
    </div>
</div>


    
</body>
</html>