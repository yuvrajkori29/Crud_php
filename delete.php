<?php
  
    include 'database.php';
    
    if (isset($_GET['deleteid'])) {
       $id = $_GET['deleteid'];
      
       $sql_del =  "delete from `crud` where id = $id";
       $result = mysqli_query($connection,$sql_del);
        

       if(!$result)
         {
           die (mysqli_error($connection));

         }

        
         header('location:display.php');  


    }
?>