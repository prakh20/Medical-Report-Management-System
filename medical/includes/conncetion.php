<?php
    $host="localhost";
    $user="root";
    $password="";
    $db="medical_report";

    $conn=mysqli_connect($host,$user,$password,$db);
    if(!$conn){
        echo mysqli_error_list();
    }
?>