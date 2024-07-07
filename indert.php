<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css
">
</head>
<body>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "products_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if(isset($_POST['id'])){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $insertQ= "insert into appointment (Id, Name, Email, address) values ('$id','$name', '$email', '$address')";
    $result = $con->query($insertQ);
    echo "Data Inserted";
    header("location: /final/hospitalmanagemant/public/appointment.php");
  }
  ?>
  
  <div class="container my-5">
 <form method="post">
    <div class="row mb-3">
      <label class="col-sm-3 col-form-label fw-semibold" for="s_id">ID</label>
      <div class="col-sm-6">
        <input type="number" id="s_id" name="id"><br>
      </div>
    </div>
     
    <!-- for name  -->
    <div class="row mb-3">
      <label class="col-sm-3 col-form-label fw-semibold" for="s_name">Name</label>
      <div class="col-sm-6">
        <input type="text" id="s_name" name="name" required><br>
      </div>
    </div>
<!-- for email  -->
    <div class="row mb-3">
      <label class="col-sm-3 col-form-label fw-semibold" for="s_email">Email</label>
      <div class="col-sm-6">
        <input type="email" id="s_email" name="email" required><br>
      </div>
    </div>
<!-- for address  -->
    <div class="row mb-3">
      <label class="col-sm-3 col-form-label fw-semibold" for="s_address" >Address</label>
      <div class="col-sm-6">
        <input type="text" id="s_address" name="address"><br>
      </div>
    </div>
   <div class="">
    <input type="submit" value="Submit" class="btn btn-info fw-semibold">
   </div>
    
  </form> 
 </div>

</body>
</html>