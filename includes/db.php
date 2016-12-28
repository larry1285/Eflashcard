<?php
$url = parse_url(getenv("mysql://b416775ee3bbd5:f18a7ad1@us-cdbr-iron-east-04.clear"));

$db['db_host'] = $url["host"];
$db['db_user'] = $url["user"];
$db['db_pass'] = $url["pass"];
$db['db_name'] = substr($url["path"], 1);
echo "wtf";
echo $db['db_host'];
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

