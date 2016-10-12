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
  <script src="js//eflash.js"></script>
</head>
<body>

<?php include "includes/db.php"; ?>
  
<?php include "includes/nav.html"; ?>
  
<?php  //create table and insert user's data if sumbit button is clicked
global $connection;
$category_name=$_GET['category_name'];
if(isset($_GET['category_submit'])){
  $card1_name=$_GET['card1_name'];
  $card1_content=$_GET['card1_content'];
  if($card1_name=="" || empty($card1_name)){
    $card1_name="empty";
  }
  
  $query="SHOW TABLES LIKE '". $category_name ."'";
  if ($result = mysqli_query($connection,$query) ) {
    if($result->num_rows == 1) {
    //echo "Table exists";
    }
    else { //table not exist
      //如果有二個相同的category,之後要在create.php就加以處理
      //echo "Table not  exists";
      $query = "CREATE TABLE {$category_name} ( 
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
      card_name VARCHAR(255) NOT NULL,
      card_content VARCHAR(30)
      )";

      $create_category_query = mysqli_query($connection,$query);

      if(!$create_category_query){
        die('QUERY FAILED'.mysqli_error($connection));
      }
      $query = "INSERT INTO {$category_name} (card_name,card_content)
      VALUES ('$card1_name','$card1_content')";

      $insert_first_card_of_the_category=mysqli_query($connection,$query);
      if(!$create_category_query){
        die('QUERY FAILED'.mysqli_error($connection));
      }  
    }
  }else{
    die('QUERY FAILED'.mysqli_error($connection));
  }
}
else{
  //echo"category_submit failed";
}
?>
  
<?php  //retreive data from db
$sql_select_all_category_content="SELECT * FROM {$category_name}";
$result_sql_select_all_categories=mysqli_query($connection,$sql_select_all_category_content);
if (mysqli_num_rows($result_sql_select_all_categories) > 0) {
  while($row = mysqli_fetch_assoc($result_sql_select_all_categories)) {
      echo '<p class="category_content">'.$row["card_name"].'</p>';
      echo '<p class="category_content">'.$row["card_content"].'</p>';
  }
} else {
  echo "0 results";
}
?>

  
</body>
</html>

