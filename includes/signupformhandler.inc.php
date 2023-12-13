<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){ //checking if the user came through the legit way:posting
    $username =  $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];

    try {
        require_once "dbh.inc.php"; //saying I want to connect to a file and paste the file's code heres

        //$query = "INSERT INTO users (username, pwd, email) VALUES (?, ?, ?);";
        $query = "INSERT INTO users (username, pwd, email) VALUES (:username, :pwd, :email);";

        $stmt = $pdo->prepare($query);
//hash pwd before sending it to DB
$options=[
    'cost' =>  12  
];
$hashedPwd = password_hash($pwdSignUp, PASSWORD_BCRYPT, $options);

        //for the second method bindParam is needed
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":pwd", $hashedPwd);  // put hashedPwd not pwd.
        $stmt->bindParam(":email", $email);

        //$stmt->execute([$username, $pwd, $email]);
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