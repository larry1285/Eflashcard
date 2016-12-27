<?php include "includes/db.php"; ?>
<?php
	if(!isset($_GET['orgcheck'])){
		echo "<a href='login.html'>Click Me To Login</a>";
		die();
	}
  $login_UserName=$_GET['login_UserName'];
  $login_Password=$_GET['login_Password'];
  $query="SELECT * FROM users WHERE `UNAME`='$login_UserName' AND `UPASS`='$login_Password'";
  $result = mysqli_query($connection,$query);
  $num_rows = mysqli_num_rows($result);
  if($num_rows==0)echo "this user does not exist,plz check user info";
  else echo 'success' 

  


?>