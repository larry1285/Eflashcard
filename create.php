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

<?php include "includes/nav.html"; ?>
    
<div class="container-fluid" style="position:relative; top:-20px;" id="create_background">
  <row>
    <div class="col-xs-12">
      <p style="position:relative; top:10px; font-size:40px;"><strong>建立新字卡集</strong></p>
      <hr style="size:20px;">
    </div>
  </row>
  

  <form action="category_content.php" id="category_form" method='get'>
    <row>
      <div class="col-xs-12">
        <p style="font-size:40px;"><strong>字卡集標題</strong></p>
        <input type = "text" class = "form-control" name="category_name" style="width:700px;font-size:60px;" placeholder = "請輸入標題" >
        <hr>
      </div>
    </row>
    
    <div style="padding-left:15px;">
      <textarea rows="4" cols="110" id="card1_name" name="card1_name" form="category_form" onkeyup="InputAdjust(this)"></textarea>
      <textarea rows="4" cols="110" id="card1_content" name="card1_content" form="category_form" style="position:relative;left:-5px;" onkeyup="InputAdjust(this)"></textarea>   
      <input type="submit" value="Submit" name="category_submit">
    </div>   
    
      
      
  </form>                                                                                          
</div>
</body>
</html>

