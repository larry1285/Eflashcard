<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href='http://netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.css' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/eflash.js"></script>
</head>
<body>

<?php include "includes/nav.php"; ?>
<?php include "includes/db.php"; ?>
    
<div class="container-fluid" style="position:relative; top:-20px;" id="create_background">

  <div class="col-xs-12">
    <p style="position:relative; top:10px; font-size:40px;"><strong>建立新字卡集</strong></p>
    <hr style="size:20px;">
  </div>

  

  <form action="category_content.php" id="category_form" method='get'></form>

  <div>
    <p style="font-size:40px;"><strong>字卡集標題</strong></p>
    <?php 
    if(isset($_GET['category_name'])){
      $original_category_name=substr($_GET['category_name'],strlen($uname)+1,strlen($_GET['category_name']));
      echo'
      <input form="category_form" type = "text" class = "form-control" id="category_name" name="category_name" style="width:700px;font-size:40px;" placeholder = "請輸入標題" value="'.$original_category_name.'">';
      echo "<br>";
      show_all_cards();

    }else{
      echo'
      <input form="category_form" type = "text" class = "form-control" id="category_name" name="category_name" style="width:700px;font-size:60px;" placeholder = "請輸入標題" >';
      echo "<br>";
      show_one_card();
    }
    ?>

  </div>
  
  <?php
  function show_all_cards(){
    global $connection;
    $category_name=$_GET['category_name'];
    $select_all_from_category_query="SELECT * FROM $category_name";
    $select_all_from_category_result=mysqli_query($connection,$select_all_from_category_query);
    $count=1;

    echo'
    <div style="padding-left:15px;" id="input_section">';
    if($select_all_from_category_result){
      while ($row = mysqli_fetch_assoc($select_all_from_category_result)){
        $current_textarea=array("name"=>"card".$count."_name","content"=>"card".$count."_content");      
        echo'
          <textarea rows="4"  id="'.$current_textarea['name'].'" name="'.$current_textarea['name'].'" form="category_form" onkeyup="InputAdjust(this)" style="width:30%;display:none;"></textarea>
          <textarea rows="4"  id="'.$current_textarea['content'].'" name="'.$current_textarea['content'].'" form="category_form" style="position:relative;left:-5px; width:30%;display:none;" onkeyup="InputAdjust(this)"></textarea>';

     
        $count=$count+1;
      }
      echo "</div>"; 
      mysqli_data_seek($select_all_from_category_result, 0);
      $count=1;
      echo '<div id="explicit_input_section" style="margin-left:30px;">';
      while ($row = mysqli_fetch_assoc($select_all_from_category_result)){
        $current_card="card".$count;
        $current_contenteditable=array("name"=>"explicit_card".$count."_name","content"=>"explicit_card".$count."_content");        
        echo '
          <div id="'.$current_card.'" style="height:220px; width:60%; border-style: groove; float:left; background-color:white;">
            <div style="float:left; width:49.8%;">
              <div id="'.$current_contenteditable['name'].'" contenteditable="true" style="min-height:200px;width:99%;margin:5px 1px 10px 2px; "onkeyup="make_height_equal(this)">'.$row['card_name'].'

              </div>
            </div>
            <div id="my_vertical_line" class="vertical-line" style="width:0.3%;height:101%;  float:left; background-color:pink;" >

            </div>
            <div style="float:left; width:49.8%;">
              <div  id="'.$current_contenteditable['content'].'" contenteditable="true" style="min-height:200px;width:99%;margin:5px 1px 10px 2px; "onkeyup="make_height_equal(this)">'.$row['card_content'].'

              </div>
            </div>

          </div>
        ';
        $count=$count+1;
      }
    }else{die('QUERY FAILED'.mysqli_error($connection));}
    echo "</div>";
  }
  function show_one_card(){
    echo'
      <div style="padding-left:15px;" id="input_section">   
        <textarea rows="4"  id="card1_name" name="card1_name" form="category_form" onkeyup="InputAdjust(this)" style="width:30%;display:none;"></textarea>
        <textarea rows="4"  id="card1_content" name="card1_content" form="category_form" style="position:relative;left:-5px; width:30%;display:none;" onkeyup="InputAdjust(this)"></textarea>
        <br>

      </div>
      <div id="explicit_input_section">
        <div id="card1" style="height:220px; width:60%; border-style: groove; float:left; background-color:white;">
          <div style="float:left; width:49.8%;">
            <div id="explicit_card1_name" contenteditable="true" style="min-height:200px;width:99%;margin:5px 1px 10px 2px; "onkeyup="make_height_equal(this)">

            </div>
          </div>
          <div id="my_vertical_line" class="vertical-line" style="width:0.3%;height:101%;  float:left; background-color:pink;" >

          </div>
          <div style="float:left; width:49.8%;">
            <div  id="explicit_card1_content" contenteditable="true" style="min-height:200px;width:99%;margin:5px 1px 10px 2px; "onkeyup="make_height_equal(this)">

            </div>
          </div>

        </div>
      </div>    
    ';
    
    
  }
  
  ?>
<div style="padding-left:15px;">
  <button onclick="add_more_input()" style="width:60%;height:70px;"><span class="glyphicon glyphicon-plus"></span></button>
  <br>
  <br>
  <?php echo '<input type="hidden" value="'.$uname.'" name="uname" form="category_form">' ?>
  <input type="hidden" name="page_url" value="create.php" form="category_form">
  <input type="hidden" value="Submit" name="category_form_submit" form="category_form">   
  <button onclick="category_form_submit()">Submit</button>
</div>
                                                                                         
</div>
<script src="js/editor.js"></script>
  
<script>
set_all_contenteditable();
</script>
</body>
</html>