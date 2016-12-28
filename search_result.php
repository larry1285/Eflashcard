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
<style>
table.search:hover{
  border-bottom: 3px solid yellow;
}

</style>
</head>
<!--  background-color:#F5F5DC;-->
<body style="background-color:#F5F5DC;">
<?php include "includes/db.php"; ?>
<?php include "includes/nav.php"; ?>
  
<div class="container" >
  <?php
    $search_text=$_GET['search_text'];
    echo DB_USER."<br>";
    echo "<h1>與\"$search_text\"相關的搜尋結果</h1>";
    $underscore_search_text="\_%".$search_text;
    $all_table_sql = "SHOW TABLES FROM $db['db_name' LIKE '%$underscore_search_text%'";
    echo "<br>".$all_table_sql."<br>";
    $result_all_table_sql = mysqli_query($connection,$all_table_sql);
  if(!$result_all_table_sql){echo mysqli_error($connection);}
    $arrayCount = 0;
    while ($row = mysqli_fetch_row($result_all_table_sql)) {
      $table_name=$row[0];
//      echo $table_name;
//      echo $uname."_";
//      echo strpos($table_name,$uname."_");
      if(!strpos($table_name,"admin_db") and strpos($table_name,$uname."_")===FALSE){
        $simple_table_name=substr($table_name,strpos($table_name,"_")+1,strlen($table_name));
        $table_owner=substr($table_name,0,strpos($table_name,"_"));
        $row_count=0;
        echo $table_name."<br>";
        $row_count_query="SELECT COUNT(*) FROM $table_name";
        $row_count_result=mysqli_query($connection,$row_count_query);
        if($row_count_result){
          $row_count_result_row = mysqli_fetch_array($row_count_result);  
          $row_count=$row_count_result_row[0];
        }
        $select_top_four="SELECT * FROM $table_name LIMIT 4";
        $select_top_four_result=mysqli_query($connection,$select_top_four);
          echo '
          <table id="'.$table_name.'" onclick="visit_table(this,'."'".$uname."'".','."'".$table_owner."'".');"  class="table table-bordered search"  style="width:100%;table-layout: fixed;background-color:white;">
            <tr>
              <th colspan="4"><div style="float:left">'.$row_count."個字詞".'</div>'.'<div style="float:left;height:10px;border-left:2px solid #7FFFD4; margin-left:15px;margin-top:5px;"></div>'.'<p style="color:#DEB887;display:inline;margin-left:15px;"><b>'."      "."".$table_owner.'</b></p><br><p style="color:#000000;display:inline;font-size:23px">'.$simple_table_name.'</p></th>
              
            </tr>         
            <tr>';

        while($element=mysqli_fetch_assoc($select_top_four_result)){
          $show_content="";
          if(strlen($element['card_content'])>20){
            $show_content=substr($element['card_content'],0,20);
            $show_content=$show_content."...";
          }else{
            $show_content=$element['card_content'];
          }
          
          echo "
              <td> 
              
                {$element['card_name']}
                <br>
                <br>
                {$show_content}
              </td>
          ";
        }
          echo'
            </tr>       
          </table>';
          echo "<br>";           
      }  
    }
  ?>
<form id="visit_form" action="category_content.php" method="GET">
  <input type="hidden" id="visit_form_uname" name="uname" value="">
  <input type="hidden" id="visit_form_owner" name="owner" value="">
  <input type="hidden" id="visit_form_category_name" name="category_name" value="">
  <input type="hidden" name="page_url" value="search_result.php">
</form> 

</div>
<script>
function visit_table(object,visitor,owner){
  console.log(object.id);
  console.log(visitor);
  console.log(owner);
  document.getElementById("visit_form_category_name").value=object.id;
  document.getElementById("visit_form_uname").value=visitor;
  document.getElementById("visit_form_owner").value=owner;
  document.getElementById("visit_form").submit();
  
}
</script>
</body>
</html>

