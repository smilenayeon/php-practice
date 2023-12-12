<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){ //checking if the user came through the legit way:posting
        $userSearch =  $_POST["usersearch"];
       
    
        try {
            require_once "includes/dbh.inc.php"; //saying I want to connect to a file and paste the file's code heres
    
            $query = "SELECT * FROM comments WHERE username = :usersearch;";
    
            $stmt = $pdo->prepare($query);
    
        
            $stmt->bindParam(":usersearch", $userSearch);

            $stmt->execute();

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC); //grab the result data
    
            $pdo = null; //freeing pdo and stmt, manually closing 
            $stmt = null;
    
        } catch (PDOException $e) {
            die("Query faile: " . $e -> getMessage()); // stop running and give error message
        }
    
    
    }else{
        header("location:../index.php");
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
<h3>search result</h3>
<?php
 if(empty($results)){
    echo"<div>";
    echo"<p>no result</p>";
    echo"</div>";   
 }else{
foreach ($results as $result){
    echo "<h4>" . htmlspecialchars ($result["username"]) . "</h4>"; //sanitaize the data when you spitout the user data to the website
    echo "<p>" . htmlspecialchars($result["comment_text"]) . "</p>";
    echo "<p>" . htmlspecialchars ($result["created_at"]) . "</p>";
}
}
?>

</body>
</html>