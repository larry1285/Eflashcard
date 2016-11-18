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
      <textarea rows="4" cols="80" id="card1_name" name="card1_name" form="category_form" onkeyup="InputAdjust(this)"></textarea>
      <textarea rows="4" cols="80" id="card1_content" name="card1_content" form="category_form" style="position:relative;left:-5px;" onkeyup="InputAdjust(this)"></textarea>
      <br>
    </div>   

    
      
      
  </form>                                                                                          
  <div id=ss style="height:220px; width:60%; border-style: groove;border-width: 2px; float:left; background-color:white;">
    <div style="float:left; width:49%;">
      <div id='editor2' contenteditable="true" style="border-style: solid;;min-height:200px;width:96%; margin:10px 10px 0px 10px;"onkeyup="make_height_equal()">
  
      </div>
    </div>
        <div id="my_vertical_line" class="vertical-line" style="height:100%;  float:left; background-color:pink;" >
    
      </div>


    <div id='editor3' contenteditable="true" style="min-height:200px;width:49%; float:left;margin:10px 10px 0px 10px; " onkeyup="make_height_equal()"> 
    </div>
    
  </div>
  <div style="float:left;">
  <?php  include "includes/toolbar.html"; ?>
  </div>
  <p>wtf</p>
  <div style="clear:left; padding-top:10px;">
  <input type="hidden" name="category_submit" value="Submit" form="category_form">
  <input type="button" onclick="submit_category_form()" value="Submit" form="category_form">
  </div>
</div>
<script src="js/editor.js"></script>
  
  
  

</body>
</html>

