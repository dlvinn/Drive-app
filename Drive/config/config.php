<?php
$servername="localhost";
$username="root";
$password="";
$dbname="drive";

$conn=mysqli_connect($servername,$username,$password,$dbname,'3307');

if(!$conn){
    echo "connection failed". mysqli_connect_error();
}
echo "";


$host = "localhost"; // define("host", "localhost");
$dbn = "drive"; // define("dbn", "erp_system");
$user = "root"; // define("user", "root");
$pass = ""; // define("pass", "password");
$port = "3307";
$charset = 'utf8mb4';
$db;
try {
$db = new PDO("mysql:host=$host;dbname=$dbn;charset=$charset;port=$port;",$user,$pass, [
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);
//echo 'connected';
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br>";
}
?>