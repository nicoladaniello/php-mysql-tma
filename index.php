<?php
require_once(__DIR__ . '/includes/functions.inc.php');

// If no parameter detected...
if (!isset($_GET['page'])) {
    $id = 'home'; // display home page
} else {
    $id = htmlentities($_GET['page']); // else requested page
}

// Define page variables
$page_settings = [
    "title" => "W1 Music",
    "heading" => "W1 Music",
    "content" => "",
    "baseurl" => dirname($_SERVER['REQUEST_URI']),
    "footer" => "",
];

// Parse navbar template
$page_settings["navbar"] = parse_template('navbar', $page_settings);

// Pass page settings to the View
$view = new View();
$view->__set('page_settings', $page_settings);


// Render the requested View
switch ($id) {
    case 'home':
        $page = $view->render('home');
        break;
    case 'artists':
        $page = $view->render('artists');
        break;
    case 'songs':
        $page = $view->render('songs');
        break;
    default:
        $view->render('404');
}
