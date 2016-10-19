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

  <div class="col-xs-12">
    <p style="position:relative; top:10px; font-size:40px;"><strong>建立新字卡</strong></p>
    <hr style="size:20px;">
  </div>





  <div style="padding-left:15px;" id="input_section">
    <form action="category_content.php" id="input_form" method='get'></form>
    <textarea rows="4" cols="110" id="card1_name" name="card1_name" form="input_form" onkeyup="InputAdjust(this)"></textarea>
    <textarea rows="4" cols="110" id="card1_content" name="card1_content" form="input_form" style="position:relative;left:-5px;" onkeyup="InputAdjust(this)"></textarea>
    <br>
    
  </div>



<div style="padding-left:15px;">
  <button onclick="add_more_input()" style="width:72.5%;height:70px;"><span class="glyphicon glyphicon-plus"></span></button>
  <br>
  <br>
  <input type="submit" value="Submit" name="category_submit" form="category_form">   
</div>
                                                                                          
</div>
</body>
</html>

