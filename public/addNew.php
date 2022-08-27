<?php
$title = 'Create Joke';
include __DIR__."/../templates/layout.html.php";
if(isset($_POST['jokeEntry'])){
try {
    // Establish a connection to the database
    $pdo = new PDO('mysql:host=localhost;dbname=jokedb;charset=utf8mb4','user','user');
    $outputdb = "Connection To DB Succesful";
    $out = '';
    // Generate query and send to database
    $q = 'INSERT INTO `joketable` SET
    `joketext` = :joketext,
    `jokedate` = CURDATE()';

    $stq = $pdo->prepare($q);
    $stq->bindValue(':joketext', $_POST['jokeEntry']);
    $stq->execute();
    
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
    include __DIR__."/../templates/addJoke.html.php";
    $output = ob_get_clean();
    echo $output;
    if (isset($outputdb)) {
        echo $outputdb;
    }
}

