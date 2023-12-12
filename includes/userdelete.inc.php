<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username =  $_POST["username"];
    $pwd = $_POST["pwd"];


    try {
        require_once "dbh.inc.php"; //sayin I want to connect to a file and paste the file's code heres

        $query = "DELETE FROM users WHERE username = :username  AND pwd = :pwd;";

        $stmt = $pdo->prepare($query);

        //for the second method bindParam is needed
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":pwd", $pwd);
    

        $stmt->execute();

        $pdo = null; //freeing pdo and stmt, manually closing 
        $stmt = null;

        header("location:../index.php"); //sending the user back to index.php page

        die();  // killing the script now

    } catch (PDOException $e) {
        die("Query faile: " . $e -> getMessage()); // stop running and give error message
    }


}else{
    header("location:../index.php");
}