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
<body style="background-color:#F5F5DC;">
<?php include "includes/db.php"; ?>
<?php include "includes/nav.php"; ?>
<?php
function Redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);

    exit();
}

if(!isset($_GET['uname'])){Redirect('login.html', false);}
$uname=$_GET['uname'];
?>
  
  



<?php
function show_user_category(){
  global $connection,$uname;
  $uname_underscore=$uname.'_';
  $query="SHOW TABLES FROM ". DB_NAME . " LIKE '$uname_underscore%'";
//  echo $query;
  $result = mysqli_query($connection,$query);
  if($result){
    if (mysqli_num_rows($result) > 0) {
      while($table = mysqli_fetch_array($result)) {
        $category_name=$table[0];
        $sub= substr ( $category_name , strlen ($uname)+1 , strlen ($category_name) );
//         echo $sub."<br>";
        echo '<a class="category" href="category_content.php?category_name='.$table[0].'&uname='.$uname.'&page_url='."index.php".'">'.$sub.'</a>';

      }
    } 
  }else {
    echo "0 results";
  }
}

  

?>
<div class="container" style="margin-left:25%;">
  <?php
    if(isset($_GET['uname'])){
      show_user_category();
    }else{
      //redirect to login.html
    }
  ?>
</div>
  
<script>
function send_search_form(){
  document.getElementById("search_form").submit();  
}

</script>

</body>
</html>

