<?php

$title = 'View Jokes'; // Sets the title 
$heading = '<h2>OUR HANDY RANGE OF JOKES</h2>';
try {
    // Establish a connection to the database
    $pdo = new PDO('mysql:host=localhost;dbname=jokedb;charset=utf8mb4','user','user');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Generate query and send to database
    $q = 'SELECT * FROM `joketable`';
    
    $result = $pdo->query($q);
    foreach($result as $r){
        $jokes[] = 
                    array(
                        'id' => $r['id'],
                        'joketext' => $r['joketext'],
                        'jokedate' => $r['jokedate'],
                        'authorid' => $r['authorid']
                    );
    }
    

    // Catch error message
} catch (PDOException $error) {
    $output = "Connection To DB Failed".$error->getMessage().$error->getFile().$error->getLine();
}


include __DIR__."/../templates/layout.html.php";

// Start bufffer
ob_start();
// include the jokes.html.php, this will be sotred in buffer
include __DIR__."/../templates/jokes.html.php";
$output = ob_get_clean();
echo $output;

