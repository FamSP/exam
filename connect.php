<?php
$serverName = 'localhost';
$userName =  'root';
$userPassword = ''; 
$dbname =  'qsystem';

try {
  $conn = new PDO(
    "mysql:host=$serverName;dbname=$dbname;charset=UTF8",
     $userName,$userPassword
    
);


  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



} catch (PDOException $e) {
    echo ' sdfsdfxcxcxczsd' . $e->getMessage();
}
