<?php

$host = "localhost";
$username = "root";
$pass = "";
$db_name = "saps";

$conn = mysqli_connect($host,$username,$pass,$db_name );
if(!$conn){
    echo 'something went wrong with the connection please try again';
}


?>

