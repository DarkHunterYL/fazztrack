<?php
$host="localhost";
$user="root";
$pass="";
$db="fazztrack";
$con=mysqli_connect($host,$user,$pass,$db);

if( !$con ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}
?>