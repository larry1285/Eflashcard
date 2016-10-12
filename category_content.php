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
  
<!--
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Eflashcard</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active" style="position:relative; top:6px">
        <form>
          <div class = "input-group" style="width:400px; padding-top:13px;">
            <input type = "text" class ="form-control" placeholder = "Search for.." style="font-size:30px;">
            <span class="input-group-btn">
              <button name="submit" class="btn btn-default" type="submit">
                <span class="glyphicon glyphicon-search"></span>
              </button>
            </span>
          </div> 
        </form>
      </li>
      <li style="padding-top:11px;"><a href="create.php" style="font-size:35px; padding-top:10px;">Create<span class="glyphicon glyphicon-plus" style="position:relative; left:3px; top:1px"></span></a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#" style="padding-top:25px; font-size:35px;"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#" style="padding-top:25px; font-size:35px;"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
-->
  
<?php  //retrieve data from db
global $connection;
$category_name=$_GET['category_name'];
if(isset($_GET['category_submit'])){
  $card1_name=$_GET['card1_name'];
  $card1_content=$_GET['card1_content'];
  if($card1_name=="" || empty($card1_name)){
    $card1_name="empty";
  }
  //如果有二個相同的category,之後要在create.php就加以處理
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
else{
  
  echo"category_submit failed";
  
}
?>
  
</body>
</html>

