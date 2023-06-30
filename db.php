<?php


$servername = 'localhost';
$username = 'root';
$password = ''; //pass distant:V&pny7wVMP.9
$db = 'dmsbd';
$charset = 'utf8mb4';

$options = [
  \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
  \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
  \PDO::ATTR_EMULATE_PREPARES   => false,
];

try{
  
    $conn = new PDO("mysql:host=$servername;dbname=$db;charset=$charset", $username, $password,  $options);
    
    // echo "Connecté à $db sur $servername avec succès.";
    
  } catch (\PDOException $e) {
  
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
    
  }
