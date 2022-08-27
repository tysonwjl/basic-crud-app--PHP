<?php
$title = 'Edit Joke';
include __DIR__."/../templates/layout.html.php";

$id2 = $_POST['id2'];

//Add hidden value in form == id


if(isset($_POST['jokeEntryUpdate'])){
    
try {
    // Establish a connection to the database
    $pdo = new PDO('mysql:host=localhost;dbname=jokedb;charset=utf8mb4','user','user');
    
    // Generate query to send, prepare, bind values and execute
    $q = 'UPDATE `joketable` SET `joketext` = :newText WHERE id = :id';
    $stq = $pdo->prepare($q);
    $stq->bindValue(':id', $_POST['id2']);
    $stq->bindValue(':newText', $_POST['jokeEntryUpdate']);
    $stq->execute();

    // $pdo->exec($q);

    // $stq = $pdo->prepare($q);
    // $stq->bindValue(':joketext', $_POST['jokeEntryUpdate']);
    // $stq->bindValue(':id', $id3);
    // $stq->execute();
    
    // echo $_POST['jokeEntryUpdate'];
    header('location: jokes.php');
     
    
    // Catch error message
} catch (PDOException $error) {
    $outputdb = "Connection To DB Failed".$error->getMessage().$error->getFile().$error->getLine();
}
} 
else{
    // Start bufffer
    ob_start();
    // include the jokes.html.php, this will be sotred in buffer
    include __DIR__."/../templates/editJoke.html.php";
    $output = ob_get_clean();
    echo $output;
    
}
