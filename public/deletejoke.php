<?php
try {
    // Establish a connection to the database
    $pdo = new PDO('mysql:host=localhost;dbname=jokedb;charset=utf8mb4','user','user');
    $outputdb = "Connection To DB Succesful";
    $out = '';
    // Generate query and send to database
    $q = 'DELETE FROM `joketable` WHERE id = :id';

    $stq = $pdo->prepare($q);
    $stq->bindValue(':id', $_POST['id']);
    $stq->execute();
    
    header('location: jokes.php');
     
    
    // Catch error message
} catch (PDOException $error) {
    $outputdb = "Connection To DB Failed".$error->getMessage().$error->getFile().$error->getLine();
}

?>