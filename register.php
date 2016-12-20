<?php include "includes/db.php"; ?>
<?php
  $register_UserName=$_GET['register_UserName'];
  $register_Password=$_GET['register_Password'];
  $query="INSERT INTO users (UNAME,UPASS) VALUES ('$register_UserName','$register_Password')";
  $result = mysqli_query($connection,$query);
  if(!$result)echo mysqli_error($connection);
  else echo 'success' 

  


?>