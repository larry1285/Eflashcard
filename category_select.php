<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/eflash.js"></script>
</head>
<body>
<?php include "includes/db.php"; ?>
<?php include "includes/nav.html"; ?>
<?php $player_index=0; ?>

<form action="flashcard_player.php" id="player_minus_form">
  <input type="hidden" name="player_mius_form_submit" value="Submit">
</form>
  <h1>please choose the categories you want to review!</h1>
<form action="flashcard_player.php" method="get">
<?php
  $all_table_sql = "SHOW TABLES FROM Eflashcard";

  $result_all_table_sql = mysqli_query($connection,$all_table_sql);
  $count=0;
  while ($row = mysqli_fetch_row($result_all_table_sql)) {
    echo "<input type='checkbox' name='$row[0]' value='$row[0]'>".$row[0];
    if($count==14 ){echo "<br>";$count=0;}
    else $count=$count+1;
  }
 
?>
  <input type="submit" value="Start">
<!--
  <input type="checkbox" name="vehicle" value="Bike"> I have a bike
  <input type="checkbox" name="vehicle" value="Car" checked> I have a car
  <input type="submit" value="Submit">
-->
</form>  


  
  
</body>
</html>

