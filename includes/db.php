<?php

$db['db_host'] = 'localhost';
$db['db_user'] = 'root';
$db['db_pass'] = '';
$db['db_name'] = 'eflashcard';


foreach($db as $key => $value){
  define(strtoupper($key),$value);
}


$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME); //return ture or false 
if($connection){

//echo "we are connected" . "<br>";

}
//https://www.youtube.com/watch?v=aAoYaZzWRgw
//import and export db
?>

