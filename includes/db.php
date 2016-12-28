<?php

$db['db_host'] = "us-cdbr-iron-east-04.cleardb.net";
$db['db_user'] = "b416775ee3bbd5";
$db['db_pass'] = "f18a7ad1";
$db['db_name'] = "heroku_fbd7696cb891e27";
//echo "wthuf";
//echo $db['db_host'];
foreach($db as $key => $value){
  define(strtoupper($key),$value);
}
$conn = new mysqli($server, $username, $password, $db);
$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME); //return ture or false 
if(!$connection){die("Unable to connect to db");}
?>
<?php

//$db['db_host'] = 'localhost';
//$db['db_user'] = 'root';
//$db['db_pass'] = '';
//$db['db_name'] = 'eflashcard';
//
//
//foreach($db as $key => $value){
//  define(strtoupper($key),$value);
//}
//
//
//$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME); //return ture or false 
//if($connection){
//
//
//}

?>

