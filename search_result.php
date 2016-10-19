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
    $all_table_sql = "SHOW TABLES FROM Eflashcard";
    $result_all_table_sql = mysqli_query($connection,$all_table_sql);
    $arrayCount = 0;
    while ($row = mysqli_fetch_row($result_all_table_sql)) {
      $search_text=$_GET['search_text'];
      $search_query="SELECT * FROM $row[0]
                     WHERE card_content LIKE '%".$search_text."%'";
      $result_search_query=mysqli_query($connection,$search_query);
      if($result_search_query){
        if (mysqli_num_rows($result_search_query) > 0) {
          while($result = mysqli_fetch_assoc($result_search_query)) {
              echo "card_name=".$result['card_name'].'<br>';
              echo "card_content=".$result['card_content'].'<br >';
          }
        } else {
//          echo "0 results";
        }
      }
      else {echo 'search query FAILED';echo"error".mysqli_error($connection);}      
    }
 
//    $search_text=$_GET['search_text'];
//    $search_query="SELECT * FROM 34324s 
//                   WHERE card_content LIKE '%".$search_text."%'";
//    $result_search_query=mysqli_query($connection,$search_query);
//    if($result_search_query){
//      if (mysqli_num_rows($result_search_query) > 0) {
//        while($result = mysqli_fetch_assoc($result_search_query)) {
//            echo "card_name=".$result['card_name'];
//            echo "card_content=".$result['card_content'];
//        }
//      } else {
//        echo "0 results";
//      }
//    }
//    else {echo 'search query FAILED';echo"error".mysqli_error($connection);}
    
  ?>
</div>

</body>
</html>

