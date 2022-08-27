<?php
$title = 'Welcome to the joke lounge';

// Start bufffer
ob_start();
// include the jokes.html.php, this will be sotred in buffer
include __DIR__."/../templates/home.html.php";
$joke_output = ob_get_clean();

include __DIR__."/../templates/layout.html.php";
echo $joke_output;