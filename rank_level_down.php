<?php include "includes/db.php"; ?>
<?php
  $id=$_GET['card_id'];
  $query = "SELECT * FROM admin_db WHERE id='$id'";
  $result= mysqli_query($connection,$query);
  while ($row = mysqli_fetch_assoc($result)) {
    $rank=$row['rank'];
    if($rank==1)$rank=2;
    else if ($rank==2)$rank=1;
    else $rank=1;
    $update="UPDATE `admin_db` SET `rank` = '$rank' WHERE `admin_db`.`id` = '$id'";
    $update_result= mysqli_query($connection,$update);
    if(!$update_result){echo mysqli_error($connection)."<br>";}
    else echo $rank;
  }  







?>