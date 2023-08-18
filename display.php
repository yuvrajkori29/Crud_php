<?php
include 'database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <title>Dispaly Result</title>
</head>
<body>
    <div class="container my-5">
          <button type="submit" class="btn btn-primary my-5" name='submit' ><a style="text-decoration: none" href="user.php" class="text-light">Add User</a></button>
        <table class="table my-5">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Mobile</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
<?php

$sql  = "SELECT * FROM `crud`";
$result = mysqli_query($connection,$sql);

//how to populate each item ;

//  {
//   $row  =  mysqli_fetch_assoc($result);
//   echo  $row['name'];
//  }

if ($result) {
  while ($row = mysqli_fetch_assoc($result)) {
      $id = $row['id'];
      $name = $row['name'];
      $mobile = $row['mobile'];
      $email = $row['email'];
      $password = $row['password'];

      echo '<tr>
              <th scope="row">' . $id . '</th>
              <td>' . $name . '</td>
              <td>' . $email . '</td>
              <td>' . $password . '</td>
              <td>' . $mobile . '</td>
              <td> <button type="submit" class=" btn btn-danger "  ><a style="text-decoration: none" href="delete.php?deleteid='.$id.'" class="text-light">Delete</a></button>
              <button type="submit" class="btn btn-info"><a style="text-decoration: none" href="update.php?updateid='.$id.'" class="text-light">Update</a></button>
              </tr>';
  }
}

?>


</tbody>
</table>
</body>
</html>