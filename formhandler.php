<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
   $firstname = htmlspecialchars($_POST["firstname"]);
   $lastname = htmlspecialchars($_POST["lastname"]);
   $pet = htmlspecialchars($_POST["favouritepet"]);

   if(empty($firstname | $lastname ) ){
    header("Location:index.php");
   };

   echo "These are the submited data:";
   echo "<br>";
   echo $firstname . " " . $lastname;
   echo "<br>";
   echo $pet;



} else {
    header("Location:index.php");
}