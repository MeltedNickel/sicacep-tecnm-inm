<?php
/*
* Script: Conexión a base de datos de MySQL con PHP
*/

/* Creando una nueva conexión a la base de datos. */
    $servername= 'localhost';
    $username= 'root';
    $password= '';
    $dbname= "pac";
    $con= mysqli_connect($servername,$username,$password,$dbname);
        if(!$con){
            die('Could not Connect MySql:' .mysqli_error());
        }
?>