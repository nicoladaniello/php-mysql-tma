<?php
include_once(dirname(__DIR__) . '/classes/song.php');

$page_settings = $this->page_settings;

$songs = [
    new Song(0, 'Abc', 0, 120),
    new Song(1, 'Cbd', 1, 140),
    new Song(2, 'Dfg', 2, 200)
];

// Match artist.tpl tags with respective values for each artist,
// then replace $artists values with parsed templates
for ($i = 0; $i < count($songs); $i++) {
    $song_values = [
        "title" => $songs[$i]->getTitle(),
        "duration" => $songs[$i]->getDuration()
    ];
    $songs[$i] = parse_template('song', $song_values);
}

// Match artists.tpl tags with respective values,
// then assign template to page content
$songs_values = ['songs' => join($songs)];
$page_settings['content'] = parse_template('songs', $songs_values);


try {
    echo parse_template('page', $page_settings);
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
