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
<body class="b1">

<?php include "includes/db.php"; ?>
  
<?php include "includes/nav.html"; ?>
<div class="container"> 
<?php  //create table and insert user's data if sumbit button is clicked

$category_name=$_GET['category_name'];
echo '
<div>
  <h1 class="category_heaer">'.$category_name.'</h1>
</div>';
echo  " <button onclick=\"location.href = 'createcard.php'\" >Home</button> ";
if(isset($_GET['category_submit'])){
  $card1_name=$_GET['card1_name'];
  $card1_content=$_GET['card1_content'];
  //*************testing****************
  
  echo "card1_content=$card1_content".'<br>';
  
  $card1_content = str_replace(PHP_EOL, '%0D%0A', $card1_content);
  
  echo "card1_content=$card1_content".'<br>';
  
  //*************testing****************
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
      card_name VARCHAR(2047) NOT NULL,
      card_content VARCHAR(2047)
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
else if(isset($_GET['edit_submit']))//category_content.php
{

  global $connection;
  $category_name_to_be_edited=$_GET['category_name'];
  $card_id_to_be_edited=$_GET['card_id'];
  $new_card_name=$_GET['edit_name_textarea'];
  $new_card_content=$_GET['edit_content_textarea'];

//  echo 'category_name_to_be_edited='.$category_name_to_be_edited.'<br>';
//  echo 'card_id_to_be_edited='.$card_id_to_be_edited.'<br>';
//  echo 'new_card_name='.$new_card_name.'<br>';
//  echo 'new_card_content='.$new_card_content.'<br>';

  //*************testing****************
  
  
  $new_card_content = str_replace(PHP_EOL, '%0D%0A', $new_card_content);
  
  echo "new_card_content=$new_card_content".'<br>';
  
  //*************testing****************
  
  
  
  $sql_update_category="
    UPDATE {$category_name_to_be_edited}
    SET card_name='{$new_card_name}', card_content='{$new_card_content}'
    WHERE id={$card_id_to_be_edited}
  ";
  $result_sql_update_category=mysqli_query($connection,$sql_update_category);
  if($result_sql_update_category){echo 'update query SUCCEEDED';}
  else {echo 'update query FAILED';echo"error".mysqli_error($connection);}
  
}
else{ 
  //echo"category_submit failed";
}
?>
  
<?php  //retreive data from db
$sql_select_all_category_content="SELECT * FROM {$category_name}";
$result_sql_select_all_categories=mysqli_query($connection,$sql_select_all_category_content);
if (mysqli_num_rows($result_sql_select_all_categories) > 0) {
  echo ' <table style="width:100%">';
  while($row = mysqli_fetch_assoc($result_sql_select_all_categories)) {
    $card_content=$row["card_content"];
    $card_content = str_replace('%0D%0A', '&#13;&#10;', $card_content);
    echo ' 
             <tr>
               <td valign="top" style="width:40%;white-space:pre;background-color:white;" id="'.$category_name.'_'.$row["id"].'_1">'.$row["card_name"].'</td>
               <td valign="top" style="width:40%;white-space:pre;background-color:white;" id="'.$category_name.'_'.$row["id"].'_2">'.$card_content.'</td>
               <td valign="top" style="width:20%"><button onclick="edit_content('."'$category_name'".','."'$row[card_name]'".','."'$row[card_content]'".','."$row[id]".')"><span class="glyphicon glyphicon-pencil"></span></button></td>
             </tr>
         ';
  }
  echo '</table>';
} else {
  echo "0 results";
}
?>

</div>
<script>
  document.addEventListener("click", mouse_click);
  var current_name_textarea_id="myBtn";
  var current_content_textarea_id="myBtn";


</script> 

  
</body>
</html>