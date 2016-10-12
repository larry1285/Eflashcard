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
  
<div class="container" >
  <?php
  $query="SHOW TABLES FROM ". DB_NAME;
  $result = mysqli_query($connection,$query);
  if (mysqli_num_rows($result) > 0) {
    while($table = mysqli_fetch_array($result)) {
          echo '<a class="category" href="category_content.php?category_name='.$table[0].'">'.$table[0].'</a><br>';
    }
  } else {
    echo "0 results";
  }
  ?>
</div>
<!--
<script type="text/javascript">
    document.getElementById("myButton").onclick = function () {
        location.href = "www.yoursite.com";
    };
</script>
-->
</body>
</html>

