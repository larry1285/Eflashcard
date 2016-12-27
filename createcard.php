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
    
<div class="container-fluid" style="position:relative; top:-20px;" id="create_background">

  <div class="col-xs-12">
    <p style="position:relative; top:10px; font-size:40px;"><strong>建立新字卡</strong></p>
    <hr style="size:20px;">
  </div>
  <?php include "includes/toolbar.html"; ?>




  <div style="padding-left:15px;" id="input_section">
    <form action="category_content.php" id="input_form" method='get'></form>
    <textarea rows="4"  id="card1_name" name="card1_name" form="input_form" onkeyup="InputAdjust(this)" style="width:30%;display:none;"></textarea>
    <textarea rows="4"  id="card1_content" name="card1_content" form="input_form" style="position:relative;left:-5px; width:30%;display:none;" onkeyup="InputAdjust(this)"></textarea>
    <?php  $category_name=$_GET['category_name']; echo "<input type=\"hidden\" name=\"category_name\" value=\"$category_name\" form=\"input_form\"> " ?>
    <br>
    
  </div>
  <div id="explicit_input_section">
    <div id="card1" style="height:220px; width:60%; border-style: groove; float:left; background-color:white;">
      <div style="float:left; width:49.8%;">
        <div id='explicit_card1_name' contenteditable="true" style="min-height:200px;width:99%;margin:5px 1px 10px 2px; "onkeyup="make_height_equal(this)">

        </div>
      </div>
      <div id="my_vertical_line" class="vertical-line" style="width:0.3%;height:100%;  float:left; background-color:pink;" >

      </div>
      <div style="float:left; width:49.8%;">
        <div  id='explicit_card1_content' contenteditable="true" style="min-height:200px;width:99%;margin:5px 1px 10px 2px; "onkeyup="make_height_equal(this)">

        </div>
      </div>

    </div>
  </div>

<div style="padding-left:15px;">
  <button onclick="add_more_input()" style="width:60%;height:70px;"><span class="glyphicon glyphicon-plus"></span></button>
  <br>
  <br>
  <?php echo '<input type="hidden" value="'.$uname.'" name="uname" form="input_form">' ?>
  <input type="hidden" value="create_card.php" name="page_url" form="input_form">  
  <input type="hidden" value="Submit" name="input_form_submit" form="input_form">   
  <button onclick="input_form_submit()">Submit</button>
</div>
                                                                                         
</div>
<script src="js/editor.js"></script>
<script>
    $('[contenteditable]').on('paste',function(e) {
    e.preventDefault();
    var text = (e.originalEvent || e).clipboardData.getData('text/plain') || prompt('Paste something..');
    window.document.execCommand('insertText', false, text);
  });
</script>
</body>
</html>