<?php
require_once('include/functions.php');

$view = new View();

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
    case 'artists':
        $view->artists = array(
            new Artist(0, 'Luciano Pavarotti'),
            new Artist(1, 'Luciano Ligabue'),
            new Artist(2, 'Lucio Dalla')
        );
        $content = $view->render('view-artists.php');
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