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
<?php include "includes/db.php"; ?>
<?php include "includes/nav.html"; ?>
<?php $player_index=0; ?>
<form id="player_plus_form">
  <input type="hidden" name="player_plus_form_submit" value="Submit">
</form>

<form action="flashcard_player.php" id="player_minus_form">
  <input type="hidden" name="player_mius_form_submit" value="Submit">
</form>
  
<?php
  
  
  class card
  {
    var $card_name;
    var $card_content;
    function __construct($a1,$a2) 
    { 
      $this->card_name=$a1;
      $this->card_content=$a2;
    } 
    
  }
  $arrayobj = new ArrayObject();
    
  

  
//  echo '<input name="player_index" type="hidden" form="player_minus_form" value="'.($player_index-1).'">';
//  echo '<input name="player_index" type="hidden" form="player_plus_form" value="'.($player_index+1).'">';
  
//  echo 'card_name='.$arrayobj[$play_index]->card_name.'<br>';
//  echo 'card_content='.$arrayobj[$play_index]->card_content.'<br>';
  echo '<p id="player_card_name" style="border-radius: 25px; border: 2px solid #73AD21; padding: 20px; width: 30%; height: 400px;float:left;margin-left:10px;" >
    asdsad
  </p> ' ;

  echo '<p id="player_card_content" style="border-radius: 25px; border: 2px solid #73AD21;padding:20px; width: 30%; height: 400px;float:left;margin-left:10px;" >
    asdsad
  </p>';  
  
  echo '<div style="clear:left;"><button onclick="show_previous_random_card();" style="background-color: Transparent;border: none; font-size: 40px;"><span class="glyphicon glyphicon-circle-arrow-left"></span>
  <button onclick="show_next_random_card();" class="glyphicon glyphicon-circle-arrow-right" style="background-color: Transparent;border: none;font-size: 40px"></button>
  <div>';

  
?>
  
<script>
function show_next_random_card() {
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var responseArray = this.responseText.split("||");
//        console.log(this.responseText);
//        console.log(responseArray[1]);
      
      document.getElementById("player_card_name").innerHTML = responseArray[0];
      document.getElementById("player_card_content").innerHTML = responseArray[1];
    }
  };
  xhttp.open("GET", "random_card.php", true);
  xhttp.send();
}

</script>

  
  
</body>
</html>

