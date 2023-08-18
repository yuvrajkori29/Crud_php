<?php
// connecting database
include 'database.php';
$res = false;
if (isset($_POST['submit'])) {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $mobile = isset($_POST['mobile']) ? $_POST['mobile'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Check if any of the fields are empty before inserting
    if (!empty($name) && !empty($email) && !empty($mobile) && !empty($password)) {
        $sql_insert = "INSERT INTO `crud` (`name`, `mobile`, `email`, `password`) 
                    VALUES ('$name','$mobile','$email','$password')";

        $result = mysqli_query($connection, $sql_insert);

        if ($result) {
           
            $res = true;
            header('location:display.php');
        } else {
            die(mysqli_error($connection));
        }
    } else {
        echo "Please fill in all the form fields.";
    }
}

$connection->close();
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crud Operations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>

  <!-- //form submission  -->
    <div class="container my-5">
      <form method="post" action="">
      <div class="mb-3">
          <label class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name = "name" autocomplete = "none" >
        </div>
       
        <div class="mb-3">
          <label class="form-label">Email address</label>
          <input type="email" class="form-control" id="email" autocomplete = "none" name = "email">
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" class="form-control" id="password" autocomplete = "none" name="password">
        </div>
        <div class="mb-3">
          <label  class="form-label">Contact No.</label>
          <input type="text" class="form-control" id="mobile" autocomplete = "none" name="mobile" >
        </div>
       
        <button type="submit" class="btn btn-primary" name='submit'>Submit</button>
      </form>
      <?php 
           
           if($res==true)
              echo "form submitted successsfully";
        
      ?>

     
</div>


  </body>
</html>