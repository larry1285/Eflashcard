<!--do not execute the following codes randomly, it is very dangerous-->
<?php
/*
  $query = "SELECT * FROM admin_db";
  $result= mysqli_query($connection,$query);
  while ($row = mysqli_fetch_assoc($result)) {
//    $id=$row['id'];
//    $category_name=strtok($id, "_");

    $update="UPDATE `admin_db` SET `category` = '$category_name' WHERE `admin_db`.`id` = '$id'";
    $update_result= mysqli_query($connection,$update);
    if(!$update_result){echo mysqli_error($connection)."<br>";}
    else echo "update succeeded";
  }  
*/
?> 
<?php include "includes/db.php"; ?>
<?php

  $query = "SELECT * FROM admin_db";
  $result= mysqli_query($connection,$query);
  while ($row = mysqli_fetch_assoc($result)) {
    $id=$row['id'];
    $rank=1;
    $update="UPDATE `admin_db` SET `rank` = '$rank' WHERE `admin_db`.`id` = '$id'";
    $update_result= mysqli_query($connection,$update);
    if(!$update_result){echo mysqli_error($connection)."<br>";}
    else echo $rank;
  }  







?>