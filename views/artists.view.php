<?php
include_once(dirname(__DIR__).'/classes/artist.php');

$page_settings = $this->page_settings;

$artists = [
    new Artist(0, 'Luciano Pavarotti'),
    new Artist(1, 'Luciano Ligabue'),
    new Artist(2, 'Lucio Dalla')
];

// Match artist.tpl tags with respective values for each artist,
// then replace $artists values with parsed templates
for ($i=0; $i < count($artists); $i++) {
    $artist_values = ["name" => $artists[$i]->getName()];
    $artists[$i] = parse_template('artist', $artist_values);
}

// Match artists.tpl tags with respective values,
// then assign template to page content
$artists_values = ['artists' => join($artists)];
$page_settings['content'] = parse_template('artists', $artists_values);


try {
    echo parse_template('page', $page_settings);
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
