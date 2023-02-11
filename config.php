<?php

//Database Infromation
$hostname = 'localhost';
$database = 'cook';
$username = 'root';
$password = '';

//Using Sprintf To Use Format String For Create Database Object
$conn = sprintf('mysql:host=%s;dbname=%s',$hostname,$database);

//Using PDO(PHP DATA OBJECT) And Using Try Catch
try{
    $pdo = new PDO($conn, $username, $password);
}catch(\PDOEXCEPTION $e){
    throw new PDOException($e);
}
?>