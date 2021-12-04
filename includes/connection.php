<?php
$servername = "localhost";
$databasename="mathgamez";
$username = "root";
$password = "";

try {
  $dsn ='mysql:host='.$servername.';dbname='.$databasename;//dsn data source name
  // set the PDO error mode to exception
  $pdo=new PDO($dsn,$username,$password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

?>