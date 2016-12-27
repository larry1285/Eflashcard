<?php 
  if(isset($_GET['uname'])){
    $uname=$_GET['uname'];
  }
  else{
    $uname="";
  }
  echo '<div id="uname" style="display: none;">'.$uname.'</div>'; //a lazy approach to let javascript get form data
?> 
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <?php echo'<a class="navbar-brand" href="index.php?uname='.$uname.'">Eflashcard</a>' ?>
    </div>
    <ul class="nav navbar-nav">
      <li class="active" style="position:relative; top:6px">
        <form action="search_result.php" method="GET" id="search_form">
          <div class = "input-group" style="width:400px; padding-top:13px;">
            <input type = "text" class ="form-control" placeholder = "Search for.." style="font-size:30px;" name="search_text" form="search_form";>
            <span class="input-group-btn">
              <button class="btn btn-default" onclick="send_search_form()";>
                <span class="glyphicon glyphicon-search"></span>
              </button>
            </span>
            <?php echo '<input type="hidden" value="'.$uname.'" name="uname">' ?>
          </div> 
        </form>
      </li>
      <?php 

      echo'
      <li style="padding-top:11px;"><a href="create.php?uname='.$uname.'" style="font-size:35px; padding-top:10px;">Create<span class="glyphicon glyphicon-plus" style="position:relative; left:3px; top:1px"></span></a></li>';
      ?>

      <?php 

      echo'
      <li style="padding-left:20px;padding-top:8px;font-size:35px;"><a href="flashcard_player.php?uname='.$uname.'"><span class="glyphicon glyphicon-play"></span></a></li>';
      ?>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="login.html" style="padding-top:25px; font-size:25px;"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="login.html" style="padding-top:25px; font-size:25px;"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>

<!--
<nav class="navbar navbar-default">
  <div style="float:left;width:25%">
    <a  href="index.php" style="width:100%; word-wrap: break-word;  font-size:35px;">Eflashcard</a>
  </div>
  <div style="float:left;width:25%">
    <form>
      <div class = "input-group" style=" padding-top:13px; ">
        <input type = "text" class ="form-control" placeholder = "Search for.." style="font-size:30px;">
        <span class="input-group-btn">
          <button name="submit" class="btn btn-default" type="submit">
            <span style="position:relative; padding-top:3px;"class="glyphicon glyphicon-search"></span>
          </button>
        </span>
      </div> 
    </form>
  </div>
  <div style="float:left;width:10%;padding-left:10px;padding-top:15px;">
      <a href="create.php" style="font-size:35px; padding-top:10px;">Create<span class="glyphicon glyphicon-plus" style="position:relative; left:3px; top:1px"></span></a>
  </div>
  <div style="float:right;width:15%">
     <a href="#" style="padding-top:25px; font-size:35px;"><span class="glyphicon glyphicon-user"></span> Sign Up</a>
  </div>
</nav> 
-->
