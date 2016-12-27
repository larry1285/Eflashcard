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
<?php include "includes/nav.php"; ?>
<?php $player_index=0; ?>
  

<form action="flashcard_player.php" id="player_minus_form">
  <input type="hidden" name="player_mius_form_submit" value="Submit">
</form>
  <h1>please choose the categories you want to review!</h1>
<div id="select_categories">
<?php
  $underscore_uname=$uname."_";
  $all_table_sql = "SHOW TABLES FROM Eflashcard LIKE '$underscore_uname%'";
  
  $result_all_table_sql = mysqli_query($connection,$all_table_sql);
  $count=0;
  while ($row = mysqli_fetch_row($result_all_table_sql)) {
    $table_name=substr($row[0],strlen($underscore_uname),strlen($row[0]));
    echo "<input type='checkbox' id='category_$count' value='$row[0]'>".$table_name;
    if(($count+1)%14==0 )echo "<br>";
    $count=$count+1;
  }
 
?>
  <input type='text' id='rank2_index'>
  <button onclick="select_all();">Seclect All</button>
  <button onclick="categories_set_up();">Start</button>
  <p id="card_count"></p>
</div>
<!--
  <input type="checkbox" name="vehicle" value="Bike"> I have a bike
  <input type="checkbox" name="vehicle" value="Car" checked> I have a car
  <input type="submit" value="Submit">
-->
</form>  

<?php
   
  
//  echo '<input name="player_index" type="hidden" form="player_minus_form" value="'.($player_index-1).'">';
//  echo '<input name="player_index" type="hidden" form="player_plus_form" value="'.($player_index+1).'">';
  
//  echo 'card_name='.$arrayobj[$play_index]->card_name.'<br>';
//  echo 'card_content='.$arrayobj[$play_index]->card_content.'<br>';
  echo '<p id="player_card_name" style="word-break: break-all;valign:top;border-radius: 25px; border: 2px solid #73AD21; padding: 20px; width: 30%; height: 400px;float:left;margin-left:10px;" >
    
  </p> ' ;
  echo '<p id="player_card_content" style="word-wrap: break-word;valign:top;border-radius: 25px; border: 2px solid #73AD21;padding:20px; width: 30%; height: 400px;float:left;margin-left:10px;" >
    
  </p>'; 

  echo '<div style="clear:left;"><button onclick="show_previous_random_card();" style="word-wrap:break-word;background-color: Transparent;border: none; font-size: 40px;"><span class="glyphicon glyphicon-circle-arrow-left"></span>
  <button onclick="show_next_random_card();" class="glyphicon glyphicon-circle-arrow-right" style="background-color: Transparent;border: none;font-size: 40px"></button>
  <button onclick="rank_level_up();" class="glyphicon glyphicon-plus" style="background-color: Transparent;border: none;font-size: 40px"></button>
  <button onclick="rank_level_down();" class="glyphicon glyphicon-minus" style="background-color: Transparent;border: none;font-size: 40px"></button>
  <h1 id="card_rank"></h1>
  <div>';

  
?>
  
<script>
var play_num=0;
var categories="";
var current_player_card_id="";
var rank2_index=0;
var uname=getUrlVars()['uname'];



function card(name,content,rank,id){
	this.name = name;
  this.content=content;
  this.rank=rank;
  this.id=id;
}
var card_count=-1;
var cards= [];

  

function select_all()
{
  var count=0;
  while(document.getElementById("category_"+count)!=null)
  {
    document.getElementById("category_"+count).checked=true;
    count++;
  }
}
function rank_level_up()
{
  xhttp = new XMLHttpRequest();
  xhttp.open("GET", "rank_level_up.php?card_id="+current_player_card_id+"&uname="+uname, true);
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      var response = this.responseText;
      document.getElementById("card_rank").innerHTML = response;
      cards[card_count].rank=response;
    }
  };
  xhttp.send();
}
function rank_level_down()
{
  xhttp = new XMLHttpRequest();
  xhttp.open("GET", "rank_level_down.php?card_id="+current_player_card_id+"&uname="+uname, true);
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      var response = this.responseText;
      document.getElementById("card_rank").innerHTML = response;
      cards[card_count].rank=response;
    }
  };
  xhttp.send();
}
function categories_set_up()
{
  categories="";
  rank2_index=document.getElementById("rank2_index").value;

  var count=0;
  var first_checked=true;
  do{
//    console.log(count);
    if(document.getElementById("category_"+count).checked==true)
    {
     
//      console.log(document.getElementById("category_"+count).value);
      if(first_checked)categories+=document.getElementById("category_"+count).value;
      else {categories=categories+"|";categories=categories+document.getElementById("category_"+count).value;}
      first_checked=false;
    }
    count=count+1;
  }while(document.getElementById("category_"+count)!=null)
  
//    console.log(categories);
  show_next_random_card();
}
function  show_previous_random_card()
{
  if(card_count>=1 &&card_count<=49)
  {
    card_count=card_count-1;
    document.getElementById("card_count").innerHTML=card_count;
    current_player_card_id=cards[card_count].id;
    document.getElementById("player_card_name").innerHTML = cards[card_count].name;
    document.getElementById("player_card_content").innerHTML = cards[card_count].content;
    document.getElementById("card_rank").innerHTML =  cards[card_count].rank;       
  }
}
function show_next_random_card() {
  console.log(categories);
  if(card_count<49)card_count=card_count+1;
  document.getElementById("card_count").innerHTML=card_count;
//  console.log("play_num="+play_num);
  if(typeof cards[card_count] == 'undefined' && card_count<50)
  {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() 
    {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
        var responseArray = this.responseText.split("||");
        var kk=responseArray[2].replace("%0D%0A", "&#13;&#10;");
  //      console.log(kk);
        responseArray[1]=responseArray[1].replace(/%0D%0A/g, "&#13;&#10;");
        responseArray[2]=responseArray[2].replace(/%0D%0A/g, "&#13;&#10;");
  //      console.log(responseArray[3]);
        //console.log(this.responseText);
        
        current_player_card_id=responseArray[3];
        document.getElementById("player_card_name").innerHTML = responseArray[1];
        document.getElementById("player_card_content").innerHTML = responseArray[2];
        document.getElementById("card_rank").innerHTML = responseArray[4];

        temp=new card(responseArray[1],responseArray[2],responseArray[4],responseArray[3]);
        cards[card_count]=temp;
      }
    };
    //+"&"+"rank2_index="
    xhttp.open("GET", "random_card.php?category_list="+categories+"&rank2_index="+rank2_index+"&uname="+uname, true);
    xhttp.send();
  }else{
        current_player_card_id=cards[card_count].id;
        document.getElementById("player_card_name").innerHTML = cards[card_count].name;
        document.getElementById("player_card_content").innerHTML = cards[card_count].content;
        document.getElementById("card_rank").innerHTML =  cards[card_count].rank;    
  }
}

</script>

  
  
</body>
</html>

