<?php

// Code to detect whether index.php has been requested without query string goes here
// If no parameter detected...
if (!isset($_GET['page'])) {
    $id = 'home'; // display home page
} else {
    $id = $_GET['page']; // else requested page
}

$content = '';

// Switch statement to decide content of page will go here.
// Regardless of which "view" is displayed, the variable $content will
switch ($id) {
    case 'home':
        include 'views/home.php';
        break;
    case 'testDogClass':
        include 'views/testDog.php';
        break;
    case 'testMyDB':
        include 'views/testMyDB.php';
        break;
    default:
        include 'views/404.php';
}

// be populated with the HTML content for that view

// For now, set $content to a placeholder value, remove this when you have 
// added your switch statement above
//$content = '<h1>Under Construction...</h1>';
?>
    <!DOCTYPE html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>W1 Music</title>
    </head>

    <body>
        <h1>W1 Music</h1>

        <?php
        include 'views/view-navigation.php';
        echo $content;
        ?>

    </body>

    </html>