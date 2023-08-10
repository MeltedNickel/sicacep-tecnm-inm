<?php
//include database configuration file
require 'database.php';

//get records from database
if(isset($_POST['emptySubmit'])){
    $sql = "TRUNCATE TABLE `homologada`";

    $statement = $conn->prepare($sql);
    $statement->execute();
}
header('Location: homologada.php');
?>