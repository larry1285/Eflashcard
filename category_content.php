<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link href='http://netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.css' rel='stylesheet' type='text/css'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js//eflash.js"></script>
</head>
<body class="b1">

<?php include "includes/db.php"; ?>
  
<?php include "includes/nav.html"; ?>
<div class="container"> 
<?php  //create table and insert user's data if sumbit button is clicked
$category_name="";  
if(isset($_GET['category_name']))
{
  $category_name=$_GET['category_name'];
}
echo '
<div>
  <h1 class="category_heaer">'.$category_name.'</h1>
</div>';
echo  "<form action=\"createcard.php\">
         <input type=\"submit\" value=\"新增字卡\" name=\"add_input_submit\"><br><br>
         <input type=\"hidden\" name=\"category_name\" value=\"$category_name\">
       </form>";
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
      
      //**insert card to corresponding category
      
      $query = "INSERT INTO {$category_name} (card_name,card_content)
      VALUES ('$card1_name','$card1_content')";
      $insert_first_card_of_the_category=mysqli_query($connection,$query);
      if(!$insert_first_card_of_the_category){
        die('QUERY FAILED'.mysqli_error($connection)); 
      }  
      //**also insert this to admin_db
      
      $card_admin_id=$category_name ."_1";
        
        
      $insert_card_to_admin_db_query = "INSERT INTO admin_db (id,card_name,card_content)
      VALUES ('$card_admin_id','$card1_name','$card1_content')";
      $result_insert_card_to_admin_db_query=mysqli_query($connection,$insert_card_to_admin_db_query);
      if(!$result_insert_card_to_admin_db_query){
        die('QUERY FAILasdED'.mysqli_error($connection)); 
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
  $new_card_content = str_replace("'","\'" , $new_card_content);
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
  
  $card_admin_id=$category_name_to_be_edited."_".$card_id_to_be_edited;
  $sql_admin_update_category="
    UPDATE admin_db
    SET card_name='{$new_card_name}', card_content='{$new_card_content}'
    WHERE id='{$card_admin_id}'
  ";  
  $result_sql_admin_update_category=mysqli_query($connection,$sql_admin_update_category);
  if($result_sql_admin_update_category){echo 'update query SUCCEEDED';}
  else {echo 'update query FAILED';echo"error".mysqli_error($connection);}
  
}
else if(isset($_GET['input_form_submit']))
{
  $input_count=1;
  while(isset($_GET['card'.$input_count.'_name']))
  {
    
    //insert card to corresponding category
    
    $current_card_name=$_GET['card'.$input_count.'_name'];
    $current_card_content=$_GET['card'.$input_count.'_content'];
    
    $current_card_content=str_replace(PHP_EOL, '%0D%0A', $current_card_content);
    $current_card_content=str_replace("'", "\'", $current_card_content);
    
    $insert_query = "INSERT INTO {$category_name} (card_name,card_content)
      VALUES ('$current_card_name','$current_card_content')";
    
    $result_insert_category=mysqli_query($connection,$insert_query);
    if($result_insert_category){echo 'insert query SUCCEEDED';}
    else {echo 'insert query FAILED';echo"error".mysqli_error($connection);}
    
    //select the max id in the category
    
    $max_id=0;
    $sql_select_max_id="SELECT * from {$category_name} ORDER BY id DESC LIMIT 1";
    $result_sql_select_max_id = mysqli_query($connection,$sql_select_max_id);
    if($result_sql_select_max_id){echo '$sql_select_max_id SUCCEEDED';}
    else {echo '$sql_select_max_id FAILED';echo"error".mysqli_error($connection);} 
    
    while ($row = mysqli_fetch_assoc($result_sql_select_max_id)) 
    {
      $max_id=$row['id'];
    }
     
    
    
    //**also insert this to admin_db
    $card_admin_id=$category_name."_".$max_id;
    $insert_card_to_admin_db_query = "INSERT INTO admin_db (id,card_name,card_content)
    VALUES ('$card_admin_id','$current_card_name','$current_card_content')";
    $result_insert_card_to_admin_db_query=mysqli_query($connection,$insert_card_to_admin_db_query);
    if(!$result_insert_card_to_admin_db_query){
      die('QUERY FAILED'.mysqli_error($connection)); 
    }     
    
    
    //increase index
    $input_count=$input_count+1;
    
  }
  echo 'submit succeed!';
  
}
else if(isset($_GET['delete_form_submit']))
{
  $category_name=$_GET['category_name'];
  $card_id=$_GET['card_id'];
  
  $card_admin_id=$category_name."_".$card_id;
  
  //delete the card from its category
  $delete_query="DELETE FROM $category_name
WHERE id=$card_id;";
  $result_delete=mysqli_query($connection,$delete_query);
  
  if($result_delete){echo 'delete query SUCCEEDED';}
  else {echo 'delete query FAILED';echo"error".mysqli_error($connection);}
  
  //delete the card copy in admin_db
  
  $admin_delete_query="DELETE FROM admin_db
WHERE id='$card_admin_id'";
  $result_admin_delete_query=mysqli_query($connection,$admin_delete_query);
  
  if($result_admin_delete_query){echo 'admin delete query SUCCEEDED';}
  else {echo 'admin delete query FAILED';echo"error".mysqli_error($connection);}  
  
}
else{ 
  //echo"category_submit failed";
}
?>
  
<?php  //retreive data from db
$sql_select_all_category_content="SELECT * FROM {$category_name}";
$result_sql_select_all_categories=mysqli_query($connection,$sql_select_all_category_content);
if (mysqli_num_rows($result_sql_select_all_categories) > 0) {
  echo ' <table style="width:100%;table-layout: fixed;">';
  while($row = mysqli_fetch_assoc($result_sql_select_all_categories)) 
  {
    
    $card_content=$row["card_content"];
    $card_content = str_replace('%0D%0A', '<br>', $card_content);
    $row["card_content"]=str_replace("'", "\'", $row["card_content"]);
    $row["card_content"]=str_replace('"', '&quot', $row["card_content"]);
    $tool_bar_id=$category_name."_".$row["id"]."_toolbar";

    
    echo ' 
          <tr>
            <td valign="top" style="width:40%;background-color:white; height:100px;word-wrap:break-word" id="'.$category_name.'_'.$row["id"].'_1">'.$row["card_name"].'</td>
            <td valign="top" style="width:40%;background-color:white;height:100px;word-wrap:break-word;" id="'.$category_name.'_'.$row["id"].'_2">'.$card_content.'</td>
            <td valign="top" style="width:20%"> '.'
               <form action="category_content.php" method="GET" id="delete_form'."$row[id]".'" >
                 <input type="hidden" name="category_name" value='."'$category_name'".'>
                 <input type="hidden" name="card_id" value='."$row[id]".'>
                 <input type="hidden" name="delete_form_submit" value="Submit">
               </form>
               <button '.' id='.'"'.$category_name.'_'.$row["id"]."_pencil".'" '.' onclick="edit_content('."'$category_name'".','."'$row[card_name]'".','."'$row[card_content]'".','."$row[id]".')"><span class="glyphicon glyphicon-pencil"></span></button>
               <button '.' id='.'"'.$category_name.'_'.$row["id"]."_remove".'" onclick="send_delete_form('."$row[id]".')"><span class="glyphicon glyphicon-remove"><span></button>';
    echo '<div id="'.$tool_bar_id.'" style="display:none;">';
    include "includes/toolbar.html";
    echo '</div>';
    echo '
  
            </td>
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
  var textarea_mode=0;
  var implicit_current_name_textarea_id="myBtn";
  var implicit_current_content_textarea_id="myBtn";
  var current_name_textarea_id="myBtn";
  var current_content_textarea_id="myBtn";
  var current_pencil="myBtn";
  var current_remove="myBtn";
  var current_tool_bar="myBtn"
  function send_delete_form(card_id)
  {
    var result = confirm("Are u sure u want to delete me bro?");
    if(result){
      var delete_form="delete_form"+card_id;
      document.getElementById(delete_form).submit();
    }
  }
</script>
<script src="js/editor.js"></script>
  
</body>
</html>