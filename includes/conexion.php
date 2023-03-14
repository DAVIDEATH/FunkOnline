<?php
$host="localhost";
$user="root";
$password="";
$database="funkonline";

$conn=mysqli_connect($host,$user,$password,$database);
    if(!$conn){
        echo "NO SE HA PODIDO CONECTAR A LA BASE DE DATOS ".' '.$database;
    }
?>